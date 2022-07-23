<?php

namespace App\Models\Loans;

use App\Models\Settings\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanProducts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'loan_products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'rate_per_month',
        'arrangement_fee',
        'lowest_amount',
        'highest_amount',
        'lowest_tenure',
        'highest_tenure',
        'collateral',
        'about',
        'description',
        'image',
        'statuses_id',
        'created_by',
        'updated_by',
        'deleted_at',
    ];

    public function status(){
        return $this->belongsTo(Status::class, 'statuses_id', 'id');
    }
    public function features(){
        return $this->hasMany(LoanFeatures::class );
    }
    public function eligibility(){
        return $this->hasMany(LoanEligibility::class);
    }
    public function faq(){
        return $this->hasMany(LoanFQA::class);
    }
}
