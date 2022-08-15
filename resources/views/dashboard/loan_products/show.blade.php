@extends('layouts.dashboard.main')


@push('custom-stylesheets')

@endpush


@section('content')


    <div class="pt-18 pb-10"
         style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), rgba(0, 0, 0, 0.2)url({{asset('theme/borrow/assets/images/background/page-header.jpg')}}) no-repeat center;
             background-size: cover;
             }

             ">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <p class="lead"> {{session()->get('message')}}</p>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <p class="lead"> {{session()->get('message')}}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="container-sm">
                    <div class="row ">
                        <div class="col-sm-6">
                            {{--                            <h3 class="page-heading mb-4">Roles</h3>--}}
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-end">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('loan.product.index')}}">Loans</a></li>
                                <li class="breadcrumb-item active">Loam Product</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white p-5 rounded-top-md">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="mb-0">{{$loanProducts->name}}</h1>
                            </div>

                        </div>
                    </div>
                    <div>
                        <ul class="nav nav-fill nav-pills-gray-fill">

                            <li class="nav-item"><a href="#section-about" class="page-scroll nav-link">About Loan</a>
                            </li>
                            <li class="nav-item"><a href="#section-feature" class="page-scroll nav-link">Features &amp;
                                    Benefits</a></li>
                            <li class="nav-item"><a href="#section-eligibility"
                                                    class="page-scroll nav-link">Eligibility</a></li>
                            <li class="nav-item"><a href="#section-faq" class="page-scroll nav-link">FAQ’S</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <!-- content start -->
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="mt-n6 bg-white mb-10 rounded-3 shadow-sm position-relative">

                        <div class="section-scroll p-lg-10 p-5" id="section-about">
                            <!-- form start -->
                            <form role="form" id="about-form" method="post"
                                  action="{{route('loan.product.update', $loanProducts)}}">
                                @csrf
                                <fieldset class="form-field">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="mb-6">
                                                <h2>About</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="inputStatusName"> Name</span>
                                                <input value="{{$loanProducts->name}}" type="text" class="form-control"
                                                       id="inputStatusName" name="name"
                                                       placeholder="Enter Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group  text-start ">
                                                <label for="description">Brief Description</label>
                                                <textarea rows="3" class="form-control" id="description"
                                                          name="description"
                                                          placeholder="Enter Brief Description"
                                                          required>{{$loanProducts->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group  text-start ">
                                                <label for="about">About</label>
                                                <textarea rows="3" class="form-control" id="about" name="about"
                                                          placeholder="Enter Details about this loan type"
                                                          required>{{$loanProducts->about}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="rate_per_month">Rate Per Month (%)</span>
                                                <input type="number" class="form-control" id="rate_per_month"
                                                       name="rate_per_month"
                                                       value="{{$loanProducts->rate_per_month}}"
                                                       placeholder="Enter Rate Per Month" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="arrangement_fee"> Arrangement Fee (ZMW)</span>
                                                <input type="number" class="form-control" id="arrangement_fee"
                                                       name="arrangement_fee"
                                                       value="{{$loanProducts->arrangement_fee}}"
                                                       placeholder="Enter Arrangement Fee" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="lowest_amount">Lowest Amount (ZMW)</span>
                                                <input type="number" class="form-control" id="lowest_amount"
                                                       name="lowest_amount"
                                                       value="{{$loanProducts->lowest_amount}}" placeholder="Enter Name"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="highest_amount"> Highest Amount (ZMW)</span>
                                                <input type="number" class="form-control" id="highest_amount"
                                                       name="highest_amount"
                                                       value="{{$loanProducts->highest_amount}}"
                                                       placeholder="Enter Highest Amount" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="lowest_tenure"> Lowest Tenure (Months)</span>
                                                <input type="number" class="form-control" id="lowest_tenure"
                                                       name="lowest_tenure"
                                                       value="{{$loanProducts->lowest_tenure}}"
                                                       placeholder="Enter Lowest Tenure" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="highest_tenure"> Highest Tenure (Months)</span>
                                                <input type="number" class="form-control" id="highest_tenure"
                                                       name="highest_tenure"
                                                       value="{{$loanProducts->highest_tenure}}"
                                                       placeholder="Enter Highest Tenure" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span  for="dept_service_ratio"> Dept Service Ratio (%)</span>
                                                <input type="number" class="form-control" id="dept_service_ratio" name="dept_service_ratio"
                                                       min="0" max="100"   value="{{$loanProducts->dept_service_ratio}}"  placeholder="Enter Dept Service Ratio" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span  for="loan_category_id">Loan Category</span>
                                                <select class="form-control" id="loan_category_id" name="loan_category_id"
                                                        required>
                                                    <option value="{{$loanProducts->loan_category_id ?? ""}}">{{$loanProducts->category->name ?? '--Choose--'}}</option>

                                                @foreach($loanCategories as $loanCategory)
                                                        <option value="{{$loanCategory->id}}">{{$loanCategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="highest_tenure">Icon</span>
                                                <select class="form-control" id="image" name="image"
                                                        placeholder="Enter Highest Tenure" required>
                                                    <option
                                                        value="{{$loanProducts->image}}">{{$loanProducts->image}}</option>
                                                    <option
                                                        value="{{asset('theme/borrow/assets/images/svg/loan.svg')}}">
                                                        loan
                                                    </option>
                                                    <option
                                                        value="{{asset('theme/borrow/assets/images/svg/mortgage.svg')}}">
                                                        mortgage
                                                    </option>
                                                    <option
                                                        value="{{asset('theme/borrow/assets/images/svg/piggy-bank.svg')}}">
                                                        piggy-bank
                                                    </option>
                                                    <option value="{{asset('theme/borrow/assets/images/svg/car.svg')}}">
                                                        car
                                                    </option>
                                                    <option
                                                        value="{{asset('theme/borrow/assets/images/svg/credit-card.svg')}}">
                                                        credit-card
                                                    </option>
                                                    <option
                                                        value="{{asset('theme/borrow/assets/images/svg/personal-loans-icon.svg')}}">
                                                        personal-loans-icon
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="status_id">Status</span>
                                                <select class="form-control" id="statuses_id" name="statuses_id"
                                                        placeholder="Enter Highest Tenure" required>
                                                    @foreach($statuses as $status)
                                                        <option value="{{$status->id}}">{{$status->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="form-group text-start">
                                                <span for="status_id"> Collateral </span>
                                                <select class="form-control" id="collateral" name="collateral" required>
                                                    <option value="{{$loanProducts->collateral ?? ""}}">{{$loanProducts->collateral ?? "--Choose--"}}</option>
                                                    <option value="No Collateral">No Collateral</option>
                                                    <option value="Need Collateral">Need Collateral</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="modal-footer justify-content-start">
                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.developer.id')
|| \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.admin.id') )
                                    <button type="submit" class="btn btn-primary">Update</button>
                                        @endif
                                </div>
                            </form>
                        </div>

                        <div class="section-scroll" id="section-feature">
                            <div class="p-lg-10 p-5">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary" id="myBtn-feature">
                                            New Loan Feature
                                        </button>


                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="mb-6">
                                            <h2>Features of {{$loanProducts->name}} Loan</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($loanProducts->features as $feature)
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="feature-icon mb-4">
                                                <div class="mb-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                         fill="currentColor" class="bi bi-lightbulb text-primary"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
                                                    </svg>
                                                </div>
                                                <h4>{{$feature->name}}</h4>
                                                <p>{{$feature->description}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="section-scroll" id="section-eligibility">
                            <div class=" bg-light p-lg-10 p-5">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary" id="myBtn-eligibility">
                                            New Loan Eligibility
                                        </button>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="mb-6">
                                            <h2>{{$loanProducts->name}} - Eligibility</h2>
                                            <p> Any salaried, self-employed or professional Public and Privat companies,
                                                Government sector employees including Public Sector is eligible for
                                                a {{$loanProducts->name}} loan. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($loanProducts->eligibility as $eligibility)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                            <div class=" mb-4">
                                                <h4>{{$eligibility->name}}</h4>
                                                <p>{{$eligibility->description}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="section-scroll" id="section-faq">
                            <div class="p-lg-10 p-5">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary" id="myBtn-faq">
                                            New Loan FAQ
                                        </button>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="mb-8">
                                            <h2>Frequently Ask Questions</h2>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="accordion" id="faqExample">
                                            @foreach($loanProducts->faq as $key => $faq)
                                                <div class="card mb-2">
                                                    <div class="card-header rounded-3 border-bottom-0"
                                                         id="faq{{$faq->id}}">
                                                        <h4 class="mb-0">
                                                            <a href="#!" class=" collapsed " data-bs-toggle="collapse"
                                                               data-bs-target="#faqcollapse{{$faq->id}}"
                                                               aria-expanded="false"
                                                               aria-controls="faqcollapse{{$faq->id}}">
                                                                <i class="fa fa-plus-circle me-2"></i>{{$faq->name}}   {{$key}}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="faqcollapse{{$faq->id}}"
                                                         class=" @if( $key != 0 ) collapse @endif  "
                                                         aria-labelledby="faq{{$faq->id}}"
                                                         data-bs-parent="#faqExample{{$faq->id}}">
                                                        <div class="card-body border-top">
                                                            {{$faq->description}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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


    <!-- NEW LOAN FEATURE MODAL-->
    <div id="modal-feature" class="modal">
        <div class="modal-content  modal-lg">
            <div class="modal-header">
                <h4 class="modal-title text-center">Create Loan Feature</h4>
            </div>
            <!-- form start -->
            <form role="form" id="about-feature" method="post" action="{{route('loan.feature.store', $loanProducts)}}">
                @csrf
                <div class="modal-body">
                    <fieldset class="form-field">

                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group text-start">
                                    <span for="feature-name"> Name</span>
                                    <input type="text" class="form-control" id="feature-name" name="name"
                                           placeholder="Enter Feature Name" required>
                                    <input value="{{$loanProducts->id}}" type="text" class="form-control" id="loan-id"
                                           name="loans_id"
                                           placeholder="Enter Loan ID" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group  text-start ">
                                    <label for="description">Brief Description</label>
                                    <textarea rows="3" class="form-control" id="description" name="description"
                                              placeholder="Enter Brief Description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group text-start">
                                    <span for="highest_tenure">Icon</span>
                                    <select class="form-control" id="image" name="image"
                                            placeholder="Enter Highest Tenure" required>
                                        <option value="">--Choose--</option>
                                        <option value="{{asset('theme/borrow/assets/images/svg/loan.svg')}}">loan
                                        </option>
                                        <option value="{{asset('theme/borrow/assets/images/svg/mortgage.svg')}}">
                                            mortgage
                                        </option>
                                        <option value="{{asset('theme/borrow/assets/images/svg/piggy-bank.svg')}}">
                                            piggy-bank
                                        </option>
                                        <option value="{{asset('theme/borrow/assets/images/svg/car.svg')}}">car</option>
                                        <option value="{{asset('theme/borrow/assets/images/svg/credit-card.svg')}}">
                                            credit-card
                                        </option>
                                        <option
                                            value="{{asset('theme/borrow/assets/images/svg/personal-loans-icon.svg')}}">
                                            personal-loans-icon
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer justify-content-between">
                    <span id="feature-close" class="btn btn-default">X</span>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.NEW LOAN FEATURE MODAL -->


    <!-- NEW LOAN ELIGIBILITY MODAL-->
    <div id="modal-eligibility" class="modal">
        <div class="modal-content  modal-lg">
            <div class="modal-header">
                <h4 class="modal-title text-center">Create Loan Eligibility</h4>
            </div>
            <!-- form start -->
            <!-- form start -->
            <form role="form" id="eligibility-feature" method="post"
                  action="{{route('loan.eligibility.store', $loanProducts)}}">
                @csrf
                <div class="modal-body">
                    <fieldset class="form-field">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group text-start">
                                    <span for="feature-name"> Title</span>
                                    <input type="text" class="form-control" id="eligibility-name" name="name"
                                           placeholder="Enter Eligibility Title" required>
                                    <input value="{{$loanProducts->id}}" type="text" class="form-control" id="loan-id"
                                           name="loans_id"
                                           placeholder="Enter Loan ID" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="form-group  text-start ">
                                    <label for="description"> Description</label>
                                    <textarea rows="3" class="form-control" id="eligibility-description"
                                              name="description"
                                              placeholder="Enter Brief Description" required></textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer justify-content-between">
                    <span id="eligibility-close" class="btn btn-default">X</span>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.NEW LOAN ELIGIBILITY MODAL -->


    <!-- NEW LOAN FAQ MODAL-->
    <div id="modal-faq" class="modal">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title text-center">Create Loan FAQ</h4>
            </div>
            <!-- form start -->
            <form role="form" id="faq-feature" method="post" action="{{route('loan.faq.store', $loanProducts)}}">
                @csrf
                <div class="row">
                    <div class="modal-body">
                        <fieldset class="form-field">

                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="form-group text-start">
                                        <span for="feature-name"> Question</span>
                                        <input type="text" class="form-control" id="faq-name" name="name"
                                               placeholder="Enter Question Title" required>
                                        <input value="{{$loanProducts->id}}" type="text" class="form-control" id="loan-id"
                                               name="loans_id"
                                               placeholder="Enter Loan ID" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="form-group  text-start ">
                                        <label for="description"> FAQ Answear</label>
                                        <textarea rows="3" class="form-control" id="faq-description" name="description"
                                                  placeholder="Enter Brief Description" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <span id="faq-close" class="btn btn-default">X</span>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- /.NEW LOAN FAQ MODAL -->


@endsection

@push('custom-scripts')

    <script>
        var feature_modal = document.getElementById('modal-feature');
        var feature_btn = document.getElementById('myBtn-feature');
        var feature_span = document.getElementById('feature-close');

        feature_btn.onclick = function () {
            feature_modal.style.display = "block";
        }

        feature_span.onclick = function () {
            feature_modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == feature_modal) {
                feature_modal.style.display = "none";
            }
        }
    </script>


    <script>
        var eligibility_modal = document.getElementById("modal-eligibility");
        var eligibility_btn = document.getElementById('myBtn-eligibility');
        var eligibility_span = document.getElementById('eligibility-close');
        eligibility_btn.onclick = function () {
            eligibility_modal.style.display = "block";
        }
        eligibility_span.onclick = function () {
            eligibility_modal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == eligibility_modal) {
                eligibility_modal.style.display = "none";
            }
        }
    </script>


    <script>
        var faq_modal = document.getElementById("modal-faq");
        var faq_btn = document.getElementById('myBtn-faq');
        var faq_span = document.getElementById('faq-close');


        faq_btn.onclick = function () {
            faq_modal.style.display = "block";
        }

        faq_span.onclick = function () {
            faq_modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == faq_modal) {
                faq_modal.style.display = "none";
            }
        }
    </script>

@endpush
