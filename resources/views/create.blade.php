@extends('layouts.master')

@section('title', 'Создание объявления')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main style="width: 25%;">
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="title">Название объявления</label>
                    <input type="text" id="title" value="{{old('name')}}" name="name" class="form-control" placeholder="Введите название объявления" required>
                </div>

                <label for="category" style="margin-top: 15px;">Категория</label>
                <select id="category" name="category" class="form-control">
                    <option value="">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory" style="margin-top: 15px;">Подкатегория</label>
                <select id="subcategory" name="subcategory_id" class="form-control" disabled>
                    <option value="">Выберите подкатегорию</option>
                    @foreach($categories as $category)
                        @foreach($category->subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image" style="margin-top: 15px;">Загрузить фото</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="description" style="margin-top: 15px;">Краткое описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Введите краткое описание" required style="resize: none;">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="price" style="margin-top: 15px;">Цена</label>
                <input type="number" id="price" value="{{old('price')}}" name="price" class="form-control" placeholder="Введите цену" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Создать объявление</button>
        </form>
    </main>

    <script>
        const categorySelect = document.getElementById('category');
        const subcategorySelect = document.getElementById('subcategory');

        // Массив с категориями и подкатегориями, переданный через Blade
        const categories = @json($categories);

        categorySelect.addEventListener('change', function () {
            const selectedCategory = categorySelect.value;

            // Очистить подкатегории
            subcategorySelect.innerHTML = '<option value="">Выберите подкатегорию</option>';

            // Найти выбранную категорию
            const selectedCategoryData = categories.find(category => category.name === selectedCategory);

            if (selectedCategoryData) {
                // Добавить подкатегории в список
                selectedCategoryData.subcategories.forEach(subcategory => {
                    subcategorySelect.innerHTML += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                });

                // Включить выпадающий список подкатегорий
                subcategorySelect.disabled = false;
            } else {
                // Если категория не выбрана или данных нет, скрыть подкатегории
                subcategorySelect.disabled = true;
            }
        });
    </script>
@endsection