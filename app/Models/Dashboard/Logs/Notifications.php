<?php

namespace App\Models\Dashboard\Logs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notifications extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'subject',
        'message',
        'comment',
        'type',
        'url',
        'model_id',
        'status_id',
        'created_by',
        'customer_id',
        'deleted_at',
    ];


    public function user(){
        return $this->belongsTo(User::class , 'created_by');
    }

}
