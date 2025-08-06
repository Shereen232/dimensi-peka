<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertanyaans = Question::all();
        return view('pertanyaan.index', compact('pertanyaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'pertanyaan' => 'required|string',
            'kategori' => 'required|string|max:10',
        ]);
        Question::create($request->only('kode', 'pertanyaan', 'kategori'));
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $pertanyaan)
    {
        return view('pertanyaan.edit', compact('pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $pertanyaan)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'pertanyaan' => 'required|string',
            'kategori' => 'required|string|max:10',
        ]);
        $pertanyaan->update($request->only('kode', 'pertanyaan', 'kategori'));
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $pertanyaan)
    {
        $pertanyaan->delete();
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
