<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        Category::create(['name' => $request->name]);

        return back()->with('success', 'Категория добавлена!');
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return back()->with('danger', 'Категория ' . $category->name . ' удалена!');
    }

    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::find($id);

        $category->update(['name' => $request->name]);

        return redirect()->route('admin.categories')->with('success', 'Категория ' . $category->name . ' была изменена!');
    }
}
