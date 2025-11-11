<?php

use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('web.')->group(function () {
    Route::view('/', 'pages.web.index')->name('home');
    Route::view('/blog', 'pages.web.blog')->name('blog');
    Route::view('/categories', 'pages.web.categories')->name('categories');
    Route::view('/about', 'pages.web.about')->name('about');
    Route::view('/contact', 'pages.web.contact')->name('contact');
});

Route::prefix('/')->name('auth.')->group(function () {
    Route::view('/login', 'pages.auth.login')->name('login');
    Route::view('/register', 'pages.auth.register')->name('register');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'pages.admin.dashboard')->name('index');

    Route::resource('permissions', PermissionController::class);
});
