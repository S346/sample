@extends('layouts.app')

@section('content')
<div id="app">
    @if ($schedules->isEmpty())
        <p>No Schedule</p>
    @else
        <calender></calender>
    @endif
</div>
@endsection
