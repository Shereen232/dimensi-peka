<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
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
        $kondisi = $request->input('kondisi'); // filter opsional jika ingin pakai dropdown filter

        $wilayah = \App\Models\User::select('alamat', \DB::raw('count(*) as total'))
            ->when($kondisi, function ($query) use ($kondisi) {
                return $query->whereHas('riwayat', function ($q) use ($kondisi) {
                    $q->where('hasil_total', $kondisi);
                });
            })
            ->groupBy('alamat')
            ->get();

        return view('grafik.wilayah', compact('wilayah', 'kondisi'));
    }

}
