<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResumeRequest;

class ResumeController extends Controller
{

    public function createResumeIndex()
    {
        if (Auth::user()->role=='employer') {
            return redirect('/');
        }
        $resume = new Resume();
        return view('create_resume', compact('resume'));
    }

    public function createResume(ResumeRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $path = 'storage/'.$request->file('photo')->store('images', 'public');
        } else {
            $path = 'assets/images/user-photo.png';
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
        if($resume->user_id==Auth::id() || Auth::user()->role=='admin') {
            return view('create_resume', compact('resume'));
        }
        else return redirect('/');
    }

    public function update(ResumeRequest $request, $id)
    {
        $resume = Resume::findOrFail($id);

        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $path = 'storage/'.$request->file('photo')->store('images', 'public');
            $data['photo'] = $path;
        }

        $resume->update($data);

        return redirect('resume/'.$resume->id);
    }
}
