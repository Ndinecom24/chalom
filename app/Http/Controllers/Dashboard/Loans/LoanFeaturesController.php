<?php

namespace App\Http\Controllers\Dashboard\Loans;

use App\Http\Controllers\Controller;
use App\Models\Loans\LoanFeatures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoanFeaturesController extends Controller
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
        $model = LoanFeatures::UpdateOrCreate(
            [
                'name' => $request->name,
                'loan_products_id' => $request->loans_id,
                'image' => $request->image,
                'description' => $request->description,
            ],
            [
                'name' => $request->name,
                'loan_products_id' => $request->loans_id,
                'image' => $request->image,
                'description' => $request->description,
                'created_by' => $user->id,
            ]
        );
        return Redirect::back()->with('message', $request->name. ' Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loans\LoanFeatures  $loanFeatures
     * @return \Illuminate\Http\Response
     */
    public function show(LoanFeatures $loanFeatures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loans\LoanFeatures  $loanFeatures
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanFeatures $loanFeatures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loans\LoanFeatures  $loanFeatures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanFeatures $loanFeatures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loans\LoanFeatures  $loanFeatures
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanFeatures $loanFeatures)
    {
        //
    }
}
