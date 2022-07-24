@extends('layouts.website.main')

@section('content')

    <div class="pt-18 pb-10" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), rgba(0, 0, 0, 0.2) url({{asset('theme/borrow/assets/images/slider/slider-2.jpg')}}) no-repeat center;
  background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white p-5 rounded-top-md">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="mb-0">About</h1>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <a href="{{route('company.contact')}}" class="btn btn-primary">How To Apply</a>
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
                <div class="mt-n6 bg-white mb-10 rounded-3 shadow-sm">

                    <div class="p-5 p-lg-10">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <h2 class="mb-4">Who We Are?</h2>
                                <p class="lead mb-4">
                                    Chalom Investments Limited is a wholly Zambian owned company, duly registered in accordance with the provision of registration business names Act (Cap 389 of the Laws of Zambia). It was incorporated 22nd September 2020 and has since been fully operational.
                                    Chalom Investments Limited fully operates in the domain of Money Lending, and Agricultural Services.
                                    Our product list in the areas of operations are very wide, with the core being Money Lending.
                                </p>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-8">
                                    <h2 class="mb-4">What We Offer?</h2>
                                    <p class="lead mb-4">
                                        Our loan sanction is one of the quickest with easy
                                        documentation and turn around time of 2 Minutes
                                    </p>

                                </div>
                            </div>
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="text-center pt-6 pb-1">
                                    <h2>Our Vision Mission & Values</h2>
                                    <p>
                                        We aim for a quick disbursement of low interest rate loans to carter to the financial needs of employees,
                                        parents needing school fees for their children or dependents, startups or growing corporations (schools, vendors, suppliers)
                                        needing growth in working capital (startup schools- infrastructure projects like building classrooms, labs or other facilities)

                                        To be the best provider in the micro finance market place for micro loans through offering of customized,
                                        affordable lower interest rate loan packages countrywide thereby assist our clients to achieve their social and economic
                                        freedom and improve community livelihoods through the provisioning of collateral free and collateral based loans.
                                    </p>
                                        <p>
                                        Integrity
                                        Confidentiality
                                        Fairness
                                        Accountability
                                        </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-lg-10 p-5 bg-light-primary">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-center mb-6 mb-md-0">
                                    <div class="mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                             class="bi bi-people text-primary" viewBox="0 0 16 16">
                                            <path
                                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                        </svg>
                                    </div>
                                    <h1 class="display-4 fw-bold mb-0">3000+</h1>
                                    <div class="text-dark fs-5">Customers Empowered</div>

                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-center mb-6 mb-md-0">
                                    <div class="mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                             class="bi bi-currency-dollar text-primary" viewBox="0 0 16 16">
                                            <path
                                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                        </svg>
                                    </div>
                                    <h1 class="display-4 fw-bold mb-0">5000,000+</h1>
                                    <div class="text-dark fs-5">Borrowed</div>

                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-center ">
                                    <div class="mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                             class="bi bi-chat-left-text text-primary" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </div>
                                    <div class="mb-0 fs-3 text-dark ">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill ms-1"></i><i
                                            class="bi bi-star-fill ms-1"></i><i class="bi bi-star-fill ms-1"></i><i
                                            class="bi bi-star-fill ms-1"></i>
                                    </div>
                                    <div class="text-dark fs-5">Customer Rating</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-lg-10 p-5">
                        <div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-center mb-8">
                                        <h2>Why apply with us</h2>
                                        <p>
                                            We want to give every citizen access to financial opportunities
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="text-center mb-4">
                                        <h3 class="mb-2">Multiple Loan Options</h3>
                                        <p>
                                            We offer a wide range of loans and flexible repayment terms
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="text-center mb-4">
                                        <h3 class="mb-2">Competitive Rate</h3>
                                        <p>
                                            Currently Chalom is the best in terms of low rates for all types of loans
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="text-center mb-4">
                                        <h3 class="mb-2">Safe &amp; Secure</h3>
                                        <p>
                                            Our clients are assured of safe and secure loans.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-lg-10 p-5 ">
                        <div class="container">
                            <div class="row">
                                <div class="offset-xl-2 col-xl-8  col-md-12 col-12">
                                    <div class="mb-8 text-center">
                                        <!-- section title-->
                                        <h1 class="mb-1">We are Here to Help You</h1>
                                        <p class="lead">Our mission is to deliver reliable, latest news and opinions.</p>
                                    </div>
                                    <!-- /.section title-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card mb-3 mb-lg-0 text-center">
                                        <div class="card-body p-6">
                                            <div class="mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                                   fill="currentColor" class="bi bi-calendar3 text-primary" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                    <path
                                                        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                </svg></div>
                                            <h4 class="mb-3 text-uppercase fw-semi-bold">Apply For Loan</h4>
                                            <p class="mb-4">Looking for a loan that best suits your needs.</p>
                                            <a href="#!" class="btn-link border-bottom border-primary border-2 fw-bold fs-5">Get
                                                Appointment</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card mb-3 mb-lg-0 text-center">
                                        <div class="card-body p-6">
                                            <div class="mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                                   fill="currentColor" class="bi bi-telephone text-primary" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                </svg></div>
                                            <h4 class="mb-3 text-uppercase fw-semi-bold">Call us at </h4>
                                            <h1 class="fs-3">+260 97328 4884
                                            </h1>
                                            <p> <a href="#" class="fs-5">lnfo@chalominvestments.com</a></p>
                                            <a href="#!" class="btn-link border-bottom border-primary border-2 fw-bold fs-5">Contact
                                                us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card mb-3 mb-lg-0  text-center">
                                        <div class="card-body p-6">
                                            <div class="mb-5"> <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                                    fill="currentColor" class="bi bi-people text-primary" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                                </svg></div>
                                            <h4 class="mb-3 text-uppercase fw-semi-bold">Talk to Advisor</h4>
                                            <p class="mb-4">Need to loan advise? Talk to our Loan advisors.</p>
                                            <a href="{{route('company.contact')}}" class="btn-link border-bottom border-primary border-2 fw-bold fs-5">Meet
                                                The Advisor</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.content end -->

@endsection
