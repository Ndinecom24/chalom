@extends('layouts.website.main')

@section('content')

    <div class="pt-18 pb-10" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), rgba(0, 0, 0, 0.2) url({{asset('theme/borrow/assets/images/slider/slider-2.jpg')}}) no-repeat center;
    background-size: cover;
  }

  ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white p-5 rounded-top-md">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="mb-0">Contact Us</h1>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <a href="{{route('company.how_to_apply')}}" class="btn btn-primary">How To Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <ul class="nav nav-fill nav-pills-gray-fill">
                            <li class="nav-item ">
{{--                                <a href="{{route('company.about')}}" class="nav-link">Give me call back</a>--}}
                            </li>
                            <li class="nav-item">
{{--                                <a href="#!" class="nav-link">Emi Caculator</a>--}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-n6 bg-white mb-10 rounded-3 shadow-sm p-lg-10 p-5">
                    <div class="mb-8">

                        <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="mb-6  text-center  ">
                                <!-- section title start-->
                                <h1 class="mb-0" style="color: green"><strong>Get In Touch</strong></h1>
                                <p>Reach out to us &amp; we will respond as soon as we can.</p>
                            </div>
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
                            {{ csrf_field() }}
                            <div>
                                <!-- Text input-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Email:</strong>
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Phone:</strong>
                                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Subject:</strong>
                                            <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                                            @if ($errors->has('subject'))
                                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <strong>Message:</strong>
                                            <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="text-danger">{{ $errors->first('message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group mt-4">
                                    <button class="btn btn-success btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.section title start-->
                    <div class="contact-us mb-8">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="mb-6">
                                    <!-- section title start-->
                                    <h1 style="color: green">We are here to help you </h1>
                                    <p class="lead">Our customers are assured of quick turn around time; flexible terms; transparent rates and fixed repayments.</p>
                                </div>
                                <!-- /.section title start-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
                                <div class="card shadow-sm text-center h-100">
                                    <div class="card-body">
                                        <div class="my-5"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                                               class="bi bi-briefcase text-primary" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                                            </svg></div>
                                        <h4 class="text-uppercase text-primary fw-semi-bold mb-2">Head Office</h4>
                                        <p>Plot 382A/60 Meanwood Ibex Hill
                                            <br> Lusaka City, ZAMBIA</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
                                <div class="card shadow-sm text-center h-100">
                                    <div class="card-body">
                                        <div class="my-5"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                                               class="bi bi-telephone-inbound text-primary" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                            </svg></div>
                                        <h4 class="text-uppercase text-primary fw-semi-bold mb-2">Call us at </h4>
                                        <h2 class="text-big">+260973284884 </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
                                <div class="card shadow-sm text-center h-100">
                                    <div class="card-body">
                                        <div class="my-5"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                                               class="bi bi-envelope-open text-primary" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z" />
                                            </svg></div>
                                        <h4 class="text-uppercase text-primary fw-semi-bold">Email Address</h4>
                                        <p>info@chalominvestiments.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
