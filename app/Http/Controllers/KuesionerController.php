<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Riwayat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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

    private function generateKeterangan($riwayat)
    {
        $penjelasan = [
            'Total' => [
                'NORMAL' => [
                    'ket' => 'Normal pada total kesulitan berarti anak belajar dengan baik, tidak memiliki gangguan yang berarti, baik berasal dari faktor internal anak maupun eksternalnya.',
                    'rekom' => '-',
                ],
                'BORDERLINE' => [
                    'ket' => 'Terdapat beberapa tanda potensi masalah psikososial, meskipun belum tergolong sebagai gangguan yang pasti.',
                    'rekom' => 'Lakukan skrining ulang dalam 3–6 bulan. Bila ada perubahan signifikan, konsultasikan ke psikolog anak atau psikiater.',
                ],
                'ABNORMAL' => [
                    'ket' => 'Ada indikasi kuat masalah psikososial yang membutuhkan perhatian lebih lanjut.',
                    'rekom' => 'Segera konsultasi dengan psikolog anak atau psikiater.',
                ],
            ],
            'E' => [
                'NORMAL' => [
                    'ket' => 'Anak mampu mengendalikan perasaan dan pikirannya secara emosional.',
                    'rekom' => '-',
                ],
                'BORDERLINE' => [
                    'ket' => 'Terdapat tanda awal kesulitan emosional, seperti cemas, sedih, atau takut berlebihan.',
                    'rekom' => 'Perhatikan perubahan suasana hati, mudah menangis, sulit tidur, atau menghindari aktivitas sosial.',
                ],
                'ABNORMAL' => [
                    'ket' => 'Mengalami kesulitan emosional yang signifikan seperti cemas berlebihan, sering merasa sedih atau takut.',
                    'rekom' => 'Segera konsultasikan dengan psikolog anak atau psikiater.',
                ],
            ],
            'C' => [
                'NORMAL' => [
                    'ket' => 'Tidak ada tanda-tanda perilaku bermasalah yang signifikan.',
                    'rekom' => '-',
                ],
                'BORDERLINE' => [
                    'ket' => 'Indikasi awal kesulitan perilaku seperti mudah marah atau membangkang.',
                    'rekom' => 'Observasi lebih lanjut terhadap perilaku di rumah dan sekolah.',
                ],
                'ABNORMAL' => [
                    'ket' => 'Menunjukkan perilaku bermasalah signifikan seperti agresif, kasar, atau suka mencuri.',
                    'rekom' => 'Segera konsultasikan dengan psikolog anak.',
                ],
            ],
            'H' => [
                'NORMAL' => [
                    'ket' => 'Tidak menunjukkan gangguan perhatian atau hiperaktivitas yang berarti.',
                    'rekom' => '-',
                ],
                'BORDERLINE' => [
                    'ket' => 'Tanda-tanda gangguan perhatian atau impulsivitas mulai terlihat.',
                    'rekom' => 'Perlu pemantauan lebih lanjut.',
                ],
                'ABNORMAL' => [
                    'ket' => 'Mengalami gangguan perhatian dan hiperaktivitas yang nyata.',
                    'rekom' => 'Segera konsultasikan dengan psikolog atau psikiater.',
                ],
            ],
            'P' => [
                'NORMAL' => [
                    'ket' => 'Relasi sosial anak tergolong baik.',
                    'rekom' => '-',
                ],
                'BORDERLINE' => [
                    'ket' => 'Mulai terlihat kesulitan dalam hubungan sosial.',
                    'rekom' => 'Dorong anak untuk aktif di kegiatan sosial.',
                ],
                'ABNORMAL' => [
                    'ket' => 'Kesulitan sosial yang signifikan.',
                    'rekom' => 'Konsultasikan dengan psikolog atau konselor sekolah.',
                ],
            ],
            'Pro' => [
                'NORMAL' => [
                    'ket' => 'Kemampuan sosial anak baik.',
                    'rekom' => '-',
                ],
                'BORDERLINE' => [
                    'ket' => 'Kemungkinan keterbatasan empati atau kerja sama.',
                    'rekom' => 'Berikan teladan dan bimbingan sosial secara langsung.',
                ],
                'ABNORMAL' => [
                    'ket' => 'Kurangnya kepedulian terhadap orang lain.',
                    'rekom' => 'Segera konsultasikan dengan psikolog atau konselor sekolah.',
                ],
            ],
        ];

        return [
            'Total' => $penjelasan['Total'][$riwayat->hasil_total] ?? ['ket' => '-', 'rekom' => '-'],
            'E'     => $penjelasan['E'][$riwayat->hasil_es] ?? ['ket' => '-', 'rekom' => '-'],
            'C'     => $penjelasan['C'][$riwayat->hasil_cp] ?? ['ket' => '-', 'rekom' => '-'],
            'H'     => $penjelasan['H'][$riwayat->hasil_h] ?? ['ket' => '-', 'rekom' => '-'],
            'P'     => $penjelasan['P'][$riwayat->hasil_p] ?? ['ket' => '-', 'rekom' => '-'],
            'Pro'   => $penjelasan['Pro'][$riwayat->hasil_pro] ?? ['ket' => '-', 'rekom' => '-'],
        ];
    }

    public function exportPDF($id)
    {
        $user = User::findOrFail($id);
        $riwayat = Riwayat::where('user_id', $user->id)->latest()->firstOrFail();

        $score = [
            'es' => $riwayat->skor_es,
            'cp' => $riwayat->skor_cp,
            'h'  => $riwayat->skor_h,
            'p'  => $riwayat->skor_p,
            'pro' => $riwayat->skor_pro,
            'total' => $riwayat->total_kesulitan,
        ];

        // INI PENTING: Tambahkan array keterangan
        $keterangan = $this->generateKeterangan($riwayat);

        $pdf = Pdf::loadView('kuesioner.export.pdf', compact('user', 'riwayat', 'score', 'keterangan'));

        return $pdf->download('hasil_skrining_' . $user->name . '.pdf');
    }



}
