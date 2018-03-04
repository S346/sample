<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller
{
    public function defaultMonth() {
        $schedules = Schedule::orderByRaw('date IS NULL ASC')->orderBy('date')->get();
        return response()->json($schedules);
    }
    public function specificMonth(int $year, int $month) {
        if ($year > 2000 && $month > 0 && $month <= 12) {
            $schedules = Schedule::
                whereYear('date', $year)->
                whereMonth('date', $month)->
                orderBy('date')->
                get();
            return response()->json($schedules);
        } else {
            $error = [
                'type' => 'Invalid Parameter',
                'message' => '1st parameter must be more than 2000 and 2nd parameter must be in 1 to 12.',
            ];
            return response()->json($error);
        }
    }
}
