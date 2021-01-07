@extends('user')

@section('styles')
<link href="/css/post.css" rel="stylesheet">
@endsection

@section('right-side')

  @if(count($posts) == 0 )
  <p>You have not yet posted.</p>
  @endif

  @foreach ($posts as $post)
  <div class="post-wrapper">
    <h4>
      {{ $post->title }} 

      <!-- Stateが1ならprivate -->
      @if($post->state == 1)
        <i class="fas fa-lock"></i>
      @endif
    
    </h4>
    
    <p>{!! nl2br($post->body) !!}</p><br> 
    @if (!empty( $post->image))
      <img src="{{ $post->image }}" id="img"><br>
    @endif
    <p class="post-info">{{ $post->created_at }}</p>
    <p class="post-info">Written in <span>{{ $post->language }}</span></p>
    <a href="{{ route('posts.edit') }}?id={{ $post->id }}">Edit</a>
    <a href="{{ route('posts.delete') }}?id={{ $post->id }}">Delete</a>
  </div>
  @endforeach
@endsection