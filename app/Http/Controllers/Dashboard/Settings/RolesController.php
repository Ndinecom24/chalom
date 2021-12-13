<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Roles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RolesController extends Controller
{


    public function create(){
        return view('dashboard.admin.settings.roles.create');
    }

    public function show(Roles $role){
        return view('dashboard.admin.settings.roles.show')->with(compact('role'));
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
        $model = Roles::updateOrCreate(
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
    public function update(Request $request, Roles $role)
    {
        //$role = Roles::find($request->id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return Redirect::back()->with('message', $role->name . ' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return Response
     */
    public function destroy(Request $request)
    {
        $model = Roles::destroy($request->id);
        return Redirect::back()->with('message','Deleted Successfully');
    }


}
