<div class="card" style="width: 18rem;">
    <img src="https://placehold.co/150" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-price" style="font-size: 1.25rem; font-weight: bold;">Цена: {{$product->price}} ₽</p>
        <a href="{{route('post', ['name'=>$product->subcategory->name,'id'=>$product->id])}}" class="btn btn-primary">Купить</a>
    </div>
</div>