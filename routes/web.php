<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/register', [AuthController::class, 'registerForm']); // показ формы регистрации
Route::get('/login', [AuthController::class, 'loginForm']); // показ формы авторизации

Route::post('/register', [AuthController::class, 'register'])->name('register'); // регистрация
Route::post('/login', [AuthController::class, 'login']); // авторизация

Route::get('/logout', [AuthController::class, 'logout']); // выход
