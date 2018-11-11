<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\RegisterUserRequest;
use App\Models\Users;

class UsersController extends Controller
{
    public function index()
    {
        # code...
    }

    public function register()
    {
        return view('pages.users.register');
    }

    public function store(RegisterUserRequest $request)
    {
        Users::create(array_merge(['is_active' => 1], $request->only('email', 'password', 'first_name', 'last_name', 'gender')));
        return back()->with('message', 'Użytkownik został założony');
    }
}
