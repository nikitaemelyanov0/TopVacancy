<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/vacancy', function () {
    return view('vacancy');
});

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::get('/authorization', function () {
    return view('authorization');
})->name('authorization');

Route::get('/search_vacancy', function () {
    return view('search_vacancy');
})->name('search_vacancy');

Route::get('/create_resume', function () {
    return view('create_resume');
})->name('create_resume');

Route::get('/create_vacancy', function () {
    return view('create_vacancy');
})->name('create_vacancy');

Route::get('/resume', function () {
    return view('resume');
})->name('resume');

Route::get('/application', function () {
    return view('application');
})->name('application');