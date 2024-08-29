<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function log()
    {

        if (Auth::check()) {
            return redirect()->intended(route('home'));

        }

        return view('log');
    }

    function register()
    {
        if (Auth::check()) {
            return redirect()->intended(route('home'));

        }

        return view('register');
    }

    function logPost(Request $request)
    {
        $request->validate([

            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))->with("success", "login success");
        }
        return redirect(route('log'))->with("error", "login details are not valid");
    }

    function registerPost(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            // Ensure email_verified_at is initially null
        ]);
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User:: create($data);
        if (!$user) {
            return redirect()->intended(route('register'))->with("errro", "registration failed");

        }

        event(new Registered($user)); // Trigger Laravel's built-in Registered event


        return redirect()->route('log')->with("success", "Registration successful");
    }

    function logout()
    {

        Session::flush();

        Auth::logout();
        return redirect(route('log'));


    }


}
