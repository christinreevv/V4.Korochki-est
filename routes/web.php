<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [AuthController::class, 'registerForm']); // показ формы регистрации
Route::get('/login', [AuthController::class, 'loginForm']); // показ формы авторизации

Route::post('/register', [AuthController::class, 'register'])->name('register'); // регистрация
Route::post('/login', [AuthController::class, 'login'])->name('login'); // авторизация

Route::get('/logout', [AuthController::class, 'logout']); // выход

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/applications', [ApplicationController::class, 'index'])
        ->name('applications.index');

    Route::get('/application/create', [ApplicationController::class, 'create'])
        ->name('applications.create');

    Route::post('/application/create', [ApplicationController::class, 'store'])
        ->name('applications.store');

    Route::post('/review/{id}', [ApplicationController::class, 'review'])
        ->name('applications.review');

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::put('/admin/status/{id}', [AdminController::class, 'status'])
        ->name('admin.status');

});
