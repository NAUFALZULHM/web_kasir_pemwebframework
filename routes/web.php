<?php

use Illuminate\Support\Facades\Route;
Route::get('/template', function () {
    return view('template');
});

Route::get('/', function () {
    return view('admin.layouts.wrapper');
});

Route::get('/user', function () {
    return view('admin.layouts.wrapper');
});
