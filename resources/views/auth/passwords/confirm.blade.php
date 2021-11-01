@extends('layouts.auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form  class="form-signin"  method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="text-center mb-4">
                                <img class="mb-2" src="{{asset('images/brac.jpg')}}" alt="" width="220" height="72">
                            </div>
                            <div class="text-center mb-4">
                                {{ __('Confirm Password') }}
                                {{ __('Please confirm your password before continuing.') }}
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

                            <div class="row">
                                <div class="col-md-12">
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="{{ __('Confirm Password') }}"
                                           value="{{ __('Confirm Password') }}">
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
