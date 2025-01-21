@extends('layouts.master')

@section('title', 'Панель Администратора')

@section('content')
    <style>
        .add-page {
            display: flex;
            flex-direction: column;
            align-items: center; /* Центрирование по вертикали */
            width: 25%; /* Занимает всю ширину */
            margin-bottom: 10px; /* Отступ снизу */
            padding: 10px; /* Отступ внутри блока */
            border: 1px solid #ddd; /* Рамка вокруг блока */
            border-radius: 5px; /* Скругление углов */
        }

        .down {
            margin-top: 50px;
        }

        .a-link {
            color: #3498db; /* Яркий синий цвет */
            text-decoration: none; /* Убираем подчеркивание */
            font-weight: bold; /* Делаем текст жирным */
            font-size: 16px; /* Размер текста */
            transition: color 0.3s ease, text-shadow 0.3s ease; /* Плавные переходы */
        }

        .a-link:hover {
            color: #2980b9; /* Более темный оттенок синего */
        }

        h4 {
            margin-bottom: 25px;
        }
    </style>

    <div class="down">
        <main class="add-page">
            <a class="a-link" href="{{route('unmoderated')}}">Объявления на модерацию</a>
        </main>
        <main class="add-page">
            <a class="a-link" href="{{route('admin.categories')}}">Категории</a>
        </main>
        <main class="add-page">
            <a class="a-link" href="{{route('admin.subcategories')}}">Подкатегории</a>
        </main>
        <main class="add-page">
            <a class="a-link" href="{{route('lists')}}">Список пользователей</a>
        </main>


    </div>

@endsection
