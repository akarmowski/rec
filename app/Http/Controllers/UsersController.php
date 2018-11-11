<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\RegisterUserRequest;

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
        dd($request);
    }
}
