<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'phone' => 'required|numeric',
            'address' => 'required',
            'salary' => 'required|numeric',
            'description' => 'required'
        ], [
            'position.required' => 'Заполните это поле',
            'company_name.required' => 'Заполните это поле',
            'phone.required' => 'Заполните это поле',
            'phone.numeric' => 'Введите номер телефона',
            'address.required' => 'Заполните это поле',
            'salary.required' => 'Заполните это поле',
            'salary.numeric' => 'Поле должно быть числом',
            'description.required' => 'Заполните это поле'
        ]);
        if ($request->hasFile('logo')) {
            $path = 'storage/'.$request->file('logo')->store('images', 'public');
        } else {
            $path = 'assets/images\company-logo.png';
        }
        $data['logo'] = $path;
        $data['user_id'] = Auth::id();
        $vacancy = Vacancy::create($data);

        $datasecond = $request->validate([
            'categories' => 'array'
        ]);
        if ($request->has('categories')){
            $vacancy->categories()->attach($datasecond['categories']);
        }

        return redirect('vacancy/'.$vacancy->id);
    }

    public function vacancyIndex(Vacancy $id)
    {
        $vacancy = $id;
        $categories = $vacancy->categories;

        $vacancies = Vacancy::Where('position', 'like', '%'.$vacancy->position.'%')->get();

        return view('vacancy', compact(['categories', 'vacancy', 'vacancies']));
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
            'phone' => 'required|numeric',
            'address' => 'required',
            'salary' => 'required',
            'description' => 'required'
        ], [
            'position.required' => 'Заполните это поле',
            'company_name.required' => 'Заполните это поле',
            'phone.required' => 'Заполните это поле',
            'phone.numeric' => 'Введите номер телефона',
            'address.required' => 'Заполните это поле',
            'salary.required' => 'Заполните это поле',
            'salary.numeric' => 'Поле должно быть числом',
            'description.required' => 'Заполните это поле'
        ]);
        if ($request->hasFile('logo')) {
            $path = 'storage/'.$request->file('logo')->store('images', 'public');
            $data['logo'] = $path;
        }
        $data['user_id'] = Auth::id();
        $vacancy->update($data);

        $datasecond = $request->validate([
            'categories' => 'array'
        ]);
        if ($request->has('categories')) {
            $vacancy->categories()->sync($datasecond['categories']);
        }

        return redirect('vacancy/'.$vacancy->id);
    }

    public function vacanciesAtHome() {
        $vacancies = Vacancy::orderBy('created_at', 'desc')->take(8)->get();
        $categories = Category::all();
        $companies = Vacancy::select('vacancies.*')
        ->join(DB::raw('(SELECT MIN(id) as id FROM vacancies GROUP BY company_name) as grouped'), 'vacancies.id', '=', 'grouped.id')
        ->get();

        $professions = Vacancy::selectRaw(
            'position, 
            COUNT(*) as count, 
            MAX(salary) as max_salary'
        )
        ->groupBy('position')
        ->orderBy('count', 'desc')
        ->take(8)
        ->get();

        return view('home', compact('vacancies', 'categories', 'companies', 'professions'));
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

        $sort = $request->get('sort', 'newest');

        $vacancies = $query
            ->when($sort === 'salary_asc', function($query) {
                return $query->orderBy('salary');
            })
            ->when($sort === 'salary_desc', function($query) {
                return $query->orderByDesc('salary');
            })
            ->when($sort === 'newest', function($query) {
                return $query->latest();
            })->get();
        
        $categories = Category::all();

        return view('search_vacancy', compact('categories', 'vacancies'));
    }

    public function searchCompany($company){
        $vacancies = Vacancy::where('company_name', '=', $company)->get();
        $categories = Category::all();
        return view('search_vacancy', compact('categories', 'vacancies'));
    }
}
