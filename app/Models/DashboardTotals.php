<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dashboardTotals extends Model
{
    use HasFactory;

    protected $table = 'dashboard_totals_view';

    protected $fillable = [
        "borrowers",
        "paid_loans" ,
        "paid_loans_amount" ,
        "paid_loans_amount_due" ,
        "pending_loans" ,
        "pending_loans_amount" ,
        "pending_loans_amount_due" ,
        "active_loans" ,
        "active_loans_amount" ,
        "active_loans_amount_due" ,
    ];

}
