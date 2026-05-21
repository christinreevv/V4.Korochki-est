<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корочки.есть</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">

        <a class="navbar-brand" href="/">Корочки.есть</a>

        <div class="d-flex gap-2">

            {{-- Гость --}}
            @guest
                <a href="/login" class="btn btn-outline-light btn-sm">Вход</a>
                <a href="/register" class="btn btn-warning btn-sm">Регистрация</a>
            @endguest

            {{-- Авторизован --}}
            @auth

                <a href="/applications" class="btn btn-outline-light btn-sm">Мои заявки</a>
                <a href="/application/create" class="btn btn-success btn-sm">Создать</a>

                {{-- Админ --}}
                @if(auth()->user()->role === 'admin')
                    <a href="/admin" class="btn btn-danger btn-sm">Админка</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-warning btn-sm">
                        Выход
                    </button>
                </form>

            @endauth

        </div>

    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
