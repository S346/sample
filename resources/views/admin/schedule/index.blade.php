@extends('layouts.app')

@section('content')
<div class="container">
    <h2>スケジュール一覧</h2>
    @if ($schedules->isEmpty())
        <p>No Schedule</p>
    @else
        {{ link_to_action('Admin\ScheduleController@create', '新規作成', [], ['class' => 'btn btn-primary my-3']) }}
        <table class="table">
            <tr>
                <th scope="col">日付</th>
                <th scope="col">タイトル</th>
                <th scope="col"></th>
            </tr>
        @foreach($schedules as $schedule)
            <tr>
                <td class="align-middle">{{ $schedule->open }}</td>
                <td class="align-middle">
                    {{ link_to_action('Admin\ScheduleController@show', $schedule->title, [$schedule->id]) }}
                </td>
                <td class="text-right align-middle">
                    {{ link_to_action('Admin\ScheduleController@edit', '編集', [$schedule->id], ['class' => 'btn btn-outline-primary btn-sm']) }}
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
                        'class' => 'btn btn-outline-danger btn-sm'
                    ]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </table>
    @endif
</div>
@endsection
