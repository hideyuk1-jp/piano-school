@extends('layouts.app')
@php
    $title = __('発表会');
@endphp
@section('content')
<div class="container">
    <div class="d-flex align-items-end">
    <h1>{{ $title }}</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('開催日') }}</th>
                    <th>{{ __('題名') }}</th>
                    <th>{{ __('詳細') }}</th>
                    <th>{{ __('登録数') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->date }}</td>
                        <td><a href="{{ url('events/'.$event->id) }}">{{ $event->title }}</a></td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->performances->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
