<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index() {
        $schedules = Schedule::orderBy('open')->get();
        return response()->json($schedules);
    }
}
