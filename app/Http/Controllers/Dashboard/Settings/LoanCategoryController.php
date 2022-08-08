<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\LoanCategory ;
use App\Models\Settings\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoanCategoryController extends Controller
{

    public function create(){
        return view('dashboard.settings.loan_category.create');
    }

    public function show(LoanCategory $loanCategory){
        return view('dashboard.settings.loan_category.show')->with(compact('loanCategory'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $model = LoanCategory::updateOrCreate(
            [
                'name' => $request->name,
                'description' => $request->description,
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'created_by' => $user->id,
            ]
        );

        return Redirect::back()->with('message', $model->name . ' Created Successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $status
     * @return Response
     */
    public function update(Request $request, LoanCategory $loanCategory)
    {
        $model = $loanCategory ;
        $model->name = $request->name;
        $model->description = $request->description;
        $model->save();
        return Redirect::back()->with('message', $model->name . ' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return Response
     */
    public function destroy( LoanCategory $loanCategory)
    {
         LoanCategory::destroy($loanCategory->id);
        return redirect()->route('settings')->with('message','Loan Category Deleted Successfully');
    }
}
