@extends('user')

@section('styles')
<link href="/css/talk.css" rel="stylesheet">
@endsection

@section('right-side')
    <div class="page-wrapper">
        <div class="show">
            <p>{{$talk->title}}</p>
            <p>{!! nl2br($talk->body) !!}</p>
            <p>{{$talk->language}} / {{$talk->tool}}</p>
            <p>
                <i class="fas fa-link"></i>
                {{$talk->link}}
            </p>

            <div class="user-profile">
                @if (!empty($user->image))
                    <img src="/storage/storage/{{ $user->image}}" id="img">
                @else
                    <img src="/storage/noicon.jpg" id="img">
                @endif

                <p><a href="/user/show?id={{$talk->user_id}}">{{$user->name}}</a></p>
            </div>
        </div>
        
    
    </div>
@endsection