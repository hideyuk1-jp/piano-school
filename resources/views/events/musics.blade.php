@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">ホーム</a></li>
            <li class="breadcrumb-item"><a href="{{ url('events/'.$event->id) }}">{{ $event->title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('追加する曲を選ぶ') }}</li>
        </ol>
        <div class="card mb-4 p-0">
            <div class="card-body d-flex">
                <div class="text-center d-flex flex-column">
                    <div class="h4 text-danger"><i class="fas fa-music"></i></div>
                    <span class="badge badge-light">{{ $event->performances->count() }}</span>
                </div>
                <div class="ml-4">
                    <div class="mb-2">
                        <a href="{{ url('events/'.$event->id) }}">{{ $event->title }}</a>
                        <span class="text-muted"> - {{ $event->date }}</span>
                    </div>
                    <div>
                        {{ $event->description }}
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('events/'.$event->id) }}">{{ __('発表') }}</a>
            </li>
            <li class="nav-item">
                <span class="nav-link active">{{ __('追加する曲を選ぶ') }}</span>
            </li>
        </ul>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            @component('components.events_musics_th_link')
                                @slot('sort', $sort)
                                @slot('order', $order)
                                @slot('my_sort', 'title')
                                @slot('event', $event)
                                @slot('text', __('曲名'))
                            @endcomponent
                        <th>
                            @component('components.events_musics_th_link')
                                @slot('sort', $sort)
                                @slot('order', $order)
                                @slot('my_sort', 'composer')
                                @slot('event', $event)
                                @slot('text', __('作曲者'))
                            @endcomponent
                        </th>
                        <th>{{ __('登録数') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($musics->count() > 0)
                        @foreach ($musics as $music)
                            <tr>
                                <td>{{ $music->title }}</td>
                                <td>{{ $music->composer }}</td>
                                <td>{{ $event->musicCount($music).' / '.$music->limit }}</td>
                                <td class="text-right">
                                    @if ($music->isAddable($event))
                                        <a href="{{ url('performances/create?event='.$event->id.'&music='.$music->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="3">{{ __('曲はありません') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $musics->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
