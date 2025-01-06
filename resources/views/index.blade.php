@extends('layouts.master')

@section('title', 'Главная страница')

@section('content')
    @include('partials.search')
    <style>
        main {
            flex-direction: column;
        }
        .name {
            color: #181340;
            align-self: center;
        }
    </style>
    <main>
        <h1 class="name">Последние добавленные</h1>

        <div class="cards-container">
            @include('partials.card')
        </div>
    </main>
@endsection