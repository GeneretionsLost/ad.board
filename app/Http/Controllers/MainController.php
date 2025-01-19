<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->get();

        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::all();

        return view('categories', compact('categories'));
    }

    public function subcategory($category,$subcategory)
    {
        $category=Category::where('name', $category)->firstOrFail();
        $subcategory = Subcategory::where('category_id', $category->id)->where('name', $subcategory)
            ->with(['products' => function ($query) {
                $query->where('status', 1);
            }])
            ->firstOrFail();

        return view('subcategory', compact('subcategory'));
    }

    public function post($category,$subcategory, $id)
    {
        $category=Category::where('name', $category)->firstOrFail();
        $subcategory = Subcategory::where('category_id', $category->id)->where('name', $subcategory)->firstOrFail();
        $product = Product::where('subcategory_id', $subcategory->id)->where('id', $id)->firstOrFail();

        return view('post', compact('product'));
    }

    public function showCreateForm()
    {
        $categories = Category::all();

        return view('create', compact('categories'));
    }

    public function productStore(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:20'],
            'description' => ['required', 'min:20'],
            'price' => ['required', 'numeric'],
            'subcategory_id' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }

        Product::create($data);

        return redirect()->route('index')->with('success', 'Объявление добавлено!');
    }
}
