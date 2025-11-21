<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\HasAccess;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('web.')->group(function () {
    Route::view('/', 'pages.web.index')->name('home');
    Route::view('blog', 'pages.web.blog')->name('blog');
    Route::view('categories', 'pages.web.categories')->name('categories');
    Route::view('about', 'pages.web.about')->name('about');
    Route::view('contact', 'pages.web.contact')->name('contact');
});

Route::view('login', 'pages.auth.login')->name('login');
// Route::view('register', 'pages.auth.register')->name('register');

Route::get('register', [AuthController::class, 'create'])->name('register');
Route::post('auth/register', [AuthController::class, 'store'])->name('auth.register');
Route::post('auth/login', [AuthController::class, 'authentication'])->name('auth.login');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
///////// EMAIL VERIFICATION /////////
///////// EMAIL VERIFICATION /////////
///////// EMAIL VERIFICATION /////////

Route::middleware('auth')->group(function () {

    Route::get('/email/verify', function () {
        return view('pages.auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('admin/dashboard');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});
///////// EMAIL VERIFICATION /////////
///////// EMAIL VERIFICATION /////////
///////// EMAIL VERIFICATION /////////

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'pages.admin.dashboard')->name('index');
    Route::get('settings', [SettingsController::class, 'index'])->middleware('HasAccess:manage.settings')->name('settings');
    Route::resource('permissions', PermissionController::class)->middleware('HasAccess:manage.settings');
    Route::resource('roles', RoleController::class)->middleware('HasAccess:manage.settings');
    Route::view('users', 'pages.admin.users')->name('users')->middleware('HasAccess:manage.users');
    Route::resource('categories', CategoryController::class)->middleware('HasAccess:manage.categories');
});
