@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("ユーザーを編集") }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/users/'.$user->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label font-weight-bold">{{ __('名前') }}</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
                    </div>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label font-weight-bold">{{ __('メールアドレス') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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