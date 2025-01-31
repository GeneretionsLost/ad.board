<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index'])->name('index');
Route::resource('post', PostController::class)->except(['index', 'edit']);
Route::resource('admin_category', CategoryController::class);

Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/categories/{category}/{subcategory}', [MainController::class, 'subcategory'])->name('subcategory');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    Route::get('/forgot-password', [UserController::class, 'passwordRequest'])->name('password.request');
    Route::post('/forgot-password', [UserController::class, 'passwordEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [UserController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [UserController::class, 'passwordUpdate'])->name('password.update');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'is_admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/unmoderated', [AdminController::class, 'unmoderated'])->name('unmoderated');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'categories'])->name('admin.categories');
        Route::post('/store/', [CategoryController::class, 'categoryStore'])->name('admin.categories.store');
        Route::post('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.categories.delete');
        Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('admin.categories.update');
    });

    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', [SubcategoryController::class, 'subcategories'])->name('admin.subcategories');
        Route::post('/update/{id}', [SubcategoryController::class, 'subcategoryUpdate'])->name('admin.subcategories.update');
        Route::post('/delete/{id}', [SubcategoryController::class, 'subcategoryDelete'])->name('admin.subcategories.delete');
        Route::post('/store/', [SubcategoryController::class, 'subcategoryStore'])->name('admin.subcategories.store');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/lists', [AdminController::class, 'lists'])->name('lists');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
        Route::post('/ban/{id}', [AdminController::class, 'ban'])->name('ban');
        Route::post('/unban/{id}', [AdminController::class, 'unban'])->name('unban');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [VerifyController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerifyController::class, 'verification'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [VerifyController::class, 'send'])->middleware('throttle:3,1')->name('verification.send');
});












