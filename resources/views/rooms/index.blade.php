@extends('user')

@section('styles')
<link href="/css/room.css" rel="stylesheet">
@endsection

@section('right-side')

<div class="room-wrapper">

    
    
    <div class="chat">
    @yield('chat-room')
    </div>

    <div class="entries">
    @for($i = 0; $i < count($user_entries); $i++ )
        <div class="entry-list">
            <a href="/rooms/show/{{$user_entries[$i]->room_id}}"></a>
            @if (!empty($user_info[$i]->image))
                <img src="{{ $user_info[$i]->image}}" id="img">
            @else
                <img src="/noicon.jpg" id="img">
            @endif
            <p>{{$user_info[$i]->name}}</p>
            
        </div>
    @endfor
    </div>

</div>

@endsection