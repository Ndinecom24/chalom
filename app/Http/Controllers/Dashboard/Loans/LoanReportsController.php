<?php

namespace App\Http\Controllers\Dashboard\Loans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanReportsController extends Controller
{
    public function index(){

        return view('dashboard.loan.reports.index');
    }
}
