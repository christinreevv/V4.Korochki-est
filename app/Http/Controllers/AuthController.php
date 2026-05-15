<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // оторажение GET

    public function registerForm () { // отображение формы регистрации
        return view('auth.register');
    }

    public function loginForm () { // отображение формы логина
        return view('auth.login');
    }

    // механика POST

    public function register (Request $request) { // регистрация

    $validated = $request->validate([
        'full_name' => ['required', 'regex:/^[А-Яа-яЁё\s]+$/u'],
        'email' => ['required', 'email', 'unique:users,email'],
        'login' => ['required', 'unique:users,login'],
        'phone' => ['required', 'unique:users,phone', 'regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/'],
        'password' => ['required', 'min:6' ],
    ]);

    $user = User::create([
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'login' => $validated['login'],
        'phone' => $validated['phone'],
        'password' => Hash::make($validated['password']),
        'role' => 'user',
    ]);

    Auth::login($user); // сразу происходит взод после регистрации

    return redirect('/');

    }

    public function login (Requset $request) { // авторизация

    }

    public function logout (Request $request) { // выход из аккаунта / Request нужен или нет?
    Auth::logout();
    }
}
