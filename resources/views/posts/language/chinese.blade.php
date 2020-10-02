@extends('user')

@section('styles')
<link href="/css/post.css" rel="stylesheet">
@endsection

@section('posts')
  @foreach ($posts as $post)
  <div class="post-wrapper">
    <h4>{{ $post->title }}</h4>
    <p>{{ $post->body }}</p><br>
    <p class="post-info">{{ $post->created_at }}</p>
    <p class="post-info">Written in <span>{{ $post->language }}</span></p>
  </div>
  @endforeach
@endsection