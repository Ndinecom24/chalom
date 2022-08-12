<?php

namespace App\Models;

use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Roles;
use App\Models\Settings\Status;
use App\Models\Settings\WorkStatus;
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

    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'name',
        'password',
        'mobile_number',
        'dob',
        'email',
        'nid',
        'gender',
        'address',
        'avatar',
        'identity',
        'country',
        'city',
        'plot_street',
        'zip_code',
        'email_verified_at',
        'work_status_id',
        'role_id',
        'customer_type_id',
        'next_of_kin_id',
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

//    public function image(){
//        return $this->belongsTo(Files::class , 'avatar', 'id');
//    }
    public function role(){
        return $this->belongsTo(Roles::class);
    }

    public function customerType(){
        return $this->belongsTo(CustomerTypes::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function work(){
        return $this->belongsTo(WorkStatus::class);
    }
    public function kin(){
        return $this->hasOne(NextOfKin::class);
    }
    public function nrc(){
        return $this->hasOne(Files::class, 'modal_uuid', 'uuid')
            ->where('type',  config('constants.types.identity') );
    }
    public function bankDetails(){
        return $this->hasMany(BankDetails::class , 'user_id', 'id') ;
    }


}
