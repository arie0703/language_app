@extends('user')

@section('styles')
<link href="/css/post.css" rel="stylesheet">
@endsection

@section('right-side')
<form method="post" action="{{ route('posts.remove', $post->id) }}">
{{ csrf_field() }}

    <div class="post-form">
    <h4>Are you sure you want to completely remove post below?</h4>
        <div class="post-wrapper">
            <h4>{{ $post->title }}</h4>
            <p>{!! nl2br($post->body) !!}</p><br>
            @if (!empty( $post->image))
            <img src="/storage/{{ $post->image }}" id="img"><br>
            @endif
            <p class="post-info">{{ $post->created_at }}</p>
            <p class="post-info">Written in <span>{{ $post->language }}</span></p>
            <a href="{{ route('posts.edit') }}?id={{ $post->id }}">Edit</a>
            <a href="{{ route('posts.delete') }}?id={{ $post->id }}">Delete</a>
        </div>

        <div class="form-submit">
            <input type="submit" class="btn btn-danger" value='delete'>
        </div>
    </div>
</form>
@endsection