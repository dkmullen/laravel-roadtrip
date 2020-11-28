<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generic', function () {
    // Various ways to fetch articles
    // $article = App\Models\Article::all();
    // $article = App\Models\Article::take(2)->get();
    // $article = App\Models\Article::paginate(2);
    // Shorthand for the latest 'created_at' but you can sort by any timestamp
    $article = App\Models\Article::take(3)->latest()->get();


    // A way to preview in the browser what we are fetching
    // return $article;

    return view('generic', [
        'articles' => $article
        //or, don't define it above and...
        // 'articles' => App\Models\Article::latest()->get()
    ]);
});

Route::get('/elements', function () {
    return view('elements');
});

// Route::get('/articles-list', function () {
//     $article = App\Models\Article::all();

//     return view('articles-list', [
//         'articles' => $article
//     ]);
// });

Route::get('/articles', [ArticlesController::class, 'index']); // getAll
 // btw, this has to be before the next one which is a wildcard, or thw wildcard will take prededence
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::post('/articles', [ArticlesController::class, 'store']);
// a named route - the var articles.show can be used everywhere, so if this route is changed here, it will change everywhere
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show'); // getOne
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);
