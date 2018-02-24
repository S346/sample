@extends('layouts.app')

@section('content')
<div>
    create
    {!! Form::open(['url' => 'admin/schedule']) !!}
        @include('admin.schedule.form')
    {!! Form::close() !!}
</div>
@endsection
