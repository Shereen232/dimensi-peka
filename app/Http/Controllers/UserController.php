<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada
use App\Models\User; // Tetap diimpor jika Anda menggunakannya di metode lain, seperti detailUser()

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
            'nik'           => 'required|string|max:16|unique:users,nik',
            'name'          => 'required|string|max:50',
            'email'         => 'required|email|max:100|unique:users,email',
            'password'      => 'required|string|min:6',
            'role'          => 'required|string',
            'umur'          => 'nullable|integer|min:0',
            'kelurahan'     => 'nullable|string|max:100',
            'alamat'        => 'nullable|string|max:255',
            'kelas'         => 'nullable|string|max:50',
            'sekolah'       => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        // --- Panggil setTriggerSessionVariables() sebelum operasi DB::table() ---
        $this->setTriggerSessionVariables();

        // --- Perubahan di sini: Menggunakan DB::table()->insert() untuk memicu trigger ---
        DB::table('users')->insert([
            'nik'           => $request->nik,
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
            'umur'          => $request->umur,
            'kelurahan'     => $request->kelurahan,
            'alamat'        => $request->alamat,
            'kelas'         => $request->kelas,
            'sekolah'       => $request->sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'created_at'    => now(),
            'updated_at'    => now(),
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
            'nik'           => 'required|string|max:16|unique:users,nik,' . $id, // Diubah ke string untuk konsistensi
            'name'          => 'required|string|max:50',
            'email'         => 'required|email|max:100|unique:users,email,' . $id,
            'role'          => 'required|string',
            'umur'          => 'nullable|integer|min:0',
            'kelurahan'     => 'nullable|string|max:100',
            'alamat'        => 'nullable|string|max:255',
            'kelas'         => 'nullable|string|max:50',
            'sekolah'       => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|in:L,P',
            'password'      => 'nullable|string|min:6',
        ]);

        $data = [
            'nik'           => $request->nik,
            'name'          => $request->name,
            'email'         => $request->email,
            'role'          => $request->role,
            'umur'          => $request->umur,
            'kelurahan'     => $request->kelurahan,
            'alamat'        => $request->alamat,
            'kelas'         => $request->kelas,
            'sekolah'       => $request->sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'updated_at'    => now(), // Manual update for updated_at with Query Builder
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // --- Panggil setTriggerSessionVariables() sebelum operasi DB::table() ---
        $this->setTriggerSessionVariables();

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate!');
    }

    public function destroy($id)
    {
        // --- Panggil setTriggerSessionVariables() sebelum operasi DB::table() ---
        $this->setTriggerSessionVariables();

        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    public function detailUser()
    {
        $users = User::where('role', 'responden')->get();
        return view('user.detail.index', compact('users'));
    }

    protected function setTriggerSessionVariables()
    {
        // Mendapatkan ID user yang sedang login
        // Menggunakan Auth::check() untuk memastikan ada user login sebelum Auth::id() dipanggil
        $userId = Auth::check() ? Auth::id() : null;

        // Mendapatkan IP Address dari request
        $ipAddress = request()->ip();
        // Mendapatkan User Agent dari request
        $userAgent = request()->header('User-Agent');

        // Mengatur variabel sesi di koneksi database saat ini
        // Tidak perlu ?? NULL lagi karena $userId sudah akan null jika tidak login
        DB::statement("SET @user_id_session = ?;", [$userId]);
        DB::statement("SET @ip_address_session = ?;", [$ipAddress]);
        DB::statement("SET @user_agent_session = ?;", [$userAgent]);
    }
}