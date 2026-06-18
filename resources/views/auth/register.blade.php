@extends('layouts.app')

@section('content')
    <div class="form-box">



        <h3 class="mb-3 text-center">Регистрация</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">ФИО</label>
                <input type="text" name="full_name" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Логин</label>
                <input type="text" name="login" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Телефон</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Почта</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button class="btn btn-primary w-100">
                Зарегистрироваться
            </button>

        </form>

    </div>
@endsection
