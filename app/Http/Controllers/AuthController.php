<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $users = [
        [
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role' => 'admin'
        ],
        [
            'email' => 'staff@gmail.com',
            'password' => 'staff',
            'role' => 'staff'
        ],
    ];

    foreach ($users as $user) {
        if (
            $request->email === $user['email'] &&
            $request->password === $user['password']
        ) {
            session([
                'is_logged_in' => true,
                'user_type' => $user['role'],
                'user_email' => $user['email']
            ]);

           return redirect()->intended('/dashboard');
        }
    }

    return back()->with('failed', 'Email atau password salah!');
}
    public function logout()
    {
        session()->forget('is_logged_in');
        return redirect('/login');
    }
}

