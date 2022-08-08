<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    use HasFactory;

    protected $table = 'next_of_kin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'nid',
        'address',
        'relationship',
        'work_status',
        'work_place',
        'user_id',
        'created_by',
        'deleted_at',
    ];
}
