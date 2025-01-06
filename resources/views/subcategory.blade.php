@extends('layouts.master')

@section('title', '??????')

@section('content')
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
        <h1 class="name">Название категории</h1>
        <div class="cards-container">
            @include('partials.card')
        </div>
    </main>
@endsection