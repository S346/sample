@extends('layouts.admin.app')

@section('content')
<div class="container">
    {!! Form::open(['url' => 'admin/schedule']) !!}
        @include('admin.schedule.form')
    {!! Form::close() !!}
</div>
@endsection
