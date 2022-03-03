<?php

namespace App\Http\Controllers\Website\Loans;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\FilesController;
use App\Models\Dashboard\Logs\Notifications;
use App\Models\Loans\LoanApplications;
use App\Models\Loans\LoanApproals;
use App\Models\Loans\LoanProducts;
use App\Models\Loans\LoanSchedule;
use App\Models\NextOfKin;
use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Status;
use App\Models\Settings\WorkStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class LoanApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($status)
    {
        if($status == 0){
            $list = LoanApplications::get();
        }else{
            $list = LoanApplications::where('statuses_id', $status)->get();
        }

        $list->load('loan', 'schedules');

        return view('dashboard.loan.index')->with(compact('list' ));
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
     * Show the form for apply a new loan.
     *
     * @return Response
     */
    public function apply(Request $request, LoanProducts $loanProd)
    {
        $loan_purpose = $request->loan_purpose;
        $user = Auth::user();
        $works = WorkStatus::all();
        $statuses = Status::all();
        $customer_types = CustomerTypes::where('id', '!=', config('constants.customer_type.employee'))->get();
        return view('dashboard.loan.apply')->with(compact('user', 'works', 'loanProd', 'statuses', 'customer_types', 'loan_purpose'));
    }

    public function finish(Request $request, LoanApplications $loan, User $user)
    {
        //if action was to cancel
        dd($request->all());
        if(3){

        }

        $status_unseen =  config('constants.status.unseen') ;
        $status =  config('constants.status.loan_submission') ;
        $logged_in = Auth::user();
        $schedule_amount = ($loan->loan_amount_due / $loan->repayment_period) ;

        $loan->loan('loan');

        /** upload identity file */
        $file = $request->file('identity');
        if ($request->hasFile('identity')) {
            $filesController = new FilesController();
            $identity = $filesController->upload($request, $file, config('constants.types.identity'), $user);
            $user->identity = $identity->uuid ?? $identity->id;
        }

        /** upload account_statement file */
        $file = $request->file('account_statement');
        if ($request->hasFile('account_statement')) {
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

        //save next of kin
        $kin = NextOfKin::UpdateOrCreate([
            'name' => $request->kin_name,
            'phone' => $request->kin_phone,
            'email' => $request->kin_email,
            'relationship' => $request->kin_relationship,
            'user_id' => $user->id,
        ], [
            'name' => $request->kin_name,
            'phone' => $request->kin_phone,
            'email' => $request->kin_email,
            'address' => $request->kin_work_place,
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
        $user->plot_street = $request->plot_street;
        $user->zip_code = $request->zip_code;
        $user->work_status_id = $request->work_status_id;
        $user->save();

        //loan
        $loan->statuses_id = $status;
        $loan->date_submitted = date('Y-m-d');
        $loan->save();

        //schedule
        for ($i = 1; $i <= $loan->repayment_period ; $i++ ){
            $schedule = LoanSchedule::UpdateOrCreate(
                [
                    'loan_applications_id' => $loan->first()->id,
                    'customer_id' => $user->first()->id ,
                    'status' => $status ,
                    'installment' => 'Installment '.$i,
                    'date' => date("Y-m-d", strtotime( $i." month")),
                    'amount' => $schedule_amount,
                ],
                [
                    'loan_applications_id' => $loan->first()->id,
                    'customer_id' => $user->first()->id ,
                    'status' => $status ,
                    'installment' => 'Installment '.$i,
                    'date' => date("Y-m-d", strtotime( $i." month")),
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
                'message' => $user->name . ' has submitted a ZMW '.$loan->loan_amount.' '.$loan->loan->name. ' Loan for '
                    .$loan->loan_purpose. 'to be repayed in '.$loan->repayment_period. ' installments.',
                'comment' => 'Loan submitted by '. $logged_in->name ,
                'type' => config('constants.notifications.loan'),
                'model_id' => $loan->id ,
                'url' => $url,
                'status_id' => $status_unseen,
                'created_by' =>$logged_in->id
            ],
            [
                'name' => 'Loan Submission',
                'subject' => 'New Loan Submission',
                'message' => $user->name . ' has submitted a ZMW '.$loan->loan_amount.' '.$loan->loan->name. ' Loan for '
                    .$loan->loan_purpose. 'to be repayed in '.$loan->repayment_period. ' installments.',
                'comment' => 'Loan submitted by '. $logged_in->name ,
                'type' => config('constants.notifications.loan'),
                'model_id' => $loan->id ,
                'url' => $url,
                'customer_id' =>  $user->id,
                'status_id' => $status_unseen,
                'created_by' =>$logged_in->id
            ]
        );

        //return
        return Redirect::route('loan.list', config('constants.status.loan_request_login'))->with('message', 'Your Loan has been submitted successfully');

    }

    public function save(Request $request, User $user)
    {
        //
        $status =  config('constants.status.loan_request_login') ;
        $logged_in = Auth::user();
        $schedule_amount = ($request->total_repayment / $request->repayment_period) ;
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
                "other_income" => $request->other_income,
                "monthly_deduct" => $request->monthly_deduct,
                "statuses_id" => $status
            ],
            [
                "uuid" => $uuid,
                "loan_purpose" => $request->loan_purpose,
                "loan_amount" => $request->loan_amount,
                "loan_product_id" => $request->loan_prod,
                "repayment_period" => $request->repayment_period,
                "monthly_income" => $request->monthly_income,
                "other_income" => $request->other_income,
                "monthly_deduct" => $request->monthly_deduct,
                "loan_rate" => $loan->rate_per_month,
                "loan_amount_due" => $request->total_repayment,
                "loan_arrangement_fee" => $loan->arrangement_fee,
                "customer_id" => $user->id ?? 0,
                "created_by" => $logged_in->id ?? 0,
                "statuses_id" => $status
            ]
        );

        //return
        $data['uuid'] = $uuid;
        $data['customer_type'] = $customer_type;
        return json_encode($data);
    }

    public function returningCustomer(Request $request)
    {
        $uuid = $request->uuid;
        return view('auth.register')->with(compact('uuid'));
    }


    public function newCustomer(Request $request)
    {
        $uuid = $request->uuid;
        return view('auth.login')->with(compact('uuid'));
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
        $next_status = $loan->first()->statuses_id  ;
        $current_status = $loan->first()->statuses_id ;
        $save = false ;
        $action = $request->approve ?? $request->reject;

           //FIRST APPROVAL
           if($current_status == config('constants.status.loan_submission')
               && $logged_in->role_id  ==  config('constants.role.admin.id')
           ){
               //actions
               if($action == config('constants.action.reject')){
                   $next_status = config('constants.status.loan_rejected') ;
                   $save = true;
               }
               elseif ($action == config('constants.action.review')){
                   $next_status = config('constants.status.loan_reviewed') ;
                   $save = true;
               }
               else{
                   $next_status = config('constants.status.loan_submission') ;
               }

           }

           //SECOND APPROVAL
           if($current_status == config('constants.status.loan_reviewed')
               && $logged_in->role_id  ==  config('constants.role.admin.id')
           ){
               //actions
               if($action == config('constants.action.reject')){
                   $next_status = config('constants.status.loan_rejected') ;
                   $save = true;
               }
               elseif ($action == config('constants.action.approve')){
                   $next_status = config('constants.status.loan_approved') ;
                   $save = true;
               }
               else{
                   $next_status = config('constants.status.loan_reviewed') ;
               }
           }


        //save approval
        if($save){

            //modal create
            $modal = LoanApproals::UpdateOrCreate(
                [
                    'comment' => $request->comment,
                    'action' => $action ,
                    'from_status_id' => $current_status ,
                    'to_status_id'=> $next_status ,
                    'loan_applications_id' => $loan->first()->id,
                    'users_id' => $logged_in->id ,
                ],
                [
                    'comment' => $request->comment,
                    'action' => $action ,
                    'from_status_id' => $current_status ,
                    'to_status_id'=> $next_status ,
                    'loan_applications_id' => $loan->first()->id,
                    'users_id' => $logged_in->id ,
                ]
            );

            //create notification
            $status_unseen =  config('constants.status.unseen') ;
            $url = route('loan.show', $loan);

            $notification = Notifications::UpdateOrCreate(
                [
                    'name' => 'Loan '.$action ,
                    'subject' => $loan->customer->name.'\'s '.$loan->loan_amount_due.'ZMW Loan '.$action,
                    'comment' => $request->comment ,
                    'type' => config('constants.notifications.loan'),
                    'model_id' => $loan->id ,
                    'url' => $url,
                    'status_id' => $status_unseen,
                    'created_by' =>$logged_in->id
                ],
                [
                    'name' => 'Loan '.$action ,
                    'subject' => $loan->customer->name.'\'s '.$loan->loan_amount_due.'ZMW Loan '.$action,
                    'message' => $logged_in->name . ' has '.$action.' a ZMW '.$loan->loan_amount_due.' '.$loan->loan->name. ' Loan for '
                        .$loan->loan_purpose. ' at '.date('r'),
                    'comment' => $request->comment ,
                    'type' => config('constants.notifications.loan'),
                    'model_id' => $loan->id ,
                    'url' => $url,
                    'status_id' => $status_unseen,
                    'created_by' =>$logged_in->id
                ]
            );

            //update loan application
            $loan->statuses_id = $next_status ;
            $loan->save();
        }

        //return
        return Redirect::route('loan.list', $next_status)->with('message', $loan->customer->name.'\'s '.$loan->loan_amount_due.'ZMW Loan has been successfully '.$action );

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
        $loan->load('customer.nrc', 'schedules');
        $logged_in_user = Auth::user();
        return view('dashboard.loan.show')->with(compact('loan', 'logged_in_user' ));
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
