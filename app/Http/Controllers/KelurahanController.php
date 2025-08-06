<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::withTrashed()->get();
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

        Kelurahan::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kelurahan.index')
        ->with('success', 'Kelurahan berhasil ditambahkan.');
    }
    public function editKelurahan($id)
    {
        $kelurahan = Kelurahan::withTrashed()->where('id', $id)->first();
        return view('kelurahan.form', compact('kelurahan'));
    }
    public function updateKelurahan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kelurahan::withTrashed()->where('id', $id)->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil diperbarui.');
    }
    public function destroyKelurahan($id)
    {
        $kelurahan = Kelurahan::withTrashed()->where('id', $id)->first();
        if ($kelurahan->deleted_at) $kelurahan->restore();
        else $kelurahan->delete();

        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil dihapus.');
    }

}
