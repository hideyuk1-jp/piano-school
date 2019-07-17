@extends('admin.app')

@section('content')
    <div class="d-flex align-items-end border-bottom pb-2 mb-4">
        <h2 class="mb-0">{{ __('発表会') }}</h2>
        <a class="btn btn-primary ml-auto" href="{{ route('admin.events.create') }}">発表会を追加</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('日付') }}</th>
                    <th>{{ __('タイトル') }}</th>
                    <th>{{ __('作成者') }}</th>
                </tr>
            </thead>
            <tbody>
                @if($events->count() > 0)
                    @foreach ($events as $event)
                        <tr data-href="{{ url('admin/events/'.$event->id) }}">
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->title }}</a></td>
                            <td><a href="{{ url('admin/users/'.$event->user_id) }}">{{ $event->user->name }}</td>
                        </tr>
                    @endforeach
                @else
                    {{ __('発表会はありません') }}
                @endif
            </tbody>
        </table>
    </div>
@endsection
