<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\CustomerTypes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomerTypesController extends Controller
{



    public function create(){
        return view('dashboard.admin.settings.customer_types.create');
    }

    public function show(CustomerTypes $customer_types){
        return view('dashboard.admin.settings.customer_types.show')->with(compact('customer_types'));
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
        $model = CustomerTypes::updateOrCreate(
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
    public function update(Request $request, CustomerTypes $customer_types)
    {
        $model = $customer_types ;
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
    public function destroy(Request $request)
    {
        $model = CustomerTypes::destroy($request->id);
        return Redirect::back()->with('message','Deleted Successfully');
    }

}
