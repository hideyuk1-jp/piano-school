@php
    $title = __('Edit').': '.$music->title;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('musics/'.$music->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control" name="title" value="{{ $music->title }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="composer">{{ __('Composer') }}</label>
            <input id="composer" type="text" class="form-control" name="composer" value="{{ $music->composer }}" required>
        </div>
        <div class="form-group">
            <label for="limit">{{ __('Limit') }}</label>
            <input id="limit" type="number" min="1" class="form-control" name="limit" value="{{ $music->limit }}" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection