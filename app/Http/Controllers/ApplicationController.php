<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Resume_vacancy;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function applicationIndex()
    {
        $userscompany = Company::where('user_id', '=', Auth::id())->first();
        if ($userscompany==null) {
            $vacancies = false;
        }
        else $vacancies = Vacancy::where('company_id', '=', $userscompany->id)->get();
        return view('application', compact('vacancies'));
    }

    public function makeApplication($id)
    {
        $resume_id = Auth::user()->resume->id;
        $vacancy_id = Vacancy::find($id)->id;
        $data=[
            'vacancy_id' =>  $vacancy_id,
            'resume_id' =>  $resume_id
        ];
        if (Resume_vacancy::where($data)->get()->count() > 0) {
            return back();
        }
        else {
            Resume_vacancy::create($data);
            return back();
        }
    }
}