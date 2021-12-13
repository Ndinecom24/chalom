<nav class="navbar navbar-expand-lg py-3 navbar-default  bg-primary-gradient">
    <div class="container px-0">
            <a class="navbar-brand" href="{{route('welcome')}}" ><img width="100%" src="{{ asset('theme/borrow/assets/images/brand/logo/logo.png')}}" alt="" /></a>

    <!-- Button -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default"
                aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('welcome')}}"    `>
                        Home
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarProducts" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarProducts">


                        <li class="dropdown-submenu dropstart-lg">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Loans
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="../pages/loan-listing-image.html">
                                        Loan List Image
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropstart-lg">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Credit Card
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="../pages/credit-card-listing.html">
                                        Credit Card List
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../pages/credit-card-single.html">
                                        Credit Card Single
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarProducts">


                        <li class="dropdown-submenu dropstart-lg">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Loans
                            </a>
                            <ul class="dropdown-menu">
                                {{--                              @foreach()--}}
                                <li>
                                    <a class="dropdown-item" href="../pages/education-loan.html">
                                        Education Loan Single
                                    </a>
                                </li>
                                {{--                                @endforeach--}}
                            </ul>
                        </li>

                        <li><a href="{{route('loan.calculator')}}" class="dropdown-item">
                                Loan Calculator
                            </a>
                        </li>
                        <li>
                            <a href="{{route('loan.eligibility')}}" class="dropdown-item">
                                Eligibility Calculator
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarFeatures" role="button" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Features
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarFeatures">

                        <li><a class="dropdown-item" href="../pages/about.html">About Us</a></li>
                        <li> <a class="dropdown-item" href="../pages/team.html">Team</a></li>
                        <li> <a class="dropdown-item" href="../pages/faq.html">FAQ</a></li>

                        <li> <a class="dropdown-item" href="../pages/error.html">404 error</a></li>
                        <li class="dropdown-submenu dropstart-lg">
                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">
                                Gallery
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="../pages/gallery-filter-2.html">
                                        Two Column
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li><a class="dropdown-item" href="../pages/contact-us.html">Contact
                            </a>
                        </li>

                    </ul>
                </li>


            </ul>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <div class="ms-lg-3 mt-3 d-grid mt-lg-0">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">{{ __('Login') }}</a>
                    </div>
                @endif

                @if (Route::has('register'))
                    <div class="ms-lg-3 mt-3 d-grid mt-lg-0">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">{{ __('Apply for a Loan') }}</a>
                    </div>
                @endif
            @else
                <div class="ms-lg-3 mt-3 d-grid mt-lg-0 text-end" >
                    @if( ($user->avatar ?? "" ) == "" )
                        <img class="nav-item " width="40px" src="{{asset('images/user.png')}}" alt="">
                    @else
                        <img class="nav-item "  width="20%" src="{{$user->avatar ?? ""}}" alt="{{asset('images/user.png')}}">
                    @endif
                </div>
                <div class="ms-lg-3 mt-3 d-grid mt-lg-0"   >
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarProducts" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarProducts">

                                <li>
                                    <a href="{{route('loan.calculator')}}" class="dropdown-item">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('logout')}}" class="dropdown-item"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>

            @endguest

        </div>
    </div>
</nav>


