@extends('admin.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('ユーザーを追加') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label font-weight-bold">{{ __('名前') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label font-weight-bold">{{ __('メールアドレス') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label font-weight-bold">{{ __('権限') }}</label>

                    <div class="col-md-8">
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required autocomplete="role">
                            <option value="10">講師</option>
                            <option value="15">生徒</option>
                        </select>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label font-weight-bold">{{ __('パスワード') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label font-weight-bold">{{ __('確認用パスワード') }}</label>

                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
