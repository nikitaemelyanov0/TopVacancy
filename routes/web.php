<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsApplicant;
use App\Http\Middleware\IsApplicantWithResume;
use App\Http\Middleware\IsEmployer;
use App\Http\Middleware\IsResumeOwner;
use App\Http\Middleware\IsVacancyOwner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\IsCompanyOwner;

Route::get('/', [VacancyController::class, 'vacanciesAtHome'])->name('home');

Route::get('/resume/{id}', [ResumeController::class, 'resumeIndex'])->name('resume.index');

Route::get('/vacancy/{id}', [VacancyController::class, 'vacancyIndex'])->name('vacancy.index');

Route::get('/registration', [UserController::class, 'registrationIndex'])->name('registration');
Route::post('/registration', [UserController::class, 'createUser']);

Route::get('/authorization', [UserController::class, 'authorizationIndex'])->name('login');
Route::post('/authorization', [UserController::class, 'loginPost']);

Route::get('/search_vacancy',[VacancyController::class, 'searchVacancy'])->name('search_vacancy');
Route::get('/search_vacancy/{company}',[VacancyController::class, 'searchCompany'])->name('search_company');

Route::get('/company/{company}', [CompanyController::class, 'CompanyIndex'])->name('company.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/create_resume', [ResumeController::class, 'createResumeIndex'])->name('create_resume.index')->middleware(IsApplicant::class);
    Route::post('/create_resume', [ResumeController::class, 'createResume']);
    
    Route::get('resume/{id}/edit', [ResumeController::class, 'edit'])->name('resume.edit')->middleware(IsResumeOwner::class);
    Route::put('resume/{id}/edit', [ResumeController::class, 'update'])->name('resume.update');
    
    Route::delete('resume/{id}/delete', [ResumeController::class, 'destroy'])->name('resume.destroy');
    
    Route::get('/create_company', [CompanyController::class, 'createCompanyIndex'])->name('create_company.index')->middleware(IsEmployer::class);
    Route::post('/create_company', [CompanyController::class, 'createCompany']);

    Route::get('company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit')->middleware(IsCompanyOwner::class);
    Route::put('company/{company}/edit', [CompanyController::class, 'update'])->name('company.update');

    Route::delete('company/delete', [CompanyController::class, 'destroy'])->name('company.destroy');
    
    Route::get('/create_vacancy', [VacancyController::class, 'createVacancyIndex'])->name('create_vacancy.index')->middleware(IsEmployer::class);
    Route::post('/create_vacancy', [VacancyController::class, 'createVacancy']);
    
    Route::get('vacancy/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit')->middleware(IsVacancyOwner::class);
    Route::put('vacancy/{id}/edit', [VacancyController::class, 'update'])->name('vacancy.update');

    Route::delete('vacancy/{id}/delete', [VacancyController::class, 'destroy'])->name('vacancy.destroy');

    Route::get('/application',[ApplicationController::class, 'applicationIndex'])->name('application.index')->middleware(IsEmployer::class);
    Route::post('/application/{id}',[ApplicationController::class, 'makeApplication'])->name('application.store')->middleware(IsApplicantWithResume::class);

    Route::get('/review/{company}',[ReviewController::class, 'createReviewIndex'])->name('review.index');
    Route::post('/review/{company}',[ReviewController::class, 'createReview'])->name('review.store');

    Route::get('delete_user', [UserController::class, 'delete_user']);
    Route::post('delete_user', [UserController::class, 'delete_user'])->name('delete_user');
    
    Route::get('/admin', [AdminController::class, 'adminIndex'])->name('admin')->middleware(IsAdmin::class);
});

Route::get('logout', [UserController:: class, 'logout'])->name('logout');

Route::get('/rules', [UserController::class, 'rulesIndex'])->name('rules');