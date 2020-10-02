@extends('layout')

@section('content')
  <div class="mypage-container">
    <!--　プロフィール　-->
    <div class="user-menu">

      <div class="user-profile">
        <h4>{{ Auth::user()->name }}</h4>
      </div>

      <div class="user-img">
      @if (!empty(Auth::user()->image))
      <img src="storage/storage/{{ Auth::user()->image}}" id="img">
      @else
      <img src="storage/noicon.jpg" id="img">
      @endif
      </div>

      <div class="menu">
        <a href="/user/edit">Edit Profile</a><br><br>
        <a href="/post">New Post</a><br>
        <a href="/">My Posts</a><br>
        <a href="/">Keep</a><br>
      </div>
      <br>
      <div class="timeline">
        <p>- Language Timeline -</p>
        <a href="/english">English</a><br>
        <a href="/french">French</a><br>
        <a href="/german">German</a><br>
        <a href="/spanish">Spanish</a><br>
        <a href="/portuguese">Portuguese</a><br>
        <a href="/russian">Russian</a><br>
        <a href="/japanese">Japanese</a><br>
        <a href="/chinese">Chinese</a><br>
        <a href="/korean">Korean</a><br>
      </div>
      
    </div>

    <!-- 投稿表示 -->
    <div class="post-container">
    @yield('posts')
    </div>

  </div>
@endsection