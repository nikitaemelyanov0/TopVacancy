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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_repeat' => 'same:password',
            'role' => 'required'
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($data)){
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
        return back()->with(['fail'=>true]);
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