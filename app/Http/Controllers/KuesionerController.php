<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    // Tampilkan daftar semua pertanyaan
    public function index()
    {
        $questions = Question::all();
        return view('kuesioner.index', compact('questions'));
    }

    // Tampilkan form tambah pertanyaan
    public function create()
    {
        return view('kuesioner.create');
    }

    // Simpan pertanyaan baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:questions,kode|max:5',
            'pertanyaan' => 'required|string',
            'kategori' => 'required|in:E,P,H,C,Pro',
        ]);

        Question::create([
            'kode' => $request->kode,
            'pertanyaan' => $request->pertanyaan,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('kuesioner.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('kuesioner.edit', compact('question'));
    }

    // Update pertanyaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:5|unique:questions,kode,' . $id,
            'pertanyaan' => 'required|string',
            'kategori' => 'required|in:E,P,H,C,Pro',
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'kode' => $request->kode,
            'pertanyaan' => $request->pertanyaan,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('kuesioner.index')->with('success', 'Pertanyaan berhasil diupdate.');
    }

    // Hapus pertanyaan
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('kuesioner.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
