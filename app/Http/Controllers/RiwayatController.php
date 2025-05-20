<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    // Tampilkan semua riwayat milik responden yang login
    public function index()
    {
        $userId = Auth::id(); // Ambil ID user dari session login
        $riwayat = Riwayat::where('user_id', $userId)
                        ->orderBy('tanggal', 'desc')
                        ->get();

        return view('riwayat.index', compact('riwayat'));
    }
}
