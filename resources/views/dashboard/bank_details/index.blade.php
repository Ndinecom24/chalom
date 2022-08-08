@extends('layouts.dashboard.main')

@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="page-heading mb-4">Bank Details</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Bank Details</li>
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
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <a href="{{route('user.bank-details.create')}}" class="btn btn-outline-primary " >
                                            {{__('New Details')}}
                                        </a>
                                    </div>
                                </div>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table  class="table table-striped">
                                            <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Type</td>
                                                <td>Account Name</td>
                                                <td>Account #</td>
                                                <td>Provider Name</td>
                                                <td>Provider Branch</td>
                                                <td>Branch Code</td>
                                                <td>Last Action</td>
                                                <td>Action</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($list as $key=>$bankDetails)
                                                <tr>
                                                    <td> {{++$key}} </td>
                                                    <td>{{ $bankDetails->type  }}  </td>
                                                    <td>{{ $bankDetails->account_name  }}  </td>
                                                    <td>{{ $bankDetails->account_number  }}  </td>
                                                    <td>{{ $bankDetails->provider_name  }}  </td>
                                                    <td>{{ $bankDetails->provider_branch ?? ""  }}  </td>
                                                    <td>{{ $bankDetails->branch_code ?? ""  }}  </td>
                                                    <td>{{ \Carbon\Carbon::parse($bankDetails->updated_at)->diffForhumans() }}</td>
                                                    <td>
                                                        <div class="row ">
                                                            <div class="col-3">
                                                                <a class="btn btn-sm btn-secondary" href="{{route('user.bank-details.show', $bankDetails)}}" >
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
