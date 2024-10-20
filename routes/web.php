<?php

use Illuminate\Support\Facades\Route;

Route::get('/template', function () {
    return view('template');
});

Route::get('/', function () {
    return view('admin.layouts.wrapper');
});

Route::get('/user', function () {
    $data = [
        'content' => 'admin.user.index'
    ];
    return view('admin.layouts.wrapper', $data);
});
Route::get('/post', function () {
    $data = [
        'content' => 'admin.post.index'
    ];
    return view('admin.layouts.wrapper', $data);
});
