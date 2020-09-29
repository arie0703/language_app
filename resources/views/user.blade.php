@extends('layout')

@section('content')
  <div class="mypage-container">
    <!--　プロフィール　-->
    <div class="user-menu">

      <div class="user-profile">
        <h4>{{ Auth::user()->name }}</h4>
      </div>

      <div class="user-img">
      </div>

      <div class="menu">
        <a href="/post">New Post</a><br>
        <a href="/">View Posts</a><br>
        <a href="/">Keep</a><br>
      </div>
      <br>
      <div class="timeline">
        <p>- Language Timeline -</p>
        <a href="/english">English</a><br>
        <a href="/">French</a><br>
        <a href="/">German</a><br>
        <a href="/">Spanish</a><br>
        <a href="/">Portuguese</a><br>
        <a href="/">Russian</a><br>
        <a href="/">Japanese</a><br>
        <a href="/">Chinese</a><br>
        <a href="/">Korean</a><br>
      </div>
      
    </div>

    <!-- 投稿表示 -->
    <div class="post-container">
    @yield('posts')
    </div>

  </div>
@endsection