<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'password',
        'mobile_number',
        'dob',
        'email',
        'nid',
        'gender',
        'address',
        'avatar',
        'country',
        'city',
        'email_verified_at',
        'work_status',
        'role_id',
        'customer_type_id',
        'status_id',
        'password_change',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        'role',
        'customerType'
    ];

    public function role(){
        return $this->belongsTo(Roles::class);
    }

    public function customerType(){
        return $this->belongsTo(CustomerTypes::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }

}
