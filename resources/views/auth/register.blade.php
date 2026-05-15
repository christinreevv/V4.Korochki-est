@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">ФИО</label>
            <input type="text" class="form-control" id="name" name="full_name">
        </div>


        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>


        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>


        <div class="mb-3">
            <label for="email" class="form-label">Почта</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>


        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>

    </form>
@endsection
