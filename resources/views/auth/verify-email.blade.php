@extends('layouts.master')

@section('title', 'Спасибо за регистрацию!')

@section('content')
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2>Ссылка для завершения регистрации отправлена на почту</h2>
    <form action="{{route('verification.send')}}" method="post">
        @csrf
        <button class="btn btn-primary">Отправить подтверждение еще раз</button>
    </form>

@endsection