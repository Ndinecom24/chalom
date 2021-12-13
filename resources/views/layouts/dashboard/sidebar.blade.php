<div class="docs-nav-sidebar" style="margin-top: -3.5%" >
    <div class="docs-nav">
        <div class="navbar-collapse offcanvas-collapse" id="navbarNav">

            <div class="m-2">
                <a class="navbar-brand" href="{{route('home')}}"><img width="100%" src="{{ asset('theme/borrow/assets/images/brand/logo/logo.png')}}" alt="" /></a>
            </div>

            <ul class="navbar-nav flex-column" style="margin-top: 4%"  >
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">
                        <img width="10%" src="{{asset('images/icons/1.png')}}" alt="">
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <!-- apply for a loan -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('loan.apply')}}">
                        <img width="10%"  src="{{asset('images/icons/4.png')}}" alt="">
                        <span class="menu-title">Apply for loan</span>
                    </a>
                </li>


            @if(\Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.developer.id')
            || \Illuminate\Support\Facades\Auth::user()->role_id  ==  config('constants.role.admin.id')
            )

                <!-- borrower option -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#borrower-pages" aria-expanded="false"
                           aria-controls="borrower-pages">
                            <img  width="10%" src="{{asset('images/icons/9.png')}}" alt="">
                            <span class="menu-title">Borrower<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="borrower-pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="addborrower.php">Add Borrower</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="viewborrower.php">View Borrower</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- end borrower option -->
                    <li class="nav-item">
                        <a class="nav-link" href="apply_for_loan.php">
                            <img width="10%"  src="{{asset('images/icons/4.png')}}" alt="">
                            <span class="menu-title">Apply for loan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loan_application.php">
                            <img width="10%"  src="{{asset('images/icons/5.png')}}" alt="">
                            <span class="menu-title">Loan applications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payloan.php">
                            <img  width="10%" src="{{asset('images/icons/6.png')}}" alt="">
                            <span class="menu-title">Loan Payment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loan_status.php">
                            <img width="10%"  src="{{asset('images/icons/6.png')}}" alt="">
                            <span class="menu-title">Loan Status</span>
                        </a>
                    </li>

                    <!-- liability option -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#liability-pages" aria-expanded="false"
                           aria-controls="liability-pages">
                            <img width="10%"  src="{{asset('images/icons/9.png')}}" alt="">
                            <span class="menu-title">Liability<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="liability-pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="recordsellinfo.php">Record property sell</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="showsellinfo.php">View Property info</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="loanverify.php">
                            <img width="10%"  src="{{asset('images/icons/6.png')}}" alt="">
                            <span class="menu-title">Loan Verification</span>
                        </a>
                    </li>




                    <li class="nav-item">
                        <a class="nav-link" href="{{route('settings')}}">
                            <i class="fa fa-gears"></i>
                            <span class="menu-title">Settings</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loan.product.index')}}">
                            <i class="fa fa-money"></i>
                            <span class="menu-title"> Loan Products</span>
                        </a>
                    </li>

                    <li class="nav-header text-dark fw-bold">Users</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.admins')}}">
                            <i class="fa fa-money"></i>
                            <span class="menu-title"> Admins</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.clients')}}">
                            <i class="fa fa-money"></i>
                            <span class="menu-title"> Clients</span>
                        </a>
                    </li>
                @endif

            </ul>

        </div>
    </div>
</div>
