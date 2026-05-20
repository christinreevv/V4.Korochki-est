<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', session('user')->id)->get();

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'start_date' => 'required',
            'payment_method' => 'required'
        ]);

        Application::create([
            'user_id' => session('user')->id,
            'course_name' => $request->course_name,
            'start_date' => $request->start_date,
            'payment_method' => $request->payment_method,
            'status' => 'Новая'
        ]);

        return redirect('/applications');
    }

    public function review(Request $request, $id)
    {
        $application = Application::find($id);

        $application->review = $request->review;

        $application->save();

        return back();
    }
}
