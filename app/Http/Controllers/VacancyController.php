<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{

    public function createVacancyIndex()
    {
        $vacancy = new Vacancy();
        $categories = Category::all();
        return view('create_vacancy', compact(['vacancy', 'categories']));
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

    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();
        return redirect('/');
    }

    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        if($vacancy->user_id==Auth::id()) {
            $categories = Category::all();
            return view('create_vacancy', compact('vacancy', 'categories'));
        }
        else return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

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
        $vacancy->update($data);

        $datasecond = $request->validate([
            'categories' => 'required|array',
        ]);
        if ($request->has('categories')) {
            $vacancy->categories()->sync($datasecond['categories']);
        }

        return redirect('vacancy/'.$vacancy->id);
    }
}