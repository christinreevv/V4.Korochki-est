@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card shadow p-4">

            <h3 class="mb-3">Создание заявки</h3>

            <form action="{{ route('applications.store') }}" method="POST">
                @csrf

               <div class="mb-3">

    <label class="form-label">
        Название курса
    </label>

    <select name="course_name" class="form-control" required>

        <option value="">Выберите курс</option>

        <option value="Веб-разработка">
            Веб-разработка
        </option>

        <option value="Графический дизайн">
            Графический дизайн
        </option>

        <option value="Тестирование ПО">
            Тестирование ПО
        </option>

        <option value="Python разработка">
            Python разработка
        </option>

        <option value="Laravel разработка">
            Laravel разработка
        </option>

        <option value="UI/UX дизайн">
            UI/UX дизайн
        </option>

    </select>

</div>

              <div class="mb-3">

    <label class="form-label">
        Дата начала
    </label>

    <input
        type="date"
        name="start_date"
        class="form-control"
        min="{{ date('Y-m-d') }}"
        required
    >

</div>

                <div class="mb-3">
                    <label class="form-label">Способ оплаты</label>

                    <select name="payment_method" class="form-control" required>
                        <option value="Наличные">Наличными</option>
                        <option value="Перевод по номеру телефона">Перевод по номеру телефона</option>
                    </select>

                </div>

                <button class="btn btn-success w-100">
                    Отправить заявку
                </button>≠

            </form>

        </div>

    </div>

</div>

@endsection
