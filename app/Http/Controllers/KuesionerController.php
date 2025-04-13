<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    // Tampilkan daftar semua pertanyaan
    public function index()
    {
        $questions = Question::all();
        $options = Option::all();
        $answer = Answer::where('user_id', 1)->first();
        if ($answer) return redirect()->route('kuesioner.result');
        return view('kuesioner.index', compact('questions', 'options'));
    }

    // Tampilkan form tambah pertanyaan
    public function create()
    {
        return view('kuesioner.create');
    }

    // Simpan pertanyaan baru
    public function store(Request $request)
    {
        $answer = $request->post();
        $questions = Question::all();
        foreach ($questions as $question) {
            Answer::create([
                'user_id' => 1,
                'question_id' => $question->id,
                'option_id' => $answer['answers'.$question->id],
            ]);
        }

        return redirect()->route('kuesioner.index')->with('success', 'Jawaban berhasil dikirim.');
    }

    public function show()
    {
        $questions = Question::all();
        $options = Option::all();
        $answers = Answer::all();
        $answers = $answers->pluck('option_id', 'question_id')->toArray();
        return view('kuesioner.result', compact('questions', 'options', 'answers'));
    }
}
