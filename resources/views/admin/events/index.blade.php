@extends('layouts.app')

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
                            <th>{{ __('詳細') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($events->count() > 0)
                            @foreach ($events as $event)
                                <tr data-href="{{ url('admin/events/'.$event->id) }}">
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td class="text-right"><a href="{{ url('admin/events/'.$event->id) }}" class="btn btn-secondary btn-sm">{{ __('詳細') }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">{{ __('発表会はありません') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
