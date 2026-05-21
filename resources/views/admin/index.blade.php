@extends('layouts.app')

@section('content')

<h2 class="mb-4">Панель администратора</h2>

<div class="row">

@foreach($applications as $app)

    <div class="col-lg-4 col-md-6 col-12 mb-4">

        <div class="card h-100 shadow border-0">

            <div class="card-body d-flex flex-column">

                <h5 class="mb-3">
                    {{ $app->course_name }}
                </h5>

                <p>
                    <strong>ID пользователя:</strong>
                    {{ $app->user_id }}
                </p>

                <p>
                    <strong>Дата:</strong>
                    {{ $app->start_date }}
                </p>

                <p>
                    <strong>Оплата:</strong>
                    {{ $app->payment_method }}
                </p>

                <p>
                    <strong>Текущий статус:</strong><br>

                    <span class="badge bg-secondary">
                        {{ $app->status }}
                    </span>
                </p>

                <p>
                    <strong>Отзыв:</strong><br>

                    {{ $app->review ?? 'Нет отзыва' }}
                </p>

                <div class="mt-auto">

                    <form action="/admin/status/{{ $app->id }}"
                          method="POST">

                        @csrf

                        <select name="status"
                                class="form-select mb-2">

                            <option>Новая</option>

                            <option>Идет обучение</option>

                            <option>Обучение завершено</option>

                        </select>

                        <button class="btn btn-success w-100">
                            Обновить статус
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endforeach

</div>

@endsection
