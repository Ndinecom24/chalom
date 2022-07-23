@extends('layouts.dashboard.main')


@push('custom-stylesheets')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content{
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close{
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endpush


@section('content')

    <div class="pt-18 pb-10" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
        rgba(0, 0, 0, 0.2) url({{asset('theme/borrow/assets/images/background/page-header.jpg')}}) no-repeat center;background-size: cover;">
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="bg-white p-5 rounded-top-md">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h1 class="mb-0">Loan Product Listing</h1>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <a class="btn btn-primary" href="{{route('loan.product.create')}}">
                                        New Loan Product
                                    </a>

                                    <!-- NEW LOAN PRODUCTS MODAL-->
                                    <div id="myModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close"  id="close_product_modal">&times;</span>
                                            <div class="modal-header">
                                                <h4 class="modal-title text-center">Create Loan Product</h4>
                                            </div>
                                            <!-- form start -->
                                            <form role="form" method="post" action="{{route('loan.product.store')}}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group text-start">
                                                                <span  for="inputStatusName"> Name</span>
                                                                <input type="text" class="form-control" id="inputStatusName" name="name"
                                                                       placeholder="Enter Name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group  text-start ">
                                                                <label for="description">Brief Description</label>
                                                                <textarea rows="3"  class="form-control" id="description" name="description"
                                                                          placeholder="Enter Brief Description" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group  text-start ">
                                                                <label for="about">About</label>
                                                                <textarea rows="3" class="form-control" id="about" name="about"
                                                                          placeholder="Enter Details about this loan type" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="rate_per_month">Rate Per Month (%)</span>
                                                                <input type="number" class="form-control" id="rate_per_month" name="rate_per_month"
                                                                       placeholder="Enter Rate Per Month" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="arrangement_fee"> Arrangement Fee (ZMW)</span>
                                                                <input type="number" class="form-control" id="arrangement_fee" name="arrangement_fee"
                                                                       placeholder="Enter Arrangement Fee" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="lowest_amount">Lowest Amount (ZMW)</span>
                                                                <input type="number" class="form-control" id="lowest_amount" name="lowest_amount"
                                                                       placeholder="Enter Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="highest_amount"> Highest Amount (ZMW)</span>
                                                                <input type="number" class="form-control" id="highest_amount" name="highest_amount"
                                                                       placeholder="Enter Highest Amount" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="lowest_tenure"> Lowest Tenure (Months)</span>
                                                                <input type="number" class="form-control" id="lowest_tenure" name="lowest_tenure"
                                                                       placeholder="Enter Lowest Tenure" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="highest_tenure"> Highest Tenure (Months)</span>
                                                                <input type="number" class="form-control" id="highest_tenure" name="highest_tenure"
                                                                       placeholder="Enter Highest Tenure" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="highest_tenure">Icon</span>
                                                                <select class="form-control" id="image" name="image"
                                                                        placeholder="Enter Highest Tenure" required>
                                                                    <option>--Choose--</option>
                                                                    <option value="{{asset('theme/borrow/assets/images/svg/loan.svg')}}" >loan</option>
                                                                    <option value="{{asset('theme/borrow/assets/images/svg/mortgage.svg')}}" >mortgage</option>
                                                                    <option value="{{asset('theme/borrow/assets/images/svg/piggy-bank.svg')}}" >piggy-bank</option>
                                                                    <option value="{{asset('theme/borrow/assets/images/svg/car.svg')}}" >car</option>
                                                                    <option value="{{asset('theme/borrow/assets/images/svg/credit-card.svg')}}" >credit-card</option>
                                                                    <option value="{{asset('theme/borrow/assets/images/svg/personal-loans-icon.svg')}}" >personal-loans-icon</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="form-group text-start">
                                                                <span  for="status_id">Status</span>
                                                                <select class="form-control" id="statuses_id" name="statuses_id"
                                                                        placeholder="Enter Highest Tenure" required>
                                                                    <option>--Choose--</option>
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
                                                                    <option value="">--Choose--</option>
                                                                    <option value="No Collateral">No Collateral</option>
                                                                    <option value="Need Collateral">Need Collateral</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.NEW LOAN PRODUCTS MODAL -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- content start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-n6 mb-10 ">
                        <div class="row">
                            @foreach($list as $item)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card mb-6 text-center border-0 smooth-shadow-sm">
                                        <div class="card-body p-5">
                                            <div class="mb-6"> <img src="{{$item->image }}" alt="Chalom" class="icon-xxl"> </div>
                                            <h3><a href="{{route('loan.product.show', $item->id)}}" class="text-inherit">{{$item->name}}</a></h3>
                                            <p>{{$item->description }}</p>
                                            <a href="{{route('loan.product.show', $item->id)}}" class="btn-link border-bottom border-primary border-2 fw-bold fs-5 ">Read More</a>
                                        </div>
                                        <div class="card-footer">
                                            <p>{{$item->status->name }}</p>
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
    <!-- /.content end -->


@endsection

@push('custom-scripts')

    <script>
        //get elements
        var modal = document.getElementById("myModal");
        var btn = document.getElementById('myBtn');
        var span = document.getElementById('close_product_modal');
        //button click
        btn.onclick = function() {
            modal.style.display = "block";
        }
        //close button click
        span.onclick = function() {
            modal.style.display = "none";
        }
        //toggle modal
        window.onclick = function(event) {
            if(event.target == modal){
                modal.style.display = "none";
            }
        }
    </script>

@endpush
