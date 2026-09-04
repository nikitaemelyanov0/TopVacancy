<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            resume::all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        return response()->json(
            $resume
        );
    }
}
