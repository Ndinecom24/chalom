@php use Carbon\Carbon; @endphp
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    @push('custom-scripts')
        <!-- partial -->

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"/>
    @endpush

    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Loan Installments</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Loan Installments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <hr>

        {{--        <div class="row">--}}

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

        <div class="card">
            <div class="card-body" id="headingOne">


                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <form wire:submit.prevent="search">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 col-sm-12">
                                    <label class>Status</label>
                                    <select class="form-control" wire:model="status" name="status"
                                            id="status">
                                        <option
                                            value="{{$state->id ?? 0 }}">{{$state->name ?? "All" }}</option>
                                        <option value="0">All</option>
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <label class>Term</label>
                                    <input type="text" placeholder="Search Term - NRC/Name/Loan Type"
                                           value="{{$search_term ?? "" }}" class="form-control"
                                           wire:model="search_term" name="search_term" id="search_term">
                                </div>
                                <div class="col-md-2 col-sm-12 ">
                                    <div class="mt-4">
                                        <button class="btn btn-outline-primary " type="submit">
                                            {{__('Search')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-5 col-sm-12">
                                    <label class>From</label>
                                    <input type="date" placeholder="date_from" title="ENTER DATE FROM"
                                           class="form-control"
                                           wire:model="date_from" name="date_from" id="date_from">
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <label class>To</label>
                                    <input type="date" placeholder="date_to" title="ENTER DATE TO"
                                           class="form-control" name="date_to"
                                           wire:model="date_to" id="date_to">
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <div class="m-3">
                                        <div wire:loading class="  ml-lg-3  float-sm-right">
                                            <div class="spinner-border text-success" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="row">
                            <span> Count : {{ sizeof($installments) }}</span>
                        </div>
                        <div class="row">
                            <a href="#" wire:click="dueThisMonth()"> <span> Installments <span
                                        class="text-success">Due this month : {{ date('M Y')  }}</span></span>
                            </a>
                        </div>
                        <div class="row">
                            <a href="#" wire:click="defaulted()"> <span> Installments  <span
                                        class="text-danger">Defaulted</span> </span> </a>
                        </div>
                        <div class="row">
                            <a wire:click="dueNextMonth()" href="#"> <span> Installments  <span
                                        class="text-info">Due Next month : {{ date('M Y', strtotime('+1 month'))  }}</span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @if(sizeof($installments) > 0)
            <div class="row">
                <div class="col-sm-2 mt-3">
                    <div class="card card-body text-center">
                        <h2>{{$installments->count() }}</h2>
                        <h4>Count</h4>
                    </div>
                </div>
                <div class="col-sm-2 mt-3">
                    <div class="card card-body text-center">
                        <h2>{{ number_format( ( $installments->sum('balance') )  , 2)}}</h2>
                        <h4>Balance</h4>
                    </div>
                </div>
            </div>
        @endif

        <div class="card  mt-3 mb-3">
            <div class="card-header">
                <span>{{$delay ?? ""}}</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table">
                            <table id="table_one" class="table table-striped table-bordered"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Customer</td>
                                    <td>Type</td>
                                    <td>Loan</td>
                                    <td>Rate</td>
                                    <td>Amount</td>
                                    <td>Inst</td>
                                    <td>Inst Amount</td>
                                    <td>Paid</td>
                                    <td>Balance Due</td>
                                    <td>Due Date</td>
                                    <td>Status</td>
                                    <td>Created At</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($installments as $key=>$installment)
                                    <tr>
                                        <td> {{++$key}} </td>
                                        <td>
                                            @if( ($installment->loan->customer->name ?? "pica" ) == "pica" )
                                                <span class="text-info">Pending User</span>
                                            @else
                                                {{$installment->loan->customer->title }} {{$installment->loan->customer->name }}
                                            @endif
                                        </td>
                                        <td>{{$installment->loan->loan->name}} </td>
                                        <td> {{number_format( $installment->loan->loan_amount , 2) }}  </td>
                                        <td>{{ $installment->loan->loan_rate  }}%</td>
                                        <td>{{number_format( $installment->loan->loan_amount_due , 2) }}  </td>
                                        <td>{{$installment->installment}}
                                            / {{$installment->loan->repayment_period }}  </td>
                                        <td>{{ number_format($installment->amount ?? 0,2) }}  </td>
                                        <td>{{number_format( ($installment->paid ?? 0), 2) }}  </td>
                                        <td class="text-danger">{{number_format( ($installment->balance ?? 0), 2) }}  </td>
                                        <td>{{ Carbon::parse($installment->date)->toFormattedDateString() }}</td>
                                        <td> <span class=" text-{{$installment->loan->status->html ?? "info"}}">
                                                            {{$installment->loan->status->name ?? $installment->status }}
                                                        </span>
                                        </td>
                                        <td>{{ Carbon::parse($installment->created_at)->toFormattedDateString() }}
                                            - {{ Carbon::parse($installment->created_at)->diffForhumans() }}</td>
                                        <td>
                                            <div class="row ">
                                                <div class="col-3">
                                                    <a class="btn btn-sm btn-secondary"
                                                       href="{{route('loan.show', $installment->loan)}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>

                                @if(sizeof($installments) > 0)
                                    <tr class="tfoot text-bold text-uppercase">
                                        <td></td>
                                        <td> TOTALS</td>
                                        <td></td>
                                        <td>{{ number_format(  $installments->plucK('loan')->flatten()->sum('loan_amount') , 2)}}</td>
                                        <td></td>
                                        <td>{{ number_format(  $installments->plucK('loan')->flatten()->sum('loan_amount_due') , 2)}}</td>
                                        <td></td>
                                        {{--                                                        <td>{{ number_format(   $installments->plucK('schedules')->flatten()->sum('paid')  , 2)}}</td>--}}
                                        {{--                                                        <td>{{ number_format( ( $installments->sum('loan_amount_due') -  $installments->plucK('schedules')->flatten()->sum('paid') )  , 2)}}</td>--}}
                                        <td>{{ number_format(   $installments->sum('amount')  , 2)}}</td>
                                        <td>{{ number_format(   $installments->sum('paid')  , 2)}}</td>
                                        <td class="text-danger">{{ number_format( ( $installments->sum('balance') )  , 2)}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @push('custom-scripts')

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

        <script>

            $(document).ready(function () {
                $('#table_one').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                });
            });

        </script>

    @endpush


</div>
