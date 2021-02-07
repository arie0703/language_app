@extends('rooms/index')

@section('styles')
<link href="/css/room.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="/js/axios/message.js"></script>
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

                <!-- Vueファイルを読み込む -->
                <div id="app">
                    <section v-if="hasError" v-cloak>
                        <p>Error!</p>
                    </section>

                    <section v-else>
                        <div class="message" v-for="(message) in messages" v-cloak>
                            <div v-if="message.user_id == current_user"class="right-message">
                                <p>@{{ message.content }}</p>
                            </div>

                            <div v-if="message.user_id != current_user"class="left-message">
                                <p>@{{ message.content }}</p>
                            </div>
                        </div>
                    </section>
                </div>
                
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