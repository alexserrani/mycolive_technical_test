<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

   public function register(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required|unique:users|max:30|min:6',
        'password' => 'required|max:30|min:6',
        'password_confirmation' => 'required|same:password',
    ], [
        'username.required' => 'The username field is required.',
        'username.unique' => 'The username is already taken.',
        'username.max' => 'The username may not be greater than 30 characters.',
        'username.min' => 'The username must be at least 6 characters.',
        'password.required' => 'The password field is required.',
        'password.max' => 'The password may not be greater than 30 characters.',
        'password.min' => 'The password must be at least 6 characters.',
        'password_confirmation.required' => 'The password confirmation field is required.',
        'password_confirmation.same' => 'The password confirmation does not match.',
    ]);

    $user = new User();
    $user->username = $validatedData['username'];
    $user->password = bcrypt($validatedData['password']);
    $user->save();

    return redirect('/login');
}

