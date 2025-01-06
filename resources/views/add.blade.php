@extends('layouts.master')

@section('title', 'Создание объявления')

@section('content')
    <style>
        main {
            width: 25%;
        }
    </style>
    <main>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="title">Название объявления</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Введите название объявления" required>
                </div>

                <label for="category">Категория</label>
                <select id="category" name="category" class="form-control">
                    <option value="">Выберите категорию</option>
                    <option value="electronics">Электроника</option>
                    <option value="furniture">Мебель</option>
                    <option value="clothing">Одежда</option>
                    <!-- Добавьте другие категории -->
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory">Подкатегория</label>
                <select id="subcategory" name="subcategory" class="form-control" disabled>
                    <option value="">Выберите подкатегорию</option>
                    <!-- Подкатегории будут добавляться через JavaScript в зависимости от выбранной категории -->
                </select>
            </div>

            <div class="form-group">
                <label for="image">Загрузить фото</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="description">Краткое описание</label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Введите краткое описание" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Введите цену" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Создать объявление</button>
        </form>
    </main>

    <script>
        // Пример динамической подкатегории в зависимости от выбранной категории
        const categorySelect = document.getElementById('category');
        const subcategorySelect = document.getElementById('subcategory');

        categorySelect.addEventListener('change', function() {
            const selectedCategory = categorySelect.value;

            // Очистить подкатегории
            subcategorySelect.innerHTML = '<option value="">Выберите подкатегорию</option>';

            if (selectedCategory === 'electronics') {
                subcategorySelect.innerHTML += '<option value="phones">Телефоны</option><option value="laptops">Ноутбуки</option>';
            } else if (selectedCategory === 'furniture') {
                subcategorySelect.innerHTML += '<option value="chairs">Стулья</option><option value="tables">Столы</option>';
            } else if (selectedCategory === 'clothing') {
                subcategorySelect.innerHTML += '<option value="shirts">Рубашки</option><option value="pants">Брюки</option>';
            }

            // Включить выпадающий список подкатегорий
            subcategorySelect.disabled = false;
        });
    </script>
@endsection