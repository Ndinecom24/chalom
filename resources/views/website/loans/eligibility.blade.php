@extends('layouts.website.main')

@section('content')

    <div class="pt-18 pb-10" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), rgba(0, 0, 0, 0.2) url({{asset('theme/borrow/assets/images/background/page-header.jpg')}}) no-repeat center;
  background-size: cover;
}

">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white p-5 rounded-top-md">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="mb-0">Loan Eligibility</h1>
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
            <div class="loan-eligibility-block">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <h2 class="mb-4">Check Your eligibility for loans.</h2>
                        <div class="row">
                            <form name="formval2" class="form-horizontal loan-eligibility-form">
                                <div class="mb-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <label for="loan" class="form-label">Home Loan Required:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₹</span>
                                            </div>
                                            <input type="number" class="form-control input-sm" id="loan" name="pr_amt2" placeholder="Enter Loan Amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <label for="income" class="form-label">Net income per month</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₹</span>
                                            </div>
                                            <input type="number" class="form-control" id="income" name="NetIncome" placeholder="Excluding LTA and Medical allowances">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <label for="commitments" class="form-label">Existing loan commitments</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₹</span>
                                            </div>
                                            <input type="number" class="form-control" id="commitments" Name="ExLoan" placeholder="(per month)">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <label for="tenure" class="form-label">Loan Tenure</label>
                                        <input type="number" class="form-control" id="tenure" name="period2" placeholder="(in years)">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <label for="rateofinterest" class="form-label">Rate of Interest</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                            <input type="number" class="form-control" id="rateofinterest" value="9.5" name="int_rate2">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button type="button" class="btn btn-primary" onclick="eligiable()">Check Eligibility</button>
                                        <button type="reset" class="btn btn-outline-primary">Reset All</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>How much loan you are eligible for?</h2>
                        <div class="loan-eligibility-info">
                            <form name="formval3">
                                <div class="mb-3">
                                    <output class="col-lg-12 col-sm-12 col-md-12 col-12 eligibility-text" name="field13">
                                    </output>
                                    <output class="col-lg-12 col-sm-12 col-md-12 col-12 eligibility-amount" name="field11"></output>
                                </div>
                                <div class="mb-3">
                                    <output class="col-lg-12 col-sm-12 col-md-12 col-12 eligibility-text" name="field12"></output>
                                </div>
                            </form>
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
