<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'phone' => ['required', 'regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/', 'unique:users,phone'],
            'password' => ['required', 'min:8'],
            'login' => ['required', 'regex:/^[A-Za-z0-9]+$/', 'min:6', 'unique:users,login'],
            'email' => ['required', 'unique:users,email'],
        ]);

        $user = User::create([
            'full_name' => $validation['full_name'],
            'phone' => $validation['phone'],
            'password' => Hash::make($validation['password']),
            'login' => $validation['login'],
            'email' => $validation['email'],
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect('/')->with('suc', 'suc');

    }

    public function login(Request $request)
    {

        $creds = $request->validate([
            'password' => ['required'],
            'login' => ['required'],
        ]);

        if (! Auth::attempt($creds)) {
            return back()->withErrors([
                'login' => 'lol',
            ])->onlyInput('login');
        }

        $request->session()->regenerate();

        return redirect('/')->with('suc', 'suc');

    }

    public function logout()
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('suc', 'suc');
    }
}
