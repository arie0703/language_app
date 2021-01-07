@extends('user')

@section('styles')
<link href="/css/user.css" rel="stylesheet">
@endsection


@section('right-side')
    
    <div class="profile">
        <div class="profile-top">
            @if (!empty($user->image))
                <img src="{{ $user->image}}" id="img">
            @else
                <img src="/noicon.jpg" id="img">
            @endif
            <p class="name">{{ $user->name }}</p>
        </div>


        <p>Diary: {{count($posts)}}</p>

        @if (Auth::user()->id != $user->id)
            <!-- すでにやりとりしているユーザーはそのままチャットルームへ飛ぶ。-->
            @if ($isRoom == true) 
                <button class="btn btn-primary" onclick="location.href='/rooms/show/{{$roomId}}'">Chat</button>
            @else
                <form method="post" action="{{ route('room.create') }}" enctype="multipart/form-data">
                    @csrf
                    {{$user->id}}
                    <!-- user_idをコントローラーに渡す -->
                    <input class="form-control" type="hidden" placeholder="Title" name="user_id" value="{{$user->id}}">
                    <button class="btn btn-primary">Chat</button>
                </form>
            @endif
        @endif
        
    
    </div>
    

    
@endsection