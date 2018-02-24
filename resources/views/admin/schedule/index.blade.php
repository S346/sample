@extends('layouts.app')

@section('content')
<div>
    index
    @if ($schedules->isEmpty())
        <p>No Schedule</p>
    @else
        {{ link_to_action('Admin\ScheduleController@create', '新規作成') }}
        <table>
            <tr>
                <th>タイトル</th>
                <th>日付</th>
                <th>Open</th>
                <th>Start</th>
                <th>Charge</th>
                <th>操作</th>
            </tr>
        @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->title }}</td>
                <td>{{ $schedule->date }}</td>
                <td>{{ $schedule->open }}</td>
                <td>{{ $schedule->start }}</td>
                <td>{{ $schedule->charge }}</td>
                <td>
                    {{ link_to_action('Admin\ScheduleController@show', '詳細', [$schedule->id]) }}
                    {{ link_to_action('Admin\ScheduleController@edit', '編集', [$schedule->id]) }}
                </td>
            </tr>
        @endforeach
        </table>
    @endif
</div>
@endsection
