<div class="footer bg-dark pt-8 ">
    <!-- footer -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-12">
                <div class="mb-4 mb-lg-0">
                    <!-- Footer Logo -->
{{--                    <a class="navbar-brand img-thumbnail" href="{{route('welcome')}}" ><img width="100%" src="--}}
{{--         {{ asset('theme/borrow/assets/images/brand/logo/chalom_logo.png')}}" alt="Chalom" /></a>--}}
                    <img class="img-thumbnail" src="{{asset('theme/borrow/assets/images/brand/logo/chalom_logo.png')}}" alt="Chalom Loans">
                </div>
                <!-- /.Footer Logo -->
            </div>
        </div>
        <hr class="bg-gray-800 my-6">
        <div class="row mb-8">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="text-white-50 mb-3">
                    <!-- widget text -->
                    <p>Our goal at Borrow Loan Company is to provide access to personal loans and education loan, car loan, home loan at insight competitive interest rates. We are the loan provider, you can use our loan product.</p>
                    <div class="row mt-6">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="d-flex"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt text-white mt-1" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>

                                <div class="ms-3">Show Grounds Lusaka</div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6
                  col-12 mt-3 mt-md-0">
                            <div class="d-flex"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone text-white mt-1" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>

                                <div class="ms-3 fs-3">+260973284884</div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.widget text -->
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="mb-3">
                    <!-- widget footer -->
                    <ul class="list-unstyled text-muted">
                        <li class="d-flex">
                            <a href="#" class="text-inherit fs-5">
                                <i class="bi bi-chevron-right fs-6
                        me-2"></i>Home</a>
                        </li>
                        <li class="d-flex">
                            <a href="#" class="text-inherit fs-5">
                                <i class="bi bi-chevron-right fs-6
                        me-2"></i>Services</a>
                        </li>
                        <li class="d-flex">
                            <a href="#" class="text-inherit fs-5">
                                <i class="bi bi-chevron-right fs-6
                        me-2"></i>About Us</a>
                        </li>
                        <li class="d-flex">
                            <a href="#" class="text-inherit fs-5">
                                <i class="bi bi-chevron-right fs-6
                        me-2"></i>News</a>
                        </li>
                        <li class="d-flex">
                            <a href="#" class="text-inherit fs-5">
                                <i class="bi bi-chevron-right fs-6
                        me-2"></i>Faq</a>
                        </li>
                        <li class="d-flex">
                            <a href="#" class="text-inherit fs-5">
                                <i class="bi bi-chevron-right fs-6
                        me-2"></i>Contact Us</a>
                        </li>
                    </ul>
                </div>
                <!-- /.widget footer -->
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="mb-3">
                    <!-- widget footer -->
                    <ul class="list-unstyled text-muted">

                        @foreach($loan_lists as $loan_list)
                        <li class="d-flex">
                            <a href="#" class="text-inherit fs-5">
                                <i class="bi bi-chevron-right fs-6
                        me-2"></i>{{$loan_list->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.widget footer -->
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="mb-3">
                    <!-- widget footer -->


                </div>
                <!-- /.widget footer -->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <p class="fs-6 text-muted">© Copyright {{date('Y')}}  | All rights reserved. Chalom is licensed by the Ministry of Finance in Zambia</p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12
              text-md-end">
                <p class="fs-6 text-muted"><a href="#" class="text-inherit">Terms
                        of use</a> |
                    <a href="#" class="text-inherit">Privacy Policy</a></p>
            </div>
                <!-- content -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <p class="fs-6 text-muted">Design and maintained by <a href="https://www.secureserver.net/?prog_id=585270" target="_blank">pemucomputers
                        </a> Developed by <a href="https://ndinecom.com/" target="_blank">ndinecom</a></p>
                </div>
        </div>
        <div>
            <span id="siteseal"><script async type="text/javascript" src="https://seal.starfieldtech.com/getSeal?sealID=Q7ArtcjbOCVCnDmxcvocJRee0ijYN8TTvEGVtpjGFFjx21ZAiufVQpyuZYQg"></script></span>
        </div>
    </div>
</div>
