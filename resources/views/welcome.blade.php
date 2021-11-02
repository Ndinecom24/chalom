@extends('layouts.website.main')

@section('content')

    <section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('{{asset('places/assets/images/bg_1.jpg')}}');" data-stellar-background-ratio="0.5"  id="section-home">
        <div class="overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md">
                    <h2 class="heading mb-2 display-4 font-light probootstrap-animate"><strong>Apply Now</strong>  </h2>
                    <p class="lead mb-5 probootstrap-animate">Get Your Loan Approved 2 Minutes </p>
                    <p class="probootstrap-animate">
                        <a href="" role="button" class="btn btn-primary p-3 mr-3 pl-5 pr-5 text-uppercase d-lg-inline d-md-inline d-sm-block d-block mb-3">Contact US</a>
                    </p>
                </div>
                <div class="col-md probootstrap-animate">
                    <form action="#" class="probootstrap-form">
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="id_label_single">From</label>

                                        <label for="id_label_single" style="width: 100%;">
                                            <select class="js-example-basic-single js-states form-control" id="id_label_single" style="width: 100%;">
                                                <option value="Australia">Australia</option>
                                                <option value="Japan">Japan</option>
                                                <option value="United States">United States</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="China">China</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Chile">Chile</option>
                                                <option value="Chile">Zimbabwe</option>
                                            </select>
                                        </label>


                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="id_label_single2">To</label>
                                        <div class="probootstrap_select-wrap">
                                            <label for="id_label_single2" style="width: 100%;">
                                                <select class="js-example-basic-single js-states form-control" id="id_label_single2" style="width: 100%;">
                                                    <option value="Australia">Australia</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="China">China</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="Chile">Zimbabwe</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END row -->
                            <div class="row mb-5">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="probootstrap-date-departure">Departure</label>
                                        <div class="probootstrap-date-wrap">
                                            <span class="icon ion-calendar"></span>
                                            <input type="text" id="probootstrap-date-departure" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="probootstrap-date-arrival">Arrival</label>
                                        <div class="probootstrap-date-wrap">
                                            <span class="icon ion-calendar"></span>
                                            <input type="text" id="probootstrap-date-arrival" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END row -->
                            <div class="row">
                                <div class="col-md">
                                    <label for="round" class="mr-5"><input type="radio" id="round" name="direction">  Round</label>
                                    <label for="oneway"><input type="radio" id="oneway" name="direction">  Oneway</label>
                                </div>
                                <div class="col-md">
                                    <input type="submit" value="Submit" class="btn btn-primary btn-block">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- END section -->


    <section class="probootstrap_section" id="section-feature-testimonial">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12 text-center mb-5 probootstrap-animate">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">Why we Love Places</h2>
                    <blockquote class="">
                        <p class="lead mb-4"><em>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</em></p>
                        <p class="probootstrap-author">
                            <a href="https://uicookies.com/" target="_blank">
                                <img src="{{asset('places/assets/images/person_1.jpg')}}" alt="Free Template by uicookies.com" class="rounded-circle">
                                <span class="probootstrap-name">James Smith</span>
                                <span class="probootstrap-title">Chief Executive Officer</span>
                            </a>
                        </p>
                    </blockquote>

                </div>
            </div>

        </div>
    </section>
    <!-- END section -->


    {{--<section class="probootstrap_section">--}}
        {{--<div class="container">--}}
            {{--<div class="row text-center mb-5 probootstrap-animate">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h2 class="display-4 border-bottom probootstrap-section-heading">Our Services</h2>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    {{--<section class="probootstrap-section-half d-md-flex" id="section-about">--}}
        {{--<div class="probootstrap-image probootstrap-animate" data-animate-effect="fadeIn" style="background-image: url({{asset('places/assets/images/img_2.jpg')}}"></div>--}}
        {{--<div class="probootstrap-text">--}}
            {{--<div class="probootstrap-inner probootstrap-animate" data-animate-effect="fadeInRight">--}}
                {{--<h2 class="heading mb-4">Customer Service</h2>--}}
                {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>--}}
                {{--<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>--}}
                {{--<p><a href="#" class="btn btn-primary">Read More</a></p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    {{--<section class="probootstrap-section-half d-md-flex">--}}
        {{--<div class="probootstrap-image order-2 probootstrap-animate" data-animate-effect="fadeIn" style="background-image: url({{asset('places/assets/images/img_3.jpg')}}"></div>--}}
        {{--<div class="probootstrap-text order-1">--}}
            {{--<div class="probootstrap-inner probootstrap-animate" data-animate-effect="fadeInLeft">--}}
                {{--<h2 class="heading mb-4">Payment Options</h2>--}}
                {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>--}}
                {{--<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>--}}
                {{--<p><a href="#" class="btn btn-primary">Learn More</a></p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}




    {{--<section class="probootstrap_section" id="section-feature-testimonial">--}}
        {{--<div class="container">--}}
            {{--<div class="row justify-content-center mb-5">--}}
                {{--<div class="col-md-12 text-center mb-5 probootstrap-animate">--}}
                    {{--<h2 class="display-4 border-bottom probootstrap-section-heading">Testimonial</h2>--}}
                    {{--<blockquote class="">--}}
                        {{--<p class="lead mb-4"><em>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</em></p>--}}
                        {{--<p class="probootstrap-author">--}}
                            {{--<a href="https://uicookies.com/" target="_blank">--}}
                                {{--<img src="{{asset('places/assets/images/person_1.jpg')}}" alt="Free Template by uicookies.com" class="rounded-circle">--}}
                                {{--<span class="probootstrap-name">James Smith</span>--}}
                                {{--<span class="probootstrap-title">Chief Executive Officer</span>--}}
                            {{--</a>--}}
                        {{--</p>--}}
                    {{--</blockquote>--}}

                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</section>--}}
    <!-- END section -->

    {{--<section class="probootstrap_section bg-light">--}}
        {{--<div class="container">--}}
            {{--<div class="row text-center mb-5 probootstrap-animate">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h2 class="display-4 border-bottom probootstrap-section-heading">News</h2>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}

                    {{--<div class="media probootstrap-media d-flex align-items-stretch mb-4 probootstrap-animate">--}}
                        {{--<div class="probootstrap-media-image" style="background-image: url({{asset('places/assets/images/img_1.jpg')}}">--}}
                        {{--</div>--}}
                        {{--<div class="media-body">--}}
                            {{--<span class="text-uppercase">January 1st 2018</span>--}}
                            {{--<h5 class="mb-3">Travel To United States Without Visa</h5>--}}
                            {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                            {{--<p><a href="#">Read More</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="media probootstrap-media d-flex align-items-stretch mb-4 probootstrap-animate">--}}
                        {{--<div class="probootstrap-media-image" style="background-image: url({{asset('places/assets/images/img_2.jpg')}}">--}}
                        {{--</div>--}}
                        {{--<div class="media-body">--}}
                            {{--<span class="text-uppercase">January 1st 2018</span>--}}
                            {{--<h5 class="mb-3">Travel To United States Without Visa</h5>--}}
                            {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                            {{--<p><a href="#">Read More</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="col-md-6">--}}

                    {{--<div class="media probootstrap-media d-flex align-items-stretch mb-4 probootstrap-animate">--}}
                        {{--<div class="probootstrap-media-image" style="background-image: url({{asset('places/assets/images/img_4.jpg')}}">--}}
                        {{--</div>--}}
                        {{--<div class="media-body">--}}
                            {{--<span class="text-uppercase">January 1st 2018</span>--}}
                            {{--<h5 class="mb-3">Travel To United States Without Visa</h5>--}}
                            {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                            {{--<p><a href="#">Read More</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="media probootstrap-media d-flex align-items-stretch mb-4 probootstrap-animate">--}}
                        {{--<div class="probootstrap-media-image" style="background-image: url({{asset('places/assets/images/img_5.jpg')}}">--}}
                        {{--</div>--}}
                        {{--<div class="media-body">--}}
                            {{--<span class="text-uppercase">January 1st 2018</span>--}}
                            {{--<h5 class="mb-3">Travel To United States Without Visa</h5>--}}
                            {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                            {{--<p><a href="#">Read More</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- END section -->

    {{--<section class="probootstrap_section">--}}
        {{--<div class="container">--}}
            {{--<div class="row text-center mb-5 probootstrap-animate">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h2 class="display-4 border-bottom probootstrap-section-heading">Travel With Us</h2>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row probootstrap-animate">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="owl-carousel js-owl-carousel-2">--}}
                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_2.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_1.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_3.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_4.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_5.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}


                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_2.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_1.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_3.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_4.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                        {{--<div>--}}
                            {{--<div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">--}}
                                {{--<img src="{{asset('places/assets/images/sq_img_5.jpg')}}" alt="Free Template by uiCookies" class="img-fluid">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="mb-3">02. Service Title Here</h5>--}}
                                    {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- END slide item -->--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    @endsection