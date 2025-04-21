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

        $answer = Answer::where('user_id', $userId)->first();
        if ($answer) return redirect()->route('kuesioner.result');

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
        $riwayat->hasil_es = $this->klasifikasi($score['E'], [5, 6], ['NORMAL', 'BORDERLINE', 'ABNORMAL']);

        $riwayat->skor_cp = $score['C'];
        $riwayat->hasil_cp = $this->klasifikasi($score['C'], [3, 9], ['NORMAL', 'BORDERLINE', 'ABNORMAL']);

        $riwayat->skor_h = $score['H'];
        $riwayat->hasil_h = $this->klasifikasi($score['H'], [5, 6], ['NORMAL', 'BORDERLINE', 'ABNORMAL']);

        $riwayat->skor_p = $score['P'];
        $riwayat->hasil_p = $this->klasifikasi($score['P'], [3, 5], ['NORMAL', 'BORDERLINE', 'ABNORMAL']);

        $riwayat->skor_pro = $score['Pro'];
        $riwayat->hasil_pro = $this->klasifikasi($score['Pro'], [4, 5], ['ABNORMAL', 'BORDERLINE', 'NORMAL']);

        $total = $score['E'] + $score['C'] + $score['H'] + $score['P'];
        $riwayat->total_kesulitan = $total;
        $riwayat->hasil_total = $this->klasifikasi($total, [15, 19], ['NORMAL', 'BORDERLINE', 'ABNORMAL']);

        $riwayat->save();

        return redirect()->route('kuesioner.result')->with('success', 'Jawaban berhasil disimpan.');
    }

    // Tampilkan hasil kuisioner
    public function show()
    {
        $userId = Auth::id();
        $questions = Question::all();
        $options = Option::all();
        $answers = Answer::where('user_id', $userId)->pluck('option_id', 'question_id')->toArray();

        return view('kuesioner.result', compact('questions', 'options', 'answers'));
    }

    // Fungsi bantu klasifikasi skor
    private function klasifikasi($skor, $range, $texts)
    {
        if ($skor <= $range[0]) return $texts[0];
        elseif ($skor <= $range[1]) return $texts[1];
        else return $texts[2];
    }
}
