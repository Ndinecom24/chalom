<?php

namespace App\Http\Controllers;

use App\Models\NextOfKin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NextOfKinController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $model = NextOfKin::updateOrCreate(
            [
                'name'=> $request->name,
                'phone'=> $request->phone,
                'email'=> $request->email,
                'address'=> $request->address,
                'relationship'=> $request->relationship,
                'work_status'=> $request->work_status,
                'work_place'=> $request->work_place,
            ],
            [
                'name'=> $request->name,
                'phone'=> $request->phone,
                'email'=> $request->email,
                'address'=> $request->address,
                'relationship'=> $request->relationship,
                'work_status'=> $request->work_status,
                'work_place'=> $request->work_place,
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
    public function update(Request $request)
    {
        $model = NextOfKin::find($request->id);
        $model->name = $request->name;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->address = $request->address;
        $model->relationship = $request->relationship;
        $model->work_status = $request->work_status;
        $model->work_place = $request->work_place;
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
        $model = NextOfKin::destroy($request->id);
        return Redirect::back()->with('message','Deleted Successfully');
    }

}
