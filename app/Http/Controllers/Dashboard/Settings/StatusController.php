<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.admin.settings.statuses.create');
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
        $model = Status::updateOrCreate(
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
     * Display the specified resource.
     *
     * @param Status $status
     * @return Response
     */
    public function show(Status $status)
    {
        return view('dashboard.admin.settings.statuses.show')->with(compact('status'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Status $status
     * @return Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $status
     * @return Response
     */
    public function update(Request $request, Status $status)
    {
        $model = $status;
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
        $model = Status::destroy($request->id);
        return Redirect::back()->with('message','Deleted Successfully');
    }
}
