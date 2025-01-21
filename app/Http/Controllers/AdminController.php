<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();

        return view('admin.dashboard', compact('categories'));
    }

    public function unmoderated()
    {
        $products = Product::where('status', 0)->orderBy('created_at', 'asc')->paginate(10);

        return view('admin.unmoderated', compact('products'));
    }

    public function lists()
    {
        $users = User::where('is_admin', 0)->paginate(10);

        return view('admin.lists', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update(['name' => $request->input('name')]);

        return redirect()->route('lists')->with('success', 'Пользователь успешно обновлен!');
    }

    public function ban($id)
    {
        $user = User::find($id);

        $user->update(['banned' => 1]);

        return redirect()->route('lists')->with('danger', $user->name . ' заблокирован!');
    }

    public function unban($id)
    {
        $user = User::find($id);

        $user->update(['banned' => 0]);

        return redirect()->route('lists')->with('success', $user->name . ' разблокирован!');
    }
}
