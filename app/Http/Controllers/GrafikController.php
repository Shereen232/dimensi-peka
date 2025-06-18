<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GrafikController extends Controller
{
    public function index()
    {
        $data = Riwayat::with('user')->get();

        return view('grafik.index', compact('data'));
    }

    public function wilayah(Request $request)
    {
        $kondisi = $request->input('kondisi');

        $wilayah = \App\Models\User::select('kelurahan', \DB::raw('count(*) as total'))
            ->where('role', 'responden')
            ->whereNotNull('kelurahan') // Hanya yang punya kelurahan
            ->where('kelurahan', '!=', '') // Bukan string kosong
            ->whereHas('riwayat', function ($query) use ($kondisi) {
                if ($kondisi) {
                    $query->where('hasil_total', $kondisi);
                }
            })
            ->groupBy('kelurahan')
            ->get();

        

        $totalResponden = \App\Models\User::where('role', 'responden')
            ->whereNotNull('kelurahan')
            ->where('kelurahan', '!=', '')
            ->whereHas('riwayat', function ($query) use ($kondisi) {
                if ($kondisi) {
                    $query->where('hasil_total', $kondisi);
                }
            })
            ->count();

        return view('grafik.wilayah', compact('wilayah', 'kondisi', 'totalResponden'));
    }

    public function jenisKelamin(Request $request)
    {
        $kondisi = $request->input('kondisi');

        $jenisKelamin = \App\Models\User::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->where('role', 'responden')
            ->whereNotNull('jenis_kelamin')
            ->whereHas('riwayat', function ($query) use ($kondisi) {
                if ($kondisi) {
                    $query->where('hasil_total', $kondisi);
                }
            })
            ->groupBy('jenis_kelamin')
            ->get();

        $totalResponden = \App\Models\User::where('role', 'responden')
            ->whereHas('riwayat', function ($query) use ($kondisi) {
                if ($kondisi) {
                    $query->where('hasil_total', $kondisi);
                }
            })
            ->count();

        return view('grafik.jenis_kelamin', compact('jenisKelamin', 'totalResponden', 'kondisi'));
    }

}
