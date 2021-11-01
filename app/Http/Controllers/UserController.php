<?php

namespace App\Http\Controllers;

use App\Models\CustomerTypes;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::where('customer_type_id', '=', config('constants.customer_type.employee'))->get();

        foreach ($users as $user){
            $media = $user->getMedia();
            $url = $user->getFirstMediaUrl();
          //  dd($media );
        }
        $types = CustomerTypes::where('id', '=', config('constants.customer_type.employee'))->get();
        $roles = Roles::where('id', '!=', config('constants.role.client.id'))->get();
        return view('dashboard.admin.users.admins')->with(compact('users', 'types', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        //get logged in user
        $user = Auth::user();

//        password' => Hash::make($data['password']),

        $model = User::updateOrCreate(
            [
                "name" => $request->name,
                "dob" => $request->dob,
                "gender" => $request->gender,
                "nid" => $request->nid,
                "email" => $request->email,
                "mobile_number" => $request->mobile_number,
                "customer_type_id" => $request->customer_type_id,
                "role_id" => $request->role_id,
            ],
            [
                "name" => $request->name,
                "dob" => $request->dob,
                "gender" => $request->gender,
                "nid" => $request->nid,
                "email" => $request->email,
                "mobile_number" => $request->mobile_number,
                "customer_type_id" => $request->customer_type_id,
                "role_id" => $request->role_id,
                "password" => Hash::make('password'),
                "status_id" => config('constants.status.activated'),
                "created_by" => $user->id ,
            ]
        );

       // dd($model);

        if($request->file('avatar')) {
            $model->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            $model->update(['avatar' => $request->file('avatar')]);
        }

        return Redirect::back()->with('message',  $request->name.' Account Created Successfully') ;

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
