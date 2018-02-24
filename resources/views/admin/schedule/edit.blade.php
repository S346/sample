@extends('layouts.app')

@section('content')
<div>
    edit
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
