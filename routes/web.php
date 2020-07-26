<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('statics.home');
})->name('home');


Route::get('/help', function () {
    return view('statics.help');
})->name('help');

Route::get('/about', function () {
    return view('statics.about');
})->name('about');

Route::resource('users', 'UsersController');
