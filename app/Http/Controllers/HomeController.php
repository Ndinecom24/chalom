<?php

namespace App\Http\Controllers;

use App\Model\Settings\Roles;
use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Status;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;

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
     * @return Renderable
     */
    public function index(Request $request)
    {
        //check user types
        $user = Auth::user();
//        dd(config('constants.role.client.id') );
//        dd($user->role_id );
        if ($user->role_id == config('constants.role.client.id')) {
            return view('dashboard.client.home');
        } else if ($user->role_id == config('constants.role.admin.id')
            || $user->role_id == config('constants.role.developer.id')
        ) {
            return view('dashboard.admin.home');
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('error', 'Your user type is not defined, please call system admin');
        }

    }


    public function settings()
    {
        $statuses = Status::all();
        $customer_types = CustomerTypes::all();
        $roles = \App\Models\Settings\Roles::all();
        return view('dashboard.admin.settings.index')
            ->with(compact('statuses', 'roles', 'customer_types'));
    }
}
