<?php

namespace App\Models\Loans;

use App\Models\BankDetails;
use App\Models\Files;
use App\Models\Settings\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class LoanApplications extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $appends = ['monthly_installments'];

    protected $table = 'loan_applications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'loan_purpose',
        'loan_amount',
        'loan_rate',
        'loan_amount_due',
        'loan_arrangement_fee',
        'loan_product_id',
        'repayment_period',
        'monthly_income',
        'other_income',
        'monthly_deduct',
        'collateral_description',
        'statuses_id',
        'date_submitted',
        'customer_id',

        'created_at',
        'created_by',
        'updated_by',
        'deleted_at',
    ];

    protected static function booted()
    {
        //check if authenticated user
        if ( auth()->check()) {
            //get the profile for this user
            $user = Auth::user();

            if($user->role_id  == config('constants.role.admin.id')){
                static::addGlobalScope('staff_number', function (Builder $builder) {
//                    $builder->where('claimant_staff_no', Auth::user()->staff_no);
                });
            }
            elseif ( $user->role_id  == config('constants.role.client.id') ){
                static::addGlobalScope('staff_number', function (Builder $builder) use ($user) {
                    $builder->where('customer_id', $user->id);
                });
            }
            elseif ( $user->role_id  == config('constants.role.verifier.id') ){
                static::addGlobalScope('staff_number', function (Builder $builder) use ($user) {
//                    $builder->where('customer_id', $user->id);
                });
            }
            elseif ( $user->role_id  == config('constants.role.approver.id') ){
                static::addGlobalScope('staff_number', function (Builder $builder) use ($user) {
//                    $builder->where('customer_id', $user->id);
                });
            }
            elseif ( $user->role_id  == config('constants.role.developer.id') ){
                static::addGlobalScope('staff_number', function (Builder $builder) use ($user) {
//                    $builder->where('customer_id', $user->id);
                });
            }
            else{

            }
        }
    }

    protected $with = ['status'];


    public function getMonthlyInstallmentsAttribute()
    {
        return (  number_format($this->loan_amount_due / $this->repayment_period, 2) );
    }

    public function loan(){
        return $this->belongsTo(LoanProducts::class , 'loan_product_id');
    }

    public function customer(){
        return $this->belongsTo(User::class , 'customer_id');
    }

    public function status(){
        return $this->belongsTo(Status::class , 'statuses_id');
    }


    public function collaterals(){
        return $this->hasMany(Files::class , 'modal_uuid' , 'uuid')
            ->where('type', config('constants.types.collateral'));
    }
    public function payslips(){
        return $this->hasMany(Files::class , 'modal_uuid' , 'uuid')
            ->where('type', config('constants.types.payslip'));
    }
    public function statements(){
        return $this->hasMany(Files::class , 'modal_uuid' , 'uuid')
            ->where('type',  config('constants.types.account_statement') );
    }

    public function schedules(){
        return $this->hasMany(LoanSchedule::class ) ;
    }

    public function bankDetails(){
        return $this->hasMany(BankDetails::class , 'user_id', 'customer_id') ;
    }



    public function approvals(){
        return $this->hasMany(LoanApproals::class, 'loan_applications_id','id' ) ;
    }


}
