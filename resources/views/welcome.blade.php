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
                                @foreach($loanCategories as $key=>$loanCat)
                                <div role="tabpanel" class="tab-pane fade show @if($key == 0) active  @endif " id="service{{$loanCat->id}}">
                                    <form id="form-{{$loanCat->id}}" method="GET" action="{{route('loan.apply' )}}" >
                                        @csrf
                                        <div class="row g-2">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h2 class="fw-bold mb-3 text-capitalize ">Get {{$loanCat->name}} Loan Offers in Minutes</h2>
                                            </div>
                                            <div class="col-md-9 col-sm-12 col-12">
                                                <div>

                                                    <select class="form-select" name="loan_purpose" required >
                                                        <option value="">Select Loan Product</option>
                                                        @foreach($loanCat->products as $key=>$loanProd)
                                                        <option value="{{$loanProd->id}}">{{$loanProd->name}}</option>
                                                        @endforeach
{{--                                                        <option value="Wedding Expenses">Wedding Expenses</option>--}}
{{--                                                        <option value="Alternative Salary Advance">Alternative Salary Advance</option>--}}
{{--                                                        <option value="Emergency Expenses">Emergency Expenses</option>--}}
{{--                                                        <option value="School Fees">School Fees</option>--}}
{{--                                                        <option value="Vehicle Financing Advance">Vehicle Financing Advance</option>--}}
{{--                                                        <option value="Moving Expenses">Moving Expenses</option>--}}
{{--                                                        <option value="Vehicle Repairs">Vehicle Repairs</option>--}}
{{--                                                        <option value="Home Improvements">Home Improvements</option>--}}
{{--                                                        <option value="Vacation">Vacation</option>--}}
{{--                                                        <option value="Other">Other</option>--}}

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
                              @foreach($loanCategories as $key=>$loanCategory)
                                <li class="nav-item">
                                    <a class="nav-link @if($key == 0) active @endif rounded-0 d-grid py-3" id="tab-{{$loanCategory->id}}" data-bs-toggle="pill" href="#service{{$loanCategory->id}}" role="tab" aria-controls="{{$loanCategory->id}}" aria-selected="true"><i class="fas fa-money-bill fs-3"></i>
                                        <p class="mb-0 mt-1 fs-5 text-lowercase"> {{$loanCategory->name}}</p>
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
                        <h1 class="display-4 fw-bold text-white">Personal Loans  |</h1>
                        <div class="fw-semi-bold fs-5 "></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="text-center text-white-50">
                        <h1 class="display-4 fw-bold text-white">Business Loans  |</h1>
                        <div class="fw-semi-bold fs-5"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="text-center text-white-50">
                        <h1 class="display-4 fw-bold text-white">Arranged Loans</h1>
                        <div class="fw-semi-bold fs-5"></div>
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
                        <h1 style="color: green">How it works</h1>
                        <p>Our promise to our customers is that we will constantly streamline our processes to ensure that we have the fastest turnaround time in the market. Try our easy 2 minutes process to get your next loan.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3 style="color: green">Loan Type</h3>
                        <p>elect a loan type that is most suitable for you and use the loan calculator to determine the loan amount you wish to borrow and reasons.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3 style="color: green">Check Eligibility </h3>
                        <p>Our eligibility calculator saves you time by quickly letting you know if you should proceed with the application process or not by simulating.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3 style="color: green">Create or Login</h3>
                        <p>If you are eligible, you will be requested to create an account which will allow you access loans from Chalom and to track loan processing.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="text-center ">
                        <h3 style="color: green">Apply</h3>
                        <p> Complete your profile, upload requested documents and submit your loan application. You will get notifications as your loan is processed. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="py-lg-16 py-10 bg-white border-top border-bottom">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="text-center mb-10">--}}
{{--                        <h1 class="mb-1" style="color: green">Getting started is easy</h1>--}}
{{--                        <p class="mb-0 lead">Apply online in just 2 minutes no more document or calling required. Chalom investments believes in business, School Fees and person build through easy access access and stress free process to to obtain financial support  </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="offset-xl-1 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">--}}
{{--                            <div class="bg-white d-grid ">--}}
{{--                                <img src="{{asset('theme/borrow/assets/images/background/process-img-1.jpeg')}}" alt="Borrow - Loan Company Responsive Website Templates" class="rounded-circle img-fluid w-100">--}}
{{--                                <div class="icon-shape icon-lg bg-white border-primary border-2 border text-primary rounded-circle mt-n5 mx-auto fw-bold">--}}
{{--                                    <span>1</span></div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="offset-xl-1 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">--}}
{{--                            <div class="bg-white d-grid ">--}}
{{--                                <img src="{{asset('theme/borrow/assets/images/background/process-img-2.jpeg')}}" alt="Borrow - Loan Company Responsive Website Templates" class="rounded-circle img-fluid w-100">--}}
{{--                                <div class="icon-shape icon-lg bg-white border-primary border-2 border text-primary rounded-circle mt-n5 mx-auto fw-bold">--}}
{{--                                    <span>2</span></div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="offset-xl-1 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">--}}
{{--                            <div class="bg-white d-grid ">--}}
{{--                                <img src="{{asset('theme/borrow/assets/images/background/process-img-3.jpeg')}}" alt="Borrow - Loan Company Responsive Website Templates" class="rounded-circle img-fluid w-100">--}}
{{--                                <div class="icon-shape icon-lg bg-white border-primary border-2 border text-primary rounded-circle mt-n5 mx-auto fw-bold">--}}
{{--                                    <span>3</span></div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="py-lg-16 py-10 ">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12 col-12">--}}
{{--                    <div class="mb-10 text-center">--}}
{{--                        <!-- section title start-->--}}
{{--                        <h1 class="mb-1">Trusted By Thousands Peoples</h1>--}}
{{--                        <p class="lead">Our product list in the areas of operations are very wide, with the core being: XXXx and XXX..</p>--}}
{{--                    </div>--}}
{{--                    <!-- /.section title start-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}{{--<div class="row d-flex justify-content-center">--}}
{{--                --}}{{--<div class="col-xl-5 col-lg-6 col-md-6 col-sm-12  col-12">--}}
{{--                    --}}{{--<div class="mb-6">--}}
{{--                        --}}{{--<div class="text-warning mb-3">--}}
{{--                            --}}{{--<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>--}}
{{--                        --}}{{--</div>--}}
{{--                        --}}{{--<p class="fw-bold h4 lh-2">Excellent very easy to apply people are very helpful</p>--}}
{{--                        --}}{{--<p class="">Best company I have worked with in a long time they really know how to get the job done.--}}
{{--                        --}}{{--</p>--}}
{{--                    --}}{{--</div>--}}
{{--                    --}}{{--<div class="mt-4">--}}
{{--                        --}}{{--<h4 class="text-uppercase fs-5">Chester H. Davis</h4>--}}
{{--                    --}}{{--</div>--}}
{{--                --}}{{--</div>--}}
{{--                --}}{{--<div class="col-xl-5 col-lg-6 col-md-6 col-sm-12  col-12">--}}
{{--                    --}}{{--<div class="mb-6">--}}
{{--                        --}}{{--<div class="text-warning mb-3"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>--}}
{{--                        --}}{{--<p class=" fw-bold h4 lh-2">Simple and very smooth process easy to get loan</p>--}}
{{--                        --}}{{--<p class="">Applying for a loan with Borrow was easy and quick. I’m so thankful I found them.--}}
{{--                        --}}{{--</p>--}}
{{--                    --}}{{--</div>--}}

{{--                    --}}{{--<div class="mt-4">--}}
{{--                        --}}{{--<h4 class="text-uppercase fs-5">Linda M. Evans</h4>--}}
{{--                    --}}{{--</div>--}}
{{--                --}}{{--</div>--}}

{{--            <div class="row">--}}
{{--                <div class="row d-flex justify-content-center>--}}
{{--                    --}}{{--<div class="text-center">--}}
{{--                        --}}{{--<h3 >MISSION</h3>--}}
{{--                        --}}{{--<p>We aim for a quick disbursement of low interest rate loans to carter to the financial needs of employees,--}}
{{--                            --}}{{--parents needing school fees for their children or dependents, startups or growing corporations ( schools,--}}
{{--                            --}}{{--vendors , suppliers) needing growth in working capital  (startup schools- infrastructure projects like building classrooms,--}}
{{--                            --}}{{--labs or other facilities) </p>--}}
{{--                    --}}{{--</div>--}}
{{--                </div>--}}

{{--                        <div class="row d-flex justify-content-center>--}}
{{--                    <div class="text-center ">--}}
{{--                        <h3>MISSION </h3>--}}
{{--                        <p>We aim for a quick disbursement of low interest rate loans to carter to the financial needs of employees,--}}
{{--                            parents needing school fees for their children or dependents, startups or growing corporations ( schools,--}}
{{--                            vendors , suppliers) needing growth in working capital  (startup schools- infrastructure projects like building classrooms,--}}
{{--                            labs or other facilities) </p>--}}
{{--                    </div>--}}

{{--                    <div class="text-center ">--}}
{{--                        <h3>VISION </h3>--}}
{{--                        <p>To be the best provider in the micro finance market place for micro loans  through offering of customized,--}}
{{--                            affordable lower interest rate loan packages countrywide thereby assist our clients to achieve their social and economic freedom and improve community--}}
{{--                            livelihoods through the provisioning of collateral free and collateral based loans. </p>--}}
{{--                    </div>--}}

{{--                    <div class="text-center ">--}}
{{--                        <h3>VALUES </h3>--}}
{{--                        <p> •	Integrity--}}
{{--                            •	Confidentiality--}}
{{--                            •	Fairness--}}
{{--                            •	Accountability--}}
{{--                        </p>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                </div>--}}


{{--            <div class="row mt-8">--}}
{{--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">--}}
{{--                    <a href="#!" class="btn btn-primary">Show more review</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="py-10 py-lg-14" style="background: linear-gradient(rgba(20, 30, 40, 0.8), rgba(20, 30, 40, 0.8)),--}}
{{--  rgba(16, 75, 149, 0.8) url({{asset('theme/borrow/assets/images/background/cta-img.jpg')}}) no-repeat center;">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="text-center">--}}
{{--                        <!-- section title start-->--}}
{{--                        <h1 class="display-4 text-white">Lending solution for your every desire. Its easy</h1>--}}
{{--                        <p class="text-white-50 lead mb-6">Suilectus lobortis qus laciniaserdem proinvel.</p>--}}
{{--                        <a href="#!" class="btn btn-primary">Get Started</a>--}}
{{--                    </div>--}}
{{--                    <!-- /.section title start-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="py-12">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="offset-xl-2 col-xl-8  col-md-12 col-12">--}}
{{--                    <div class="mb-8 text-center">--}}
{{--                        <!-- section title start-->--}}
{{--                        <h1 style="color: green">Partners and Affiliations</h1>--}}
{{--                        <p class="lead">Chalom Investments Limited  partners with hundreds of lenders and banks who share a common goal of helping you achieve your dreams.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <!-- /.section title start-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-1.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-2.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-3.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">--}}
{{--                    <div class="text-center">--}}
{{--                        <a href="#!"><img src="{{asset('theme/borrow/assets/images/brand/company-logo/logo-big-4.png')}}" alt="Borrow - Loan Company Responsive Website Templates" class="img-fluid"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
