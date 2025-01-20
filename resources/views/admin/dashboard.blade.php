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

        .date {
            position: relative;
            top: 20px;
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
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x400' }}" class="card-img-top" alt="...">
                <p class="add-description">
                    {{$product->description}}
                </p>
                <p class="add-price">Цена: <strong>{{$product->price}} ₸</strong></p>

                <div class="date text-muted small">Дата добавления: {{ $product->created_at->locale('ru')->format('d F Y') }}</div>

                <div class="confirmation-buttons d-flex gap-2">
                    <form action="{{route('confirm',['id'=>$product->id])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Подтвердить</button>
                    </form>
                    <form action="{{route('reject',['id'=>$product->id])}}" method="post">
                        @csrf
                        <button class="btn btn-danger">Отклонить</button>
                    </form>
                </div>
            </div>
        </main>

        <main class="add-page">

            {{$products->links()}}
        </main>

    @endforeach

@endsection
