<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AkunController extends Controller
{
    public function index()
    {
        return view('akun.index');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6',
            'umur' => 'nullable|integer',
            'alamat' => 'nullable|string',
            'kelas' => 'nullable|string',
            'sekolah' => 'nullable|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($user->role === 'responden') {
            $user->umur = $request->umur;
            $user->alamat = $request->alamat;
            $user->kelas = $request->kelas;
            $user->sekolah = $request->sekolah;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
