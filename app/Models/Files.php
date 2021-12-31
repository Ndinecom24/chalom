<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'path',
        'uuid',
        'size',
        'ext',
        'type',
        'author',
        'date_posted',
        'modal_id',
        'modal_uuid',
        'model_type',
    ];
}
