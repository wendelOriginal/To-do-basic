<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function index(Request $request)
    {

        if(Auth::check()){

            return redirect(route('home'));

        }
        return view('login');
    }

    public function login_user(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($data)){
            return redirect(route('home'));
        };
        return redirect(route('login'));



    }


    public function register(Request $request)
    {

        if(Auth::check()){

            return redirect(route('home'));

        }
        return view('register');
    }


    public function register_user(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $userInfo = $request->only('name', 'email', 'password');

        User::create($userInfo);

        return redirect(route('login'));


    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
