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
      <span class="menu-item">Hi, {{ Auth::user()->name }} !</span>
      ｜
      <a href="#" id="logout" class="menu-item">Sign out</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @else
      <a class="menu-item" href="{{ route('login') }}">Sign in</a>
      ｜
      <a class="menu-item" href="{{ route('register') }}">Register</a>
    @endif
  </div>
</header>
<main>
  @yield('content')
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@yield('scripts')
</body>
</html>