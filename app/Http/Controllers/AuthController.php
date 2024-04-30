<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function Register()
    {
        return view('auth.register');
    }

    public function RegisterPost(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/login')->with('success', 'User created successfully');
    }

    public function Login()
    {
        return view('auth.login');
    }

    public function LoginPost(Request $request)
    {
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($creds)) {
            return redirect('/home')->with('success', 'Login successful');
        } else {
            return back()->with('error', 'Invalid login credentials');
        }
    }

    public function Logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
