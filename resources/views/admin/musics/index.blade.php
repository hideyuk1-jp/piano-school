@extends('admin.app')
@php
    $title = __('Musics');
@endphp
@section('content')
<div class="container">
    <div class="d-flex align-items-end">
    <h1>{{ $title }}</h1>
    <a class="btn btn-primary mb-2 ml-auto" href="{{ route('admin.musics.create') }}">曲の新規追加</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Composer') }}</th>
                    <th>{{ __('Limit') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($musics as $music)
                    <tr>
                        <td>{{ $music->id }}</td>
                        <td><a href="{{ url('admin/musics/'.$music->id) }}">{{ $music->title }}</a></td>
                        <td>{{ $music->composer }}</td>
                        <td>{{ $music->limit }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
