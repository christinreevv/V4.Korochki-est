<?php

namespace App\Http\Controllers;

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

    public function registration()
    {
        $validate = $request->validate([
            'full_name' => ['required', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/', 'unique:users,phone'],
            'login' => ['required', 'regex:/^[A-Za-z0-9]+$/', 'unique:users,login', 'min:6'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create([
            'full_name' => $validate['full_name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'login' => $validate['login'],
            'password' => Hash::make($validate['password']),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect('/')->with('suc', 'suc');

    }

    public function login()
    {
        $creds = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($creds)) {
            return back()->withErrors([
                'login' => 'fksdod',
            ])->onlyInput('login');
        }

        $request->session->regenerate();

        return redirect('/')->with('suc', 'suc');
    }

    public function logout() {

    Auth::logout();

        $request->session->invalidate();

            $request->session->regenerateToken();

   return redirect('/login')->with('suc', 'suc');

    }
}
