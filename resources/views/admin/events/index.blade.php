@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("発表会") }}</h2>
            <div class="ml-auto">
                <a class="btn btn-primary btn-sm ml-auto" href="{{ route('admin.events.create') }}">{{ __('発表会を追加') }}</a>
            </div>
        </div>
        <div class="card-body">
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
                                    <td><a href="{{ url('admin/users/'.$event->user_id) }}">{{ $event->user->name }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            {{ __('発表会はありません') }}
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
