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
        $riwayat = Riwayat::with('user')->latest()->get();
        return view('riwayat.index', compact('riwayat'));
    }
}
