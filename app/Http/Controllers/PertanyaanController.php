<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = Question::withTrashed()->get();
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

    public function destroy($id)
    {
        $pertanyaan = Question::withTrashed()->where('id', $id)->first();

        if ($pertanyaan->deleted_at) {
            $pertanyaan->restore();
            $message = 'Pertanyaan berhasil diaktifkan.';
        } else {
            $pertanyaan->delete();
            $message = 'Pertanyaan berhasil dinonaktifkan.';
        }

        return redirect()->route('pertanyaan.index')->with('success', $message);
    }



}
