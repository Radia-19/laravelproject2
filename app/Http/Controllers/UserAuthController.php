<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerification;
use App\Mail\EmailVerify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
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

        DB::transaction(function () {

        $user = User::create([
            'username' => request('username'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password'))
        ]);

        //GENERATE TOKEN
        $token = sha1(rand(10000,99999));
        $user->verification()->create([
            'token'=> $token
        ]);

        // User::create([
        //     'username' => request('username'),
        //     'email'=> request('email'),
        //     'password'=> bcrypt(request('password'))
        // ])->verification()->create([
        //     'token'=> sha1(rand(10000,99999))
        // ]);

        // UserVerification:;create([
        //     'user_id'=> $user->id,
        //     'token'=> sha1(rand(10000,99999))
        // ]);

        //SEND EMAIL VERIFY
        try {
            Mail::to(\request('email'))->send(new EmailVerify($user->id, $token));
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send verification email.']);
        }

       });

        return to_route('user.login.show')->with('success', 'Registered Successfully. Please check your email for verification.');

        //dd('here');
    }
    public function showLogin()
    {
        return view('user.auth.login');
    }
}
