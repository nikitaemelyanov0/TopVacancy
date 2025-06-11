<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\View;

class UserController extends Controller
{

    public function registrationIndex()
    {
        return view('registration');
    }

    public function createUser(Request $request)
    {
        $data = $request->validate([
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:6', 'confirmed'],
            'role' => 'required'
        ],[
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.min' => 'Пароль должен содержать минимум 6 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'user_name.required' => 'Введите ваше имя и фамилию' 
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        $datasecond = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($datasecond)){
            $request->session()->regenerate();
            return redirect('/');
        }
    }

    public function authorizationIndex()
    {
        return view('authorization');
    }

    public function loginPost(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->with('error', 'Неверно набран email или пароль');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function delete_user() {
        $id = Auth::id();
        User::find($id)->delete();
        return redirect('/');
    }
}
