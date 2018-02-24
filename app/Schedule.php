<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = ['id', 'created_at'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date'
    ];

    public function dateString($date) {
        // toDo nullの時の対応
        return $date->format('Y/m/d');
    }
}
