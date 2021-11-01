@extends('layouts.auth.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form  class="form-signin"  method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="text-center mb-4">
                            <img class="mb-2" src="{{asset('images/brac.jpg')}}" alt="" width="220" height="72">
                        </div>
                        <div class="text-center mb-4">
                            {{ __('Reset Password') }}
                        </div>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-label-group">
                            <input type="email" id="inputEmail"
                                   class="form-control  @error('email') is-invalid @enderror" name="email"
                                   placeholder="Email address"  value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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

                        <div class="form-label-group">
                            <input type="password" id="password-confirm"
                                   class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                                   placeholder="Password" required autocomplete="current-password">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
