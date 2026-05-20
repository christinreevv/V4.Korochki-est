<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validation = $request->validate([
            'full_name' => ['required', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'login' => ['required', 'regex:/^[A-Za-z0-9]+$/', 'min:6', 'unique:users,login'],
            'password' => ['required', 'min:8'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone', 'regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/'],
        ]);

        $user = User::create([
            'full_name' => $validation['full_name'],
            'login' => $validation['login'],
            'password' => $validation['password'],
            'email' => $validation['email'],
            'phone' => $validation['phone'],
        ]);

        Auth::login($user);

        return redirect('/')->with('suc', 'suc');

    }

    public function login(Request $request)
    {

        $creds = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($creds)) {
            return back()->withErrors([
                'login' => 'jocklsdcmsl',
            ])->onlyInput('login');
        }

        $request->session->regenerate();

        return redirect('/')->with('suc', 'suc');
    }

    public function logout()
    {

        Auth::logout();

        $request->session->invalidate(); // session без ()!!!

        $request->session->regenerateToken();

        return redirect('/login')->with('suc', 'suc');

    }
}
