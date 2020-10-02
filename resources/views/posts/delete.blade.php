@extends('user')

@section('styles')
<link href="/css/post.css" rel="stylesheet">
@endsection

@section('posts')
<form method="post" action="{{ route('posts.remove') }}">
{{ csrf_field() }}
    <div class="post-form">
        <input type='hidden' name='id' value='{{ $post->id }}'><br>
        <p>Title: {{ $post->title }}</p>
        <p>Body: {{ $post->body }}</p>
        <p>Language: {{ $post->language }}</p>

        <div class="form-submit">
            <input type="submit" value='delete'>
        </div>
    </div>
</form>
@endsection