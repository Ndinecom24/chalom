<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use App\Models\Files;
use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{

    public function profile(User $user)
    {
        $types = CustomerTypes::get();
        $roles = Roles::get();
        $user_types = 'Customers';
        return view('dashboard.users.profile')->with(compact('user', 'types', 'roles', 'user_types'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::where('customer_type_id', '!=', config('constants.customer_type.employee'))->get();
        $user_types = 'Customers';
        $types = CustomerTypes::where('id', '!=', config('constants.customer_type.employee'))->get();
        $roles = Roles::where('id', '=', config('constants.role.client.id'))->get();
        return view('dashboard.users.index')->with(compact('users', 'types', 'roles', 'user_types'));
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
        //create
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
                "created_by" => $user->id,
            ]
        );

        //save avatar
        $filesModel = new Files();
        $file = $request->file('avatar');
        $saved_file = $filesModel->upload($request, $file, config('constants.types.avatar'), $model);
        $model->profile_img = $saved_file->id;
        $model->save();

        if ($request->file('avatar')) {
            $model->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            $model->update(['profile_img' => $request->file('avatar')]);
        }

        return Redirect::back()->with('message', $request->name . ' Account Created Successfully');

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
        $user = User::find($id);
        $user->name = $request->name;
        $user->mobile_number = $request->mobile_number;
        $user->dob = $request->dob;
        $user->email = $request->email;
        $user->nid = $request->nid;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->plot_street = $request->plot_street;
        $user->zip_code = $request->zip_code;
        $user->role_id = $request->role_id;
        $user->customer_type_id = $request->customer_type_id;
        $user->save();

        return Redirect::back()->with('message', $user->name . ' Details Updated Successfully');
    }

    public function image(Request $request, User $user)
    {
        //  dd($request->profile_img); // profile_img

        //save avatar
        $filesModel = new FilesController();
        $file = $request->file('avatar');
        $saved_file = $filesModel->upload($request, $file, config('constants.types.avatar'), $user);
        $user->avatar = $saved_file->path;
        $user->save();


        return Redirect::back()->with('message', $request->name . ' Profile Image Updated Successfully');

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
