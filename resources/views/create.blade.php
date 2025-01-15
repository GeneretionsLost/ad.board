@extends('layouts.master')

@section('title', 'Создание объявления')

@section('content')
    <main style="width: 25%;">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="title">Название объявления</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Введите название объявления" required>
                </div>

                <label for="category" style="margin-top: 15px;">Категория</label>
                <select id="category" name="category" class="form-control">
                    <option value="">Выберите категорию</option>
                    <option value="electronics">Электроника</option>
                    <option value="furniture">Мебель</option>
                    <option value="clothing">Одежда</option>
                </select>
            </div>

            <div class="form-group">
                <label for="subcategory" style="margin-top: 15px;">Подкатегория</label>
                <select id="subcategory" name="subcategory" class="form-control" disabled>
                    <option value="">Выберите подкатегорию</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image" style="margin-top: 15px;">Загрузить фото</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label for="description" style="margin-top: 15px;">Краткое описание</label>
                <textarea id="description"  name="description" class="form-control"  rows="4" placeholder="Введите краткое описание" required style="resize: none;"></textarea>
            </div>

            <div class="form-group">
                <label for="price" style="margin-top: 15px;">Цена</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Введите цену" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Создать объявление</button>
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