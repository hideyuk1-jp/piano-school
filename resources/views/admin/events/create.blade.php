@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("発表会を追加") }}</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.events.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label font-weight-bold">{{ __('タイトル') }}</label>

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
                    <label for="date" class="col-md-4 col-form-label font-weight-bold">{{ __('日付') }}</label>

                    <div class="col-md-8">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">

                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label font-weight-bold">{{ __('詳細') }}</label>

                    <div class="col-md-8">
                        <textarea id="descriotion" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="date">{{ old('description') }}</textarea>

                        @error('description')
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
