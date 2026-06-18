@extends('layouts.app')

@section('content')

    <div class="row">
        <@forelse ($applicstions as $app)
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $app->course_name }}</h5>
                        <p class="card-text">{{ $app->status }}</p>
                        <p class="card-text">{{ $app->payment_method }}</p>
                        <p class="card-text">{{ $app->start_date }}</p>
                    </div>

                    @if ($app->status === 'Обучение завершено')
                        <form action="/review/{{ $app->id }}" method="POST">
                            <textarea name="review" id="" cols="30" rows="10"></textarea>
                            <button class="btn">Отсавить отзыв</button>
                        </form>
                    @else
                        <p>Отзыв можно будет оставить после прохождения курса</p>
                    @endif

                </div>
            </div>

        @empty
            <p>Здесь будут отзывы</p>
            @endforelse
    </div>
