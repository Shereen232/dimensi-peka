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
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => now(),
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
            'name'           => 'required|string|max:50',
            'email'          => 'required|email|max:100|unique:users,email,' . $id,
            'role'           => 'required|',
            'jenis_kelamin'  => 'nullable|in:L,P',
            'umur'           => 'nullable|integer|min:0',
            'alamat'         => 'nullable|string|max:255',
            'kelas'          => 'nullable|string|max:50',
            'sekolah'        => 'nullable|string|max:100',
        ]);

        $data = [
            'name'           => $request->name,
            'email'          => $request->email,
            'role'           => $request->role,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'umur'           => $request->umur,
            'alamat'         => $request->alamat,
            'kelas'          => $request->kelas,
            'sekolah'        => $request->sekolah,
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
}
