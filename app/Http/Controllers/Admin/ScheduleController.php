<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use DateTime;

class ScheduleController extends Controller
{
    public $data;
    public $defaultDate = '1970-01-01';

    public function index() {
        $schedules = Schedule::orderByRaw('date IS NULL')->orderBy('date')->get();
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
        $date = $this->data['date'];
        $openH = $schedule->hours[$r->openH];
        $openI = $schedule->minutes[$r->openI];
        $startH = $schedule->hours[$r->startH];
        $startI = $schedule->minutes[$r->startI];

        if(!is_null($date)) $this->data['date'] = $this->setTime($date, $openH, $openI);
        $this->data['open'] = $this->setTime(null, $openH, $openI);
        $this->data['start'] = $this->setTime(null, $startH, $startI);
    }

    public function setTime($d, $h, $i) {
        if(is_null($h) || is_null($i)) {
            if(is_null($d)) return;
            $h = $i = 0;
        }
        $result = (is_null($d)) ? new DateTime($this->defaultDate) : new DateTime($d);
        $result->setTime($h, $i);
        return $result;
    }
}
