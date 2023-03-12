<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show user registration form
    public function create()
    {
        return view('users.register');
    }

    //register user and login
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);
        //harsh password
        $formData['password'] = bcrypt($formData['password']);
        //create user
        $user = User::create($formData);
        //login new user
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in');

    }
    //show login form
    public function login()
    {
        return view('users.login');
    }
    //login user
    public function authenticate(Request $request)
    {
        $formData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
      
        if(auth()->attempt($formData)) {
            $request->session()->regenerate();
      
            return redirect('/')->with('message', 'You are now logged in!');
        }
      
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
      
    }
    // Logout User
public function logout(Request $request) {
    auth()->logout();
  
    $request->session()->invalidate();
    $request->session()->regenerateToken();
  
    return redirect('/')->with('message', 'You have been logged out!');
  
  }

}
