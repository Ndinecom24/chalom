<?php

namespace App\Http\Controllers;

use App\Models\CustomerTypes;
use App\Models\Roles;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //check user types
        $user = Auth::user();
        if($user->roles_id == config('constants.role.client.id')){
            return view('dashboard.client.home');
        }
        else if($user->roles_id != config('constants.role.client.id') ){
            return view('dashboard.admin.home');
        }
        else{
            dd("Please call system admin to fix your user role");
        }

    }


    public function settings(){
        $statuses = Status::all();
        $customer_types = CustomerTypes::all();
        $roles = Roles::all();
        return view('dashboard.admin.settings.index')
            ->with(compact('statuses', 'roles', 'customer_types'));
    }
}
