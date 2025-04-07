<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{

    public function createVacancyIndex()
    {   
        $categories = Category::all();
        return view('create_vacancy', compact('categories'));
    }

    public function createVacancy(Request $request)
    {
        $data = $request->validate([
            'user_id' => '',
            'position' => 'required',
            'company_name' => 'required',
            'logo' => 'nullable',
            'phone' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('images', 'public');
        } else {
            $path = 'images\company-logo.png';
        }
        $data['logo'] = $path;
        $data['user_id'] = Auth::id();
        $vacancy = Vacancy::create($data);

        $datasecond = $request->validate([
            'categories' => 'required|array',
        ]);
        $vacancy->categories()->attach($datasecond['categories']);

        return redirect('vacancy/'.$vacancy->id);
    }

    public function vacancyIndex(Vacancy $id)
    {
        $vacancy = $id;
        $categories = $vacancy->categories;

       return view('vacancy', compact(['categories', 'vacancy']));
    }

}