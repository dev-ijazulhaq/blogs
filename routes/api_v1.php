<?php

use App\Http\Controllers\API\V1\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('home', [HomeController::class, 'homeScreenBlogs'])->name('home');
Route::get('blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('blog/{blogId}/details', [HomeController::class, 'blogDetails'])->name('blogDetails');
