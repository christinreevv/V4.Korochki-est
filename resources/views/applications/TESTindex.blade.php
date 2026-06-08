@extends('layouts.app')

@section('content')
    <div class="">

    </div>

    <div class="row">

        @forelse ($applications as $app)
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex">

                            <h2 class="card-title">
                                {{ $app->course_name }}
                            </h2>

                            @if ($app->status == 'Новая')
                                <span class="badge bg-warning">
                                    Новая
                                </span>
                            @elseif ($app->status == 'Идет обучение')
                                <span class="badge bg-primary">
                                    Идет обучение
                                </span>
                            @else
                                <span class="badge bg-success">
                                    Обучение завершено
                                </span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        @empty
        @endforelse

    </div>
@endsection
