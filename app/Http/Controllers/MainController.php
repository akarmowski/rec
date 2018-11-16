<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Main\RegisterUserRequest;
use App\Models\Users;
use App\Models\News;
use App\Models\Contacts;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.main.index');
    }

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
        Users::create(array_merge(['is_active' => 0], $request->only('email', 'password', 'first_name', 'last_name', 'gender')));
        return back()->with('message', 'Rejestracja przebiegła prawidłowo. Użytkownik musi zostać aktywowany przez Administratora');
    }

    public function index_news()
    {
        $news = News::with('author')->orderBy('created_at', 'desc')->paginate(15);
        return view('pages.main.index_news', ['news' => $news]);
    }

    public function index_statistics()
    {
        return view('pages.main.index_statistics');
    }

    public function get_countries_statistics()
    {
        $statistics = Contacts::select('country', \DB::raw('count(*) as stats'))->groupBy('country')->paginate(15);
        return response()->json($statistics);
    }
}
