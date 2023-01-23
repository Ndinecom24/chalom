<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;
use App\Models\Loans\LoanApplications;

class CRBSummaryReportController extends Controller
{

    public function summaryReport()
    {

        $summaryReport = LoanApplications::latest()->paginate(1000000);

        return view('dashboard.crb.index')->with(compact(
            'summaryReport'
        ));

    }

    public function index()
    {}

}
