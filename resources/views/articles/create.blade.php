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
                    <h2>New Article</h2>
                </header>
                <div class="content">
                <form method="POST" action="/articles">
                @csrf

                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control"> 
                        <!-- old title is laravel's way of restoring values when form doesn't submit b/c of errors -->
                        <input class="input" type="text" name="title" id="title" value="{{ old('title')}}">
                        <!-- p element exists only if error -->
                        @error('title')
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea" name="excerpt" id="excerpt">{{ old('excerpt')}}</textarea>
                    </div>
                    @error('excerpt')
                        <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea" name="body" id="body">{{ old('body')}}</textarea>
                    </div>
                    @error('body')
                        <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="body">Tags</label>

                    <div class="select is-multiple control">
                        <select name="tags[]" multiple>
                          @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    @error('tags')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
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