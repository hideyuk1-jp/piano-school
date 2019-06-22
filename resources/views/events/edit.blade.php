@php
    $title = __('Edit').': '.$event->title;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('events/'.$event->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control" name="title" value="{{ $event->title }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input id="date" type="date" class="form-control" name="date" value="{{ $event->date }}" required>
        </div>
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea id="description" type="description" class="form-control" name="description" required>{{ $event->description }}</textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection