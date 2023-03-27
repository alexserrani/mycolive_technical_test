<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|max:30|min:6',
            'password' => 'required|max:30|min:6',
        ], [
            'username.required' => 'The username field is required.',
            'username.max' => 'The username may not be greater than 30 characters.',
            'username.min' => 'The username must be at least 6 characters.',
            'password.required' => 'The password field is required.',
            'password.max' => 'The password may not be greater than 30 characters.',
            'password.min' => 'The password must be at least 6 characters.',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return back()->withErrors(['credentials' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
