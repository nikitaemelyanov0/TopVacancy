<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Vacancy;

class FavoriteController extends Controller
{
    public function index() {
        return view('favorites');
    }

    public function addToFavorites(Vacancy $vacancy) {
        
    }
}
