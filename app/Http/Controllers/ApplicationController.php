<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', auth()->id())
            ->latest()
            ->get()
            ->map(function ($app) {
                $app->can_review = $app->status === 'Завершено';
                return $app;
            });

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'course_name' => 'required',
            'start_date' => 'required', 'date',
            'payment_method' => 'required',
        ]);

        $application = Application::create([
            'user_id' => auth()->id(),
            'course_name' => $validation['course_name'],
            'start_date' => $validation['start_date'],
            'payment_method' => $validation['payment_method'],
            'status' => 'Новая',
        ]);

        return redirect('/applications');
    }

    public function review(Request $request, $id)
    {
        $request->validate([
            'review' => ['required', 'min:3'],
        ]);

        $application = Application::where('user_id', auth()->id())
            ->findOrFail($id);

        // Проверка статуса
        if ($application->status !== 'Обучение завершено') {
            return back()->with('error', 'Отзыв можно оставить только после завершения курса');
        }

        $application->update([
            'review' => $request->review,
        ]);

        return back()->with('success', 'Отзыв добавлен');
    }
}
