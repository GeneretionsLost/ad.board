@extends('layouts.master')

@section('title', 'Объявление')

@section('content')
    <style>
        .add-page {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            flex-direction: column;
        }

        .add-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .add-image {
            max-width: 100%;
            height: 500px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .add-description {
            font-size: 1.2rem;
            line-height: 1.5;
            margin-bottom: 20px;
            color: #555;
            align-self: start
        }

        .add-price {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>

    <main class="add-page">
        <h1 class="add-title">{{$product->name}}</h1>
        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x400' }}" alt="Изображение объявления" class="add-image">
        <p class="add-description">
            {{$product->description}}
        </p>
        <p class="add-price">Цена: <strong>{{$product->price}} ₸</strong></p>
    </main>

@endsection
