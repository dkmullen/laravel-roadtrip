<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'excerpt', 'body'];

    public function path() {
      return route('articles.show', $this);
    }

    // Return the user whp wrote this article
    public function user()
    {
      // Eloquent query for sql: select * from user where article_id = <this article's id>
      return $this->belongsTo(User::class);
    }

    public function tags() 
    {
      return $this->belongsToMany(Tag::class)->withTimeStamps();
    }
}
// In tinker...
// >>> App\Models\Article::find(1)->user;
// >>> $articleList = App\Models\Article::find(1);
// >>> $articleList->user;

