<nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
            <div class="user-info">
                <img src="{{asset('images/user.png')}}" alt="">
                <p class="name">{{\Illuminate\Support\Facades\Auth::user()->name }} </p>
                <p class="designation">{{\Illuminate\Support\Facades\Auth::user()->email }} </p>
                <span class="online"></span>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">
                        <img src="{{asset('images/icons/1.png')}}" alt="">
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

            <!-- borrower option -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#borrower-pages" aria-expanded="false" aria-controls="borrower-pages">
                        <img src="{{asset('images/icons/9.png')}}" alt="">
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
                        <img src="{{asset('images/icons/4.png')}}" alt="">
                        <span class="menu-title">Apply for loan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="loan_application.php">
                        <img src="{{asset('images/icons/5.png')}}" alt="">
                        <span class="menu-title">Loan applications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payloan.php">
                        <img src="{{asset('images/icons/6.png')}}" alt="">
                        <span class="menu-title">Loan Payment</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="loan_status.php">
                        <img src="{{asset('images/icons/6.png')}}" alt="">
                        <span class="menu-title">Loan Status</span>
                    </a>
                </li>

                <!-- liability option -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#liability-pages" aria-expanded="false" aria-controls="liability-pages">
                        <img src="{{asset('images/icons/9.png')}}" alt="">
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
                        <img src="{{asset('images/icons/6.png')}}" alt="">
                        <span class="menu-title">Loan Verification</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('settings')}}" >
                        <i class="fa fa-gears"></i>
                        <span class="menu-title">Settings</span>
                    </a>
                </li>


                <!-- Users option -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#settings-pages" aria-expanded="false" aria-controls="liability-pages">
                        <i class="fa fa-users"></i>
                        <span class="menu-title">Users <i class="fa fa-sort-down"></i> </span>
                    </a>
                    <div class="collapse" id="settings-pages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">

                                <a class="nav-link" href="{{route('user.admins')}}" >   <i class="fa fa-user-circle"></i> Admins</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="{{route('user.clients')}}" > <i class="fa fa-user-circle-o"></i> Clients</a>
                            </li>
                        </ul>
                    </div>
                </li>



            </ul>
        </nav>

