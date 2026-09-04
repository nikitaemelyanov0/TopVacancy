<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            User::all()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(
            $user
        );
    }
}
