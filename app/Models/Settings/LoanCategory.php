<?php

namespace App\Models\Settings;

use App\Models\Loans\LoanProducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    //fields fillable
    protected $fillable = [
        'name',
        'description',
        'created_by',
    ] ;


    public function products(){
        return $this->hasMany(LoanProducts::class, 'loan_category_id');
    }
}
