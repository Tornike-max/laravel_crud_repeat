<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function loginForm()
    {
        return view('sessions.index');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (!Auth::attempt($validatedData)) {
            return redirect()->route('sessions.loginform')->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->intended(route('posts.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('sessions.loginform')->with('success', 'logged out successfully');
    }
}
