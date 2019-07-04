@php
    $title = __('Edit').': '.$performance->id;
@endphp
@extends('admin.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('admin/performances/'.$performance->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="performer">{{ __('Performer') }}</label>
            <select name="performer" id="performer" class="form-control" required autocomplete="performer">
                <option value="">{{ __('選択してください') }}</option>
                @foreach ($performers as $performer)
                    <option value="{{ $performer->id }}" @if ($performance->performer->id === $performer->id) selected @endif>{{ $performer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="music">{{ __('Music') }}</label>
            <select name="music" id="music" class="form-control" required autocomplete="music">
                <option value="">{{ __('選択してください') }}</option>
                @foreach ($musics as $music)
                    <option value="{{ $music->id }}" @if ($performance->music->id === $music->id) selected @endif>{{ $music->title }} （{{ $music->composer }}）</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="event">{{ __('Event') }}</label>
            <select name="event" id="event" class="form-control" required autocomplete="event">
                <option value="">{{ __('選択してください') }}</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" @if ($performance->event->id === $event->id) selected @endif>{{ $event->title }} （{{ $event->date }}）</option>
                @endforeach
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection