<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    use HasFactory;

    //primary key
    protected $primaryKey = 'id';
    //fields fillable
    protected $fillable = [
        'type',
        'account_name',
        'account_number',
        'provider_name',
        'provider_branch',
        'branch_code',
        'user_id',
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
