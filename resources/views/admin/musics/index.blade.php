@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("曲") }}</h2>
            <div class="ml-auto">
                <a class="btn btn-primary btn-sm ml-auto" href="{{ route('admin.musics.create') }}">{{ __('曲を追加') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('曲名') }}</th>
                            <th>{{ __('作曲者') }}</th>
                            <th>{{ __('上限') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($musics->count() > 0)
                            @foreach ($musics as $music)
                                <tr data-href="{{ url('admin/musics/'.$music->id) }}">
                                    <td>{{ $music->title }}</td>
                                    <td>{{ $music->composer }}</td>
                                    <td>{{ $music->limit }}</td>
                                    <td class="text-right"><a href="{{ url('admin/musics/'.$music->id) }}" class="btn btn-secondary btn-sm">{{ __('詳細') }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            {{ __('曲はありません') }}
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
