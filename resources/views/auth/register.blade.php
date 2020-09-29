@extends('layout')

@section('styles')
<link href="/css/auth.css" rel="stylesheet">
@endsection

@section('content')
<div class="auth-container">

<h3>Welcome to Language Diary!</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="session-form">
            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    

    
        <div class="session-form">
            <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <div class="session-form">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    
        <div class="session-form">
            <input id="password-confirm" type="password" placeholder="Password(confirm)" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group row mb-0">
            <div class="session-form offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
