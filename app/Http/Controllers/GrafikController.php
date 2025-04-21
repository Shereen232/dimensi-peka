<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;

class GrafikController extends Controller
{
    public function index()
    {
        $data = Riwayat::with('user')->get();

        return view('grafik.index', compact('data'));
    }
}
