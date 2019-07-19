@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("発表会を編集") }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/events/'.$event->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label font-weight-bold">{{ __('タイトル') }}</label>
                    <div class="col-md-8">
                        <input id="title" type="text" class="form-control" name="title" value="{{ $event->title }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label font-weight-bold">{{ __('日付') }}</label>
                    <div class="col-md-8">
                        <input id="date" type="date" class="form-control" name="date" value="{{ $event->date }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label font-weight-bold">{{ __('詳細') }}</label>
                    <div class="col-md-8">
                        <textarea id="description" type="description" class="form-control" name="description" required>{{ $event->description }}</textarea>
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