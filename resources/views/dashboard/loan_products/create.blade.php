@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-sm">
                <div class="row ">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Loan Product</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('loan.product.index')}}">Loans</a></li>
                            <li class="breadcrumb-item active">Loan Product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-8 offset-2">
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <p class="lead"> {{session()->get('message')}}</p>
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-warning alert-dismissible">
                                <p class="lead"> {{session()->get('error')}}</p>
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
                <div class="row gutters">

                    <div class="col-xl-8 offset-2 col-lg-8 offset-2  col-md-8 offset-2  col-sm-12 offset-2  col-12">
                        <div class="card h-100">
                            <div class="card-body">
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
                                            <div class="col-6">
                                                <div class="form-group  text-start ">
                                                    <label for="description">Brief Description</label>
                                                    <textarea rows="3"  class="form-control" id="description" name="description"
                                                              placeholder="Enter Brief Description" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group  text-start ">
                                                    <label for="about">About</label>
                                                    <textarea rows="3" class="form-control" id="about" name="about"
                                                              placeholder="Enter Details about this loan type" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group text-start">
                                                    <span  for="rate_per_month">Rate Per Month (%)</span>
                                                    <input type="number" class="form-control" id="rate_per_month" name="rate_per_month"
                                                           placeholder="Enter Rate Per Month" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group text-start">
                                                    <span  for="arrangement_fee"> Arrangement Fee (ZMW)</span>
                                                    <input type="number" class="form-control" id="arrangement_fee" name="arrangement_fee"
                                                           placeholder="Enter Arrangement Fee" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group text-start">
                                                    <span  for="lowest_amount">Lowest Amount (ZMW)</span>
                                                    <input type="number" class="form-control" id="lowest_amount" name="lowest_amount"
                                                           placeholder="Enter Name" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group text-start">
                                                    <span  for="highest_amount"> Highest Amount (ZMW)</span>
                                                    <input type="number" class="form-control" id="highest_amount" name="highest_amount"
                                                           placeholder="Enter Highest Amount" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group text-start">
                                                    <span  for="lowest_tenure"> Lowest Tenure (Months)</span>
                                                    <input type="number" class="form-control" id="lowest_tenure" name="lowest_tenure"
                                                           placeholder="Enter Lowest Tenure" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group text-start">
                                                    <span  for="highest_tenure"> Highest Tenure (Months)</span>
                                                    <input type="number" class="form-control" id="highest_tenure" name="highest_tenure"
                                                           placeholder="Enter Highest Tenure" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
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
                                            <div class="col-6">
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
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('custom-scripts')

@endpush
