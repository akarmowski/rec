<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::with('author')->paginate(15);
        return view('pages.news.index', ['news' => $news]);
    }

    public function create()
    {           
        return view('pages.news.create');
    }
}
