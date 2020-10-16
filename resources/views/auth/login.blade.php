@extends('layout')

@section('styles')
<link href="/css/auth.css" rel="stylesheet">
@endsection

@section('content')
<div class="auth-container">

  <h3>Login</h3>
<form method="POST" action="{{ route('login') }}">
    @csrf
   
    <div class="session-form">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="session-form">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>



    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
    



    <button type="submit" class="btn btn-primary">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    

</form>

<!--
<div class="discription">
    <h3>What's Language Diary?</h3>
    <p>外国語で日記をつけることによって、語学力の向上を目指すサービスです。</p>
    <p>学習中の言語で毎日日記をつけ、学習の支えとしていきましょう！</p>
    <br>
    <p> You can write diary in foreign language you are learning!</p>
    <p>Let's write everyday and help your studying with Language Diary!</p>
    <br>
    <p>Você pode escrever um diário no idioma que você está aprendendo.</p>
    <p>Vamos escrever todos os dias e apoiar nosso aprendizado!</p>
    
</div>
-->

</div>


@endsection
