@extends('layout')

@section('styles')
<link href="/css/home.css" rel="stylesheet">
@endsection

@section('content')

<div class="top">
    <img src="image/language.jpeg">
    <div class="top-title">
        <p>Open your world with Langrow!</p>
        <div class="login-wrapper">
            <a href="/login" class="login">Sign in</a>
            <a href="/login/guest" class="guest">Guest</a>
        </div>
    </div>
</div>


<div class="middle">

</div>
@endsection