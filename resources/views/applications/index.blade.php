@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Мои заявки</h2>
        <a href="/application/create" class="btn btn-primary">
            + Новая заявка
        </a>
    </div>

    <div class="row">
        @forelse($applications as $app)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="card h-100 shadow-sm border-0 @unless ($app->status === 'Обучение завершено') bg-light @endunless">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title">
                                {{ $app->course_name }}
                            </h5>
                            @if ($app->status == 'Новая')
                                <span class="badge bg-warning text-dark">
                                    Новая
                                </span>
                            @elseif($app->status == 'Идет обучение')
                                <span class="badge bg-primary">
                                    Идет обучение
                                </span>
                            @else
                                <span class="badge bg-success">
                                    Обучение завершено
                                </span>
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

                        <!-- БЛОК ФОРМЫ ОТЗЫВА — показываем только для статуса «Завершено» -->
                        @if ($app->status === 'Обучение завершено')
                            <div class="mt-auto">
                                <form action="/review/{{ $app->id }}" method="POST">
                                    @csrf
                                    <textarea name="review" class="form-control mb-2" rows="3" placeholder="Оставьте отзыв">{{ $app->review }}</textarea>
                                    <button class="btn btn-outline-primary w-100">
                                        Сохранить отзыв
                                    </button>
                                </form>
                            </div>
                        @else
                            <!-- Альтернативное сообщение для других статусов -->
                            <div class="mt-auto text-muted small">
                                Отзыв доступен после завершения курса
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    У вас пока нет заявок
                </div>
            </div>
        @endforelse
    </div>
@endsection
