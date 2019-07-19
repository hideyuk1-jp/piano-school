@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("発表") }}</h2>
            <div class="ml-auto">
                <a class="btn btn-primary btn-sm ml-auto" href="{{ route('admin.performances.create') }}">{{ __('発表を追加') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('発表者') }}</th>
                            <th>{{ __('発表会') }}</th>
                            <th>{{ __('曲') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($performances->count() > 0)
                            @foreach ($performances as $performance)
                                <tr data-href="{{ url('admin/performances/'.$performance->id) }}">
                                    <td><a href="{{ url('admin/users/'.$performance->performer_id) }}">{{ $performance->performer->name }}</a></td>
                                    <td><a href="{{ url('admin/events/'.$performance->event_id) }}">{{ $performance->event->title }}（{{ $performance->event->date }}）</a></td>
                                    <td><a href="{{ url('admin/musics/'.$performance->music_id) }}">{{ $performance->music->title }}（{{ $performance->music->composer }}）</a></td>
                                    <td class="text-right"><a href="{{ url('admin/performances/'.$performance->id) }}" class="btn btn-secondary btn-sm">{{ __('詳細') }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">{{ __('発表はありません') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
