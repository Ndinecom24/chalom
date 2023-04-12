<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'mobile_number';
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $uuid = $request->uuid;
        //check for uuid
        if ($uuid != 0) {
            // find the loan
            $loan = DB::table('loan_applications')
                ->where('uuid', $uuid)
                ->update([
                    'customer_id' => $user->id,
                    'statuses_id' => config('constants.status.loan_request_login'),
                ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {

                auth()->user()->generateCode();

                return redirect()->route('2fa.index');
            }

            return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

        }
    }
}
