@extends('layouts.auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mb-4">
                            <a href="{{ route('welcome') }}">
                                <img class="mb-2" src="{{asset('images/brac.jpg')}}" alt="" width="220" height="72">
                            </a>                        </div>
                        <div class="text-center mb-4">
                            {{ __('Verify Your Email Address') }}
                        </div>

                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form  class="form-signin"  method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

