<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{

    public function createResumeIndex()
    {
        return view('create_resume');
    }

    public function createResume(Request $request)
    {
        $data = $request->validate([
            'user_id' => '',
            'profession' => 'required',
            'photo' => 'nullable',
            'phone' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'date_of_birth' => 'required',
            'salary_expectation' => 'required',
            'education' => 'required',
            'educational_institution' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
        } else {
            $path = 'assets\images\user-photo.png';
        }
        $data['photo'] = $path;
        $data['user_id'] = Auth::id();
        Resume::create($data);
        return redirect('/');
    }
}
