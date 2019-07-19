@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("曲を編集") }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/musics/'.$music->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="composer" class="col-md-4 col-form-label font-weight-bold">{{ __('曲名') }}</label>
                    <div class="col-md-8">
                        <input id="title" type="text" class="form-control" name="title" value="{{ $music->title }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label font-weight-bold">{{ __('作曲者') }}</label>
                    <div class="col-md-8">
                        <input id="composer" type="text" class="form-control" name="composer" value="{{ $music->composer }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="limit" class="col-md-4 col-form-label font-weight-bold">{{ __('上限') }}</label>
                    <div class="col-md-8">
                        <input id="limit" type="number" min="1" class="form-control" name="limit" value="{{ $music->limit }}" required>
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
    <form action="{{ url('admin/musics/'.$music->id) }}" method="post">
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