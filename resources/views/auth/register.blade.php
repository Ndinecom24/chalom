@extends('layouts.auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" method="post" action="{{ route('register') }}">
                            @csrf

                            <div class="text-center mb-4">
                                <a href="{{ route('welcome') }}">
                                    <img class="mb-2" src="{{asset('images/chalom_logo.png')}}" alt="" width="220" height="72">
                                </a>                            </div>
                            <div class="text-center mb-4">
                                {{ __('Register Account') }}
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-12">

                                    <select class="form-control  @error('title') is-invalid @enderror " id="title" name="title" required>
                                        <option selected disabled >--Title--</option>
                                        <option>Mr.</option>
                                        <option>Mrs.</option>
                                        <option>Miss.</option>
                                        <option>Dr.</option>
                                        <option>Rev</option>
                                        <option>Dr.</option>
                                        <option>SC.</option>

                                    </select>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-label-group">
                                <input type="text" id="inputFullName"
                                       class="form-control  @error('name') is-invalid @enderror" name="name"
                                       placeholder="Full Name" required autofocus>
                                <label for="inputFullName">{{ __('Full Name') }}</label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="inputMobileNo"
                                       class="form-control  @error('mobile_number') is-invalid @enderror" name="mobile_number"
                                       placeholder="Mobile No" required autofocus>
                                <label for="inputMobileNo">{{ __('Mobile No') }}</label>
                                @error('mobile_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

                            <div class="form-label-group">
                                <input type="password" id="inputPasswordConfirmation"
                                       class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                       placeholder="Password Confirmation" required autocomplete="current-password">
                                <label for="inputPasswordConfirmation">{{ __('Password Confirmation') }}</label>
                            </div>

                            <div class="form-label-group">
                                <select hidden id="roles_id" name="roles_id"  class="form-control">
                                    <option class="form-control" value="{{config('constants.role.client.id')}}">{{config('constants.role.client.name')}}</option>
                                </select>
                                <select hidden id="customer_types_id" name="customer_types_id"  class="form-control">
                                    <option class="form-control" value="{{config('constants.customer_type.new')}}">{{config('constants.customer_type.new')}}</option>
                                </select>
                                <input readonly id="uuid" name="uuid" class="form-control mt-2" value="{{$uuid ?? 0}}">
                                <input hidden id="status_id" name="status_id" class="form-control mt-2" value="{{config('constants.status.application')}}">
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"
                                           value="Register">
                                </div>
                                <div class="col-md-12">
                                    <p class="mt-3 text-uppercase font-weight-bold text-center">
                                        <a href="{{ route('login') }}">Login</a> to your account.</p>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
