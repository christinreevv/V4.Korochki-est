@extends('layouts.app')

@section('content')

<div class="form-box">

    <h3 class="mb-3 text-center">Вход</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3 ">
            <label class="form-label">Логин</label>
            <input type="text" name="login" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-primary w-100">
            Войти
        </button>

    </form>

    <div class="text-center mt-3">
        <a href="/register">Нет аккаунта? Регистрация</a>
    </div>

</div>

@endsection
