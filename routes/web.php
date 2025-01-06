<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/add', [MainController::class, 'add'])->name('add');
Route::get('/auth', [MainController::class, 'auth'])->name('auth');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/subcategory', [MainController::class, 'subcategory'])->name('subcategory');
Route::get('/post', [MainController::class, 'post'])->name('post');
