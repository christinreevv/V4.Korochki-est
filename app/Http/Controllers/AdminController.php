<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::query();

        // Фильтр по статусу
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Поиск по курсу
        if ($request->filled('search')) {
            $query->where('course_name', 'like', '%' . $request->search . '%');
        }

        // Сортировка
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');

        $allowedSorts = [
            'course_name',
            'status',
            'start_date',
            'created_at'
        ];

        if (in_array($sort, $allowedSorts)) {
            $query->orderBy($sort, $direction);
        }

        $applications = $query
            ->paginate(4)
            ->withQueryString();

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

        return redirect()
            ->route('admin.index')
            ->with('success', 'Статус успешно обновлен');
    }
}
