<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

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

    public function loginPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Gunakan kombinasi IP address dan email untuk rate limiter
        $key = 'login-attempt:' . $request->ip() . ':' . $request->email;

        // Cek apakah pengguna telah melebihi batas percobaan login
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('warning', 'Too many login attempts. Please try again in ' . $seconds . ' seconds.');
        }

        // Hit rate limiter
        RateLimiter::hit($key);
       

        $creds = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($creds)) {
            RateLimiter::clear($key); // Reset rate limiter on successful login
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
