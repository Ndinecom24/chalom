@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Loan Application</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Loan Application</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>

        <div class="row">

            <div class="col-12">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <p class="lead"> {{session()->get('message')}}</p>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
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

            <!-- USERS ACCORDION-->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <form name="searh_loans" method="get" action="{{route('loan.product.search')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control" name="status" id="status">
                                            <option value="{{$state->id ?? 0 }}">{{$state->name ?? "All" }}</option>
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <input type="text" placeholder="Search Term - NRC/Name/Loan Type"
                                               class="form-control" name="search_term" id="search_term">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <button class="btn btn-outline-primary " type="submit">
                                            {{__('Search')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table">
                                            <table class="table table-striped "
                                                   style="overflow-x: auto; display: block; " >
                                                <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Customer</td>
                                                    <td>Type</td>
                                                    <td>Loan</td>
                                                    <td>Rate</td>
                                                    <td>Amount</td>
                                                    <td>Installments</td>
                                                    <td>Amount Repaid</td>
                                                    <td>Balance</td>
                                                    <td>Status</td>
                                                    <td>Last Action</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($list as $key=>$loan)
                                                    <tr>
                                                        <td> {{++$key}} </td>
                                                        <td>@if( ($loan->customer->name ?? "pica" ) == "pica" )
                                                                <span class="text-info">Pending User</span>
                                                            @else
                                                                {{$loan->customer->name }}
                                                            @endif
                                                        </td>
                                                        <td>{{$loan->loan->name}} </td>
                                                        <td>{{number_format( $loan->loan_amount , 2) }}  </td>
                                                        <td>{{ $loan->loan_rate  }}%</td>
                                                        <td>{{number_format( $loan->loan_amount_due , 2) }}  </td>
                                                        <td>{{$loan->repayment_period }}  </td>
                                                        <td>{{$loan->schedules->sum('paid') }}  </td>
                                                        <td>{{number_format( ($loan->loan_amount_due - $loan->schedules->sum('paid')), 2) }}  </td>
                                                        <td> <span class=" text-{{$loan->status->html ?? "info"}}">
                                                            {{$loan->status->name ?? $loan->statuses_id }}
                                                        </span>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($loan->updated_at)->diffForhumans() }}</td>
                                                        <td>
                                                            <div class="row ">
                                                                <div class="col-3">
                                                                    <a class="btn btn-sm btn-secondary"
                                                                       href="{{route('loan.show', $loan)}}">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="pagination-sm">
                                        {{$list->links()}}
                                    </div>
                                </div>
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
