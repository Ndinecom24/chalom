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
                                <div class="text-center">
                                    <p class="card-text text-bold text-decoration-underline">
                                        Users</p>
                                </div>
                                <div class="float-right">

                                    <h4 class="bold-text">
                                        Total: {{$total->users}}
                                    </h4>
                                    <h4 class="bold-text text-muted">
                                        Employees: {{$total->employees}}
                                    </h4>
                                    <h4 class="bold-text text-muted" title=" New - {{ number_format($total->new_customers, 0)}} | Return - {{ number_format($total->return_customers, 0)}} ">
                                        Customers:  {{ number_format( ($total->new_customers ?? 0) + ($total->return_customers ?? 0), 0)}}
                                    </h4>

                                <p class="text-muted">
                                     With Active Loans :  {{sizeof($loans->where('statuses_id' , config('constants.status.loan_funds_disbursed') )->Orwhere('statuses_id',  config('constants.status.loan_overdue') )->get() )}}
                                </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="text-center">
                                    <p class="card-text text-bold text-decoration-underline">
                                        Pending Loans</p>
                                </div>
                                <div class="float-right">
                                    <h4 class="bold-text">
                                        Principle: {{ number_format($total->pending_loans_amount, 2)}}
                                    </h4>
                                    <h4 class="bold-text text-muted">
                                         Payment: {{ number_format($total->pending_loans_amount_due, 2)}}
                                    </h4>
                                    <h4 class="bold-text text-muted">
                                        Interest: {{ number_format($total->pending_loans_amount_due - $total->pending_loans_amount, 2)}}
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                 Count : {{$total->pending_loans}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="text-center">
                                    <p class="card-text text-bold text-decoration-underline">Active Loans</p>
                                </div>
                                <div class="float-right">
                                    <h4 class="bold-text">
                                        Principle: {{ number_format($total->active_loans_amount, 2)}}
                                    </h4>
                                    <h4 class="bold-text text-muted">
                                        Payment: {{ number_format($total->active_loans_amount_due, 2)}}
                                    </h4>
                                    <h4 class="bold-text text-muted">
                                        Interest: {{ number_format($total->active_loans_amount_due - $total->active_loans_amount, 2)}}
                                    </h4>
                                </div>
                                <p class="text-muted">
                                     Count : {{$total->active_loans}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="text-center">
                                    <p class="card-text text-bold text-decoration-underline">
                                        Closed Loans</p>
                                </div>
                                <div class="float-right">
                                    <h4 class="bold-text">
                                        Principle: {{ number_format($total->paid_loans_amount,2)}}
                                    </h4>
                                    <h4 class="bold-text text-muted">
                                        Payment: {{ number_format($total->paid_loans_amount_due, 2)}}
                                    </h4>
                                    <h4 class="bold-text text-muted">
                                        Interest: {{ number_format($total->paid_loans_amount_due - $total->paid_loans_amount, 2)}}
                                    </h4>
                                </div>
                                <p class="text-muted">
                                    Count : {{ number_format($total->paid_loans,0)}}
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
                                         {{ number_format($total->loan_amount_due ?? 0, 2)}}
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                 Status : Updated
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
                                             {{ number_format( (array_sum($total->schedules->pluck('paid')->toArray() ?? 0 )), 2)}}
                                        @else
                                            ZMW 0.00
                                        @endif
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                @if($total != null)
                                     Last Payment : {{$total->schedules->where('status',  config('constants.status.loan_paid'))->last()->paid_date ?? "none"}}
                                @else
                                     Last Payment : None
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
                                         {{ number_format( ( ($total->loan_amount_due  ?? 0) - (array_sum($total->schedules->pluck('paid')->toArray() ?? 0)) ), 2)}}
                                        @else
                                            ZMW 0.00
                                        @endif
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                @if($total != null)
                                     Remaining Installments : {{sizeof($total->schedules->where('status', '!=' ,config('constants.status.loan_paid')) ?? 0 )}}
                                @else
                                     Remaining Installments : 0.00
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
                                             {{ number_format( ($total->schedules->where('status', '!=' ,config('constants.status.loan_paid'))->first()->amount ?? "none") ,2)}}
                                        @else
                                            ZMW 0.00
                                        @endif
                                    </h4>
                                </div>
                            </div>
                            <p class="text-muted">
                                @if($total != null)
                                     Next Payment : {{ $total->schedules->where('status', '!=' ,config('constants.status.loan_paid'))->first()->date ?? "none" }}
                                @else
                                     Next Payment : None
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        @endif

        <div class="row">
            <div class="col-12">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
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

        <hr>

        <h5 id="bell" class="card-title p-3 bg-info text-white rounded">Notifications
            <span>{{$notifications->total()}}</span></h5> <br>

        <div class="row">
            {{ $notifications->links() }}
        </div>
        <div class="row">
            <div class="table">
                <table id="table_one" class="table table-striped table-bordered"
                       style="width:100%">
                    <tbody>
                    <div class="card card-body">
                        @foreach($notifications as $notification)
                            <a href="{{$notification->url}} ">
                                <div class="notifications-item">
                                    @if( ($notification->user->avatar ?? "" ) == "" )
                                        <img class="img-circle" width="40px" src="{{asset('images/user.png')}}" alt="">
                                    @else
                                        <img class="img-circle"  width="40px" src="{{$notification->user->avatar ?? ""}}" alt="{{asset('images/user.png')}}">
                                    @endif
                                    <div class="text">
                                        <h4> {{$notification->name}}</h4>
                                        <h6>{{$notification->user->name}} | {{$notification->subject}} </h6>
                                        <p>{{$notification->message}}</p>
                                        <p class="text-xs text-muted">{{ \Carbon\Carbon::parse($notification->created_at)->diffForhumans() }} </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    </tbody>
                </table>

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
