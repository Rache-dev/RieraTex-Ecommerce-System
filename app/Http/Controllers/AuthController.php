<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // show log in page
    public function showLogin()
    {
        return view('pages.login');
    }
    //show register page
    public function showRegister()
    {
        return view('pages.register');
    }
    //register user
    public function postRegister(Request $request)
    {
        //validated the user
        $request->validate([
            'name'=> 'required|min:3|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|min:6|confirmed'
        ]);

        //registering the user
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);

        //log in the user
        Auth::login($user);
        return back()->with('success', 'Log in was successful');
    }

    //login user
    public function postLogin(Request $request)
    {
        //validate
        $details = $request-> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //login
        if(Auth::attempt($details))
        {
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email'=> 'Invalid log in details'
        ]);

        //return

    }
    //logout
    public function logout()
    {
        Auth::logout();
        return back();
    }

    //reset password
}
