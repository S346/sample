<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index() {
        $schedules = Schedule::orderBy('date')->get();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create() {
        return view('admin.schedule.create');
    }

    public function show($id) {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.show', compact('schedule'));
    }

    public function edit($id) {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.edit', compact('schedule'));
    }
}
