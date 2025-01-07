@extends('layouts.master')

@section('title', 'Категории')

@section('content')
    <style>
        .name {
            color: #181340;
            align-self: center; /*выравниевание конкретного элемента*/
        }

        .category {
            display: flex;
            flex-direction: column;
        }


    </style>
    <main style="flex-direction: column">
        <h1 class="name">Категории</h1>
        <div class="categories">
            <div class="category">
                <h2>Категория 1</h2>
                <ul class="subcategories" style="display: flex; gap: 30px;">
                    <li><a href="{{route('subcategory')}}">Подкатегория 1.1</a></li>
                    <li><a href="{{route('subcategory')}}">Подкатегория 1.2</a></li>
                    <li><a href="{{route('subcategory')}}">Подкатегория 1.3</a></li>
                </ul>
            </div>
            <div class="category">
                <h2>Категория 2</h2>
                <ul class="subcategories" style="display: flex; gap: 30px;">
                    <li><a href="">Подкатегория 2.1</a></li>
                    <li><a href="">Подкатегория 2.2</a></li>
                </ul>
            </div>
            <div class="category">
                <h2>Категория 3</h2>
                <ul class="subcategories" style="display: flex; gap: 30px;">
                    <li><a href="">Подкатегория 3.1</a></li>
                    <li><a href="">Подкатегория 3.2</a></li>
                    <li><a href="">Подкатегория 3.3</a></li>
                </ul>
            </div>
        </div>
    </main>
@endsection