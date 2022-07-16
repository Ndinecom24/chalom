@extends('layouts.dashboard.main')

@push('custom-stylesheets')
    <style>
        /*@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');*/


        .notifications {
            width: 50%;
            height: 0px;
            opacity: 0;
            position: absolute;
            top: 38%;
            left: 5px;
            border-radius: 5px 0px 5px 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        .notifications h2 {
            font-size: 14px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            color: #999
        }

        .notifications h2 span {
            color: #f00
        }

        .notifications-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 6px 9px;
            margin-bottom: 0px;
            cursor: pointer
        }

        .notifications-item:hover {
            background-color: #eee
        }

        .notifications-item img {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 9px;
            border-radius: 50%;
            margin-top: 2px
        }

        .notifications-item .text h4 {
            color: #777;
            font-size: 16px;
            margin-top: 3px
        }

        .notifications-item .text p {
            color: #aaa;
            font-size: 12px
        }
    </style>
@endpush


@section('content')
    <!-- partial -->
    <div class="content-wrapper">

        <!-- ADMIN DASHBOARD -->
        @if(\Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.developer.id')
        || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.admin.id')
        || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.verifier.id')
        || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.approver.id')
        )
            <h3 class="page-heading mb-4">Admin Dashboard</h3>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-primary">
                                        <i class="fa fa-bell highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Pending Loan Applications</p>
                                    <h4 class="bold-text">
                                        ZMW {{ number_format($total->pending_loans_amount, 2)}}
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Loan Count :  {{$total->pending_loans}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Customers</p>
                                    <h4 class="bold-text">
                                        {{$total->borrowers}}
                                    </h4>
                                </div>
                                <p class="text-muted">
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> With Active Loans :  {{sizeof($loans->where('statuses_id' , config('constants.status.loan_approved') )
                ->Orwhere('statuses_id',  config('constants.status.loan_reviewed') )
                ->Orwhere('statuses_id',  config('constants.status.loan_submission') )
                ->Orwhere('statuses_id',  config('constants.status.loan_overdue') )
            ->get() )}}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Active Loans</p>
                                    <h4 class="bold-text">
                                        ZMW {{ number_format($total->active_loans_amount, 2)}}
                                    </h4>
                                </div>
                                <p class="text-muted">
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Count Active Loans :   {{$total->active_loans}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-success">
                                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Total Paid Money</p>
                                    <h4 class="bold-text">
                                        ZMW {{ number_format($total->total_paid,2)}}
                                    </h4>
                                </div>
                                <p class="text-muted">
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i>Count Paid Loans :
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        @else

        <!-- USER DASHBOARD -->
            <h3 class="page-heading mb-4">Dashboard</h3>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-primary">
                                        <i class="fa fa-bell highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Current Loan Application</p>
                                    <h4 class="bold-text">
                                        ZMW {{ number_format($total->loan_amount_due ?? 0, 2)}}
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Status : Updated
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Amount Paid</p>
                                    <h4 class="bold-text">
                                        @if($total != null)
                                            ZMW {{ number_format( (array_sum($total->schedules->pluck('paid')->toArray() ?? 0 )), 2)}}
                                        @else
                                            ZMW 0.00
                                        @endif
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                @if($total != null)
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Last Payment : {{$total->schedules->where('status',  config('constants.status.loan_paid'))->last()->paid_date ?? "none"}}
                                @else
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Last Payment : None
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Current Balance</p>
                                    <h4 class="bold-text">
                                        @if($total != null)
                                        ZMW {{ number_format( ( ($total->loan_amount_due  ?? 0) - (array_sum($total->schedules->pluck('paid')->toArray() ?? 0)) ), 2)}}
                                        @else
                                            ZMW 0.00
                                        @endif
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                @if($total != null)
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Remaining Installments : {{sizeof($total->schedules->where('status', '!=' ,config('constants.status.loan_paid')) ?? 0 )}}
                                @else
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Remaining Installments : 0.00
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h4 class="text-success">
                                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Next Payment</p>
                                    <h4 class="bold-text">
                                        @if($total != null)
                                            ZMW {{ number_format( ($total->schedules->where('status', '!=' ,config('constants.status.loan_paid'))->first()->amount ?? "none") ,2)}}
                                        @else
                                            ZMW 0.00
                                        @endif
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                @if($total != null)
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Next Payment : {{ $total->schedules->where('status', '!=' ,config('constants.status.loan_paid'))->first()->date ?? "none" }}
                                @else
                                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Next Payment : None
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        @endif
        <hr>

        <h5 id="bell" class="card-title p-3 bg-info text-white rounded">Notifications
            <span>{{$notifications->count('*')}}</span></h5> <br>


        {{--        <div class="row">--}}
        {{--            <div class="col-12">--}}
        {{--                @foreach($notifications as $notification)--}}
        {{--                    <div class="col-12 mb-4">--}}
        {{--                        <div id="accordion">--}}
        {{--                            <div class="card">--}}
        {{--                                <div class="card-header" id="headingOne">--}}
        {{--                                    <h5 class="mb-0">--}}
        {{--                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"--}}
        {{--                                                aria-expanded="true" aria-controls="collapseOne">--}}
        {{--                                            {{ $notification['name'] }} - {{ $notification['subject'] }}--}}
        {{--                                        </button>--}}
        {{--                                    </h5>--}}
        {{--                                </div>--}}

        {{--                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"--}}
        {{--                                     data-parent="#accordion">--}}
        {{--                                    <div class="card-body">--}}
        {{--                                        <div class="list-group">--}}
        {{--                                            <a class="list-group-item">Name: {{ $notification['message'] }}</a>--}}
        {{--                                            <a class="list-group-item">NID: {{ $notification['comment'] }}</a>--}}
        {{--                                            <a class="list-group-item">Phone: {{ $notification['type'] }}</a>--}}
        {{--                                            <a class="list-group-item">Address: {{ $notification['url'] }}</a>--}}
        {{--                                            <a class="list-group-item">Last pay--}}
        {{--                                                date: {{ $notification['status_id'] }}</a>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}


        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                @endforeach--}}

        {{--            </div>--}}
        {{--        </div>--}}

        <div class="row">
            <div class="col-12">
                <div class="notifications" id="box">
                    @foreach($notifications as $notification)
                        <a href="{{$notification->url}}">


                            <div class="notifications-item"><img src="{{{$notification->user->avatar}}}}" alt="img">
                                <div class="text">
                                    <h4> {{$notification->name}}</h4>
                                    <h6>{{$notification->user->name}} | {{$notification->subject}} </h6>
                                    <p>{{$notification->message}}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>


        @endsection


        @push('custom-scripts')
            <script>
                $(document).ready(function () {

                    var down = false;

                    $('#bell').click(function (e) {

                        var color = $(this).text();
                        if (down) {

                            $('#box').css('height', '0px');
                            $('#box').css('opacity', '0');
                            down = false;
                        } else {

                            $('#box').css('height', 'auto');
                            $('#box').css('opacity', '1');
                            down = true;

                        }

                    });

                });
            </script>
    @endpush
