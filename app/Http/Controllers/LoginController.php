<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($credentials) {
            $request->session()->put('UserCheck', 1);
            return redirect()->intended('dashboard');
        }

        return back()->with([
            'message' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    
    }
    public function logout(Request $request) {
        $request->session()->forget('UserCheck');
        $request->session()->flush();
        return redirect()->intended('login');
    }
}
