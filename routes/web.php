<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\VacancyController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/resume/{id}', [ResumeController::class, 'resumeIndex'])->name('resume');

Route::get('/vacancy/{id}', [VacancyController::class, 'vacancyIndex'])->name('vacancy');

Route::get('/registration', [UserController::class, 'registrationIndex'])->name('registration');
Route::post('/registration', [UserController::class, 'createUser']);

Route::get('/authorization', [UserController::class, 'authorizationIndex'])->name('login');
Route::post('/authorization', [UserController::class, 'loginPost']);

Route::get('delete_user', [UserController::class, 'delete_user']);
Route::post('delete_user', [UserController::class, 'delete_user'])->name('delete_user');

Route::get('/search_vacancy', function () {
    return view('search_vacancy');
})->name('search_vacancy');

Route::middleware(['auth'])->group(function () {
    Route::get('/create_resume', [ResumeController::class, 'createResumeIndex'])->name('create_resume');
    Route::post('/create_resume', [ResumeController::class, 'createResume']);

    Route::get('/create_vacancy', [VacancyController::class, 'createVacancyIndex'])->name('create_vacancy');
    Route::post('/create_vacancy', [VacancyController::class, 'createVacancy']);
});

Route::get('/application', function () {
    return view('application');
})->name('application');

Route::get('logout', [UserController:: class, 'logout'])->name('logout');