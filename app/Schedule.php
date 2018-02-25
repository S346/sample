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

    public function getDate () {
        $dateTime = new DateTime($this->open);
        return $dateTime->format('Y/m/d');
    }
    public function getOpen () {
        $dateTime = new DateTime($this->open);
        return $dateTime->format('H:i');
    }
    public function getStart () {
        $dateTime = new DateTime($this->start);
        return $dateTime->format('H:i');
    }
}
