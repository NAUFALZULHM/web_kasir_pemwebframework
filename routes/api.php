<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/example', function (Request $request) {
    return response()->json(['message' => 'Hello, API!']);
});
