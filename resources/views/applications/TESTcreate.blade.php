    4. Страница формирования заявки. Пользователь указывает: наименование курса (введя его название в соответствующее
    поле).
    Также пользователь указывает желаемую дату начала обучения, внося дату в предназначенное для этого текстовое поле.
    Помимо этого, пользователь должен выбрать удобный для него способ оплаты: наличными или переводом по номеру
    телефона.
    После формирования заявки и нажатия на кнопку «Отправить», заявка направляется на рассмотрение администратору
    портала.


    @extends('layouts.app')

    @section('content')

        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <form action="{{ route('applications.create') }}" method="POST">
                        @csrf

                        <label class="form-label">Курс</label>

                        <select name="course_name" class="form-select" aria-label="Default select example">
                            <option selected value="">Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>

                        <label class="form-label">Выберите дату</label>

                        <input name="start_date" min="{{ date('Y-m-d') }}" />

                        <label class="form-label">способ оплаты</label>

                        <select name="payment_method" class="form-select" aria-label="Default select example">
                            <option selected value="">Open this select menu</option>
                            <option value="1">One</option>

                            <option value="3">Three</option>
                        </select>

                        <button class="btn">Отправить</button>

                    </form>


                </div>
            </div>
        </div>
