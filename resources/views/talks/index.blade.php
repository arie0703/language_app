@extends('user')

@section('styles')
<link href="/css/talk.css" rel="stylesheet">
@endsection

@section('scripts')
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
        @include('components.talk')
        </div>
        

    
    </div>
@endsection