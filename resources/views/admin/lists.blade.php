@extends('layouts.master')

@section('title', 'Списки пользователей')

@section('content')
    <style>
        .add-page {
            display: flex;
            justify-content: space-between; /* Равномерное распределение элементов */
            align-items: center; /* Центрирование по вертикали */
            width: 30%; /* Занимает всю ширину */
            margin-bottom: 10px; /* Отступ снизу */
            padding: 10px; /* Отступ внутри блока */
            border: 1px solid #ddd; /* Рамка вокруг блока */
            border-radius: 5px; /* Скругление углов */
        }

        .user-container {
            font-size: 18px; /* Размер шрифта для имени пользователя */
            font-weight: bold; /* Полужирный шрифт */
            color: #333; /* Цвет текста */
            text-align: left; /* Выравнивание текста по левому краю */
            padding: 10px; /* Отступы вокруг текста */
            background-color: #f8f9fa; /* Цвет фона */
            border-radius: 5px; /* Скругление углов */
            width: 50%; /* Ширина контейнера */
        }

        .user-buttons-container {
            display: flex; /* Для кнопок, чтобы они шли в строку */
            gap: 10px; /* Расстояние между кнопками */
        }
    </style>

    @foreach($users as $user)
        <main class="add-page">
            <div class="user-container">
                {{$user->name}}
            </div>
            <div class="user-buttons-container">
                <!-- Кнопка редактирования всегда доступна -->
                <button class="btn btn-primary">Редактировать</button>

                @if($user->banned)
                    <!-- Если пользователь забанен, показываем кнопку "Разбанить" -->
                    <button class="btn btn-success">Разбанить</button>
                @else
                    <!-- Если пользователь не забанен, показываем кнопку "Забанить" -->
                    <button class="btn btn-danger">Забанить</button>
                @endif
            </div>
        </main>
    @endforeach
@endsection
