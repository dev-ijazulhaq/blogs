<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/blog', 'blog')->name('blog');


Route::view('/dashboard', 'dashboard/index')->name('dashboard.index');
Route::view('/dashboard/setting', 'dashboard/setting')->name('dashboard.setting');
