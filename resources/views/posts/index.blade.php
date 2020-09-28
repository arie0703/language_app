@extends('layout')

@section('content')
  <div class="mypage-container">
    <!--　プロフィール　-->
    <div class="user-menu">
      <div class="user-profile">
        <h4>ユーザー名</h4>
      </div>

      <div class="menu">
        <a href="/">New Post</a><br>
        <a href="/">View Posts</a><br>
        <a href="/">Keep</a><br>
      </div>
      
    </div>

    <!-- 投稿表示 -->
    <div class="post-container">
    </div>

  </div>
@endsection