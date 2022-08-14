<?php

namespace App\Http\Controllers;

use App\Models\BankDetails;
use App\Models\Dashboard\Logs\Notifications;
use App\Models\DashboardTotals;
use App\Models\Loans\LoanApplications;
use App\Models\Settings\LoanCategory;
use App\Models\Loans\LoanProducts;
use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Status;
use App\Models\Settings\WorkStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use function redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request)
    {
        $work_status = [];
        $loanCategories = LoanCategory::with('products')->get();
        return view('welcome')->with(compact('work_status', 'loanCategories'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home(Request $request)
    {
        //check user types
        $user = auth()->user();
        if ($user->role_id == config('constants.role.client.id')) {
            $loans = LoanApplications::orderBy('created_at');
            //check if there is a loan request
            $loans_req = $loans->where('statuses_id', config('constants.status.loan_request_login'))->get() ;
            if ( (sizeof($loans_req) )  > 0 ) {
                $works = WorkStatus::all();
                $statuses = Status::all();
                $loan = $loans_req->first();
                return view('dashboard.loan.finish_apply')->with(compact('user', 'loan', 'works', 'statuses' ));
            } else
            {
                //check if you do not have bank details
                $user->load('bankDetails');
                $bank_details = $user->bankDetails ?? [] ;
                if ( (sizeof($bank_details ) )  > 0 ) {
                    $loan_current = $loans->where('statuses_id', '!=' ,  config('constants.status.loan_rejected') );
                    $total =  $loan_current->first() ;
                    if($total != null ) {
                        $total->load('schedules');
                    }
                    $notifications = Notifications::where('customer_id', $user->id)->orderBy('created_at', 'DESC')->get();
                    return view('dashboard.home')->with(compact('notifications', 'total'));
                }else{
                   session()->flash('message', 'please create your bank or mobile money details');
                    return view('dashboard.bank_details.create')->with(compact('user' ));
                }
            }
        }

        else if ($user->role_id == config('constants.role.admin.id')
            || $user->role_id == config('constants.role.developer.id')
            || $user->role_id == config('constants.role.verifier.id')
            || $user->role_id == config('constants.role.approver.id')
        ) {
            $loans = LoanApplications::orderBy('created_at');
            $total = DashboardTotals::first();
            $notifications = Notifications::where('status_id', config('constants.status.unseen'))->orderBy('created_at', 'desc')->get();
            return view('dashboard.home')->with(compact('notifications', 'total', 'loans'));
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('error', 'Your user type is not defined, please call system admin');
        }

    }


    public function settings()
    {
        $statuses = Status::select('id', 'name', 'description', 'html')->get();
        $customer_types = CustomerTypes::select('id', 'name', 'description')->get();
        $works = WorkStatus::select('id', 'name', 'description')->get();
        $roles = \App\Models\Settings\Roles::select('id', 'name', 'description')->get();
        $loanCategories = LoanCategory ::select('id', 'name', 'description')->get();
        return view('dashboard.settings.index')
            ->with(compact('works', 'statuses', 'roles', 'customer_types', 'loanCategories'));
    }


    public function about()
    {
        return view('website.about_us');
    }

    public function contact()
    {
        return view('website.contact_us');
    }

    public function faq()
    {
        return view('website.faq');
    }

    public function team()
    {
        return view('website.team');
    }

    public function apply()
    {
        return view('website.how_to_apply');
    }
}
