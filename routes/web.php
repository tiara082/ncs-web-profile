<?php

use Illuminate\Support\Facades\Route;

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