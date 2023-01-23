<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Loans\LoanApplications;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [


            'mobileno' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $uuid_user = Str::uuid()->toString();

        $user = User::create([

            'mobileno' => $data['mobileno'],
            'title' => $data['title'],
            'name' => $data['name'],
            'uuid' => $uuid_user,
            'email' => $data['email'],
            'role_id' => $data['roles_id'] ?? 1,
            'customer_type_id' => $data['customer_types_id'] ?? 1,
            'status_id' => $data['status_id'] ?? 1,
            'password_change' => config('constants.password_changed'),
            'password' => Hash::make($data['password']),
        ]);

//        if($data['uuid'] != 0){
//            //find the loan
//            $loan = LoanApplications::where('uuid', $data['uuid'])->first();
//            $loan = LoanApplications::find( (int)session()->get('my_loan_request')  ) ;
//            $loan->customer_id = $user->id ;
//            $loan->statuses_id = config('constants.status.loan_request_login');
//            $loan->save();
//        }

        $has_loan = session()->exists('my_loan_request');
        if($has_loan != 0){
            $loan = LoanApplications::find( (int)session()->get('my_loan_request')  ) ;
            $loan->customer_id = $user->id ;
            $loan->statuses_id = config('constants.status.loan_request_login');
            $loan->save();
        }

        return $user;
    }
}
