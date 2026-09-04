<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Company::all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return response()->json(
            $company
        );
    }
}
