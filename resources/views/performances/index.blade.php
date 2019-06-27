@extends('layouts.app')
@php
    $title = __('Performances');
@endphp
@section('content')
<div class="container">
    <div class="d-flex align-items-end">
    <h1>{{ $title }}</h1>
    <a class="btn btn-primary mb-2 ml-auto" href="{{ route('performances.create') }}">発表の新規追加</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Performer') }}</th>
                    <th>{{ __('Event') }}</th>
                    <th>{{ __('Music') }}</th>
                    <th>{{ __('Created by') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($performances as $performance)
                    <tr>
                        <td>{{ $performance->id }}</td>
                        <td><a href="{{ url('performances/'.$performance->id) }}">{{ $performance->performer_id }}</a></td>
                        <td>{{ $performance->event_id }}</td>
                        <td>{{ $performance->music_id }}</td>
                        <td>{{ $performance->user_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
