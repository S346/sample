<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Schedule extends Model
{
    protected $guarded = ['id', 'created_at'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
