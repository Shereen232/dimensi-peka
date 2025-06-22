<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'            => 'required|string|max:20|unique:users,nik',
            'name'           => 'required|string|max:50',
            'email'          => 'required|email|max:100|unique:users,email',
            'password'       => 'required|string|min:6',
            'role'           => 'required|string',
            'umur'           => 'nullable|integer|min:0',
            'kelurahan'      => 'nullable|string|max:100',
            'alamat'         => 'nullable|string|max:255',
            'kelas'          => 'nullable|string|max:50',
            'sekolah'        => 'nullable|string|max:100',
            'jenis_kelamin'  => 'nullable|in:L,P',
        ]);

        User::create([
            'nik'            => $request->nik,
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'role'           => $request->role,
            'umur'           => $request->umur,
            'kelurahan'      => $request->kelurahan,
            'alamat'         => $request->alamat,
            'kelas'          => $request->kelas,
            'sekolah'        => $request->sekolah,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'created_at'     => now(),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik'            => 'required|integer|max:16|unique:users,nik,' . $id,
            'name'           => 'required|string|max:50',
            'email'          => 'required|email|max:100|unique:users,email,' . $id,
            'role'           => 'required|string',
            'umur'           => 'nullable|integer|min:0',
            'kelurahan'      => 'nullable|string|max:100',
            'alamat'         => 'nullable|string|max:255',
            'kelas'          => 'nullable|string|max:50',
            'sekolah'        => 'nullable|string|max:100',
            'jenis_kelamin'  => 'nullable|in:L,P',
            'password'       => 'nullable|string|min:6',
        ]);

        $data = [
            'nik'            => $request->nik,
            'name'           => $request->name,
            'email'          => $request->email,
            'role'           => $request->role,
            'umur'           => $request->umur,
            'kelurahan'      => $request->kelurahan,
            'alamat'         => $request->alamat,
            'kelas'          => $request->kelas,
            'sekolah'        => $request->sekolah,
            'jenis_kelamin'  => $request->jenis_kelamin,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate!');
    }


    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

     public function detailUser()
    {
        $users = User::where('role', 'responden')->get();
        return view('user.detail.index', compact('users'));
    }
}
