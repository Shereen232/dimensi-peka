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
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'password'      => 'nullable|min:6',
            'nik'           => 'nullable|digits:16|unique:users,nik,' . $user->id,
            'umur'          => 'nullable|integer',
            'alamat'        => 'nullable|string',
            'kelas'         => 'nullable|string',
            'sekolah'       => 'nullable|string',
            'kelurahan'     => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($user->role === 'responden') {
            $user->nik           = $request->nik;
            $user->umur          = $request->umur;
            $user->alamat        = $request->alamat;
            $user->kelas         = $request->kelas;
            $user->sekolah       = $request->sekolah;
            $user->kelurahan     = $request->kelurahan;
            $user->jenis_kelamin = $request->jenis_kelamin;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
