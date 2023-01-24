@php use Carbon\Carbon; @endphp
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    @push('custom-scripts')
        <!-- partial -->

{{--        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">--}}
{{--        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"/>--}}
            <link href="{{asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"    type="text/css"  rel="stylesheet" />
            <link href="{{asset('dashboard/plugins/datatables-bs4/css/responsive.bootstrap4.min.css')}}"    type="text/css"  rel="stylesheet" />
    @endpush

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

                <div class="card card-body">
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
                                <span> Count : {{ sizeof($loans) }}</span>
                            </div>
                            <div class="row">
                                <a href="#" wire:click="dueThisMonth()"> <span> Loans <span
                                            class="text-success">Due this month : {{ date('M Y')  }}</span></span>
                                </a>
                            </div>
                            <div class="row">
                                <a href="#" wire:click="defaulted()"> <span> Loans  <span
                                            class="text-danger">Defaulted</span> </span> </a>
                            </div>
                            <div class="row">
                                <a wire:click="dueNextMonth()" href="#"> <span> Loans  <span
                                            class="text-info">Due Next month : {{ date('M Y', strtotime('+1 month'))  }}</span></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                @if(sizeof($loans) > 0)
                    <div class="row">
                        <div class="col-sm-2 mt-3">
                            <div class="card card-body text-center">
                                <h2>{{$loans->count() }}</h2>
                                <h4>Count</h4>
                            </div>
                        </div>
                        <div class="col-sm-2 mt-3">
                            <div class="card card-body text-center">
                                <h2>{{ number_format( ( $loans->sum('loan_amount') )  , 2)}}</h2>
                                <h4>Loaned</h4>
                            </div>
                        </div>
                        <div class="col-sm-2 mt-3">
                            <div class="card card-body text-center">
                                <h2>{{ number_format( ( $loans->sum('loan_amount_due') )  , 2)}}</h2>
                                <h4>Due</h4>
                            </div>
                        </div>
                        <div class="col-sm-2 mt-3">
                            <div class="card card-body text-center">
                                <h2>{{ number_format(   $loans->plucK('schedules')->flatten()->sum('paid')  , 2)}} </h2>
                                <h4>Paid</h4>
                            </div>
                        </div>
                        <div class="col-sm-2 mt-3">
                            <div class="card card-body text-center">
                                <h2> {{ number_format( ( $loans->sum('loan_amount_due') -  $loans->plucK('schedules')->flatten()->sum('paid') )  , 2)}} </h2>
                                <h4>Balance</h4>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card mt-3 ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table">
                                    <table class="table table-bordered" id="example1" border="1" >

                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Customer</td>
                                            <td>Phone</td>
                                            <td>Type</td>
                                            <td>Loan</td>
                                            <td>Rate</td>
                                            <td>Amount</td>
                                            <td>Installments</td>
                                            <td>Amount Repaid</td>
                                            <td>Balance</td>
                                            <td>Status</td>
                                            <td>Created At</td>
                                            <td>Last Action</td>
                                            <td>Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($loans as $key=>$loan)
                                            <tr>
                                                <td> {{++$key}} </td>
                                                <td>
                                                    @if( ($loan->customer->name ?? "pica" ) == "pica" )
                                                        <span class="text-info">Pending User</span>
                                                    @else
                                                        {{$loan->customer->title }}  {{$loan->customer->name }}
                                                    @endif
                                                </td>
                                                <td>  {{ $loan->customer->mobile_number }} </td>
                                                <td>  {{ $loan->loan->name }} </td>
                                                <td>  {{ number_format( $loan->loan_amount , 2) }}  </td>
                                                <td>  {{ $loan->loan_rate  }}%</td>
                                                <td>  {{ number_format( $loan->loan_amount_due , 2) }}  </td>
                                                <td>  {{ $loan->repayment_period }}  </td>
                                                <td>  {{ $loan->schedules->sum('paid') }}  </td>
                                                <td>  {{ number_format( ($loan->loan_amount_due - $loan->schedules->sum('paid')), 2) }}  </td>
                                                <td>
                                                    <span class=" text-{{$loan->status->html ?? "info"}}">
                                                            {{$loan->status->name ?? $loan->statuses_id }}
                                                        </span>
                                                </td>
                                                <td>{{ Carbon::parse($loan->date_submitted)->toFormattedDateString() }}</td>
                                                <td>{{ Carbon::parse($loan->updated_at)->diffForhumans() }}</td>
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
                                        <tfoot>

                                        @if(sizeof($loans) > 0)
                                            <tr class="tfoot text-bold text-uppercase">
                                                <td> TOTALS</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ number_format(  $loans->sum('loan_amount') , 2)}}</td>
                                                <td></td>
                                                <td>{{ number_format(  $loans->sum('loan_amount_due') , 2)}}</td>
                                                <td></td>
                                                <td>{{ number_format(   $loans->plucK('schedules')->flatten()->sum('paid')  , 2)}}</td>
                                                <td>{{ number_format( ( $loans->sum('loan_amount_due') -  $loans->plucK('schedules')->flatten()->sum('paid') )  , 2)}}</td>
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

        </div>
    </div>

    @push('custom-scripts')

            <script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/jszip/jszip.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/pdfmake/pdfmake.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
            <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


            <!-- page script -->
            <script>
                window.addEventListener('contentChanged', event =>{
                    $(function () {
                        $("#example1").DataTable({
                            "responsive": true, "lengthChange": false, "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        });
                    });
                });

            </script>



    @endpush


</div>
