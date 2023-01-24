<?php

namespace App\Http\Controllers\Website\Loans;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\FilesController;
use App\Http\Requests\LoanApplicationRequest;
use App\Models\Dashboard\Logs\Notifications;
use App\Models\LoanPayments;
use App\Models\Loans\LoanApplications;
use App\Models\Loans\LoanApproals;
use App\Models\Loans\LoanProducts;
use App\Models\Loans\LoanSchedule;
use App\Models\NextOfKin;
use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Status;
use App\Models\Settings\WorkPlace;
use App\Models\Settings\WorkStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class LoanApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $statuses = Status::all();
        $list2 = DB::select(
            DB::raw("select * from loan_applications where id not in
                                      ( select DISTINCT loan_applications_id from loan_schedules)
                                        and statuses_id != 4 "));
        $list = LoanApplications::with('loan', 'schedules')->hydrate($list2);

        return view('dashboard.loan.list')->with(compact('list', 'statuses'));
    }

    public function syncSchedules(LoanApplications $loan, Request $request)
    {

                // find the schedules
        $date1 = $loan->date_submitted;
        for ($i = 1; $i <= $loan->repayment_period; $i++) {
            $installment_number = $i;
            $date = date("Y-m-d", strtotime($i . " month", strtotime($date1)));

            $istallments = LoanSchedule::where('amount', $loan->getMonthlyInstallmentsAttribute2())
                ->where( 'installment' , 'Installment '.$installment_number)
                ->whereDate( 'date' , $date )
                ->get( );

            foreach ($istallments as $istallmentpl) {
                $loan_check = LoanApplications::with('schedules')->find($loan->id);

                if ( $loan_check->schedules->count() == $istallments->count()){
                    //do nothing
                }
                else {
                    $istallmentpl->loan_applications_id = $loan->id;
                    $istallmentpl->modal_uuid = $loan->uuid;
                    $istallmentpl->customer_id = $loan->customer_id;
                    $istallmentpl->status = $loan->statuses_id;
                    $istallmentpl->save();
                }

            }

        }


        return redirect()->back()->with('message', 'Schedules changed');

    }

    public function save(Request $request, User $user)
    {
        //
        $status = config('constants.status.loan_request_login');
        $logged_in = Auth::user();
        //
        $uuid = Str::uuid()->toString();
        $customer_type = $request->customer_type;

        //get the loan
        $loan = LoanProducts::find($request->loan_prod);

        //loan applications
        $model = LoanApplications::UpdateOrCreate(
            [
                "uuid" => $uuid,
                "loan_amount" => $request->loan_amount,
                "loan_product_id" => $request->loan_prod,
                "repayment_period" => $request->repayment_period,
                "monthly_income" => $request->monthly_income,
                "other_income" => $request->other_income ?? 0,
                "monthly_deduct" => $request->monthly_deduct ?? 0,
                "statuses_id" => $status
            ],
            [
                "uuid" => $uuid,
                "loan_purpose" => $request->loan_purpose,
                "loan_amount" => $request->loan_amount,
                "loan_product_id" => $request->loan_prod,
                "repayment_period" => $request->repayment_period,
                "monthly_income" => $request->monthly_income ?? 0,
                "other_income" => $request->other_income ?? 0,
                "monthly_deduct" => $request->monthly_deduct ?? 0,
                "loan_rate" => $loan->rate_per_month ?? 0,
                "loan_amount_due" => $request->total_repayment,
                "loan_arrangement_fee" => $loan->arrangement_fee ?? 0,
                'collateral_description' => $loan->collateral ?? "none",
                "customer_id" => $user->id ?? 0,
                "created_by" => $logged_in->id ?? 0,
                "statuses_id" => $status
            ]
        );

        session(['my_loan_request' => $model->id]);

        //return
        $data['uuid'] = $uuid;
        $data['customer_type'] = $customer_type;
        return json_encode($data);
    }

    public function stateChange(LoanApplications $loan, Request $request)
    {


//        // find the schedules
//        $date1 = $loan->date_submitted;
//        for ($i = 1; $i <= $loan->repayment_period; $i++) {
//            $installment_number = $i;
//            $date = date("Y-m-d", strtotime($i . " month", strtotime($date1)));
//
//            $istallments = LoanSchedule::where('amount', $loan->getMonthlyInstallmentsAttribute2())
//                ->where('installment', $installment_number)
//                ->whereDate('date', $date)
//                ->get();
//
//            foreach ($istallments as $istallmentpl) {
//                $istallmentpl->loan_applications_id = $loan->id;
//                $istallmentpl->modal_uuid = $loan->uuid;
//                $istallmentpl->customer_id = $loan->customer_id;
//                $istallmentpl->status = $loan->statuses_id;
//                $istallmentpl->save();
//            }
//
//        }


        //update status if changed

        if (isset($request->change_state)) {
            $loan->statuses_id = $request->change_state;
            foreach ($loan->schedules as $schedule) {
                $schedule->status = $request->change_state;
                if ($request->change_state == config('constants.status.loan_paid')) {
                    $schedule->status = $request->change_state;
                    $schedule->paid = $schedule->amount;
                    $schedule->balance = 0;
                }
                $schedule->save();
            }
            $loan->save();
        }


        return redirect()->back()->with('message', 'state changed');

    }

    public function search(Request $request)
    {

        $statuses = Status::all();
        $state = $request->search_term ?? "";
        $search_term = $request->search_term ?? "";
        $date_from = $request->date_from ?? "";
        $date_to = $request->date_to ?? "";

        if ($request->status == 0) {

            if ($request->search_term == null) {

                //filter by date
                if (($request->date_from == null) && ($request->date_to == null)) {

                    //get the current year
                    $list = LoanApplications::whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->orderBy('created_at', 'desc')->take(10)->get();

                } elseif (($request->date_from != null) && ($request->date_to == null)) {
                    $list = LoanApplications::where('created_at', '>=', $request->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from == null) && ($request->date_to != null)) {
                    $list = LoanApplications::where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from != null) && ($request->date_to != null)) {
                    $list = LoanApplications::where('created_at', '>=', $request->date_from)
                        ->where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }


            } else {
                $users = User::where('name', 'like', '%' . $request->search_term . '%')
                    ->orWhere('nid', 'like', '%' . $request->search_term . '%')
                    ->orWhere('mobile_number', 'like', '%' . $request->search_term . '%')
                    ->orWhere('email', 'like', '%' . $request->search_term . '%')
                    ->get();


                //filter by date
                if (($request->date_from == null) && ($request->date_to == null)) {
                    //get the current year
                    $list = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->orderBy('created_at', 'desc')->take(10)->get();
                } elseif (($request->date_from != null) && ($request->date_to == null)) {
                    $list = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $request->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from == null) && ($request->date_to != null)) {
                    $list = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from != null) && ($request->date_to != null)) {
                    $list = LoanApplications::whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $request->date_from)
                        ->where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }
            }
        } else {
            $state = Status::find($request->status);
            if ($request->search_term == null) {


                //filter by date
                if (($request->date_from == null) && ($request->date_to == null)) {
                    //get the current year
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->orderBy('created_at', 'desc')->take(10)->get();
                } elseif (($request->date_from != null) && ($request->date_to == null)) {
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->where('created_at', '>=', $request->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from == null) && ($request->date_to != null)) {
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from != null) && ($request->date_to != null)) {
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->where('created_at', '>=', $request->date_from)
                        ->where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }

            } else {
                $users = User::where('name', 'like', '%' . $request->search_term . '%')->get();


                //filter by date
                if (($request->date_from == null) && ($request->date_to == null)) {
                    //get the current year
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from != null) && ($request->date_to == null)) {
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $request->date_from)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from == null) && ($request->date_to != null)) {
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } elseif (($request->date_from != null) && ($request->date_to != null)) {
                    $list = LoanApplications::where('statuses_id', $request->status)
                        ->whereIn('customer_id', $users->pluck('id')->toArray())
                        ->where('created_at', '>=', $request->date_from)
                        ->where('created_at', '<=', $request->date_to)
                        ->orderBy('created_at', 'desc')->get();
                } else {
                    //
                }

            }
        }

//search_term
        $list->load('loan', 'schedules');


        return view('dashboard.loan.index')->with(compact('list', 'date_to', 'date_from',
            'statuses', 'search_term', 'state'));
    }

    /**
     * Show the form for apply a new loan.
     *
     * @return Response
     */
    public function apply(Request $request)
    {
        $loanProd = LoanProducts::find($request->loan_purpose);
        $loanProd->load('category');
        $user = Auth::user();
        $works = WorkStatus::all();
        $statuses = Status::all();
        $customer_types = CustomerTypes::where('id', '!=', config('constants.customer_type.employee'))->get();
        return view('dashboard.loan.apply')->with(compact('user', 'works', 'loanProd', 'statuses', 'customer_types'));
    }

    public function finish(LoanApplicationRequest $request, LoanApplications $loan, User $user)
    {

        $status_unseen = config('constants.status.unseen');
        $status = config('constants.status.loan_submission');
        $user_type = config('constants.customer_type.returning');
        $logged_in = Auth::user();
        $schedule_amount = ($loan->loan_amount_due / $loan->repayment_period);

        $loan->loan('loan');

        //save workplace details

        $work_place = WorkPlace::updateOrCreate(
            [
                'name' => strtoupper( trim($request->workplace_name)),
                'user_id' => $user->id
            ],
            [
                'name' => strtoupper( trim($request->workplace_name)),
                'address' => strtoupper( trim($request->workplace_address)),
                'user_id' => $user->id
            ]
        );

        //validate if it needs a collateral
        if ($loan->loan->collateral == "Need Collateral") {
            if ($request->hasFile('collateral')) {
                //file attached
            } else {
                return redirect()->back()->with('error', 'This loan needs collateral documentation. Please attach documentation and enter collateral description');
            }
        }


        //  dd($request->all() );
        /** upload identity file */
//        $file = $request->file('identity');
//        if ($request->hasFile('identity')) {
//            $filesController = new FilesController();
//            $identity = $filesController->upload($request, $file, config('constants.types.identity'), $user);
//            $user->identity = $identity->uuid ?? $identity->id;
//        }

        if (($request->identity ?? "pica") != "pica") {
            foreach ($request->file('identity') as $file) {
                $filesController = new FilesController();
                $identity = $filesController->upload($request, $file, config('constants.types.identity'), $user);
                $user->identity = $identity->uuid ?? $identity->id;
            }
        }

        /** upload account_statement file */
//        $file = $request->file('account_statement');
//        if ($request->hasFile('account_statement')) {
//            $filesController = new FilesController();
//            $filesController->upload($request, $file, config('constants.types.account_statement'), $loan);
//        }
        foreach ($request->file('account_statement') as $file) {
            $filesController = new FilesController();
            $filesController->upload($request, $file, config('constants.types.account_statement'), $loan);
        }

        /** upload payslip_one file */
        $file = $request->file('payslip_one');
        if ($request->hasFile('payslip_one')) {
            $filesController = new FilesController();
            $filesController->upload($request, $file, config('constants.types.payslip'), $loan);
        }

        /** upload payslip_two file */
        $file = $request->file('payslip_two');
        if ($request->hasFile('payslip_two')) {
            $filesController = new FilesController();
            $filesController->upload($request, $file, config('constants.types.payslip'), $loan);
        }


        /** upload collateral file */
//        $file = $request->file('collateral');
//        if ($request->hasFile('collateral')) {
//            $filesController = new FilesController();
//            $filesController->upload($request, $file, config('constants.types.collateral'), $loan);
//        }
        foreach ($request->file('collateral') as $file) {
            $filesController = new FilesController();
            $filesController->upload($request, $file, config('constants.types.collateral'), $loan);
        }

        //save next of kin
        $kin = NextOfKin::UpdateOrCreate([
                'name' => $request->kin_name,
                'nid' => $request->kin_nid,
                'relationship' => $request->kin_relationship,
                'user_id' => $user->id,
            ]
            ,
            [
                'name' => $request->kin_name,
                'phone' => $request->kin_phone,
                'email' => $request->kin_email,
                'address' => $request->kin_address,
                'nid' => $request->kin_nid,
                'relationship' => $request->kin_relationship,
                'work_status' => $request->kin_work,
                'work_place' => $request->kin_work_place,
                'user_id' => $user->id,
                'created_by' => $logged_in->id,
            ]);


        //user
        $user->mobile_number = $request->mobile_number;
        $user->dob = $request->dob;
        $user->nid = $request->nid;
        $user->gender = $request->gender;
        $user->address = $request->plot_street;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->customer_type_id = $user_type;
        $user->plot_street = $request->plot_street;
        $user->zip_code = $request->zip_code;
        $user->work_status_id = $request->work_status_id;
        $user->marital_status = $request->marital_status;
        $user->district = $request->district;

        $user->save();

        //loan
        $loan->statuses_id = $status;
        $loan->date_submitted = date('Y-m-d');
        $loan->collateral_description = $request->collateral_description ?? $loan->loan->collateral;
        $loan->save();

        //schedule
        for ($i = 1; $i <= $loan->repayment_period; $i++) {
            $schedule = LoanSchedule::firstOrCreate(
                [
                    'loan_applications_id' => $loan->id,
                    'modal_uuid' => $loan->uuid,
                    'customer_id' => $loan->customer_id,
                    'status' => $status,
                    'installment' => $i,
//                    'date' => date("Y-m-d", strtotime($i . " month")),
                    'amount' => $schedule_amount,
                ],
                [
                    'loan_applications_id' => $loan->id,
                    'modal_uuid' => $loan->uuid,
                    'customer_id' => $loan->customer_id,
                    'status' => $status,
                    'installment' => $i,
                    'date' => date("Y-m-d", strtotime($i . " month")),
                    'amount' => $schedule_amount,
                ]
            );
        }

        //url
        $url = route('loan.show', $loan);

        //notification
        $notification = Notifications::UpdateOrCreate(
            [
                'name' => 'Loan Submission',
                'subject' => 'New Loan Submission',
                'message' => $user->name . ' has submitted a ZMW ' . $loan->loan_amount . ' ' . $loan->loan->name . ' Loan for '
                    . $loan->loan_purpose . ' to be repayed in ' . $loan->repayment_period . ' installments.',
                'comment' => 'Loan submitted by ' . $logged_in->name,
                'type' => config('constants.notifications.loan'),
                'model_id' => $loan->id,
                'url' => $url,
                'status_id' => $status_unseen,
                'created_by' => $logged_in->id
            ],
            [
                'name' => 'Loan Submission',
                'subject' => 'New Loan Submission',
                'message' => $user->name . ' has submitted a ZMW ' . $loan->loan_amount . ' ' . $loan->loan->name . ' Loan for '
                    . $loan->loan_purpose . ' to be repayed in ' . $loan->repayment_period . ' installments.',
                'comment' => 'Loan submitted by ' . $logged_in->name,
                'type' => config('constants.notifications.loan'),
                'model_id' => $loan->id,
                'url' => $url,
                'customer_id' => $user->id,
                'status_id' => $status_unseen,
                'created_by' => $logged_in->id
            ]
        );

        //return
        return Redirect::route('loan.product.search', $status)->with('message', 'Your Loan has been submitted successfully');

    }

    public function returningCustomer(Request $request)
    {
        $user = auth()->user();
        $uuid = $request->uuid;

        if (auth()->check()) {
            $loan = DB::table('loan_applications')
                ->where('uuid', $uuid)
                ->update([
                    'customer_id' => $user->id,
                    'statuses_id' => config('constants.status.loan_request_login'),
                ]);
            $loan = LoanApplications::where('uuid', $uuid)->first();

            //  dd($loan);
            return Redirect::route('home');

        } else {
            return view('auth.login')->with(compact('uuid'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\LoanApplications $loanApplications
     * @return Response
     */
    public function update(Request $request, LoanApplications $loanApplications)
    {
        //
    }

    public function newCustomer(Request $request)
    {
        $uuid = $request->uuid;
        return view('auth.register')->with(compact('uuid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function approve(Request $request, LoanApplications $loan)
    {
        $loan->load('customer', 'loan');
        $logged_in = Auth::user();
        $next_status = $loan->statuses_id;
        $current_status = $loan->statuses_id;
        $save = false;
        $action = $request->approve ?? $request->reject;

        //FIRST APPROVAL
        if ($current_status == config('constants.status.loan_submission')
            && $logged_in->role_id == config('constants.role.verifier.id')
        ) {
            //actions
            if ($action == config('constants.action.reject')) {
                $next_status = config('constants.status.loan_rejected');
                $save = true;
            } elseif ($action == config('constants.action.review')) {
                $next_status = config('constants.status.loan_reviewed');
                $save = true;

                //add or subtract from dashboard totals
                // $dashboard = dashboardTotals::get()->first();
            } else {
                $next_status = config('constants.status.loan_submission');
            }

        } //SECOND APPROVAL
        elseif ($current_status == config('constants.status.loan_reviewed')
            && $logged_in->role_id == config('constants.role.approver.id')
        ) {
            //actions
            if ($action == config('constants.action.reject')) {
                $next_status = config('constants.status.loan_rejected');
                $save = true;
            } elseif ($action == config('constants.action.approve')) {
                $next_status = config('constants.status.loan_approved');
                $save = true;
            } else {
                $next_status = config('constants.status.loan_reviewed');
            }
        } //THIRD APPROVAL
        elseif ($current_status == config('constants.status.loan_approved')
            && (($logged_in->role_id == config('constants.role.verifier.id'))
                || ($logged_in->role_id == config('constants.role.approver.id'))
            )
        ) {
            //actions
            if ($action == config('constants.action.reject')) {
                $next_status = config('constants.status.loan_rejected');
                $save = true;
            } elseif ($action == config('constants.action.funds_disbursed')) {
                $next_status = config('constants.status.loan_funds_disbursed');
                $save = true;
            } else {
                $next_status = config('constants.status.loan_approved');
            }
        } //LOAN REPAYMENT PROCESS
        elseif (

            ($loan->statuses_id == config('constants.status.loan_funds_disbursed') ||
                ($loan->statuses_id == config('constants.status.loan_payment')))
            && (
                ($logged_in->role_id == config('constants.role.verifier.id'))
                || ($logged_in->role_id == config('constants.role.approver.id'))
            )) {


            $date = now();

            $amt = $request->amount;

            //get the schedules
            $loan_schedules = LoanSchedule::where('loan_applications_id', $loan->id)->get();


            if (sizeof($loan_schedules) > 0) {

                //create payment
                $loan_payments = LoanPayments::create(
                    [
                        'loan_applications_id' => $loan->id,
                        'customer_id' => $loan->customer_id,
                        'user_id' => auth()->user()->id,
                        'amount' => $amt,
                        'comment' => $request->comment,
                        'uuid' => Str::uuid()->toString(),
                        'date_paid' => $date,
                    ]
                );
                foreach ($request->file('proof_of_payment') as $file) {
                    $filesController = new FilesController();
                    $filesController->upload($request, $file, config('constants.types.proof_of_payment'), $loan_payments);
                }

                $request->comment = $request->comment . " | ZMW " . $request->amount;

                //amount should be within balance
                if ($amt > ($loan->loan_amount_due - $loan->schedules->sum('paid'))) {
                    return Redirect::route('loan.product.search', $next_status)->with('error', 'Sorry the amount entered for repayment (' . $amt . ') is larger than the balance');
                } else {
                    $save = true;
                    foreach ($loan_schedules as $loan_schedule) {

                        //  dd($loan_schedule );
                        $amount_due = $loan_schedule->balance ?? 0;
                        if ($amount_due == 0) {
                            $amount_due = $loan_schedule->amount;
                        }

                        if ($loan_schedule->amount != $loan_schedule->paid) {
                            //  dd(compact('loan_schedules','loan_schedule', 'amount_due'));
                            if (($amt > 0) && ($amount_due > 0)) {

                                if ($amt > $amount_due) { // of amount is larger than schedule
                                    $pay = $amount_due;
                                    $amt = $amt - $pay;
                                    $loan_schedule->status = config('constants.status.loan_paid');
                                } else { // if amount is smaller than schedule
                                    $pay = $amt;
                                    $amt = $amt - $amt;
                                }
                                $pay = $loan_schedule->paid + $pay;
                                $loan_schedule->paid = $pay;
                                $loan_schedule->date_paid = $date;
                                $loan_schedule->balance = $loan_schedule->amount - $pay;
                                $loan_schedule->save();
                            }
                        }


                    }

                    //check if i have finished paying
                    if (($loan->loan_amount_due - $loan_schedules->sum('paid')) == 0) {
                        $next_status = config('constants.status.loan_paid');
                    } else {
                        $next_status = config('constants.status.loan_payment');
                    }
                }

            } else {
                return Redirect::route('loan.product.search', $next_status)->with('error', 'Schedule Error - Sorry no changes were made to this loan, please contact system admin.');
            }

        }


        //save approval
        if ($save) {

            //modal create
            $modal = LoanApproals::UpdateOrCreate(
                [
                    'comment' => $request->comment,
                    'action' => $action,
                    'from_status_id' => $current_status,
                    'to_status_id' => $next_status,
                    'loan_applications_id' => $loan->id,
                    'users_id' => $logged_in->id,
                ],
                [
                    'comment' => $request->comment,
                    'action' => $action,
                    'from_status_id' => $current_status,
                    'to_status_id' => $next_status,
                    'loan_applications_id' => $loan->id,
                    'users_id' => $logged_in->id,
                ]
            );

            //create notification
            $status_unseen = config('constants.status.unseen');
            $seen = config('constants.status.seen');
            $url = route('loan.show', $loan);

            //old notification
            $old_not = Notifications::where('model_id', $loan->id,)
                // ->where('url', $url,)
                ->update(
                    [
                        'status_id' => $seen,
                    ]
                );

            $notification = Notifications::UpdateOrCreate(
                [
                    'name' => 'Loan ' . $action,
                    'subject' => $loan->customer->name . '\'s ' . $loan->loan_amount_due . ' ZMW Loan ' . $action,
                    'comment' => $request->comment,
                    'type' => config('constants.notifications.loan'),
                    'model_id' => $loan->id,
                    'url' => $url,
                    'status_id' => $status_unseen,
                    'created_by' => $logged_in->id
                ],
                [
                    'name' => 'Loan ' . $action,
                    'subject' => $loan->customer->name . '\'s ' . $loan->loan_amount_due . ' ZMW Loan ' . $action,
                    'message' => $logged_in->name . ' has ' . $action . ' a ZMW ' . $loan->loan_amount_due . ' ' . $loan->loan->name . ' Loan for '
                        . $loan->loan_purpose . ' at ' . date('r'),
                    'comment' => $request->comment,
                    'type' => config('constants.notifications.loan'),
                    'model_id' => $loan->id,
                    'url' => $url,
                    'customer_id' => $loan->customer->id,
                    'status_id' => $status_unseen,
                    'created_by' => $logged_in->id
                ]
            );

            //update loan application
            $loan->statuses_id = $next_status;
            $loan->save();
        }

        //return
        return Redirect::route('loan.product.search', $next_status)->with('message', $loan->customer->name . '\'s ' . $loan->loan_amount_due . 'ZMW Loan has been successfully ' . $action);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        $works = WorkStatus::all();

        return view('dashboard.loan.create')->with(compact('user', 'works'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function cancel($loan_id)
    {
        $loan = LoanApplications::find($loan_id);
        $logged_in = auth()->user();

        //actions
        $next_status = config('constants.status.loan_cancelled');
        $save = true;

        //save approval
        if ($save) {
            //modal create
            $modal = LoanApproals::UpdateOrCreate(
                [
                    'comment' => "Loan application cancelled by the applicant",
                    'action' => 'cancell',
                    'from_status_id' => $loan->statuses_id,
                    'to_status_id' => $next_status,
                    'loan_applications_id' => $loan_id,
                    'users_id' => $logged_in->id,
                ],
                [
                    'comment' => "Loan application cancelled by the applicant",
                    'action' => 'cancell',
                    'from_status_id' => $loan->statuses_id,
                    'to_status_id' => $next_status,
                    'loan_applications_id' => $loan_id,
                    'users_id' => $logged_in->id,
                ]
            );

            //update loan application
            $loan->statuses_id = $next_status;
            $loan->save();
        }

        //return

        return json_encode($loan->id);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\LoanApplications $loanApplications
     * @return Response
     */
    public function show(LoanApplications $loan)
    {
        $loan->load('loan', 'payslips', 'statements');
        $loan->load('customer.nrc', 'schedules', 'approvals');
        $loan->load('bankDetails', 'payments.paymentProofs');

        //  dd($loan);

        $logged_in_user = Auth::user();
        $next_users = [];
//        $approvals = LoanApproals::where('loan_applications_id' , $loan->id)->get();
        $approvals = $loan->approvals;
        //  dd($approvals);

        if ($loan->statuses_id == config('constants.status.loan_request_login')) {
            $next_users = User::where('id', $loan->customer_id)->get();
        } elseif ($loan->statuses_id == config('constants.status.loan_submission')) {
            $next_users = User::where('role_id', config('constants.role.verifier.id'))->get();
        } elseif ($loan->statuses_id == config('constants.status.loan_reviewed')) {
            $next_users = User::where('role_id', config('constants.role.approver.id'))->get();
        } elseif ($loan->statuses_id == config('constants.status.loan_approved')) {
            $next_users = User::where('role_id', config('constants.role.verifier.id'))
                ->orWhere('role_id', config('constants.role.approver.id'))->get();
        } elseif ($loan->statuses_id == config('constants.status.loan_funds_disbursed')) {
            $next_users = User::where('id', $loan->customer_id)->get();
        } else {

        }

        $statuses = Status::all();

        return view('dashboard.loan.show')->with(compact('statuses', 'loan', 'approvals', 'logged_in_user', 'next_users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\LoanApplications $loanApplications
     * @return Response
     */
    public function edit(LoanApplications $loanApplications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\LoanApplications $loanApplications
     * @return Response
     */
    public function destroy(LoanApplications $loanApplications)
    {
        //
    }
}
