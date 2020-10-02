@extends('user')

@section('styles')
<link href="/css/post.css" rel="stylesheet">
@endsection

@section('posts')
<form method="post" action="{{ route('posts.update') }}" enctype="multipart/form-data">
    <div class="post-form">
        {{ csrf_field() }}
        <input type='hidden' name='id' value='{{ $post->id }}'><br>

        <div class="form-title">
            <input class="form-control" type="text" placeholder="Title" name="title" value="{{ $post->title }}">
        </div>

        <div class="form-body">
            <textarea class="form-control" type="text" name="body" cols="50" rows="10">{{ $post->body }}</textarea>        
        </div>

        <div class="form-language">
        <select name="language" class="form-control">
          <option selected="selected" value="{{ $post->language }}">Language</option>
          <option value="English">English</option>
          <option value="German">German</option>
          <option value="French">French</option>
          <option value="Spanish">Spanish</option>
          <option value="Portuguese">Portuguese</option>
          <option value="Russian">Russian</option>
          <option value="Japanese">Japanese</option>
          <option value="Chinese">Chinese</option>
          <option value="Corean">Corean</option>
        </select>
        </div>

        <div class="form-submit">
            <button type="submit">Post</button>
        </div>
    </div>
</form>
@endsection