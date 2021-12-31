<?php

namespace App\Models\Loans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanApproals extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'loan_approvals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'comment',
        'action',
        'from_status_id',
        'to_status_id',
        'loan_applications_id',
        'users_id',
        'deleted_at',
    ];
}
