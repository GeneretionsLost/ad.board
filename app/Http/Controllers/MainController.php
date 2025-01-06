<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function add()
    {
        return view('add');
    }

    public function auth()
    {
        return view('auth');
    }

    public function register()
    {
        return view('register');
    }

    public function categories()
    {
        return view('categories');
    }

    public function subcategory()
    {
        return view('subcategory');
    }

    public function post()
    {
        return view('post');
    }
}
