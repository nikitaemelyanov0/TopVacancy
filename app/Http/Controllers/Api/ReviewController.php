<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Review::all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return response()->json(
            $review
        );
    }
}
