<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home'); // dòng 8-9 có ý nghĩa là khi nhập vào direct link /home thì nó sẽ load view home.blade.php
})->name('home');
Route::prefix('categories')->group(function () {
    Route::get('/create', [
        'as'=>'categories.create',
        'uses'=>'App\Http\Controllers\CategoryController@create'
    ]);
    Route::get('/', [
        'as'=>'categories.index',
        'uses'=>'App\Http\Controllers\CategoryController@index'
    ]);
    Route::post('/store', [
        'as'=>'categories.store',                               // phương thức thêm danh mục sản phẩm
        'uses'=>'App\Http\Controllers\CategoryController@store'
    ]);
});
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Quản lý tài khoản
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
Route::get('/', function () {
    return view('index');
})->name('index');
