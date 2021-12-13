@extends('layouts.website.main')

@section('content')


    <div class="pt-18 pb-10" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), rgba(0, 0, 0, 0.2) url(../assets/images/background/page-header.jpg) no-repeat center;
  background-size: cover;
}

">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white p-5 rounded-top-md">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="mb-0">Loan Calculator</h1>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <a href="#!" class="btn btn-primary">How To Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <ul class="nav nav-fill nav-pills-gray-fill">
                            <li class="nav-item ">
                                <a href="contact-us.html" class="nav-link">Give me call back</a>
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

        <div class="mt-n6 bg-white mb-10 rounded-3 shadow-sm p-5">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row mb-8">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="p-3 p-lg-5 card">
                                <div class="">
                                    <div class="d-flex justify-content-between align-items-center mb-3"><span>Loan Amount is </span>
                                        <span>
                                              <h3 id="la_value">30000</h3></span></div>
                                    <input type="text" data-slider="true" value="30000" data-slider-range="100000,5000000" data-slider-step="10000" data-slider-snap="true" id="la">
                                </div>
                                <hr>
                                <div class="">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                          <span>No. of Month is
                                             </span>
                                        <span><h3 id="nm_value">30</h3>
                                        </span>
                                    </div>

                                    <input type="text" data-slider="true" value="30" data-slider-range="120,360" data-slider-step="1" data-slider-snap="true" id="nm">
                                </div>
                                <hr>
                                <div class="">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span>Rate of Interest [ROI] is

                                        </span>
                                        <span><h3 id="roi_value">10</h3>
                                        </span>
                                    </div>
                                    <input type="text" data-slider="true" value="10.2" data-slider-range="8,16" data-slider-step=".05" data-slider-snap="true" id="roi">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body py-3">
                                    Monthly EMI
                                    <h2 id='emi' class="mb-0"></h2>
                                </div>

                                <div class="card-body border-top py-3">
                                    Total Interest
                                    <h2 id='tbl_int' class="mb-0"></h2>
                                </div>

                                <div class="card-body border-top py-3"> Payable Amount
                                    <h2 id='tbl_full' class="mb-0"></h2>
                                </div>

                                <div class="card-body border-top py-3">
                                    Interest Percentage
                                    <h2 id='tbl_int_pge' class="mb-0"></h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-responsive card">
                        <table id="loantable" class='table table-striped table-light mb-0'></table>
                    </div>
                </div>

            </div>


        </div>
    </div>

    </div>

    <!-- /.content end -->


@endsection
