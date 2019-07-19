@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("発表を編集") }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/performances/'.$performance->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="performer" class="col-md-4 col-form-label font-weight-bold">{{ __('発表者') }}</label>
                    <div class="col-md-8">
                        <select name="performer" id="performer" class="form-control" required autocomplete="performer">
                            <option value="">{{ __('選択してください') }}</option>
                            @foreach ($performers as $performer)
                                <option value="{{ $performer->id }}" @if ($performance->performer->id === $performer->id) selected @endif>{{ $performer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="music" class="col-md-4 col-form-label font-weight-bold">{{ __('曲') }}</label>
                    <div class="col-md-8">
                        <select name="music" id="music" class="form-control" required autocomplete="music">
                            <option value="">{{ __('選択してください') }}</option>
                            @foreach ($musics as $music)
                                <option value="{{ $music->id }}" @if ($performance->music->id === $music->id) selected @endif>{{ $music->title }} （{{ $music->composer }}）</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="event" class="col-md-4 col-form-label font-weight-bold">{{ __('発表会') }}</label>
                    <div class="col-md-8">
                        <select name="event" id="event" class="form-control" required autocomplete="event">
                            <option value="">{{ __('選択してください') }}</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}" @if ($performance->event->id === $event->id) selected @endif>{{ $event->title }} （{{ $event->date }}）</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" name="submit" class="btn btn-primary">{{ __('送信') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
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