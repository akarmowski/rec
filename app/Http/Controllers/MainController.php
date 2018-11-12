<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\RegisterUserRequest;
use App\Models\Users;

class MainController extends Controller
{
    public function login()
    {
        return view('pages.main.login');
    }

    public function register()
    {
        return view('pages.main.register');
    }

    public function store_user(RegisterUserRequest $request)
    {
        Users::create(array_merge(['is_active' => 1], $request->only('email', 'password', 'first_name', 'last_name', 'gender')));
        return back()->with('message', 'Użytkownik został założony');
    }
}
