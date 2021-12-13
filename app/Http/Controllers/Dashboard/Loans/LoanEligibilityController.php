<?php

namespace App\Http\Controllers\Dashboard\Loans;

use App\Http\Controllers\Controller;
use App\Models\Loans\LoanEligibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoanEligibilityController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $model = LoanEligibility::UpdateOrCreate(
            [
                'name' => $request->name,
                'loan_products_id' => $request->loans_id,
                'description' => $request->description,
            ],
            [
                'name' => $request->name,
                'loan_products_id' => $request->loans_id,
                'description' => $request->description,
                'created_by' => $user->id,
            ]
        );
        return Redirect::back()->with('message', $request->name . ' Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loans\LoanEligibility  $loanEligibility
     * @return \Illuminate\Http\Response
     */
    public function show(LoanEligibility $loanEligibility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loans\LoanEligibility  $loanEligibility
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanEligibility $loanEligibility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loans\LoanEligibility  $loanEligibility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanEligibility $loanEligibility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loans\LoanEligibility  $loanEligibility
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanEligibility $loanEligibility)
    {
        //
    }
}
