@extends('layouts.master')

@section('title', 'Сброс пароля')

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
            <h1>Сброс пароля</h1>
            <form method="post" action="{{route('password.email')}}">
                @csrf
                <!-- Поле ввода электронной почты -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="email" type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Электронная почта</label>
                </div>
                <!-- Кнопка отправки -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 w-100">Сбросить</button>
            </form>
        </div>
</main>
@endsection