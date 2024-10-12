<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);