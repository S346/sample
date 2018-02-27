@extends('layouts.app')

@section('content')
<div id="app">
    <calender></calender>
    @if ($schedules->isEmpty())
        <p>No Schedule</p>
    @else
        <table>
            <tr>
                <th>タイトル</th>
                <th>日付</th>
                <th>Open</th>
                <th>Start</th>
                <th>Charge</th>
            </tr>
        @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->title }}</td>
                <td>{{ $schedule->date }}</td>
                <td>{{ $schedule->open }}</td>
                <td>{{ $schedule->start }}</td>
                <td>{{ $schedule->charge }}</td>
            </tr>
        @endforeach
        </table>
    @endif
</div>
@endsection
