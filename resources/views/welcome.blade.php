@extends('layouts.website.main')

@section('content')

    <div class="py-22" style="background:url({{asset('theme/borrow/assets/images/slider/slider-2.jpg')}})no-repeat; background-position: center; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 ">
                    <div>
                        <div>
                            <!-- Nav tabs -->
                            <div class="tab-content bg-white p-6 rounded-top-md smooth-shadow-sm">
                                @foreach($loanProducts as $key=>$loanProd)
                                <div role="tabpanel" class="tab-pane fade show @if($key == 0) active  @endif " id="service{{$loanProd->id}}">
                                    <form id="form-{{$loanProd->id}}" method="GET" action="{{route('loan.apply', $loanProd )}}" >
                                        @csrf
                                        <div class="row g-2">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h2 class="fw-bold mb-3 text-capitalize ">Get {{$loanProd->name}} Loan Offers in Minutes</h2>
                                            </div>
                                            <div class="col-md-9 col-sm-12 col-12">
                                                <div>

                                                    <select class="form-select" name="loan_purpose">
                                                        <option value="Select Loan Purpose">Select Loan Purpose</option>
                                                        <option value="Debt Consolidation">Debt Consolidation</option>
                                                        <option value="Wedding Expenses">Wedding Expenses</option>
                                                        <option value="Alternative Salary Advance">Alternative Salary Advance</option>
                                                        <option value="Emergency Expenses">Emergency Expenses</option>
                                                        <option value="School Fees">School Fees</option>
                                                        <option value="Vehicle Financing Advance">Vehicle Financing Advance</option>
                                                        <option value="Moving Expenses">Moving Expenses</option>
                                                        <option value="Vehicle Repairs">Vehicle Repairs</option>
                                                        <option value="Home Improvements">Home Improvements</option>
                                                        <option value="Vacation">Vacation</option>
                                                        <option value="Other">Other</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12 col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Get Your Loan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                @endforeach
                            </div>
                            <ul class="nav nav-pills nav-justified bg-white border-top flex-nowrap overflow-scroll overflow-md-hidden" id="myTab" role="tablist">
                              @foreach($loanProducts as $key=>$loanProduct)
                                <li class="nav-item">
                                    <a class="nav-link @if($key == 0) active @endif rounded-0 d-grid py-3" id="tab-{{$loanProduct->id}}" data-bs-toggle="pill" href="#service{{$loanProduct->id}}" role="tab" aria-controls="{{$loanProduct->id}}" aria-selected="true"><i class="fas fa-money-bill fs-3"></i>
                                        <p class="mb-0 mt-1 fs-5 text-lowercase"> {{$loanProduct->name}}</p>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                            <!-- Tab panes -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-primary py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="text-center text-white-50">
                        <h1 class="display-4 fw-bold text-white">15 Billion</h1>
                        <div class="fw-semi-bold fs-5 ">Customers Empowered</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="text-center text-white-50">
                        <h1 class="display-4 fw-bold text-white">1.5 Billion+</h1>
                        <div class="fw-semi-bold fs-5">Customer</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="text-center text-white-50 ">
                        <div class="text-warning display-5 mb-2 lh-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                        <div class="fw-semi-bold fs-5">Average Customer Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-10 py-lg-14 bg-light">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="text-center mb-8">
                        <h1>Why take a loan with us?</h1>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus maximus lorem id arcu sagittis, in euismod erat faucibus. Nullam rutrum suscipit velit nec simply dummy content gravida. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3>Fast</h3>
                        <p>Borrow processes your application and your loan - no third iesnsectetur ultriciesi.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3>Flexible </h3>
                        <p>Apply online in just minutes no more document or callequired simpmy content.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3>Great rates</h3>
                        <p>The generated Lorem Ipsum is free from repetitionected humooc words etc. </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3>Reviews</h3>
                        <p> Nunc at sapien bibendum, dapibus dolo sodalauciapibus nibh varius egestas. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-lg-16 py-10 bg-white border-top border-bottom">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="text-center mb-10">
                        <h1 class="mb-1">Getting started is easy</h1>
                        <p class="mb-0 lead">Apply online in just minutes no more document or calling required </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="offset-xl-1 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                            <div class="bg-white d-grid ">
                                <img src="{{asset('theme/borrow/assets/images/background/process-img-1.jpeg')}}" alt="Borrow - Loan Company Responsive Website Templates" class="rounded-circle img-fluid w-100">
                                <div class="icon-shape icon-lg bg-white border-primary border-2 border text-primary rounded-circle mt-n5 mx-auto fw-bold">
                                    <span>1</span></div>

                            </div>
                        </div>
                        <div class="offset-xl-1 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                            <div class="bg-white d-grid ">
                                <img src="{{asset('theme/borrow/assets/images/background/process-img-2.jpeg')}}" alt="Borrow - Loan Company Responsive Website Templates" class="rounded-circle img-fluid w-100">
                                <div class="icon-shape icon-lg bg-white border-primary border-2 border text-primary rounded-circle mt-n5 mx-auto fw-bold">
                                    <span>2</span></div>

                            </div>
                        </div>
                        <div class="offset-xl-1 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
                            <div class="bg-white d-grid ">
                                <img src="{{asset('theme/borrow/assets/images/background/process-img-3.jpeg')}}" alt="Borrow - Loan Company Responsive Website Templates" class="rounded-circle img-fluid w-100">
                                <div class="icon-shape icon-lg bg-white border-primary border-2 border text-primary rounded-circle mt-n5 mx-auto fw-bold">
                                    <span>3</span></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-lg-16 py-10 ">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">
                    <div class="mb-10 text-center">
                        <!-- section title start-->
                        <h1 class="mb-1">Trusted By Thousands Peoples</h1>
                        <p class="lead">What people are saying about us product and service.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12  col-12">
                    <div class="mb-6">
                        <div class="text-warning mb-3">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="fw-bold h4 lh-2">Excellent very easy to apply people are very helpful</p>
                        <p class="">Best company I have worked with in a long time they really know how to get the job done.
                        </p>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-uppercase fs-5">Chester H. Davis</h4>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12  col-12">
                    <div class="mb-6">
                        <div class="text-warning mb-3"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                        <p class=" fw-bold h4 lh-2">Simple and very smooth process easy to get loan</p>
                        <p class="">Applying for a loan with Borrow was easy and quick. I’m so thankful I found them.
                        </p>
                    </div>

                    <div class="mt-4">
                        <h4 class="text-uppercase fs-5">Linda M. Evans</h4>
                    </div>
                </div>
            </div>


            <div class="row mt-8">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <a href="#!" class="btn btn-primary">Show more review</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-10 py-lg-14" style="background: linear-gradient(rgba(20, 30, 40, 0.8), rgba(20, 30, 40, 0.8)),
  rgba(16, 75, 149, 0.8) url({{asset('theme/borrow/assets/images/background/cta-img.jpg')}}) no-repeat center;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-center">
                        <!-- section title start-->
                        <h1 class="display-4 text-white">Lending solution for your every desire. Its easy</h1>
                        <p class="text-white-50 lead mb-6">Suilectus lobortis qus laciniaserdem proinvel.</p>
                        <a href="#!" class="btn btn-primary">Get Started</a>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8  col-md-12 col-12">
                    <div class="mb-8 text-center">
                        <!-- section title start-->
                        <h1>Our Lenders</h1>
                        <p class="lead">We partner with hundreds of lenders and banks who share a common goal of helping you achieve your dreams.
                        </p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="text-center">
                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-1.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="text-center">
                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-2.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="text-center">
                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-3.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="text-center">
                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-4.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
