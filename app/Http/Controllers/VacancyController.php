<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vacancy;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\VacancyRequest;

class VacancyController extends Controller
{

    public function createVacancyIndex()
    {
        if (Auth::user()->role=='applicant') {
            return redirect('/');
        }
        if (!Company::where('user_id', Auth::id())->exists()){
            return redirect()->route('create_company.index');
        }
        $vacancy = new Vacancy();
        $categories = Category::all();
        return view('create_vacancy', compact(['vacancy', 'categories']));
    }

    public function createVacancy(VacancyRequest $request)
    {
        $data = $request->validated();
        $company = (Company::where('user_id', '=', Auth::id())->first());
        $data['company_id'] = $company->id;
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

    public function update(VacancyRequest $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $data = $request->validated();

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
        $companies = Company::all();

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
        $ip = $_SERVER['REMOTE_ADDR'];
            
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]; 
        }            
        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                $ip = 'Не удалось получить IP';
        }
        // $response = Http::get("http://ip-api.com/json/{$ip}?lang=ru");
        // $location = $response->json();
        $location['city'] = 'Челябинск';
        
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

        if ($request->filled('address')) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->where('address', 'like', '%' . $request->address . '%');
            });
        } else {
            $query->whereHas('company', function ($q) use ($location) {
                $q->where('address', 'like', '%' . $location['city'] . '%');
            });
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
            })->paginate(30);
        
        $categories = Category::all();

        return view('search_vacancy', compact('categories', 'vacancies'));
    }
}
