<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function registerPost(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if($validated){
            $input = ['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)];
            DB::table('users')->insert($input);
            
        }
    }
}
