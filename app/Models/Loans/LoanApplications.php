<?php

namespace App\Models\Loans;

use App\Models\Files;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'statuses_id',
        'date_submitted',
        'customer_id',

        'created_by',
        'updated_by',
        'deleted_at',
    ];

//    protected $with = [
//        'loan',
//        'customer'
//    ];


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


    public function payslips(){
        return $this->hasMany(Files::class , 'modal_uuid' , 'uuid')
            ->where('type', config('constants.types.payslip'));
    }
    public function statements(){
        return $this->hasMany(Files::class , 'modal_uuid' , 'uuid')
            ->where('type',  config('constants.types.account_statement') );
    }


}
