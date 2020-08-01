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
Route::post('users/{user}/uploadAvatar', 'UsersController@uploadAvatar')->name('users.uploadAvatar');
Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::resource('sessions', 'SessionsController')->only(['store', 'destroy']);

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.form');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.resetPassword');



Route::post('statuses/store', 'StatusesController@store')->name('statuses.store');
