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
    <a href="{{ route('posts.edit') }}?id={{ $post->id }}">Edit</a>
    <a href="{{ route('posts.delete') }}?id={{ $post->id }}">Delete</a>
  </div>
  @endforeach
@endsection