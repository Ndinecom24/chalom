<!-- partial:partials/_navbar.html -->
<nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.php"><img src="images/brac.jpg"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo_star_mini.jpg" alt=""></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button"
                data-toggle="minimize">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
            <li class="nav-item">
                <a class="nav-link" href="#"><i
                        class="fa fa-th"> {{\Illuminate\Support\Facades\Auth::user()->name }}</i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}"
                   onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i
                        class="fa fa-sign-out"> Logout</i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

