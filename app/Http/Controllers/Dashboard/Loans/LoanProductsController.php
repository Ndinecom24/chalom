<?php

namespace App\Http\Controllers\Dashboard\Loans;

use App\Http\Controllers\Controller;
use App\Models\Loans\LoanProducts;
use App\Models\Settings\LoanCategory;
use App\Models\Settings\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoanProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $list = LoanProducts::paginate(15);
        $list->load('status');
        $statuses = Status::all();
        return view('dashboard.loan_products.index')->with(compact('list', 'statuses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $loanCategories = LoanCategory::select('id', 'name')->get() ;
        $statuses = Status::select('id', 'name')->get() ;
     return view('dashboard.loan_products.create')->with(compact('statuses', 'loanCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $model = LoanProducts::UpdateOrCreate(
            [
                'name' => $request->name,
                'about' => $request->about,
                'rate_per_month' => $request->rate_per_month,
                'arrangement_fee' => $request->arrangement_fee,
                'lowest_amount' => $request->lowest_amount,
                'highest_amount' => $request->highest_amount,
                'lowest_tenure' => $request->lowest_tenure,
                'highest_tenure' => $request->highest_tenure,
                'description' => $request->description,
            ],
            [
                'name' => $request->name,
                'image' => $request->image,
                'about' => $request->about,
                'rate_per_month' => $request->rate_per_month,
                'arrangement_fee' => $request->arrangement_fee,
                'lowest_amount' => $request->lowest_amount,
                'highest_amount' => $request->highest_amount,
                'lowest_tenure' => $request->lowest_tenure,
                'highest_tenure' => $request->highest_tenure,
                'collateral' => $request->collateral ,
                'loan_category_id' => $request->loan_category_id ,
                'dept_service_ratio' => $request->dept_service_ratio ,
                'description' => $request->description,
                'statuses_id' => $request->statuses_id,
                'created_by' => $user->id,
            ]
        );
        return Redirect::back()->with('message', $request->name . ' Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param LoanProducts $loanProducts
     * @return Response
     */
    public function show(LoanProducts $loanProducts)
    {
        $loanProducts->load('faq', 'features', 'eligibility');
        $loanCategories = LoanCategory::select('id', 'name')->get() ;
        $statuses = Status::select('id', 'name')->get() ;
        return view('dashboard.loan_products.show')->with(compact('loanCategories','loanProducts', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LoanProducts $loanProducts
     * @return Response
     */
    public function edit(LoanProducts $loanProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LoanProducts $loanProducts
     * @return Response
     */
    public function update(Request $request, LoanProducts $loanProducts)
    {
        $user = Auth::user();
        $loanProducts->name = $request->name;     // "BUSINESS LOANS"
        $loanProducts->rate_per_month = $request->rate_per_month;     // 10.0
        $loanProducts->arrangement_fee = $request->arrangement_fee;     // 0.0
        $loanProducts->lowest_amount = $request->lowest_amount;     // 5000.0
        $loanProducts->highest_amount = $request->highest_amount;     // 50000.0
        $loanProducts->lowest_tenure = $request->lowest_tenure;     // 1
        $loanProducts->highest_tenure = $request->highest_tenure;     // 36
        $loanProducts->collateral = $request->collateral;     // 36
        $loanProducts->dept_service_ratio = $request->dept_service_ratio;     // "BUSINESS LOANS"
        $loanProducts->loan_category_id = $request->loan_category_id;     // "BUSINESS LOANS"
        $loanProducts->about = $request->about;     // "BUSINESS LOANS"
        $loanProducts->description = $request->description;     // "BUSINESS LOANS"
        $loanProducts->image = $request->image;     // "http://localhost/ndinecom/chalom/public/theme/borrow/assets/images/svg/piggy-bank.svg"
        $loanProducts->statuses_id = $request->statuses_id;     // 1
        $loanProducts->updated_by = $user->id;
        $loanProducts->save() ;

        return Redirect::back()->with('message', 'Loan Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LoanProducts $loanProducts
     * @return Response
     */
    public function destroy(LoanProducts $loanProducts)
    {
        //
    }
}
