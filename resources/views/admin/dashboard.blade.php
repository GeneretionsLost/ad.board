@extends('layouts.master')

@section('title', 'Панель Администратора')

@section('content')
    <style>
        .add-page {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            flex-direction: column;
            position: relative;
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
            align-self: start;
        }

        .add-price {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .confirmation-buttons {
            position: relative;
            bottom: 20px;
            right: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .confirmation-buttons button {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirm-btn {
            background-color: #4CAF50;
            color: white;
            margin-right: 5px;
        }

        .reject-btn {
            background-color: #f44336;
            color: white;
        }

        .date {
            position: relative;
            top: 20px;
            left: 20px;
            font-size: 1rem;
            color: #777;
        }

        main {
            max-width: 40%;
        }

    </style>
    @foreach($products as $product)
        <main class="add-page">
            <div class="content-wrapper">
                <h1 class="add-title">{{$product->name}}</h1>
                <img src="https://placehold.co/600x400" alt="Изображение объявления" class="add-image">
                <p class="add-description">
                    {{$product->description}}
                </p>
                <p class="add-price">Цена: <strong>{{$product->price}} ₸</strong></p>

                <div class="date">Дата добавления: {{ $product->created_at->locale('ru')->format('d F Y') }}</div>

                <div class="confirmation-buttons">
                    <form action="{{route('confirm',['id'=>$product->id])}}" method="post">
                        @csrf
                        <button type="submit" class="confirm-btn">Подтвердить</button>
                    </form>
                    <form action="{{route('reject',['id'=>$product->id])}}" method="post">
                        @csrf
                        <button class="reject-btn">Отклонить</button>
                    </form>
                </div>
            </div>
        </main>
    @endforeach
@endsection
