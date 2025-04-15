<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
    
        if (Auth::attempt([$login_type => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Sesuaikan jika perlu
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
        return redirect('/login');
    }
}
