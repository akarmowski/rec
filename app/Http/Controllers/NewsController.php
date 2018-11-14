<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::with('author')->orderBy('created_at', 'desc')->paginate(15);
        return view('pages.news.index', ['news' => $news]);
    }

    public function create()
    {           
        return view('pages.news.create');
    }

    public function store(CreateNewsRequest $request)
    {
        $input = array_merge($request->only('name', 'description', 'is_active'), ['author_id' => Auth::user()->id]);
        News::create($input);
        return redirect()->route('news.index')->with('message', 'News został dodany');
    }

    public function edit($id)
    {
        $news = News::where(['id' => $id])->first();
        return view('pages.news.edit', ['news' => $news]);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        News::where(['id' => $id])->update($request->only('name', 'description', 'is_active'));
        return redirect()->route('news.index')->with('message', 'Zmiany zostały zapisane');
    }

    public function delete($id)
    {
        News::where(['id' => $id])->delete();
        return redirect()->route('news.index')->with('message', 'News został usunięty');
    }
}