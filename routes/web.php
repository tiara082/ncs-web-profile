<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\Admin_LogsController;

// Frontend Routes - Using data from database
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/agenda', [FrontendController::class, 'agenda'])->name('agenda');
Route::get('/agenda/{id}', [FrontendController::class, 'agendaDetail'])->name('agenda.detail');
Route::get('/past-activities', [FrontendController::class, 'pastActivities'])->name('past-activities');
Route::get('/research-documents', [FrontendController::class, 'researchDocuments'])->name('research-documents');
Route::get('/archive/{id}', [FrontendController::class, 'archiveDetail'])->name('archive.detail');
Route::get('/articles', [FrontendController::class, 'articles'])->name('articles');
Route::get('/article/{id}', [FrontendController::class, 'articleDetail'])->name('article.detail');
Route::get('/organization', [FrontendController::class, 'organization'])->name('organization');

// Static pages
Route::get('/vision-mission', function () { return view('vision-mission'); });
Route::get('/profile', function () { return view('profile'); });
Route::get('/infrastructure', function () { return view('infrastructure'); });
Route::get('/consulting', function () { return view('consulting'); });
Route::get('/login', function () { return view('login'); });
Route::get('/logo', function () { return view('logo'); });

// Admin Login
Route::get('/admin/login', function () {
    if (auth()->guard('web')->check()) { return redirect('/admin'); }
    return view('admin.login');
})->name('login');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate(['username' => 'required', 'password' => 'required']);
    $admin = \App\Models\Admin::where('username', $credentials['username'])->first();
    if ($admin && \Illuminate\Support\Facades\Hash::check($credentials['password'], $admin->password_hash)) {
        auth()->guard('web')->login($admin);
        $request->session()->regenerate();
        return $admin->isMember() ? redirect('/member') : redirect('/admin');
    }
    return back()->withErrors(['username' => 'Invalid username or password.'])->onlyInput('username');
})->name('admin.login.post');

// Logout
Route::post('/logout', function () {
    auth()->guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/admin/login');
})->name('logout')->middleware('auth');

// Admin Panel
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admins.index');
    Route::resource('galleries', GalleryController::class);
    Route::resource('archives', ArchivesController::class);
    Route::resource('contents', ContentController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('members', MembersController::class);
    Route::resource('links', LinksController::class);
    Route::resource('admin_logs', Admin_LogsController::class)->except(['create', 'store', 'edit', 'update']);
});

// Member Panel
Route::middleware('auth')->prefix('member')->as('member.')->group(function () {
    Route::get('/', function () { return view('member.dashboard'); })->name('dashboard');
    Route::resource('galleries', GalleryController::class);
    Route::resource('archives', ArchivesController::class);
});
