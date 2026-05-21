<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index() {
$applications = Application::where('user_id', session('user')->id)->get();
return view('applications.index', compact('applications'));

}

 public function create()
    {
        return view('applications.create');
    }

    public function register(Request $request)
    {

        $request->validate([
            'course_name' => ['required'],
            'start_date' => ['required'],
            'payment' => ['required'],
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

}
