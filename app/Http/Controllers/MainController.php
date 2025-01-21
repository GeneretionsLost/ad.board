<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
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
}
