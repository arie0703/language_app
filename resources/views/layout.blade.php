<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Language Diary</title>
  @yield('styles')
  <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
<header>
  <div class="header-logo">
    <a href="/">Language Diary</a>
  </div>
  <div class="header-menu">
    @if(Auth::check())
      <span class="menu-item">ようこそ, {{ Auth::user()->name }}さん</span>
      ｜
      <a href="#" id="logout" class="menu-item">ログアウト</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @else
      <a class="menu-item" href="{{ route('login') }}">ログイン</a>
      ｜
      <a class="menu-item" href="{{ route('register') }}">会員登録</a>
    @endif
  </div>
</header>
<main>
  @yield('content')
</main>
</body>
</html>