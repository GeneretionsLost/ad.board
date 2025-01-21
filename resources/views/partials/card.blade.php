<div class="card" style="width: 18rem;">
    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/150' }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        {{ Str::limit($product->description, 50, '...') }}
        <p class="card-price" style="font-size: 1.25rem; font-weight: bold;">Цена: {{$product->price}} ₸</p>
        <a href="{{route('post.show', ['post'=>$product->id])}}" class="btn btn-primary">Купить</a>
    </div>
</div>