@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('曲を追加') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.musics.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label font-bold">{{ __('曲名') }}</label>

                    <div class="col-md-8">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="composer" class="col-md-4 col-form-label font-bold">{{ __('作曲者') }}</label>

                    <div class="col-md-8">
                        <input id="composer" type="text" class="form-control @error('composer') is-invalid @enderror" name="composer" value="{{ old('composer') }}" required autocomplete="composer">

                        @error('composer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="limit" class="col-md-4 col-form-label font-bold">{{ __('上限') }}</label>

                    <div class="col-md-8">
                        <input id="limit" type="number" min="1" class="form-control @error('limit') is-invalid @enderror" name="limit" value="{{ old('limit') }}" required autocomplete="limit">

                        @error('limit')
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
@endsection
