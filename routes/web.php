<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crear-cuenta', function () {
    return view('auth.register');
});
