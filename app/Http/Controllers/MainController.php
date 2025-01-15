<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('index', compact('products'));
    }

    public function add()
    {
        return view('add');
    }

    public function categories()
    {
        $categories = Category::all();

        return view('categories', compact('categories'));
    }

    public function subcategory($name)
    {
        $subcategory = Subcategory::where('name', $name)->firstOrFail();

        return view('subcategory', compact('subcategory'));
    }

    public function post()
    {
        return view('post');
    }
}
