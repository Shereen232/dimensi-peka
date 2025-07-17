<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = DB::table('kelurahan')->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    public function createKelurahan()
    {
        return view('kelurahan.form');
    }
    public function storeKelurahan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        DB::table('kelurahan')->insert([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kelurahan.index')
        ->with('success', 'Kelurahan berhasil ditambahkan.');
    }
    public function editKelurahan($id)
    {
        $kelurahan = DB::table('kelurahan')->where('id', $id)->first();
        return view('kelurahan.form', compact('kelurahan'));
    }
    public function updateKelurahan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        DB::table('kelurahan')->where('id', $id)->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil diperbarui.');
    }
    public function destroyKelurahan($id)
    {
        DB::table('kelurahan')->where('id', $id)->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil dihapus.');
    }

}
