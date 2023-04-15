<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPlace extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'work_places' ;
    //fields fillable
    protected $fillable = [
        'name',
        'description',
        'address',
//        'city',
//        'country',
        'user_id',
    ] ;
}
