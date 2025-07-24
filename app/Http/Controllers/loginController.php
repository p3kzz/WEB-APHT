<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login'); // tampilan login
    }

    public function login(Request $request)
{

    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ],
    [
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'password.required' => 'Password belum diisi',
    ]);


    $infoLogin = [
        'email' => $request->email,
        'password' => $request->password,
    ];


    if (Auth::attempt($infoLogin)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    // Jika gagal login
    return back()->withErrors([
        'email' => 'Email atau password salah',
    ])->withInput(); 
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }


}
