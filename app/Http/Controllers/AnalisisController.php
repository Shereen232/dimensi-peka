<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AnalisisController extends Controller
{
    public function responden()
    {
        $query = Riwayat::with('user')->latest();

        if (request('sekolah')) {
            $query->whereHas('user', fn($q) => $q->where('sekolah', request('sekolah')));
        }

        if (request('kelas')) {
            $query->whereHas('user', fn($q) => $q->where('kelas', request('kelas')));
        }

        $riwayat = $query->get();

        // Untuk dropdown filter
        $sekolahList = \App\Models\User::whereNotNull('sekolah')->distinct()->pluck('sekolah');
        $kelasList   = \App\Models\User::whereNotNull('kelas')->distinct()->pluck('kelas');

        return view('analisis.responden', compact('riwayat', 'sekolahList', 'kelasList'));
    }


    public function exportPDF()
{
    // Daftar kelurahan tetap (meskipun tidak ada datanya akan tetap ditampilkan)
    $kelurahanList = [
        ['kelurahan' => 'Bendan', 'puskesmas' => 'Puskesmas Tondano'],
        ['kelurahan' => 'Kramatsari', 'puskesmas' => 'Puskesmas Tondano'],
        ['kelurahan' => 'Tirto', 'puskesmas' => 'Puskesmas Tondano'],
        ['kelurahan' => 'Medono', 'puskesmas' => 'Puskesmas Tondano'],
        ['kelurahan' => 'Sokorejo', 'puskesmas' => 'Puskesmas Tondano'],
        ['kelurahan' => 'Noyontaan', 'puskesmas' => 'Puskesmas Tondano'],
        ['kelurahan' => 'Klego', 'puskesmas' => 'Puskesmas Jenggot'],
        ['kelurahan' => 'Pekalongan Selatan', 'puskesmas' => 'Puskesmas Jenggot'],
        ['kelurahan' => 'Jenggot', 'puskesmas' => 'Puskesmas Jenggot'],
        ['kelurahan' => 'Kusuma Bangsa', 'puskesmas' => 'Puskesmas Buaran'],
        ['kelurahan' => 'Krapyak Kidul', 'puskesmas' => 'Puskesmas Buaran'],
        ['kelurahan' => 'Dukuh', 'puskesmas' => 'Puskesmas Buaran'],
    ];

    // Ambil data riil dari DB
    $riwayat = DB::table('riwayat')
        ->join('users', 'users.id', '=', 'riwayat.user_id')
        ->select('users.kelurahan', 'riwayat.hasil_total')
        ->get();

    $data = [];
    $totalNormal = $totalBorderline = $totalAbnormal = 0;

    foreach ($kelurahanList as $entry) {
        $kel = $entry['kelurahan'];
        $pusk = $entry['puskesmas'];

        $filtered = $riwayat->where('kelurahan', $kel);

        $normal = $filtered->where('hasil_total', 'NORMAL')->count();
        $borderline = $filtered->where('hasil_total', 'BORDERLINE')->count();
        $abnormal = $filtered->where('hasil_total', 'ABNORMAL')->count();
        $total = $normal + $borderline + $abnormal;

        $data[] = [
            'kelurahan' => $kel,
            'puskesmas' => $pusk,
            'normal' => $normal,
            'borderline' => $borderline,
            'abnormal' => $abnormal,
            'total' => $total,
        ];

        $totalNormal += $normal;
        $totalBorderline += $borderline;
        $totalAbnormal += $abnormal;
    }

    $total = $totalNormal + $totalBorderline + $totalAbnormal;
    $periode = Carbon::now()->translatedFormat('F Y');

    // Buat PDF dari view
    $pdf = Pdf::loadView('analisis.export.pdf', [
        'data' => $data,
        'periode' => $periode,
        'totalNormal' => $totalNormal,
        'totalBorderline' => $totalBorderline,
        'totalAbnormal' => $totalAbnormal,
        'total' => $total,
    ]);

    return $pdf->download('laporan-skrining.pdf');
}


}
