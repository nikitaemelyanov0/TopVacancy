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
        if (Auth::user()->role=='employer') {
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
            'phone' => 'required|numeric|size:11',
            'gender' => 'required',
            'city' => 'required',
            'date_of_birth' => 'required',
            'salary_expectation' => 'required|numeric',
            'education' => 'required',
            'educational_institution' => 'required',
            'description' => 'required',
        ], [
            'profession.required' => 'Заполните это поле',
            'phone.required' => 'Заполните это поле',
            'phone.numeric' => 'Введите номер телефона',
            'phone.size' => 'Введите номер телефона',
            'gender.required' => 'Укажите ваш пол',
            'city.required' => 'Заполните это поле',
            'date_of_birth.required' => 'Заполните это поле',
            'salary_expectation.required' => 'Заполните это поле',
            'salary_expectation.numeric' => 'Поле должно быть числом',
            'education.required' => 'Укажите ваше образование',
            'educational_institution.required' => 'Заполните это поле',
            'description.required' => 'Заполните это поле',
        ]);
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
        ], [
            'profession.required' => 'Заполните это поле',
            'phone.required' => 'Заполните это поле',
            'phone.numeric' => 'Введите номер телефона',
            'gender.required' => 'Укажите ваш пол',
            'city.required' => 'Заполните это поле',
            'date_of_birth.required' => 'Заполните это поле',
            'salary_expectation.required' => 'Заполните это поле',
            'salary_expectation.numeric' => 'Поле должно быть числом',
            'education.required' => 'Укажите ваше образование',
            'educational_institution.required' => 'Заполните это поле',
            'description.required' => 'Заполните это поле',
        ]);
        if ($request->hasFile('photo')) {
            $path = 'storage/'.$request->file('photo')->store('images', 'public');
            $data['photo'] = $path;
        }
        $data['user_id'] = Auth::id();
        $resume->update($data);

        return redirect('resume/'.$resume->id);
    }
}
