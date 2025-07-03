<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada
use Illuminate\Support\Facades\DB;   // Pastikan ini ada untuk setTriggerSessionVariables()
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

        // --- Panggil setTriggerSessionVariables() sebelum operasi $user->save() ---
        // Ini memastikan variabel sesi seperti user_id, IP, dan user agent diatur
        // agar trigger database bisa menangkapnya.
        $this->setTriggerSessionVariables();

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

        $user->save(); // Operasi Eloquent ini akan memicu trigger database

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    // --- Tambahkan metode pembantu ini di AkunController Anda ---
    protected function setTriggerSessionVariables()
    {
        // Mendapatkan ID user yang sedang login
        $userId = Auth::check() ? Auth::id() : null;

        // Mendapatkan IP Address dari request
        $ipAddress = request()->ip();
        // Mendapatkan User Agent dari request
        $userAgent = request()->header('User-Agent');

        // Mengatur variabel sesi di koneksi database saat ini
        DB::statement("SET @user_id_session = ?;", [$userId]);
        DB::statement("SET @ip_address_session = ?;", [$ipAddress]);
        DB::statement("SET @user_agent_session = ?;", [$userAgent]);
    }
}