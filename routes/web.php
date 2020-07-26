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

Route::get('users/activate', 'UsersController@activate')->name('users.activate');
Route::resource('users', 'UsersController');

Route::resource('sessions', 'SessionsController')->only(['create', 'store', 'destroy']);
