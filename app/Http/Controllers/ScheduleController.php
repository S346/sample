<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index() {
        $schedules = Schedule::orderBy('open')->get();
        return view('schedule.index', compact('schedules'));
    }

    public function show($id) {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.show', compact('schedule'));
    }
}
