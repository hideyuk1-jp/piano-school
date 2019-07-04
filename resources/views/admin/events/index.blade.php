@extends('admin.app')
@php
    $title = __('Events');
@endphp
@section('content')
<div class="container">
    <div class="d-flex align-items-end">
    <h1>{{ $title }}</h1>
    <a class="btn btn-primary mb-2 ml-auto" href="{{ route('admin.events.create') }}">イベントの新規追加</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Created by') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td><a href="{{ url('admin/events/'.$event->id) }}">{{ $event->title }}</a></td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->description }}</td>
                        <td><a href="{{ url('admin/users/'.$event->user_id) }}">{{ $event->user->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
