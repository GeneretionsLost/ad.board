<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
        $this->middleware(['auth', 'is_admin'])->only(['update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::where('status', 1);

        // Проверяем, есть ли запрос на поиск
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%'); // Ищем по названию
        }

        // Сортируем и пагинируем результаты
        $products = $query->orderBy('updated_at', 'desc')->paginate(10);

        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:20'],
            'description' => ['required', 'min:20'],
            'price' => ['required', 'numeric'],
            'subcategory_id' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $data['status'] = auth()->user()->is_admin ? 1 : 0;

        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }

        Product::create($data);

        return redirect()->route('index')->with('success', 'Объявление добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();

        return view('post', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update(['status' => 1]);

        return back()->with('success', 'Объявление №' . $product->id . ' былло одобрено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('danger', 'Объявление №' . $product->id . ' былло отклонено!');
    }
}
