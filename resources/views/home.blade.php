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
    <h2>Introduction</h2>
    <div class="introduction">
        <img src="image/writing.jpg">
        <div class="discription">
            <p class="title">Diary</p>
            <div class="text">
                <p>You can write diary in language you are learning!</p>
                <p>Let's try to white everyday!</p>
            </div>
        </div>
    </div>

    <div class="introduction">
        <img src="image/talking.jpg">
        <div class="discription">
            <p class="title">Talk Channel</p>
            <div class="text">
                <p>You can talk with another user!</p>
                <p>It will help your study!</p>
            </div>
        </div>
    </div>
</div>

<div class="bottom">
    <div class="text-container">
        <h1>Let's try Langrow!</h1>
        <div class="login-wrapper">
            <a href="/login" class="login">Sign in</a>
            <a href="/login/guest" class="guest">Guest</a>
        </div>
    </div>
</div>

<div class="foot">
    <p>Langrow! 2021 @All right reserved.</p>
    <a href="https://github.com/hitodeface">
        <p><i class="fab fa-github"></i><p>
    </a>
</div>
@endsection