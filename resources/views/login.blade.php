@extends('layouts.master')

@section('title', 'Вход')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('status')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
    <main style="width: 25%;">
        <div class="login-form">
            <h1>Вход</h1>
            <form method="post" action="{{route('login.submit')}}">
                @csrf
                <!-- Поле ввода электронной почты -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="email" type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Электронная почта</label>
                </div>

                <!-- Поле ввода пароля -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Пароль</label>
                </div>

                <!-- Макет из двух колонок для стилизации -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Флажок -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Запомнить меня </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Простая ссылка -->
                        <a href="{{route('password.request')}}">Забыли пароль?</a>
                    </div>
                </div>

                <!-- Кнопка отправки -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 w-100">Войти</button>

                <!-- Кнопки регистрации -->
                <div class="text-center">
                    <p>Ещё нет аккаунта? <a href="{{route('register.show')}}">Зарегистрироваться</a></p>
                </div>
            </form>
        </div>
    </main>

@endsection