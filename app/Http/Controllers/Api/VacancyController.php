<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Vacancy::all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        return response()->json(
            $vacancy
        );
    }
}
