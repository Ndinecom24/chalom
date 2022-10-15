<?php

namespace App\Models\Loans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanSchedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'loan_schedules';
    protected $primaryKey = 'id';
    protected $fillable = [
        'loan_applications_id',
        'modal_uuid',
        'customer_id',
        'status',
        'installment',
        'date',
        'amount',
        'paid',
        'balance',
        'date_paid',
        'deleted_at',
    ];
}
