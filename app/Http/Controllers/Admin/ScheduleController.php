<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use DateTime;

class ScheduleController extends Controller
{
    public $data;

    public function index() {
        $schedules = Schedule::orderByRaw('date IS NULL ASC')->get();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create() {
        $schedule = new Schedule();
        return view('admin.schedule.create', compact('schedule'));
    }

    public function store(Request $request) {
        $this->setDateTimeData($request);
        Schedule::create($this->data);

        \Session::flash('flash_message', '記事を作成しました。');
        return redirect('admin/schedule');
    }

    public function show($id) {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.show', compact('schedule'));
    }

    public function edit($id) {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request, $id) {
        $schedule = Schedule::findOrFail($id);
        $this->setDateTimeData($request);
        $schedule->update($this->data);

        \Session::flash('flash_message', '記事を更新しました。');
        return redirect('admin/schedule');
    }

    public function destroy($id) {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete($id);
        \Session::flash('flash_message', '記事を削除しました。');
        return redirect('admin/schedule');
    }

    public function setDateTimeData($r) {
        $schedule = new Schedule();
        $this->data = $r->except(['openH', 'openI', 'startH', 'startI']);
        $this->data['open'] = $this->setTime($schedule->hours[$r->openH], $schedule->minutes[$r->openI]);
        $this->data['start'] = $this->setTime($schedule->hours[$r->startH], $schedule->minutes[$r->startI]);
    }

    public function setTime($h, $i) {
        if(is_null($h) || is_null($i)) return;
        $result = new DateTime('1970-01-01');
        $result->setTime($h, $i);
        return $result;
    }
}
