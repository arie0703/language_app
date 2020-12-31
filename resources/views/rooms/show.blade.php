@extends('rooms/index')

@section('styles')
<link href="/css/room.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="/js/ajax/message.js"></script>
@endsection


@section('chat-room')
<!-- 第三者がDMを見れないようにする -->
@if($current_user == null)
    <p>{{$error_msg}}</p>
@else
    <p>{{$another_user}} and {{$current_user}}'s chat room</p>
    <input type="hidden" class="form-control" id="room-id" placeholder="Type User Name" name="room-id" value="{{$id}}">
        <div class="message-wrapper">
            <div id="scroll">
                <div id="messages"></div>
                <!--
                @foreach($messages as $m ) 
                    
                    @if( $m->user_id == Auth::user()->id )
                        <div class="right-message">
                            <p>{{$m->content}}</p>
                        </div>
                    @else
                        <div class="left-message">
                            <p>{{$m->content}}</p>
                        </div>
                    @endif
                    
                    
                @endforeach
                -->
            </div> 
        </div>
        
        <form method="post" action="{{ route('message.create') }}" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="hidden" name="room_id" value="{{$room->id}}">
            <input class="form-control" type="text" placeholder="message" name="content" value="{{ old('content') }}">
            <button class="btn btn-primary">Send Message</button>
        </form>
        
        <!--
        <div class="post-area">
            <input type="text" class="form-control" id="message-content" placeholder="Message">
            <button type="button" id="post-btn" class="btn btn-primary">Send</button>
        </div>
        -->
    


@endif
@endsection