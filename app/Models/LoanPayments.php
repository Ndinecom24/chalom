<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanPayments extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'loan_payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'loan_applications_id',
        'customer_id',
        'user_id',
        'amount',
        'comment',
        'uuid',
        'date_paid',
        'deleted_at',
    ];

    public function paymentProofs(){
        return $this->hasMany(Files::class , 'modal_uuid' , 'uuid')
            ->where('type',  config('constants.types.proof_of_payment') );
    }
    public function officer(){
        return $this->belongsTo(User::class , 'user_id' , 'id' );
    }
}
