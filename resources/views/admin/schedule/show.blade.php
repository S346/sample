@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="d-inline-block my-0 align-middle">
        {{ $schedule->title }}
    </h2>
    {{ link_to_action('Admin\ScheduleController@edit', '編集', [$schedule->id], ['class' => 'btn btn-outline-primary align-middle ml-3']) }}
    {!! Form::model($schedule, [
        'url' => [
             'admin/schedule',
             $schedule->id,
         ],
        'method' => 'delete',
        'class' => 'd-inline'
    ]) !!}
    {!! Form::submit('削除', [
        'onclick' => "return confirm('本当に削除しますか?')",
        'class' => 'btn btn-outline-danger'
    ]) !!}
    {!! Form::close() !!}

    <article class="my-3">
        <div class="row py-2">
            <div class="col-2">日付</div>
            <div class="col-4">{{ $schedule->open }}</div>
        </div>
        <div class="row py-2">
            <div class="col-2">Open</div>
            <div class="col-4">{{ $schedule->open }}</div>
        </div>
        <div class="row py-2">
            <div class="col-2">Start</div>
            <div class="col-4">{{ $schedule->start }}</div>
        </div>
        <div class="row py-2">
            <div class="col-2">Music Charge</div>
            <div class="col-4">{{ $schedule->charge }}</div>
        </div>
        <div class="row py-2">
            <div class="col-2">説明</div>
            <div class="col-10">{{ $schedule->body }}</div>
        </div>
    </article>
    {!! link_to('admin/schedule', '一覧へ戻る', ['class' => 'btn btn-link']) !!}
</div>
@endsection
