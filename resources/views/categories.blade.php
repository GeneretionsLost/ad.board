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

        @foreach($categories as $category)
            <div class="categories">
                <div class="category">
                    <h2>{{$category->name}}</h2>
                    <ul class="subcategories" style="display: flex; gap: 30px;">
                        @foreach($category->subcategories as $subcategory)
                            <li><a href="{{route('subcategory', ['category'=>$category->name,'subcategory'=>$subcategory->name])}}">{{$subcategory->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach

    </main>
@endsection