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
        $uuid = Str::uuid()->toString();
        $user = User::create([
            'name' => $data['name'],
            'uuid' => $uuid,
            'email' => $data['email'],
            'role_id' => $data['roles_id'],
            'customer_type_id' => $data['customer_types_id'],
            'status_id' => $data['status_id'],
            'password_change' => config('constants.password_changed'),
            'password' => Hash::make($data['password']),
        ]);
        if($data['uuid'] != 0){
            // find the loan
            $loan = LoanApplications::where('uuid', $data['uuid'])->first();
            $loan->customer_id = $user->id ;
            $loan->statuses_id = config('constants.status.loan_request_login');
            $loan->save();
        }
        return $user;
    }
}
