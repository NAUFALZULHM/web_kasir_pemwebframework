<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
});

Route::prefix('/admin')->group(function (){
    Route::resource('/user', AdminUserController::class );
});


