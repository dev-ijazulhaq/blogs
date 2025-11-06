<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages/web/index')->name('home');
Route::view('/blog', 'pages/web/blog')->name('blog');
Route::view('/categories', 'pages/web/categories')->name('categories');
Route::view('/about', 'pages/web/about')->name('about');
Route::view('/contact', 'pages/web/contact')->name('contact');


Route::view('/dashboard', 'dashboard/index')->name('dashboard.index');
Route::view('/dashboard/setting', 'dashboard/setting')->name('dashboard.setting');
Route::view('/login', 'login')->name('login');
Route::view('/registration', 'registration')->name('registration');
