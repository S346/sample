<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $guarded = ['id', 'created_at'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $hours = [null,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
    public $minutes = [null,0,5,10,15,20,25,30,35,40,45,50,55];
    public function getOpenHourIndex() {
        return $this->getHourIndex($this->open);
    }
    public function getOpenMinuteIndex() {
        return $this->getMinuteIndex($this->open);
    }
    public function getStartHourIndex() {
        return $this->getHourIndex($this->start);
    }
    public function getStartMinuteIndex() {
        return $this->getMinuteIndex($this->start);
    }
    public function getHourIndex($dt) {
        if(is_null($dt)) return 0;
        $dateTime = new Carbon($dt);
        return $dateTime->hour+1;
    }
    public function getMinuteIndex($dt) {
        if(is_null($dt)) return 0;
        $dateTime = new Carbon($dt);
        return $dateTime->minute/5+1;
    }
}
