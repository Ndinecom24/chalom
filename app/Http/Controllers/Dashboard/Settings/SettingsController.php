<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Loans\LoanProducts;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.loans.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loans\LoanProducts  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(LoanProducts $loan)
    {
        return view('website.loans.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loans\LoanProducts  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanProducts $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loans\LoanProducts  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanProducts $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loans\LoanProducts  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanProducts $loan)
    {
        //
    }


    public function calculator(){
        return view('website.loans.calculator');
    }
}
