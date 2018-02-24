@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::model($schedule, [
        'url' => [
            'admin/schedule',
            $schedule->id
        ],
        'method' => 'PATCH'
    ]) !!}
        @include('admin.schedule.form')
    {!! Form::close() !!}
</div>
@endsection
