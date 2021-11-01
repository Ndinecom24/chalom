<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Micro Credit Management</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- DataTables CSS -->
    <link href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables.responsive.css')}}" rel="stylesheet">
    <!-- main  + bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">

    <link rel="shortcut icon" href="images/favicon.png"/>

</head>

<body>
<!-- start scroller container -->
<div class=" container-scroller">

@include('layouts.dashboard.client.nav')

    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-right">

        @include('layouts.dashboard.client.sidebar')


        @yield('content')

        </div>
        </div>

    @include('layouts.dashboard.client.footer')
    <!-- partial -->
    </div>
</div>

</body>


<script src="{{asset('assets/js/jquery-3.1.0.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script src="{{asset('assets/js/chart.js')}}"></script>
<!-- DataTables JavaScript -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.responsive.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true
        });

    });


</script>

</html>
