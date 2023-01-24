@extends('layouts.dashboard.main')

@push('custom-stylesheets')
 <link href="{{asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"    type="text/css"  rel="stylesheet" />
 <link href="{{asset('dashboard/plugins/datatables-bs4/css/responsive.bootstrap4.min.css')}}"    type="text/css"  rel="stylesheet" />
@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark  text-orange ">CRB Summary Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{--                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <p class="lead"> {!! session()->get('message') !!}</p>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-info alert-dismissible">
                <p class="lead"> {!!  session()->get('error') !!}</p>
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
            {{--<div class="col-lg-12 col-md-12">
                <div class="m-2">

                </div>
                <div class="m-2">

                </div>
                <div class="alert alert-warning ml-2">

                </div>
            </div>--}}
        @else

            <div class="container-fluid">
                {{-- paste here --}}

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                        </div>
                        <div class="pull-right mt-2 mb-2">
                            {{--                            <a class="btn btn-success" href="{{route('crbs.create') }}"> Assign Parking Lot</a>--}}
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" id="example1" border="1" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th width="280px" style="text-align: center">Name</th>
                                <th width="280px" style="text-align: center">Marital Status</th>
                                <th width="280px" style="text-align: center">Employer Name</th>
                                <th width="280px" style="text-align: center">NRC No</th>
                                <th width="280px" style="text-align: center">Gender</th>
                                <th width="280px" style="text-align: center">Town</th>
                                <th width="280px" style="text-align: center">District</th>
                                <th width="280px" style="text-align: center">Address</th>
                                <th width="280px" style="text-align: center">Date Applied</th>
                                <th width="280px" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($summaryReport as $loanApplication)

                                <tr>

                                    <td>{{ $loop->index +1 }}</td>
                                    <td>
                                        <a
                                           href="{{route('loan.show', $loan)}}">
                                            {{ $loanApplication->customer->title ?? "" }} {{ $loanApplication->customer->name }}
                                        </a>
                                    </td>
                                    <td>{{ $loanApplication->customer->marital_status ?? "--" }}</td>
                                    <td>
                                    @if(  $loanApplication->customer->workplace)
                                            {{ $loanApplication->customer->workplace->first()->name ?? "--" }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                    <td>{{ $loanApplication->customer->nid }}</td>
                                    <td>{{ $loanApplication->customer->gender  }}</td>
                                    <td>
                                        {{ $loanApplication->customer->city  }},
                                        {{ $loanApplication->customer->country  }}
                                    </td>
                                    <td> {{ $loanApplication->customer->district  }}</td>
                                    <td>
                                        {{ $loanApplication->customer->zip_code  }},
                                        {{ $loanApplication->customer->address ?? '' }}
                                    </td>
                                    <td>{{ $loanApplication->customer->created_at ->toFormattedDateString() }}</td>
                                    <td>
                                        <form action="{{ route('crbs.show',$loanApplication->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('crbs.show',$loanApplication->id) }}"
                                               title="Click to view more details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {!! $summaryReport->links() !!}

            </div><!--/. container-fluid -->
        @endif
    </section>
    <!-- /.content -->

@endsection


@push('custom-scripts')

    <!-- DataTables  & Plugins -->

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
    </script>
@endpush


