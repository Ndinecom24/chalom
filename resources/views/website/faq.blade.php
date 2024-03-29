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
                                <h1 class="mb-0">FAQ</h1>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <a href="{{route('company.contact')}}" class="btn btn-primary">Contact Us Here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <ul class="nav nav-fill nav-pills-gray-fill">
                            <li class="nav-item ">
{{--                                <a href="{{route('company.contact')}}" class="nav-link">Give me call back</a>--}}
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
                <div class="mt-n6 bg-white mb-10 rounded-3 shadow-sm p-5">
                    <div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="mb-3">
                                    <h2 class="mb-0">General Questions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="accordion" id="Faqaccordionsone">
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqOne">
                                            <h4 class="mb-0">
                                                <a href="#!" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="fa fa-plus-circle me-1 "></i>
                                                    How much can I borrow?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="faqOne" data-bs-parent="#Faqaccordionsone">
                                            <div class="card-body border-top">
                                                At Chalom Investments Limited we value all our clients both prospects clients and the returning. We dont limit amount a clients can borrow.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqTwo">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="fa fa-plus-circle me-1 "></i>
                                                    Can I pay off my loan early?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="faqTwo" data-bs-parent="#Faqaccordionsone">
                                            <div class="card-body border-top">
                                                Yes a client can choose to pay for the loan earlier than the agreed time or period. This also benefit clients as they earn less percentage
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqThree">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="fa fa-plus-circle me-1 "></i>
                                                    Do you offer refinancing ?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="faqThree" data-bs-parent="#Faqaccordionsone">
                                            <div class="card-body border-top">
                                                Yes we do offer Loan refinancing depending on conditions set and agreed on with both parties.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqFour">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    <i class="fa fa-plus-circle me-1 "></i>
                                                    When should i apply?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="faqFour" data-bs-parent="#Faqaccordionsone">
                                            <div class="card-body border-top">
                                                We have made the process so easy as you can initiate the loan application process from the comfort of you home online.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div>
                                    <h2 class="mb-3">About Chalom</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="accordion" id="Faqaccordiontwo">
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqFive">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    <i class="fa fa-plus-circle me-1 "></i> Where are you located?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="faqFive" data-bs-parent="#Faqaccordiontwo">
                                            <div class="card-body border-top">
                                                Plot 382A/60 Meanwood Ibex Hill Lusaka
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqSix">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                    <i class="fa fa-plus-circle me-1 "></i> What kinds of business financing do you offer?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSix" class="collapse" aria-labelledby="faqSix" data-bs-parent="#Faqaccordiontwo">
                                            <div class="card-body border-top">
                                                We cover a broad range of Loans manly business and Education loans
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqSeven">
                                            <h4 class="mb-0">
                                                <a href="#!" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                    <i class="fa fa-plus-circle me-1 "></i> Why should I use Advisor Loans?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSeven" class="collapse" aria-labelledby="faqSeven" data-bs-parent="#Faqaccordiontwo">
                                            <div class="card-body border-top">
                                                To Get clarity on conditions on both secure and unsecure loans.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqEight">
                                            <h4 class="mb-0">
                                                <a href="#!" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                    <i class="fa fa-plus-circle me-1 "></i> Can you help me if I am not an advisor?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseEight" class="collapse" aria-labelledby="faqEight" data-bs-parent="#Faqaccordiontwo">
                                            <div class="card-body border-top">
                                                Chalom has a team best positioned to handle all money matters.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-6">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div>
                                    <h2 class="mb-3">After You Apply</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="accordion" id="FaqaccordionThree">
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingTen">
                                            <h4 class="mb-0">
                                                <a href="#!" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                                    <i class="fa fa-plus-circle me-1 "></i> When should i apply?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTen" class="collapse show" aria-labelledby="headingTen" data-bs-parent="#FaqaccordionThree">
                                            <div class="card-body border-top">
                                                As soon as you make a decision to get extra funds to finance you extra projects.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingEleven">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                                    <i class="fa fa-plus-circle me-1 "></i> How fast will my loan be funded?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-bs-parent="#FaqaccordionThree">
                                            <div class="card-body border-top">
                                                Our famous turn around time is 2 Minutes for both online applications and Onsite.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingTwelve">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                                    <i class="fa fa-plus-circle me-1 "></i> What’s a comparison rate?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-bs-parent="#FaqaccordionThree">
                                            <div class="card-body border-top">
                                                Our loans run with 5, 10, 15 and 48% depending on the loan type selected.
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
    </div>
    <!-- /.content end -->

@endsection
