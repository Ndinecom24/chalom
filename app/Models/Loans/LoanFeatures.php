<?php

namespace App\Models\Loans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanFeatures extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'loan_features';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'image',
        'loan_products_id',
        'created_by',
        'updated_by',
        'deleted_at',
    ];
}
