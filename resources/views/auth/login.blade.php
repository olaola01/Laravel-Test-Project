@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
<div class="card bg-light" >
    <article class="card-body mx-auto" style="width: 400px;">
        <h4 class="card-title mt-3 text-center">Login</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input id="email" style='width: 300px' name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address" type="email" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>

                <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" type="password"  required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>
            <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Register</a> </p>

        </form>
    </article>
</div> <!-- card.// -->
            </div>
        </div>
    </div>

</div>
<!--container end.//-->
@endsection

@section('css')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">--}}
@endsection
