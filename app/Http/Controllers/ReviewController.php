<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use App\Models\Company;
use App\Models\Company_review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function createReviewIndex(Company $company)
    {
        $review = new Review();
        return view('create_review', compact('review', 'company'));
    }

    public function createReview(ReviewRequest $request, Company $company)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['company_id'] = $company->id;
        Review::create($data);
        return redirect()->route('company.index', $company);
    }
}
