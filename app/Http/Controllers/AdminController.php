<?php

namespace App\Http\Controllers;

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
}
