@extends('admin.app')
@php
    $title = __('Performances');
@endphp
@section('content')
<div class="container">
    <div class="d-flex align-items-end">
    <h1>{{ $title }}</h1>
    <a class="btn btn-primary mb-2 ml-auto" href="{{ route('admin.performances.create') }}">発表の新規追加</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Performer') }}</th>
                    <th>{{ __('Event') }}</th>
                    <th>{{ __('Music') }}</th>
                    <th>{{ __('Composer') }}</th>
                    <th>{{ __('Created by') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($performances as $performance)
                    <tr>
                        <td>{{ $performance->id }}</td>
                        <td><a href="{{ url('admin/performances/'.$performance->id) }}">{{ $performance->performer->name }}</a></td>
                        <td>{{ $performance->event->title }}</td>
                        <td>{{ $performance->music->title }}</td>
                        <td>{{ $performance->music->composer }}</td>
                        <td>{{ $performance->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
