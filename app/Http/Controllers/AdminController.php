<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $applications = Application::all();

        return view('admin.index', compact('applications'));
    }

   public function status(Request $request, $id)
{
    $request->validate([
        'status' => ['required']
    ]);

    $application = Application::findOrFail($id);

    $application->update([
        'status' => $request->status
    ]);

    return redirect('/admin')
        ->with('success', 'Статус обновлен');
    }
}
