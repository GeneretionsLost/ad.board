@extends('layouts.master')

@section('title', 'Вход')

@section('content')
    <style>
        main {
            width: 25%;
        }
    </style>

    <main>
        <div class="login-form">
            <h1>Вход</h1>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Электронная почта</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
            </form>
            <p>Ещё не зарегистрированы? <a href="{{route('register')}}">Зарегистрироваться</a></p>
        </div>
    </main>

@endsection