@extends('layouts.app')

@section('content')

<div class="container">

    <div id="mainCarousel" class="carousel slide mb-5" data-bs-ride="carousel"  data-bs-interval="3000"> СМЕНА СЛАЙДЕРА КАЖДЫЕ 3 СЕКУНДЫ

        <div class="carousel-inner rounded">

            <div class="carousel-item active">
                <img src="https://picsum.photos/1200/400?1" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Онлайн обучение</h3>
                </div>
            </div>

            <div class="carousel-item>"
                <img src="https://picsum.photos/1200/400?2" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Профессиональные курсы</h3>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://picsum.photos/1200/400?3" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Начни карьеру сегодня</h3>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

    <div class="text-center">

        <h1>Добро пожаловать в «Корочки.есть»</h1>

        <p class="text-muted">
            Платформа для записи на курсы дополнительного образования
        </p>

        @guest
            <a href="/register" class="btn btn-warning">
                Начать обучение
            </a>
        @endguest

        @auth
            <a href="/applications" class="btn btn-success">
                Мои заявки
            </a>
        @endauth

    </div>

</div>

@endsection
