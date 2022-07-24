<nav class="navbar navbar-expand-lg py-3 navbar-default  bg-primary-gradient">
    <div class="container px-0">
            <a class="navbar-brand" href="{{route('welcome')}}" ><img width="100%" src="
         {{ asset('theme/borrow/assets/images/brand/logo/chalom_logo.png')}}" alt="" /></a>

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
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarProducts" data-bs-toggle="dropdown"--}}
{{--                       aria-haspopup="true" aria-expanded="false">--}}
{{--                        Products--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarProducts">--}}
{{--                        <li class="dropdown-submenu dropstart-lg">--}}
{{--                            <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#">--}}
{{--                                Loans--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                @foreach($loan_lists as $loan_list)--}}
{{--                                <li>--}}
{{--                                    <a class="dropdown-item" href="">--}}
{{--                                        {{$loan_list->name}}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarProducts">--}}
{{--                        <li><a href="{{route('loan.index')}}" class="dropdown-item">--}}
{{--                                Loans--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li><a href="{{route('loan.calculator')}}" class="dropdown-item">--}}
{{--                                Loan Calculator--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('loan.eligibility')}}" class="dropdown-item">--}}
{{--                                Eligibility Calculator--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarFeatures" role="button" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Chalom
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarFeatures">
                        <li><a class="dropdown-item" href="{{route('company.about')}}">About Us</a></li>
{{--                        <li> <a class="dropdown-item" href="{{route('company.team')}}">Team</a></li>--}}
                        <li> <a class="dropdown-item" href="{{route('company.faq')}}">FAQ</a></li>
                        <li><a class="dropdown-item" href="{{route('company.contact')}}">Contact
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
                <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('home')}}"    `>
                        Dashboard
                    </a>
                </li>
                </ul>
                <div class="ms-lg-3 mt-3 d-grid mt-lg-0"   >
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarProducts" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarProducts">

                                <li>
                                    <a href="{{route('user.profile', auth()->user())}}" class="dropdown-item">
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
                <div class="ms-lg-3 mt-3 d-grid mt-lg-0 text-end" >
                    @if( (Auth::user()->avatar ?? "" ) == "" )
                        <img class="img-circle"  style="border-radius: 100%"  width="40px" src="{{asset('images/user.png')}}" alt="">
                    @else
                        <img class="img-circle "  style="border-radius: 100%"  width="40px" src="{{Auth::user()->avatar ?? ""}}" alt="{{asset('images/user.png')}}">
                    @endif
                </div>

            @endguest

        </div>
    </div>
</nav>


