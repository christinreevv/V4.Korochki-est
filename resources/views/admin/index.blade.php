@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Панель администратора</h2>
    </div>

    <div class="row">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Поиск по курсу">
                        </div>

                        <div class="col-md-3">
                            <select name="status" class="form-select">
                                <option value="">Все статусы</option>

                                <option value="Новая" @selected(request('status') == 'Новая')>
                                    Новая
                                </option>

                                <option value="Идет обучение" @selected(request('status') == 'Идет обучение')>
                                    Идет обучение
                                </option>

                                <option value="Обучение завершено" @selected(request('status') == 'Обучение завершено')>
                                    Обучение завершено
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="sort" class="form-select">
                                <option value="created_at">По дате создания</option>
                                <option value="course_name" @selected(request('sort') == 'course_name')>
                                    По курсу
                                </option>
                                <option value="start_date" @selected(request('sort') == 'start_date')>
                                    По дате начала
                                </option>
                                <option value="status" @selected(request('sort') == 'status')>
                                    По статусу
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">
                                Применить
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        @forelse($applications as $app)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card h-100 shadow-sm border-0 @unless ($app->status === 'Обучение завершено') bg-light @endunless">
                    <div class="card-body d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title">
                                {{ $app->course_name }}
                            </h5>
                            @if ($app->status == 'Новая')
                                <span class="badge bg-warning text-dark">Новая</span>
                            @elseif($app->status == 'Идет обучение')
                                <span class="badge bg-primary">Идет обучение</span>
                            @else
                                <span class="badge bg-success">Обучение завершено</span>
                            @endif
                        </div>

                        <p class="mb-2">
                            <strong>Дата начала:</strong><br>
                            {{ $app->start_date }}
                        </p>

                        <p class="mb-3">
                            <strong>Оплата:</strong><br>
                            {{ $app->payment_method }}
                        </p>

                        <div class="mt-auto">
                            <form action="/admin/status/{{ $app->id }}" method="POST" class="mb-3">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm mb-2">
                                    <option value="Новая" {{ $app->status == 'Новая' ? 'selected' : '' }}>Новая</option>
                                    <option value="Идет обучение" {{ $app->status == 'Идет обучение' ? 'selected' : '' }}>
                                        Идет обучение</option>
                                    <option value="Обучение завершено"
                                        {{ $app->status == 'Обучение завершено' ? 'selected' : '' }}>Обучение завершено
                                    </option>
                                </select>
                                <button class="btn btn-primary btn-sm w-100">Обновить статус</button>
                            </form>

                            <div class="p-2 bg-white rounded border small">
                                <strong>Отзыв пользователя:</strong><br>
                                @if ($app->review)
                                    <span class="text-dark">{{ $app->review }}</span>
                                @else
                                    <span class="text-muted italic">Тут будет отзыв</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Заявок пока нет
                </div>
            </div>
        @endforelse
        <div class="mt-4 d-flex justify-content-center">
            {{ $applications->links() }}
        </div>
    </div>
@endsection
