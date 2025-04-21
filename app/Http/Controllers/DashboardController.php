<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalResponden = User::where('role', 'responden')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalKuesioner = Riwayat::count();

        return view('dashboard', compact(
            'totalUser',
            'totalResponden',
            'totalAdmin',
            'totalKuesioner'
        ));
    }
}
