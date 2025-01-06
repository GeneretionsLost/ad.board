<header>
    <a href="">
        <img src="{{ asset('images/book.png') }}" alt="Icon" class="header-icon">
    </a>
    <a href="{{route('index')}}" class="banner">
        <h1>Доска объявлений</h1>
    </a>

    <div class="entry-create-container">
        <a href="{{route('categories')}}">Категории</a>
        <a href="{{route('add')}}" class="create">Создать объявление</a>
        <a href="{{route('auth')}}" class="entry">Вход и Регистрация</a>
    </div>
</header>