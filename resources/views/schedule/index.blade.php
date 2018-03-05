@extends('layouts.app')

@section('content')
@if ($schedules->isEmpty())
    <p>No Schedule</p>
@else
    <calender></calender>
@endif
@endsection
