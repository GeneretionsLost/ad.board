@extends('layouts.master')

@section('title', 'Главная страница')

@section('content')
    <main style="display: flex; flex-direction: column;">
        <h1 class="name" style="align-self: center; margin: 20px auto 30px auto;">Последние добавленные</h1>

        <div class="cards-container" style="display:flex; flex-wrap:wrap; gap:1rem; max-width:1505px; margin:0 auto;">
            @foreach($products as $product)
                @include('partials.card')
            @endforeach
        </div>
        <div class="links" style="margin-top: 30px">
            {{$products->links()}}
        </div>
    </main>
@endsection