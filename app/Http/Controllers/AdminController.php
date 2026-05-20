<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if(!session('admin')){
            return redirect('/login');
        }

        $applications = Application::all();

        return view('admin.index', compact('applications'));
    }

    public function status(Request $request, $id)
    {
        $application = Application::find($id);

        $application->status = $request->status;

        $application->save();

        return back();
    }
}
