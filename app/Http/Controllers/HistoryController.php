<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User; // Import model User untuk filtering
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the history records.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil data histori dengan eager loading user untuk menghindari N+1 query problem
        // Urutkan berdasarkan waktu terbaru
        $histories = History::with('user')
                            ->latest(); // Urutkan dari yang terbaru

        // Implementasi Filter
        if ($request->filled('user_id')) {
            $histories->where('user_id', $request->user_id);
        }

        if ($request->filled('action_type')) {
            $histories->where('action_type', $request->action_type);
        }

        if ($request->filled('table_name')) {
            $histories->where('table_name', $request->table_name);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $histories->whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
        } elseif ($request->filled('start_date')) {
            $histories->where('created_at', '>=', $request->start_date . ' 00:00:00');
        } elseif ($request->filled('end_date')) {
            $histories->where('created_at', '<=', $request->end_date . ' 23:59:59');
        }

        // Ambil hasil dengan paginasi
        $histories = $histories->paginate(15); // Menampilkan 15 item per halaman

        // Ambil daftar user dan tabel yang mungkin ada histori untuk filter
        $users = User::orderBy('name')->get(['id', 'name']);
        $tableNames = History::select('table_name')->distinct()->get()->pluck('table_name');


        return view('history.index', compact('histories', 'users', 'tableNames'));
    }
}