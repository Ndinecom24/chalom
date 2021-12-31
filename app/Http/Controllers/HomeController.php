<?php

namespace App\Http\Controllers;

use App\Model\Settings\Roles;
use App\Models\Dashboard\Logs\Notifications;
use App\Models\dashboardTotals;
use App\Models\Loans\LoanApplications;
use App\Models\Loans\LoanProducts;
use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Status;
use App\Models\Settings\WorkStatus;
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

    public function index(Request $request){
        $work_status = [];
        $loanProducts = LoanProducts::where('statuses_id', config('constants.status.active'))->get();
        return view('welcome')->with(compact('work_status', 'loanProducts'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home(Request $request)
    {

        $total = dashboardTotals::first();
        //check user types
        $user = Auth::user();
        if ($user->role_id == config('constants.role.client.id')) {
            //check if there is a loan request
            $loans = LoanApplications::
            where('statuses_id',  config('constants.status.loan_request_login'));
            if($loans->exists() ){
                $works = WorkStatus::all();
                $statuses = Status::all();
                $loan = $loans->first();
                return view('dashboard.loan.finish_apply')->with(compact('user', 'loan', 'works', 'statuses' ));
            }
            $notifications = Notifications::where('customer_id', $user->id )
                ->get();
            return view('dashboard.home')->with(compact('notifications', 'total'));
        } else if ($user->role_id == config('constants.role.admin.id')
            || $user->role_id == config('constants.role.developer.id')
        ) {
            $notifications = Notifications::where('status_id', config('constants.status.unseen'))->get();
            return view('dashboard.home')->with(compact('notifications', 'total'));
        }
        else {
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
        $works = WorkStatus::all();
        $roles = \App\Models\Settings\Roles::all();
        return view('dashboard.settings.index')
            ->with(compact('works','statuses', 'roles', 'customer_types'));
    }



    public function about(){
        return view('website.about_us');
    }

    public function contact(){
        return view('website.contact_us');
    }

    public function faq(){
        return view('website.faq');
    }

    public function team(){
        return view('website.team');
    }

    public function apply(){
        return view('website.how_to_apply');
    }
}
