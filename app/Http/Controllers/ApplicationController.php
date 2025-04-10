<?php

namespace App\Http\Controllers;

use App\Models\Resume_vacancy;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function applicationIndex()
    {
        if(Auth::user()->role=='employer') {
            return view('application');
        }
        else return redirect('/');
    }

    public function makeApplication($id)
    {
        $user = Auth::user();
        if ($user->resume && $user->role=='applicant') {
            $resume_id = $user->resume->id;
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
        else return redirect('create_resume');
    }
}