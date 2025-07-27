<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatExport;
use Illuminate\Support\Facades\Auth;



class AnalisisController extends Controller
{

    public function responden()
    {
        $query = Riwayat::with('user')->latest();

        // Filter sekolah
        $sekolah = request('sekolah');
        if ($sekolah) {
            $query->whereHas('user', fn($q) => $q->where('sekolah', $sekolah));
        }

        // Filter kelas
        $kelas = request('kelas');
        if ($kelas) {
            $query->whereHas('user', fn($q) => $q->where('kelas', $kelas));
        }

        // Filter kelurahan yang disamakan dengan input "puskesmas"
        $puskesmas = request('puskesmas');
        if ($puskesmas) {
            $query->whereHas('user', fn($q) => $q->where('kelurahan', $puskesmas));
        }

        // Filter bulan & tahun
        $bulan = request('bulan', Carbon::now()->month);
        $tahun = request('tahun', Carbon::now()->year);
        $query->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun);

        $riwayat = $query->get();

        // Jika hasil kosong
        $kosong = $riwayat->isEmpty();

        // Dropdown filter data
        $sekolahList = User::whereNotNull('sekolah')->distinct()->pluck('sekolah');
        $kelasList = User::whereNotNull('kelas')->distinct()->pluck('kelas');
        $listKelurahan = \App\Models\Kelurahan::all();

        return view('analisis.responden', compact(
            'riwayat', 'sekolahList', 'kelasList', 'listKelurahan',
            'bulan', 'tahun', 'puskesmas', 'sekolah', 'kelas', 'kosong'
        ));
    }

    public function exportLaporan()
    {
        // Daftar kelurahan tetap (meskipun tidak ada datanya akan tetap ditampilkan)
       $kelurahanList = \App\Models\Kelurahan::all()->map(function ($kelurahan) {
            return ['kelurahan' => $kelurahan->nama];
        })->toArray();

        // Ambil data riil dari DB
        $riwayat = DB::table('riwayat')
            ->join('users', 'users.id', '=', 'riwayat.user_id')
            ->select('users.kelurahan', 'riwayat.hasil_total')
            ->get();

        $data = [];
        $totalNormal = $totalBorderline = $totalAbnormal = 0;

        foreach ($kelurahanList as $entry) {
            $kel = $entry['kelurahan'];

            $filtered = $riwayat->where('kelurahan', $kel);

            $normal = $filtered->where('hasil_total', 'NORMAL')->count();
            $borderline = $filtered->where('hasil_total', 'BORDERLINE')->count();
            $abnormal = $filtered->where('hasil_total', 'ABNORMAL')->count();
            $total = $normal + $borderline + $abnormal;

            $data[] = [
                'kelurahan' => $kel,
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
        $pdf = Pdf::loadView('analisis.export.laporan_pdf', [
            'data' => $data,
            'periode' => $periode,
            'totalNormal' => $totalNormal,
            'totalBorderline' => $totalBorderline,
            'totalAbnormal' => $totalAbnormal,
            'total' => $total,
        ]);

        return $pdf->download('laporan-skrining.pdf');
    }


    public function laporan(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        // Daftar kelurahan tetap
        $kelurahanList = \App\Models\Kelurahan::all()->pluck('nama')->toArray();

        $data = [];
        $totalKeseluruhan = [
            'normal' => 0,
            'borderline' => 0,
            'abnormal' => 0,
            'total' => 0,
        ];

        foreach ($kelurahanList as $kelurahan) {
            $normal = Riwayat::whereHas('user', function ($query) use ($kelurahan) {
                    $query->where('kelurahan', $kelurahan);
                })
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('hasil_total', 'NORMAL')
                ->count();

            $borderline = Riwayat::whereHas('user', function ($query) use ($kelurahan) {
                    $query->where('kelurahan', $kelurahan);
                })
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('hasil_total', 'BORDERLINE')
                ->count();

            $abnormal = Riwayat::whereHas('user', function ($query) use ($kelurahan) {
                    $query->where('kelurahan', $kelurahan);
                })
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('hasil_total', 'ABNORMAL')
                ->count();

            $total = $normal + $borderline + $abnormal;

            $data[] = [
                'kelurahan' => $kelurahan,
                'normal' => $normal,
                'borderline' => $borderline,
                'abnormal' => $abnormal,
                'total' => $total,
            ];

            // Akumulasi total keseluruhan
            $totalKeseluruhan['normal'] += $normal;
            $totalKeseluruhan['borderline'] += $borderline;
            $totalKeseluruhan['abnormal'] += $abnormal;
            $totalKeseluruhan['total'] += $total;
        }

        return view('analisis.laporan', [
            'data' => $data,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'totalKeseluruhan' => $totalKeseluruhan
        ]);
    }

   public function exportExcel(Request $request)
    {
        $bulan     = $request->input('bulan', date('n'));
        $tahun     = $request->input('tahun', date('Y'));
        $kelurahan = $request->input('puskesmas');

        $query = \App\Models\Riwayat::with(['user', 'answers']);

        if ($kelurahan) {
            $query->whereHas('user', fn ($q) => $q->where('kelurahan', $kelurahan));
        }

        $query->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun);

        $riwayat = $query->get();

        return Excel::download(new RiwayatExport($riwayat), "rekap_sdq_{$bulan}_{$tahun}.xlsx");
    }

    public function preview(Request $request)
    {
        $user = User::find(Auth::user()->id);


        $bulan = $request->input('bulan', Carbon::now()->month);
        $tahun = $request->input('tahun', Carbon::now()->year);

        // Daftar kelurahan tetap
        $kelurahanList = \App\Models\Kelurahan::all()->pluck('nama')->toArray();

        $data = [];
        $totalNormal = $totalBorderline = $totalAbnormal = 0;

        foreach ($kelurahanList as $kelurahan) {
            $normal = Riwayat::whereHas('user', function ($query) use ($kelurahan) {
                    $query->where('kelurahan', $kelurahan);
                })
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('hasil_total', 'NORMAL')
                ->count();

            $borderline = Riwayat::whereHas('user', function ($query) use ($kelurahan) {
                    $query->where('kelurahan', $kelurahan);
                })
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('hasil_total', 'BORDERLINE')
                ->count();

            $abnormal = Riwayat::whereHas('user', function ($query) use ($kelurahan) {
                    $query->where('kelurahan', $kelurahan);
                })
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('hasil_total', 'ABNORMAL')
                ->count();

            $total = $normal + $borderline + $abnormal;

            $data[] = [
                'kelurahan' => $kelurahan,
                'normal' => $normal,
                'borderline' => $borderline,
                'abnormal' => $abnormal,
                'total' => $total,
                'user' => $user,
            ];

            $totalNormal += $normal;
            $totalBorderline += $borderline;
            $totalAbnormal += $abnormal;
        }

        $total = $totalNormal + $totalBorderline + $totalAbnormal;
        $periode = Carbon::createFromDate($tahun, $bulan)->translatedFormat('F Y');

        $pdf = Pdf::loadView('analisis.export.laporan_pdf', [
            'data' => $data,
            'periode' => $periode,
            'totalNormal' => $totalNormal,
            'totalBorderline' => $totalBorderline,
            'totalAbnormal' => $totalAbnormal,
            'total' => $total,
            'user' => $user,
        ]);

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf');
    }



}
