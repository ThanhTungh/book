<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    //register view
    public function register()
    {
        if (auth()->check()) {
            return redirect()->route('success');
        }
        return view('auth.register');
    }
    public function doLogin(Request $request)
    {
        if (auth()-> attempt($request->only('email', 'password'))){
            //redirect to success page
            return redirect()->route('success');
        }
        // Redirect to login page
        return redirect()->route('login')->withErrors('Email or password is incorrect');
    }
    public function doRegister(Request $request)
    {
        // Validate the form data
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6'
        // ]);
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // Hash the password
            'password' => Hash::make($request->password)
        ]);
        // Sign the user in
        auth()->login($user);
        // Redirect to success page
        return redirect()->route('success');
    }

    // Logout action
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
