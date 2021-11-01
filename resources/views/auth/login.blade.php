@extends('layouts.auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="text-center mb-4">
                                <img class="mb-2" src="{{asset('images/brac.jpg')}}" alt="" width="220" height="72">
                            </div>
                            <div class="text-center mb-4">
                                {{ __('Login') }}
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="inputEmail"
                                       class="form-control  @error('email') is-invalid @enderror" name="email"
                                       placeholder="Email address" required autofocus>
                                <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       placeholder="Password" required autocomplete="current-password">
                                <label for="inputPassword">{{ __('Password') }}</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                                           value="Login">
                                </div>
                                <div class="col-md-7">
                                    <p class="mt-3 text-uppercase font-weight-bold text-center">
                                        <a href="{{ route('register') }}">Register</a> a new account.</p>
                                </div>
                                <div class="col-md-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
