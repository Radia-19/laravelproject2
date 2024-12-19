<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User;
use App\Models\UserVerification;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function showRegister()
    {
        return view('user.auth.register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|alpha_dash|unique:users,username|min:4',
            'email' => 'required|email|unique:users,email',
            'password' =>'required|confirmed'
        ]);
        $user = User::create([
            'username' = request('username'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password'))
        ]);

        //GENERATE TOKEN
        UserVerification:;create([
            'user_id'=> $user->id,
            'token'=> sha1(rand(10000,99999)),

        ]);
        //SEND EMAIL VERIFY

        //return to_route('user.login.show')->with('success','Registered Successfully');
        //dd('here');
    }
    public function showLogin()
    {
        return view('user.auth.login');
    }
}
