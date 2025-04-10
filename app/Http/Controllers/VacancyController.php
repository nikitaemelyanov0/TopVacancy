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
        if (Auth::user()->role=='applicant') {
            return redirect('/');
        }
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
        $categories = Category::all();
        return view('create_vacancy', compact('vacancy', 'categories'));
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

    public function vacanciesAtHome() {
        $vacancies = Vacancy::orderBy('created_at', 'desc')->take(8)->get();
        $categories = Category::all();
        return view('home', compact('vacancies', 'categories'));
    }

    public function searchVacancy(Request $request) {
        $query = Vacancy::query();
    
        if ($request->has('position')) {
            $query->where('position', 'like', '%'.$request->position.'%');
        }
        
        if ($request->has('categories')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('categories.id', $request->categories);
            });
        }
        
        if ($request->salary!=null) {
            if($request->salary)
            $query->where('salary', '>=', $request->salary);
        }

        if ($request->has('address')) {
            $query->where('address', 'like', '%'.$request->address.'%');
        }

        $vacancies = $query->paginate(10);
        $categories = Category::all();

        return view('search_vacancy', compact('categories', 'vacancies'));
    }

    public function searchCompany($company){
        $vacancies = Vacancy::where('company_name', '=', $company)->get();
        $categories = Category::all();
        return view('search_vacancy', compact('categories', 'vacancies'));
    }
}