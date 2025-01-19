<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('dashboard')}}">Ad Board</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('index')}}">На главную</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories')}}">Категории</a>
                    </li>
                    @auth()
                        @if(auth()->user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('lists')}}">Списки</a>
                            </li>
                        @endif
                        @if(!auth()->user()->banned)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('create')}}">Создать объявление</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <form class="d-flex position-absolute start-50 translate-middle-x" style="width: 40%;" role="search">
                    <input class="form-control me-2" type="search" placeholder="Введите текст для поиска объявлений" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Поиск</button>
                </form>
                @auth()
                    <label class="fs-4  text-primary p-2">
                        {{ auth()->user()->name .  ','}}
                    </label>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-outline-danger">Выход</button>
                    </form>
                @endauth
                @guest()
                    <a href="{{route('login.show')}}" class="btn btn-primary">Войти</a>
                @endguest

            </div>
        </div>
    </nav>
</header>