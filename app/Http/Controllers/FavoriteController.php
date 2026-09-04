<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Auth;
use Illuminate\Http\Request;
use App\Models\Vacancy;

class FavoriteController extends Controller
{
    public function index() {
        $favorites = Favorite::where('user_id', Auth::id())->with('vacancy')->get();
        return view('favorite', compact('favorites'));
    }

    public function addToFavorites(Request $request, $id) {
        Favorite::create([
            'user_id' => Auth::id(),
            'vacancy_id' => $id,
        ]);
        return back();
    }

    public function removeFromFavorites($id)
    {
        Favorite::where('user_id', Auth::id())->where('vacancy_id', $id)->delete();
        return back();
    }

}
