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
        "total_paid" ,
        "pending_loans" ,
        "pending_loans_amount" ,
        "active_loans" ,
        "active_loans_amount" ,
    ];

}
