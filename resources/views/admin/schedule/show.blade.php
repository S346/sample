@extends('layouts.app')

@section('content')
<div>
    show
    <table>
        <tr>
            <th>タイトル</th>
            <th>日付</th>
            <th>Open</th>
            <th>Start</th>
            <th>Charge</th>
        </tr>
        <tr>
            <td>{{ $schedule->title }}</td>
            <td>{{ $schedule->date }}</td>
            <td>{{ $schedule->open }}</td>
            <td>{{ $schedule->start }}</td>
            <td>{{ $schedule->charge }}</td>
        </tr>
    </table>
</div>
@endsection
