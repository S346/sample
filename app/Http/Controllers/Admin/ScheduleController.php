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

    public function store(Request $request) {
        Schedule::create($request->all());
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
        $schedule->update($request->all());

        \Session::flash('flash_message', '記事を更新しました。');
        return redirect('admin/schedule');
    }

    public function destroy($id) {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete($id);
        \Session::flash('flash_message', '記事を削除しました。');
        return redirect('admin/schedule');
    }
}
