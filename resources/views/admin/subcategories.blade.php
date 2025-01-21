@extends('layouts.master')

@section('title', 'Категории')

@section('content')
    <style>
        .add-page {
            display: flex;
            flex-direction: column;
            align-items: center; /* Центрирование по вертикали */
            width: 30%; /* Занимает всю ширину */
            margin-bottom: 10px; /* Отступ снизу */
            padding: 10px; /* Отступ внутри блока */
            border: 1px solid #ddd; /* Рамка вокруг блока */
            border-radius: 5px; /* Скругление углов */
        }

        .input-select-button-form {
            width: 100%;
            display: flex;
            flex-direction: column
        }

        .select-input-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .down {
            margin-top: 50px;
        }

        h4 {
            margin-bottom: 25px;
        }

        .subcategories {
            display: flex;
            flex-direction: column;
            width: 100%;

        }

        .form-class {
            display: flex;
            justify-content: space-between;
            width: 100%;
margin-right: 10px;
        }

        .line-class {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }


    </style>

    <div class="down">
        <main class="add-page">
            <h4>Создать подкатегорию</h4>
            <form action="{{route('admin.subcategories.store')}}" method="POST" class="input-select-button-form">
                @csrf
                <div class="select-input-group">
                    <div>
                        <input type="text" id="title" value="{{old('name')}}" name="name" class="form-control" placeholder="Введите название" required>
                    </div>
                    <div>
                        <select id="category" name="category_id" class="form-control">
                            <option value="">Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ">Создать подкатегорию</button>
            </form>
        </main>

        @foreach($categories as $category)
            <main class="add-page">
                        <h4>{{$category->name}}</h4>
                        <div class="subcategories" style="display: flex; gap: 30px;">
                            @foreach($category->subcategories as $subcategory)
                                <div class="line-class">
                                    <form action="{{route('admin.subcategories.update', ['id'=>$subcategory->id])}}" method="post" class="form-class">
                                        @csrf
                                        <input name="name" type="text" value="{{$subcategory->name}}">
                                        <button class="btn btn-primary">Обновить</button>
                                    </form>
                                    <form action="{{route('admin.subcategories.delete', ['id'=>$subcategory->id])}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
            </main>
        @endforeach

    </div>

@endsection
