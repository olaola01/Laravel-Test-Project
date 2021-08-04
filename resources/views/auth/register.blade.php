@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
{{--            <p>--}}
{{--                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>--}}
{{--                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>--}}
{{--            </p>--}}
{{--            <p class="divider-text">--}}
{{--                <span class="bg-light">OR</span>--}}
{{--            </p>--}}
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" type="text" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input id="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address" type="email" required autocomplete="email">
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
                    <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Create password" type="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input id="password-confirm" name="password_confirmation" class="form-control" placeholder="Repeat password" type="password" required autocomplete="new-password">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="{{ route('login') }}">Log In</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->
            </div>
        </div>
    </div>

<!--container end.//-->

@endsection

@section('css')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">--}}

@endsection
