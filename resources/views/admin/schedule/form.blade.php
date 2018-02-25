<div class="form-group row">
    {!! Form::label('title', 'タイトル', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-4">{!! Form::text('title', null, ['class' => 'form-control']) !!}</div>
</div>

<div class="form-group row">
    {!! Form::label('date', '日付', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-4">{!! Form::text('date', null, ['class' => 'form-control']) !!}</div>
</div>

<div class="form-group row">
    {!! Form::label('open', 'Open', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-4">{!! Form::text('open', null, ['class' => 'form-control']) !!}</div>
</div>

<div class="form-group row">
    {!! Form::label('start', 'Start', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-4">{!! Form::text('start', null, ['class' => 'form-control']) !!}</div>
</div>

<div class="form-group row">
    {!! Form::label('charge', 'Music Charge', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-4">{!! Form::text('charge', null, ['class' => 'form-control']) !!}</div>
</div>

<div class="form-group row">
    {!! Form::label('body', '説明', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-10">{!! Form::textarea('body', null, ['class' => 'form-control']) !!}</div>
</div>
<div class="row">
    <div class="col-4 offset-2">{!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}</div>
</div>
