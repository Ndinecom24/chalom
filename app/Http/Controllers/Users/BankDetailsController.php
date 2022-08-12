<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\BankDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BankDetailsController extends Controller
{

    public function index(){
        $user = Auth::user();
        if ($user->role_id == config('constants.role.client.id')) {
            $list = $user->bankDetails;
        }
        else{
            $list = BankDetails::get();
        }
        return view('dashboard.bank_details.index')->with(compact('list'));
    }



    public function create(){
        $user = auth()->user();
        return view('dashboard.bank_details.create')->with(compact('user'));
    }

    public function show(BankDetails $bankDetails){
        return view('dashboard.bank_details.show')->with(compact('bankDetails'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {


        foreach($request->type as $key => $type ){
            $model = BankDetails::updateOrCreate(
                [
                    'type'=> $request->type[$key],
                    'account_name'=> $request->account_name[$key],
                    'account_number'=> $request->account_number[$key],
                    'provider_name'=> $request->provider_name[$key],
                    'provider_branch'=> $request->provider_branch[$key] ?? "none",
                    'branch_code'=> $request->branch_code[$key] ?? "none",
                    'user_id'=> $request->user,
                ],
                [
                    'type'=> $request->type[$key],
                    'account_name'=> $request->account_name[$key],
                    'account_number'=> $request->account_number[$key],
                    'provider_name'=> $request->provider_name[$key],
                    'provider_branch'=> $request->provider_branch[$key] ?? "none",
                    'branch_code'=> $request->branch_code[$key] ?? "none",
                    'user_id'=> $request->user,
                ]
            );
        }


        return Redirect::route('user.bank-details')->with('message','Bank Details Created Successfully');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $status
     * @return Response
     */
    public function update(Request $request, BankDetails $bankDetails)
    {
        $bankDetails->type = $request->type;
        $bankDetails->account_name = $request->account_name;
        $bankDetails->account_number = $request->account_number;
        $bankDetails->provider_name = $request->provider_name;
        $bankDetails->provider_branch = $request->provider_branch ?? "none";
        $bankDetails->branch_code = $request->branch_code ?? "none";
        $bankDetails->save();
        return Redirect::back()->with('message', ' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return Response
     */
    public function destroy(BankDetails $bankDetails)
    {
        BankDetails::destroy($bankDetails->id);
        return Redirect::route('user.bank-details')->with('message','Bank Details Deleted Successfully');
    }

    public function search(Request $request){
        $user = Auth::user();
        $search_term = $request->search_term ;
        if ($user->role_id == config('constants.role.client.id')) {
            $list = BankDetails::where('user_id', $user->id)
                ->orWhereRaw("LOWER(account_name) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(account_number) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(provider_name) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(provider_branch) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(branch_code) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(type) LIKE LOWER('%".$search_term."%')")
                ->get();
        }
        else{
            $list = BankDetails::whereRaw("LOWER(account_name) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(account_number) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(provider_name) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(provider_branch) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(branch_code) LIKE LOWER('%".$search_term."%')")
                ->orWhereRaw("LOWER(type) LIKE LOWER('%".$search_term."%')")
                ->get();
        }
        return view('dashboard.bank_details.index')->with(compact('list'));
    }

}
