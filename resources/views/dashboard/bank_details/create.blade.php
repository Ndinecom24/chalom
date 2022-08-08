@extends('layouts.website.main')

@push('custom-stylesheets')
    <style class="stylesheet">
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        #grad1 {
            background-color: #9C27B0;
            background-image: linear-gradient(120deg, #FF4081, #81D4FA)
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        /*#msform input,*/
        /*#msform textarea {*/
        /*    padding: 0px 8px 4px 8px;*/
        /*    border: none;*/
        /*    border-bottom: 1px solid #ccc;*/
        /*    border-radius: 0px;*/
        /*    margin-bottom: 25px;*/
        /*    margin-top: 2px;*/
        /*    width: 100%;*/
        /*    box-sizing: border-box;*/
        /*    font-family: montserrat;*/
        /*    color: #2C3E50;*/
        /*    font-size: 16px;*/
        /*    letter-spacing: 1px*/
        /*}*/

        /*#msform input:focus,*/
        /*#msform textarea:focus {*/
        /*    -moz-box-shadow: none !important;*/
        /*    -webkit-box-shadow: none !important;*/
        /*    box-shadow: none !important;*/
        /*    border: none;*/
        /*    font-weight: bold;*/
        /*    border-bottom: 2px solid skyblue;*/
        /*    outline-width: 0*/
        /*}*/

        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204px;
            height: 104px;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
    </style>

@endpush

@section('content')
    <!-- partial -->
    <div class="py-2"
         style="background:url({{asset('theme/borrow/assets/images/slider/slider-2.jpg')}})no-repeat; background-position: center; background-size: cover;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12 ">
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
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mb-4 mt-4 p-0 mt-3 mb-2">
                            <form id="finish_apply_form" action="{{ route('user.bank-details.store', compact( 'user')) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3  mr-2">
                                <h2 class="text-center"><strong>Complete your Payment Details</strong></h2>

                                <div class="card-header">
                                    <h6 class="mt-3 mb-2 text-primary">BANK DETAILS</h6>
                                </div>
                                <div class="card-body">
                                    <fieldset>
                                        <div class="row gutters">
                                            <table id="emptbl" class="form-field">
                                                <tr>
                                                    <th>Type <span class="text-danger">*</span></th>
                                                    <th>Account Name <span class="text-danger">*</span></th>
                                                    <th>Account Number <span class="text-danger">*</span></th>
                                                    <th>Provider Name <span class="text-danger">*</span></th>
                                                    <th>Branch Name</th>
                                                    <th>Branch Code</th>
                                                </tr>
                                                <tr>
                                                    <td id="col0">
                                                        <select class="form-control " name="type[]" id="type" required>
                                                            <option value="">--Choose--</option>
                                                            <option value="mobile money">Mobile Money</option>
                                                            <option value="bank account">Bank Account</option>
                                                        </select>
                                                    </td>
                                                    <td id="col1"><input required  class="form-control " type="text" name="account_name[]" value="" /></td>
                                                    <td id="col2"><input required class="form-control " type="text" name="account_number[]" value="" /></td>
                                                    <td id="col3"><input required class="form-control " type="text" name="provider_name[]" value="" /></td>
                                                    <td id="col4"><input  class="form-control "  type="text" name="provider_branch[]" value="" /></td>
                                                    <td id="col5"><input  class="form-control "  type="text" name="branch_code[]" value="" /></td>

                                                </tr>
                                            </table>
                                            <table class="mt-3">
                                                <tr>
                                                    <td><input class="btn btn-sm btn-secondary" type="button" value="Add Row" onclick="addRows()" /></td>
                                                    <td><input  class="btn btn-sm btn-secondary" type="button" value="Delete Row" onclick="deleteRows()" /></td>
                                                    <td><input  class="btn   btn-sm btn-primary" type="submit" value="Submit" /></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>



@endsection


@push('custom-scripts')



    <script type="text/javascript">
        function addRows(){
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length;
            var row = table.insertRow(rowCount);
            for(var i =0; i <= cellCount; i++){
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;

            }
        }
        function deleteRows(){
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if(rowCount > '2'){
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }
            else{
                alert('There should be atleast one row');
            }
        }
    </script>



@endpush
