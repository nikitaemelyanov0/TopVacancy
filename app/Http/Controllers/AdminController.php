<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminIndex() {
        if(Auth::user()->role=='admin') {
            $users = User::all();

            return view('admin', compact('users'));
        }
        else return redirect('/');
    }

}