<table>
    <tr>
        <th>{!! Form::label('title', 'タイトル:') !!}</th>
        <td>{!! Form::text('title', null) !!}</td>
    </tr>

    <tr>
        <th>{!! Form::label('date', '日付:') !!}</th>
        <td>{!! Form::text('date', null) !!}</td>
    </tr>

    <tr>
        <th>{!! Form::label('open', 'Open:') !!}</th>
        <td>{!! Form::text('open', null) !!}</td>
    </tr>

    <tr>
        <th>{!! Form::label('start', 'Start:') !!}</th>
        <td>{!! Form::text('start', null) !!}</td>
    </tr>

    <tr>
        <th>{!! Form::label('charge', 'Charge:') !!}</th>
        <td>{!! Form::text('charge', null) !!}</td>
    </tr>

    <tr>
        <th>{!! Form::label('body', '内容:') !!}</th>
        <td>{!! Form::textarea('body', null) !!}</td>
    </tr>
</table>
{!! Form::submit() !!}
{!! link_to('admin/schedule', '一覧へ戻る') !!}
