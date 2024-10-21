<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::get('/template', function () {
    return view('template');
});

Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
});

Route::resource('/user', AdminUserController::class );

Route::get('/post', function () {
    $data = [
        'content' => 'admin.post.index'
    ];
    return view('admin.layouts.wrapper', $data);
});
