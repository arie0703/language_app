@extends('user')

@section('styles')
<link href="/css/talk.css" rel="stylesheet">
@endsection

@section('scripts')
<script href="/js/modal.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection

@section('right-side')
    <div class="page-wrapper">
        <p class="title">Talk Channel</p>
        <p>You can recruit friends who talk with you!</p>

        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-example">
            New
        </button>

        @include('components.modal')

        
        <div class="talks">
            @foreach ($talks as $talk)
                <div class="talk-wrapper">
                    <h4>{{ $talk->title }}</h4>
                    
                    
                    <p>{!! nl2br($talk->body) !!}</p><br>
                    <div class="talk-info">
                        <p>{{ $talk->language }} / {{ $talk->tool }}</p>
                        <p>{{ $talk->created_at }}</p>

                    </div>
                </div>

        
            @endforeach
        </div>
    
    </div>
@endsection