<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ResumeController;

Route::get('/', [VacancyController::class, 'vacanciesAtHome'])->name('home');

Route::get('/resume/{id}', [ResumeController::class, 'resumeIndex'])->name('resume.index');

Route::delete('resume/{id}/delete', [ResumeController::class, 'destroy'])->name('resume.destroy');

Route::get('resume/{id}/edit', [ResumeController::class, 'edit'])->name('resume.edit');
Route::put('resume/{id}/edit', [ResumeController::class, 'update'])->name('resume.update');

Route::get('/vacancy/{id}', [VacancyController::class, 'vacancyIndex'])->name('vacancy.index');

Route::delete('vacancy/{id}/delete', [VacancyController::class, 'destroy'])->name('vacancy.destroy');

Route::get('vacancy/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
Route::put('vacancy/{id}/edit', [VacancyController::class, 'update'])->name('vacancy.update');

Route::get('/registration', [UserController::class, 'registrationIndex'])->name('registration');
Route::post('/registration', [UserController::class, 'createUser']);

Route::get('/authorization', [UserController::class, 'authorizationIndex'])->name('login');
Route::post('/authorization', [UserController::class, 'loginPost']);

Route::get('delete_user', [UserController::class, 'delete_user']);
Route::post('delete_user', [UserController::class, 'delete_user'])->name('delete_user');

Route::get('/search_vacancy',[VacancyController::class, 'searchVacancy'])->name('search_vacancy');
Route::get('/search_vacancy/{company}',[VacancyController::class, 'searchCompany'])->name('search_company');

Route::middleware(['auth'])->group(function () {
    Route::get('/create_resume', [ResumeController::class, 'createResumeIndex'])->name('create_resume.index');
    Route::post('/create_resume', [ResumeController::class, 'createResume']);

    Route::get('/create_vacancy', [VacancyController::class, 'createVacancyIndex'])->name('create_vacancy.index');
    Route::post('/create_vacancy', [VacancyController::class, 'createVacancy']);

    Route::get('/application',[ApplicationController::class, 'applicationIndex'])->name('application.index');
    Route::post('/application/{id}',[ApplicationController::class, 'makeApplication'])->name('application.store');
});

Route::get('logout', [UserController:: class, 'logout'])->name('logout');