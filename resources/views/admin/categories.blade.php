@extends('layouts.master')

@section('title', 'Категории')

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

        .input-button-form {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .down {
            margin-top: 50px;
        }

        h4 {
            margin-bottom: 25px;
        }

        .create-category {
            display: flex;
            flex-direction: column;
            align-items: center; /* Центрирование по вертикали */
            width: 30%; /* Занимает всю ширину */
            margin-bottom: 50px; /* Отступ снизу */
            padding: 10px; /* Отступ внутри блока */
            border: 1px solid #ddd; /* Рамка вокруг блока */
            border-radius: 5px; /* Скругление углов */
        }

        .form-class {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-right: 10px;
        }
    </style>

    <div class="down">
        <main class="create-category">
            <h4>Создать категорию</h4>
            <form action="{{route('admin.categories.store')}}" method="POST" class="input-button-form">
                @csrf
                <div>
                    <input type="text" id="title" value="{{old('name')}}" name="name" class="form-control" placeholder="Введите название" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary ">Создать категорию</button>
                </div>
            </form>
        </main>
    </div>

    @foreach($categories as $category)
        <main class="add-page">
            <form action="{{route('admin.categories.update', ['id'=>$category->id])}}" method="post" class="form-class">
                @csrf
                    <input name="name" type="text" value="{{$category->name}}">
                    <button class="btn btn-primary">Обновить</button>
            </form>
            <form action="{{route('admin.categories.delete', ['id'=>$category->id])}}" method="post">
                @csrf
                <button class="btn btn-danger">Удалить</button>
            </form>
        </main>
    @endforeach

@endsection
