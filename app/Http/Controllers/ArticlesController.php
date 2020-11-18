<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() 
    {
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id) 
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function store()
    {
        // die('Storing');
        // dump(request()->all());
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function update($id)
    {
        // die('Storing');
        // dump(request()->all());
        $article = Article::find($id);
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }


    public function edit($id)
    {
        // die('editing');
        $article = Article::find($id);

        return view('articles.edit', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

}
