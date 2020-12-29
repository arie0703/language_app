@extends('user')

@section('styles')
<link href="/css/user.css" rel="stylesheet">
@endsection


@section('right-side')
<p>{{ $user->name }}</p>
    @foreach ($posts as $post)  
    <p>{{ $post->title }}</p>
    @endforeach

    @if (Auth::user()->id != $user->id)

        <!-- すでにやりとりしているユーザーはそのままチャットルームへ飛ぶ。-->
        @if ($isRoom == true) 
            <button class="btn btn-primary" onclick="location.href='/rooms/show/{{$roomId}}'">Create Message</button>
        @else
            <form method="post" action="{{ route('room.create') }}" enctype="multipart/form-data">
                @csrf
                {{$user->id}}
                <!-- user_idをコントローラーに渡す -->
                <input class="form-control" type="hidden" placeholder="Title" name="user_id" value="{{$user->id}}">
                <button class="btn btn-primary">Create Message</button>
            </form>
        @endif
    @endif
@endsection