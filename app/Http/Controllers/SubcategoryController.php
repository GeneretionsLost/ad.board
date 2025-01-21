<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function subcategories()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.subcategories', compact('subcategories', 'categories'));
    }



    public function subcategoryStore(Request $request)
    {

        Subcategory::create($request->all());

        return back()->with('success', 'Подкатегория '. $request->name . ' добавлена!');
    }



    public function subcategoryUpdate(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->update(['name' => $request->name]);

        return redirect()->route('admin.subcategories')->with('success', 'Подкатегория ' . $subcategory->name . ' была изменена!');
    }

    public function subcategoryDelete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        return back()->with('danger', 'Подкатегория ' . $subcategory->name . ' удалена!');
    }
}
