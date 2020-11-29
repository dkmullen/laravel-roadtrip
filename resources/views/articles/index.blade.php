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
            @forelse ($articles as $article)
            <div class="article-wrapper">
            <!-- using a named route -->
                <h3><a href="{{ route('articles.show', $article)}}">{{ $article->title }}</a></h3>
                <p>{{ $article->updated_at }}</p>
                <p><strong>{{ $article->excerpt}}</strong></p>
                <div>{{ $article->body }}</div>
            </div>
            <hr>
            @empty <p>No relevent articles yet.</p>
            @endforelse
    </div>
        </article>
    </div>
</section>

@endsection