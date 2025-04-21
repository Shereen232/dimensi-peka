<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

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

}
