<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\EditUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::paginate(15);
        return view('pages.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        Users::create($request->only('email', 'password', 'first_name', 'last_name', 'is_active', 'gender'));
        return redirect()->route('users.index')->with('message', 'Użytkownik został dodany');
    }

    public function edit($id)
    {
        $user = Users::where(['id' => $id])->first();
        return view('pages.users.edit', ['user' => $user]);
    }

    public function update(EditUserRequest $request)
    {
        if($request->has('password') && !is_null($request->get('password')))
        { 
            $input = $request->only('email', 'password', 'first_name', 'last_name', 'is_active', 'gender');
        }
        else 
        {
            $input = $request->only('email', 'first_name', 'last_name', 'is_active', 'gender');
        }

        Users::where(['id' => $id])->update($input);
        return redirect()->route('users.index')->with('message', 'Zmiany zostały zapisane');
    }
}
