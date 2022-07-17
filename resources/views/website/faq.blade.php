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
                                <a href="{{route('company.contact')}}" class="nav-link">Give me call back</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Emi Caculator</a>
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
                                                Donec porttitor enim sed justo egestas vehicula. Maecenas interdum, urna quis facilisis elementum, lectus mi tristique turpis, dapibus suscipit tellus dui euismSed ullamcorper onsectetur velit. Curabitur luctus et arcu eget sodales.
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
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqThree">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <i class="fa fa-plus-circle me-1 "></i>
                                                    Do you offering refinancing ?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="faqThree" data-bs-parent="#Faqaccordionsone">
                                            <div class="card-body border-top">
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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
                                                Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                                    <h2 class="mb-3">About Borrow Loan</h2>
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
                                                Praesent diam nunc, mollis vitae sollicitudin sed, pellentesque vitae velit. Nulla facilisi. Mauris porta nisl nisl, vitae dapibus elit sodales a.
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
                                                Donec porttitor enim sed justo egestas vehicula. Maecenas interdum, urna quis facilisis elementum, lectus mi tristique turpis, dapibus suscipit tellus dui euismSed ullamcorper onsectetur velit. Curabitur luctus et arcu eget sodales.
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
                                                Vestibulum ante ipsum priultrices posuere cubvitae assasuscipit nec venenatis sed cursus sed quam.
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
                                                Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="faqNine">
                                            <h4 class="mb-0">
                                                <a href="#!" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                                                    <i class="fa fa-plus-circle me-1 "></i> Do you offering refinancing ?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseNine" class="collapse" aria-labelledby="faqNine" data-bs-parent="#Faqaccordiontwo">
                                            <div class="card-body border-top">
                                                Aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                                                Nunc id orci eget dolor gravida vulputate. Vivamus a lectus lorem. Cras et risus nec ligula ultricies fringilla. Vestibulum in velit laoreet, pharetra orci vel, aelerisque tincidunt pharetra.
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
                                                Maecenas rhoncus scelerisque euisnec, viverra auctor nunc.Praesent diam nunc, mollis vitae sollicitudin sed, pellentesque vitae velit. Nulla facilisi. Mauris porta nisl nisl, vitae dapibus elit sodales a.
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
                                                Donec porttitor enim sed justo egestas vehicula. Maecenas interdum, urna quis facilisis elementum, lectus mi tristique turpis, dapibus suscipit tellus dui euismSed ullamcorper onsectetur velit. Curabitur luctus et arcu eget sodales.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingThirteen">
                                            <h4 class="mb-0">
                                                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                                    <i class="fa fa-plus-circle me-1 "></i> How much should i apply for?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingTwelve" data-bs-parent="#FaqaccordionThree">
                                            <div class="card-body border-top">
                                                Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                                    <h2 class="mb-3">At The Dealership</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="accordion" id="Faqaccordionfour">
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingFourteen">
                                            <h4 class="mb-0">
                                                <a href="" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen">
                                                    <i class="fa fa-plus-circle me-1 "></i> How long is an approved interest rate and loan offer valid?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFourteen" class="collapse show" aria-labelledby="headingFourteen" data-bs-parent="#Faqaccordionfour">
                                            <div class="card-body border-top">
                                                Etiam a quam nunc. Phasellus blandit, eros vel dapibus tempus, dolor felis aliquet nulla, eu aliquet felis arcu sed augue. Proin ultrices sapien non massa porttitor vestibulum. Fusce bibendum mauris quis est aliquet sagittis.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingFifteen">
                                            <h4 class="mb-0">
                                                <a href="" class=" collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                                    <i class="fa fa-plus-circle me-1 "></i> What are the loan eligibility requirements and conditions?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-bs-parent="#Faqaccordionfour">
                                            <div class="card-body border-top">
                                                Nunc id orci eget dolor gravida vulputate. Vivamus a lectus lorem. Cras et risus nec ligula ultricies fringilla. Vestibulum in velit laoreet, pharetra orci vel, aelerisque tincidunt pharetra.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingSixteen">
                                            <h4 class="mb-0">
                                                <a href="" class=" collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                                    <i class="fa fa-plus-circle me-1 "></i> How do I set up Automatic Payments?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-bs-parent="#Faqaccordionfour">
                                            <div class="card-body border-top">
                                                Maecenas rhoncus scelerisque euisnec, viverra auctor nunc.Praesent diam nunc, mollis vitae sollicitudin sed, pellentesque vitae velit. Nulla facilisi. Mauris porta nisl nisl, vitae dapibus elit sodales a
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
                                    <h2 class="mb-3">After You Apporved</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="accordion" id="FaqaccordionFive">
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingSeventeen">
                                            <h4 class="mb-0">
                                                <a href="#!" data-bs-toggle="collapse" data-bs-target="#collapseSeventeen" aria-expanded="true" aria-controls="collapseSeventeen">
                                                    <i class="fa fa-plus-circle me-1 "></i> Do you charge for your service?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSeventeen" class="collapse show" aria-labelledby="headingSeventeen" data-bs-parent="#FaqaccordionFive">
                                            <div class="card-body border-top">
                                                Fusce laoreet iaculis nulla, sit amet lobortis nibh gravida aurabitur ac diam placerat, porta velit in, suscipit nunc. Aenean lorem fermentum ultrices malesuada Pellentesque magna pharetra mattis enim.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingEighteen">
                                            <h4 class="mb-0">
                                                <a href="#!" class=" collapsed" data-bs-toggle="collapse" data-bs-target="#collapseEighteen" aria-expanded="false" aria-controls="collapseEighteen">
                                                    <i class="fa fa-plus-circle me-1 "> </i> How do I transfer funds overseas?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseEighteen" class="collapse" aria-labelledby="headingEighteen" data-bs-parent="#FaqaccordionFive">
                                            <div class="card-body border-top">
                                                Etiam a quam nunc. Phasellus blandit, eros vel dapibus tempus, dolor felis aliquet nulla, eu aliquet felis arcu sed augue. Proin ultrices sapien non massa porttitor vestibulum. Fusce bibendum mauris quis est aliquet sagittis.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2">
                                        <div class="p-3" id="headingNinteen">
                                            <h4 class="mb-0">
                                                <a href="#!" class=" collapsed" data-bs-toggle="collapse" data-bs-target="#collapseNinteen" aria-expanded="false" aria-controls="collapseNinteen">
                                                    <i class="fa fa-plus-circle me-1 "> </i> How do I activate my card?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseNinteen" class="collapse" aria-labelledby="headingNinteen" data-bs-parent="#FaqaccordionFive">
                                            <div class="card-body border-top">
                                                Nunc id orci eget dolor gravida vulputate. Vivamus a lectus lorem. Cras et risus nec ligula ultricies fringilla. Vestibulum in velit laoreet, pharetra orci vel, aelerisque tincidunt pharetra.
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
