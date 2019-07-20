@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">ホーム</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('発表を追加') }}</li>
        </ol>
        <div class="card mb-4 p-0">
            <div class="card-body">
                <form method="POST" action="{{ route('performances.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="performer" class="col-md-4 col-form-label font-weight-bold">{{ __('発表者') }}</label>

                        <div class="col-md-8">
                            <select name="performer" id="performer" class="form-control @error('performer') is-invalid @enderror" required autocomplete="performer">
                                <option value="">{{ __('選択してください') }}</option>
                                @foreach ($performers as $performer)
                                    <option value="{{ $performer->id }}" @if (intval(old('performer')) === $performer->id) selected @endif>{{ $performer->name }}</option>
                                @endforeach
                            </select>

                            @error('performer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="music" class="col-md-4 col-form-label font-weight-bold">{{ __('曲') }}</label>

                        <div class="col-md-8">
                            <select name="music" id="music" class="form-control @error('music') is-invalid @enderror" required autocomplete="music">
                                <option value="">{{ __('選択してください') }}</option>
                                @foreach ($musics as $music)
                                    <option value="{{ $music->id }}" @if ($music_id === $music->id OR intval(old('music')) === $music->id) selected @endif>{{ $music->title }} （{{ $music->composer }}）</option>
                                @endforeach
                            </select>

                            @error('music')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="event" class="col-md-4 col-form-label font-weight-bold">{{ __('発表会') }}</label>

                        <div class="col-md-8">
                            <select name="event" id="event" class="form-control @error('event') is-invalid @enderror" required autocomplete="event">
                                <option value="">{{ __('選択してください') }}</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}" @if ($event_id === $event->id OR intval(old('event')) === $event->id) selected @endif>{{ $event->title }} （{{ $event->date }}）</option>
                                @endforeach
                            </select>

                            @error('event')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('送信') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
