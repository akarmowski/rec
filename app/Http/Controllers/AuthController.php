<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            return redirect()->intended('/users');
        }
        else
        {
            return redirect()->back()->withErrors(['error' => 'Nieudana autoryzacja']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main.login');
    }
}
