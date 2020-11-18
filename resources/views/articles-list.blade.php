@extends ('layout')
@section ('content')

<section id="post" class="wrapper bg-img" data-bg="banner2.jpg">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Nibh non lobortis mus nibh</h2>
                <p>01.01.2017</p>
            </header>
            <div class="content">
            @foreach ($articles as $article)
            <div class="article-wrapper">
                <h3><a href="/articles/{{ $article->id}}">{{ $article->title }}</a></h3>
                <p>{{ $article->updated_at }}</p>
                <p><strong>{{ $article->excerpt}}</strong></p>
                <div>{{ $article->body }}</div>
            </div>
            <hr>
            @endforeach
    </div>
        </article>
    </div>
</section>

@endsection