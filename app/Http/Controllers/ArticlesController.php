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

    // public function show($id)
    public function show(Article $article)  // A shorthand, replacing the lines above and below
    {
        // $article = Article::findOrFail($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        // Needed on edit too (next lesson)
        Article::create($this->validateArticle());
        // [
        //     'title' => ['required', 'min:3', 'max:255'],
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]));
        // die('Storing');
        // dump(request()->all());
        // $article = new Article();
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        return redirect('/articles');
    }

    public function update(Article $article) // the longer way
    {
        // $article = Article::findOrFail($id);
        $article->update($this->validateArticle());


      // die('Storing');
        // dump(request()->all());
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        // return redirect(route('articles.show', $article)); using a named route
        // Or better yet, using a simple method we add to the aritcle's model
        return redirect($article->path());
    }


    public function edit(Article $article)
    {
        // die('editing');
        // $article = Article::findOrFail($id);

        return view('articles.edit', ['article' => $article]);
    }

    protected function validateArticle()
    {
      return request()-> validate([
        'title' => ['required', 'min:3', 'max:255'],
        'excerpt' => 'required',
        'body' => 'required'
      ]);
    }


}
