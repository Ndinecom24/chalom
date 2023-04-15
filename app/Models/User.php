<?php

namespace App\Models;

use App\Models\Settings\CustomerTypes;
use App\Models\Settings\Roles;
use App\Models\Settings\Status;
use App\Models\Settings\WorkPlace;
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
        'title',
        'mobile_number',
        'name',
        'password',
        'dob',
        'email',
        'nid',
        'gender',
        'marital_status',
        'address',
        'district',
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
        'work_place_id',
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

    protected static function booted()
    {
        $active = config('constants.status.deactivated');
//        static::addGlobalScope('active_user', function (Builder $builder) use ($active) {
//            $builder->where('status_id','!=', $active);
//        });
    }

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
// 2FATOR AUTH
    public function generateCode()
    {
        $code = rand(1000, 9999);

        UserCode::updateOrCreate(
            [ 'user_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );

        $receiverNumber = auth()->user()->phone;
        $message = "2FA login code is ". $code;

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);

        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }

//2 FACTOR AUTH END



    public function role(){
        return $this->belongsTo(Roles::class);
    }

    public function customerType(){
        return $this->belongsTo(CustomerTypes::class);
    }

    public function status(){
        return $this->belongsTo(Status::class  );
    }

    public function work(){
        return $this->belongsTo(WorkStatus::class, 'work_status_id', 'id');
    }
    public function workplace(){
        return $this->belongsTo(WorkPlace::class, 'id', 'created_by');
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
