@extends ('layout')

@section ('content')

<!-- Content -->
<!--
    Note: To show a background image, set the "data-bg" attribute below
    to the full filename of your image. This is used in each section to set
    the background image.
-->
<section id="post" class="wrapper bg-img" data-bg="banner2.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Update Article</h2>
                </header>
                <div class="content">
                <form method="POST" action="/articles/{{ $article->id }}">
                @csrf
                @method('PUT')
                <!-- Re the above, PUT, PATCH and DELETE require a POST method with this extra trickery thrown in -->

                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input" type="text" name="title" id="title" value="{{ $article->title }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea" name="excerpt" id="excerpt">{{ $article->excerpt }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea" name="body" id="body">{{ $article->body }}</textarea>
                    </div>
                </div>

                <div class="field is-grouped">

                    <div class="control">
                        <button class="button is-link" type="submit">Submit</submit>
                    </div>
<!-- 
                    <div class="control">
                        <button class="button is-text" type="button">Cancel</submit>
                    </div> -->
                </div>

                </form>

                </div>
            </article>
        </div>
</section>