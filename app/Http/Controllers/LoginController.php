<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->put('UserCheck', 1 );
            return redirect('dashboard');
        }

        return back()->with([
            'message' => 'The provided credentials do not match our records.',
        ]);
    
    }
    public function logout(Request $request) {
        $request->session()->forget('UserCheck');
        $request->session()->flush();
        return redirect()->intended('login');
    }

    
}
