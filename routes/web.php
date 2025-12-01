<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\Content_CategoriesController;
use App\Http\Controllers\Admin_LogsController;


Route::get('/', function () {
    return view('home');
});
Route::get('/organization', function () {
    return view('organization');
});
Route::get('/vision-mission', function () {
    return view('vision-mission');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/logo', function () {
    return view('logo');
});

// Filament Admin Auth Routes
Route::post('/admin/logout', function () {
    auth()->guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/admin/login');
})->name('filament.admin.auth.logout')->middleware('web');

// API Routes for frontend (renamed to avoid conflict with Filament admin panel)
Route::prefix('api')->group(function () {
    Route::resource('administrators', AdminController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('archives', ArchivesController::class);
    Route::resource('contents', ContentController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('members', MembersController::class);
    Route::resource('admin_logs', Admin_LogsController::class);
    Route::resource('links', LinksController::class);
});