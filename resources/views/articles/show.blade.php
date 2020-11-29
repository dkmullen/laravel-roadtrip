

@extends ('layout')
@section ('content')

<section id="post" class="wrapper bg-img" data-bg="banner2.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>{{ $article->title }}</h2>
                    <p>01.01.2017</p>
                </header>
                <div class="content">

                <p>{{ $article->body }}</p>
                @foreach ($article->tags as $tag)
                  <a href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a>
                @endforeach
                </div>
            </article>
        </div>
    </section>

@endsection