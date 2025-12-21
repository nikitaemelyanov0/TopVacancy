<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\View;
use App\Http\Requests\RegestrationRequest;

class UserController extends Controller
{

    public function registrationIndex()
    {
        return view('registration');
    }

    public function createUser(RegestrationRequest $request)
    {
        $data = $request->validated();
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
