<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([$loginType => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();
            


            return redirect()->intended(route('dashboard'))->with('success', 'Berhasil Login!');; // arahkan ke dashboard
        }
        
        return back()->withErrors([
            'login' => 'Email atau Username dan password salah.',
        ]);
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }

     public function showRegister()
    {
        return view('auth.register');
    }


     public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'umur'     => 'nullable|integer',
            'jenis_kelamin' => 'required',
            'alamat'   => 'nullable|string|max:255',
            'kelas'    => 'nullable|string|max:50',
            'sekolah'  => 'nullable|string|max:255',
        ]);
         try {
        // Simpan data user baru sebagai role "responden"
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'umur'     => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'   => $request->alamat,
            'kelas'    => $request->kelas,
            'sekolah'  => $request->sekolah,
            'role'     => 'responden',
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat registrasi.')->withInput();
        }
    }
}
