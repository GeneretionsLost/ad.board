@extends('layouts.master')

@section('title', 'Вход')

@section('content')
    <main style="width: 25%;">
        <div class="login-form">
            <h1>Вход</h1>
            <form>
                <!-- Поле ввода электронной почты -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Электронная почта</label>
                </div>

                <!-- Поле ввода пароля -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Пароль</label>
                </div>

                <!-- Макет из двух колонок для стилизации -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Флажок -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Запомнить меня </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Простая ссылка -->
                        <a href="#!">Забыли пароль?</a>
                    </div>
                </div>

                <!-- Кнопка отправки -->
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 w-100">Войти</button>

                <!-- Кнопки регистрации -->
                <div class="text-center">
                    <p>Ещё нет аккаунта? <a href="{{route('register')}}">Зарегистрироваться</a></p>
                </div>
            </form>
        </div>
    </main>

@endsection