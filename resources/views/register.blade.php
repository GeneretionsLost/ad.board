@extends('layouts.master')

@section('title', 'Регистрация')

@section('content')
    <style>
        main {
            width: 50%;
        }
    </style>

    <main>
        <div class="registration-form">
            <h1>Регистрация</h1>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Электронная почта</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Повторите пароль</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </div>
            </form>
            <p>Уже есть аккаунт? <a href="{{route('auth')}}">Войти</a></p>
        </div>
    </main>

@endsection