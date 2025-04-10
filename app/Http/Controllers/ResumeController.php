<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{

    public function createResumeIndex()
    {
        $currentuser = Auth::user();
        if ($currentuser->role=='employer' || $currentuser->resume) {
            return redirect('/');
        }
        $resume = new Resume();
        return view('create_resume', compact('resume'));
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
            $path = 'images/user-photo.png';
        }
        $data['photo'] = $path;
        $data['user_id'] = Auth::id();
        $resume = Resume::create($data);
        return redirect('resume/'.$resume->id);
    }

    public function resumeIndex(Resume $id)
    {
        $resume = $id;
        $user = User::find($resume->user_id);
        return view('resume', compact(['user', 'resume']));
    }

    public function destroy($id)
    {
        $resume = resume::findOrFail($id);
        $resume->delete();
        return redirect('/');
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);
        if($resume->user_id==Auth::id()) {
            return view('create_resume', compact('resume'));
        }
        else return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);

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
            $path = 'images/user-photo.png';
        }
        $data['photo'] = $path;
        $data['user_id'] = Auth::id();
        $resume->update($data);

        return redirect('resume/'.$resume->id);
    }
}
