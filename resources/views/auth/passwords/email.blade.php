@extends('layouts.auth.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form class="form-signin" method="POST"  action="{{ route('password.email') }}">
                        @csrf

                        <div class="text-center mb-4">
                            <img class="mb-2" src="{{asset('images/brac.jpg')}}" alt="" width="220" height="72">
                        </div>
                        <div class="text-center mb-4">
                            {{ __('Reset Password') }}
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

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">
                                    {{ __('Send Password Reset Link') }}
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
