<div class="docs-nav-sidebar" style="margin-top: -3.5%" >
    <div class="nav">
        <div class="navbar-collapse offcanvas-collapse" id="navbarNav">

            <div class="m-2">
                <a class="navbar-brand" href="{{route('home')}}"><img width="100%" src="
         {{ asset('theme/borrow/assets/images/brand/logo/chalom_logo.png')}}" alt="" /></a>
            </div>

            <ul class="navbar-nav flex-column" style="margin-top: 4%"  >
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">
                        <img width="10%" src="{{asset('images/icons/1.png')}}" alt="">
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
            @if(\Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.client.id')
     )
                <!-- apply for a loan -->
                    <li class="nav-header text-dark fw-bold">Loans</li>
                    <!-- end borrower option -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">
                            <i class="text-danger text-primary-hover bi bi-pencil-square"></i>
                            <span class="menu-title">Apply for loan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loan.product.search')}}">
                            <i class="text-danger text-primary-hover bi bi-file-check"></i>
                            <span class="menu-title">Loan applications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.bank-details')}}">
                            <i class="text-danger text-primary-hover bi bi-wallet"></i>
                            <span class="menu-title">Bank Details</span>
                        </a>
                    </li>

                @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.developer.id')
            || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.admin.id')
             || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.verifier.id')
        || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.approver.id')
            )

                    <li class="nav-header text-dark fw-bold">Loans</li>
                    <!-- end borrower option -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}" >
                            <i class="text-danger text-primary-hover bi bi-pencil-square"></i>
                            <span class="menu-title">Apply for loan</span>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('loan.product.search')}}">--}}
{{--                            <i class="text-danger text-primary-hover bi bi-file-check"></i>--}}
{{--                            <span class="menu-title">Loan applications</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.bank-details')}}">
                            <i class="text-danger text-primary-hover bi bi-wallet"></i>
                            <span class="menu-title">Bank Details</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loan.reports.index')}}">
                            <i class="text-danger text-primary-hover bi bi-wallet"></i>
                            <span class="menu-title">Loan applications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loan.installments.index')}}">
                            <i class="text-danger text-primary-hover bi bi-binoculars"></i>
                            <span class="menu-title">Loan Installments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('crb.summary.report')}}">
                            <i class="text-danger text-primary-hover bi bi-file"></i>
                            <span class="menu-title">CRB Summary Report</span>
                        </a>
                    </li>




                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.developer.id')
                || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.admin.id')
//                 || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.verifier.id')
//            || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.approver.id')
                )


                    <li class="nav-header text-dark fw-bold">Maintenance</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('settings')}}">
                            <i class="text-danger text-primary-hover bi bi-gear"></i>
                            <span class="menu-title">Settings</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loan.product.index')}}">
                            <i class="text-danger text-primary-hover bi bi-collection"></i>
                            <span class="menu-title"> Loan Products</span>
                        </a>
                    </li>

                    <li class="nav-header text-dark fw-bold">Users</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.admins')}}">
                            <i class="text-danger text-primary-hover bi bi-people"></i>
                            <span class="menu-title"> Admins</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.clients')}}">
                            <i class="text-danger text-primary-hover bi bi-people"></i>
                            <span class="menu-title"> Clients</span>
                        </a>
                    </li>
                @endif

            </ul>

        </div>
    </div>
</div>
