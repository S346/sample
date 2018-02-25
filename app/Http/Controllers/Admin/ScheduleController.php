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
        $schedules = Schedule::orderBy('open')->get();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create() {
        return view('admin.schedule.create');
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
        $this->data = $r->except('date');
        $date = '9999-12-31';
        if (!is_null($r->date)) {
            $date = $r->date;
        }
        $this->data['open'] = $this->combineDateAndTime($date, $r->open);
        $this->data['start'] = $this->combineDateAndTime($date, $r->start);
    }

    public function combineDateAndTime($d, $t) {
        $date = new DateTime($d);
        $time = new DateTime($t);
        $date->setTime((int)$time->format('H'), (int)$time->format('i'));
        return $date;
    }
}
