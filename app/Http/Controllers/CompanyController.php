<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Review;

class CompanyController extends Controller
{
    public function CompanyIndex(Company $company)
    {   
        $reviews = $company->reviews;
        $vacancies = Vacancy::where('company_id', $company->id)->get();

        $reviewsCount = $company->reviews->count();
        $reviewsAvg = round($company->reviews()->avg('grade'), 1);
        
        return view('company', compact('company', 'vacancies', 'reviews', 'reviewsCount', 'reviewsAvg'));
    }
    
    public function createCompanyIndex()
    {
        if (Auth::user()->role=='applicant') {
            return redirect('/');
        }
        $company = new Company();
        return view('create_company', compact('company'));
    }

    public function createCompany(CompanyRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('logo')) {
            $path = 'storage/'.$request->file('logo')->store('images', 'public');
        } else {
            $path = 'assets/images\company-logo.png';
        }
        $data['logo'] = $path;
        $data['user_id'] = Auth::id();
        Company::create($data);

        return redirect()->route('create_vacancy.index', );
    }

    public function edit(Company $company)
    {
        if($company->user_id==Auth::id() || Auth::user()->role=='admin') {
            return view('create_company', compact('company'));
        }
        else return redirect('/');
    }

    public function update(CompanyRequest $request)
    {
        $company = Company::where('user_id', Auth::id())->first();
        $data = $request->validated();
        
        if ($request->hasFile('logo')) {
            $path = 'storage/'.$request->file('logo')->store('images', 'public');
        } else {
            $path = 'assets/images\company-logo.png';
        }
        $data['logo'] = $path;
        $data['user_id'] = Auth::id();
        $company->update($data);

        return redirect()->route('create_vacancy.index', );
    }
}
