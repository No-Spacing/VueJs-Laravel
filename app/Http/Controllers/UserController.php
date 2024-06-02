<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard(){        

        return Inertia::render('Dashboard', ['auth.user' => User::where('id', session('UserCheck'))->first()]);
    }
}
