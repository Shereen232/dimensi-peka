<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KuesionerController extends Controller
{
    // Tampilkan daftar pertanyaan
    public function index()
    {
        $userId = Auth::id();
        $questions = Question::all();
        $options = Option::all();

        return view('kuesioner.index', compact('questions', 'options'));
    }

    // Form tambah pertanyaan
    public function create()
    {
        return view('kuesioner.create');
    }

    // Simpan jawaban dan hasil ke database
    public function store(Request $request)
    {
        $userId = Auth::id();
        $questions = Question::all();
        $answers = $request->post();

        $score = ['Pro' => 0, 'E' => 0, 'C' => 0, 'H' => 0, 'P' => 0];

        foreach ($questions as $q) {
            $selected = $answers['answers' . $q->id];
            $option = Option::find($selected);

            Answer::create([
                'user_id' => $userId,
                'question_id' => $q->id,
                'option_id' => $selected,
            ]);

            if (isset($score[$q->kategori])) {
                $score[$q->kategori] += $option->score;
            }
        }

        // Hitung dan simpan ke tabel riwayat
        $riwayat = new Riwayat();
        $riwayat->user_id = $userId;
        $riwayat->tanggal = Carbon::now()->toDateString();

        $riwayat->skor_es = $score['E'];
        $riwayat->hasil_es = $this->klasifikasi('E', $score['E']);

        $riwayat->skor_cp = $score['C'];
        $riwayat->hasil_cp = $this->klasifikasi('C', $score['C']);

        $riwayat->skor_h = $score['H'];
        $riwayat->hasil_h = $this->klasifikasi('H', $score['H']);

        $riwayat->skor_p = $score['P'];
        $riwayat->hasil_p = $this->klasifikasi('P', $score['P']);

        $riwayat->skor_pro = $score['Pro'];
        $riwayat->hasil_pro = $this->klasifikasi('Pro', $score['Pro']);

        $total = $score['E'] + $score['C'] + $score['H'] + $score['P'];
        $riwayat->total_kesulitan = $total;
        $riwayat->hasil_total = $this->klasifikasi('Total', $total);


        $riwayat->save();

        return response()->json([
            'success' => true,
            'redirect' => route('kuesioner.result', $riwayat->id),
            'message' => 'Jawaban berhasil disimpan.'
        ]);
    }

    public function reset()
    {
        $userId = Auth::id();
        Answer::where('user_id', $userId)->delete();

        return redirect()->route('kuesioner.index')->with('success', 'Silakan isi ulang kuesioner.');
    }
    // Tampilkan hasil kuisioner
    public function show($id)
    {
    $userId = Auth::id();

        // Ambil user
        $user = \App\Models\User::findOrFail($userId);

        // Ambil riwayat terakhir user
        $riwayat = \App\Models\Riwayat::where('id', $id)->where('user_id', $userId)->latest()->first();

        if (!$riwayat) {
            return redirect()->route('kuesioner.index')->with('error', 'Belum ada hasil kuesioner.');
        }

        // Skor untuk JS
        $score = [
            'E'    => $riwayat->skor_es,
            'C'    => $riwayat->skor_cp,
            'H'    => $riwayat->skor_h,
            'P'    => $riwayat->skor_p,
            'Pro'  => $riwayat->skor_pro,
            'Total' => $riwayat->total_kesulitan,
        ];

        return view('kuesioner.result', compact('user', 'riwayat', 'score'));
    }


    // Fungsi bantu klasifikasi skor
    private function klasifikasi($kategori, $skor)
    {
        switch ($kategori) {
            case 'E':
                return $skor <= 5 ? 'NORMAL' : ($skor >= 7 ? 'ABNORMAL' : 'BORDERLINE');
            case 'C':
                return $skor <= 3 ? 'NORMAL' : ($skor >= 10 ? 'ABNORMAL' : 'BORDERLINE');
            case 'H':
                return $skor <= 5 ? 'NORMAL' : ($skor >= 7 ? 'ABNORMAL' : 'BORDERLINE');
            case 'P':
                return $skor <= 3 ? 'NORMAL' : ($skor >= 6 ? 'ABNORMAL' : 'BORDERLINE');
            case 'Pro':
                return $skor >= 6 ? 'NORMAL' : ($skor <= 4 ? 'ABNORMAL' : 'BORDERLINE');
            case 'Total':
                return $skor <= 15 ? 'NORMAL' : ($skor >= 20 ? 'ABNORMAL' : 'BORDERLINE');
            default:
                return '-';
        }
    }

}
