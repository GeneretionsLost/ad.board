<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::where('status', 0)->get();

        return view('admin.dashboard',compact('products'));
    }

    public function lists()
    {
        $users = User::where('is_admin', 0)->get();

        return view('admin.lists',compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.edit',compact('user'));
    }

    public function update(Request $request , $id)
    {
        $user = User::find($id);

        $user->update(['name' => $request->input('name')]);

        return redirect()->route('lists')->with('success', 'Пользователь успешно обновлен!');
    }

    public function ban($id)
    {
        $user = User::find($id);

        $user->update(['banned' => 1]);

        return redirect()->route('lists')->with('danger',  $user->name . ' заблокирован!');
    }

    public function unban($id)
    {
        $user = User::find($id);

        $user->update(['banned' => 0]);

        return redirect()->route('lists')->with('success', $user->name . ' разблокирован!');
    }

    public function confirm($id)
    {
        $product = Product::find($id);

        $product->update(['status' => 1]);

        return back()->with('success', 'Объявление №' . $product->id . ' былло одобрено!');
    }

    public function reject($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('danger', 'Объявление №' . $product->id . ' былло отклонено!');
    }
}
