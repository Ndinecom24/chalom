<?php

namespace App\Http\Controllers\Website\Loans;

use App\Http\Controllers\Controller;
use App\Models\Loans\LoanApplications;
use App\Models\Loans\LoanProducts;
use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Status;
use App\Models\Settings\WorkStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $works = WorkStatus::all();

        return view('dashboard.client.loan.create')->with(compact('user', 'works'));
    }

    /**
     * Show the form for apply a new loan.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request, LoanProducts $loanProd)
    {
        $user = Auth::user();
        $works = WorkStatus::all();
        $statuses = Status::all();
        $customer_types = CustomerTypes::where('id','!=', config('constants.customer_type.employee'))->get();

        return view('dashboard.client.loan.apply')->with(compact('user', 'works', 'loanProd', 'statuses', 'customer_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanApplications  $loanApplications
     * @return \Illuminate\Http\Response
     */
    public function show(LoanApplications $loanApplications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanApplications  $loanApplications
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanApplications $loanApplications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoanApplications  $loanApplications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanApplications $loanApplications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanApplications  $loanApplications
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanApplications $loanApplications)
    {
        //
    }
}
