<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
Route::get('/create', [MainController::class, 'showCreateForm'])->name('create');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/categories/{category}/{subcategory}', [MainController::class, 'subcategory'])->name('subcategory');
Route::get('/categories/{category}/{subcategory}/{id}', [MainController::class, 'post'])->name('post');
Route::post('/product', [MainController::class, 'productStore'])->name('product.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/lists', [AdminController::class, 'lists'])->name('lists');
