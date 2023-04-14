@extends('layouts.auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <p class="lead"> {{session()->get('message')}}</p>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <p class="lead"> {{session()->get('error')}}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf
                            <input hidden id="uuid" name="uuid" class="form-control mt-2" value="{{$uuid ?? 0}}">

                            <div class="text-center mb-4">
                                <a href="{{ route('welcome') }}">
                                    <h1 style="font-family:'Arial Rounded MT Bold'">Chalom Investments</h1>
                                </a>
                            </div>
                            <div class="text-center mb-4">
                                {{ __('Login') }}
                            </div>

                            <div class="form-label-group fa-solid fa-user">
                                <input type="tel" id="inputMobileNo" pattern="[+]{1}[0-9]{11,13}"
                                       class="form-control  @error('mobile_number') is-invalid @enderror" name="mobile_number"
                                       placeholder="Phone Number" required autofocus>
                                <label for="inputPhoneNo">{{ __('Mobile No') }}</label>
                                @error('mobile_number')
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
