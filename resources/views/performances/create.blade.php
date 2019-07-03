@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Performance') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('performances.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="performer" class="col-md-4 col-form-label text-md-right">{{ __('Performer') }}</label>

                            <div class="col-md-6">
                                <select name="performer" id="performer" class="form-control @error('performer') is-invalid @enderror" required autocomplete="performer">
                                    <option value="">{{ __('選択してください') }}</option>
                                    @foreach ($performers as $performer)
                                        <option value="{{ $performer->id }}">{{ $performer->name }}</option>
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
                            <label for="music" class="col-md-4 col-form-label text-md-right">{{ __('Music') }}</label>

                            <div class="col-md-6">
                                <select name="music" id="music" class="form-control @error('music') is-invalid @enderror" required autocomplete="music">
                                    <option value="">{{ __('選択してください') }}</option>
                                    @foreach ($musics as $music)
                                        <option value="{{ $music->id }}">{{ $music->title }} （{{ $music->composer }}）</option>
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
                            <label for="event" class="col-md-4 col-form-label text-md-right">{{ __('Event') }}</label>

                            <div class="col-md-6">
                                <select name="event" id="event" class="form-control @error('event') is-invalid @enderror" required autocomplete="event">
                                    <option value="">{{ __('選択してください') }}</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->title }} （{{ $event->date }}）</option>
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
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
