@extends('layouts.app')
@php
    $title = __('Musics').': '.$music->title;
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- 曲1件の情報 --}}
    <dl class="row">
        <dt class="col-md-4">{{ __('ID') }}</dt>
        <dd class="col-md-8">{{ $music->id }}</dd>
        <dt class="col-md-4">{{ __('Title') }}</dt>
        <dd class="col-md-8">{{ $music->title }}</dd>
        <dt class="col-md-4">{{ __('Composer') }}</dt>
        <dd class="col-md-8">{{ $music->composer }}</dd>
        <dt class="col-md-4">{{ __('Limit') }}</dt>
        <dd class="col-md-8">{{ $music->limit }}</dd>
    </dl>

    {{-- 編集・削除ボタン --}}
    <div>
        <a href="{{ url('musics/'.$music->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>

        <a href="#" class="btn btn-danger" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
            {{ __('Delete') }}
        </a>
        <!-- 削除モーダルの設定 -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">曲の削除</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('message.delete', ['title' => $music->title]) }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <form style="display:inline" action="{{ url('musics/'.$music->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
@endsection
