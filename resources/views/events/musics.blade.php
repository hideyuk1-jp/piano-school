@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
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
                        <th>{{ __('曲名') }}</th>
                        <th>{{ __('作曲者') }}</th>
                        <th>{{ __('登録数') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $musics = App\Music::all();
                    @endphp
                    @if($musics->count() > 0)
                        @foreach ($musics as $music)
                            <tr>
                                <td>{{ $music->title }}</td>
                                <td>{{ $music->composer }}</td>
                                <td>{{ $event->musicCount($music).' / '.$music->limit }}</td>
                                <td class="text-right">
                                    @if ($music->isAddable($event))
                                        <a href="{{ url('performances/create?event='.$event->id.'&music='.$music->id) }}" class="btn btn-primary btn-sm">{{ __('この曲を追加') }}</a>
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
    </div>
@endsection
