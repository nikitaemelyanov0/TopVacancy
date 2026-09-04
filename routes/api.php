<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VacancyController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ResumeController;
use App\Http\Controllers\Api\ReviewController;

Route::apiResource('users', UserController::class)->only(['index', 'show']);
Route::apiResource('vacancies', VacancyController::class)->only(['index', 'show']);
Route::apiResource('companies', CompanyController::class)->only(['index', 'show']);
Route::apiResource('resumes', ResumeController::class)->only(['index', 'show']);
Route::apiResource('reviews', ReviewController::class)->only(['index', 'show']);