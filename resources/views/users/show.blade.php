@extends('layouts.app')
@php
    $title = __('Users').': '.$user->name;
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    {{-- ユーザー1件の情報 --}}
    <dl class="row">
        <dt class="col-md-4">{{ __('ID') }}</dt>
        <dd class="col-md-8">{{ $user->id }}</dd>
        <dt class="col-md-4">{{ __('Name') }}</dt>
        <dd class="col-md-8">{{ $user->name }}</dd>
        <dt class="col-md-4">{{ __('E-Mail Address') }}</dt>
        <dd class="col-md-8">{{ $user->email }}</dd>
        <dt class="col-md-4">{{ __('Role') }}</dt>
        <dd class="col-md-8">{{ $user->role }}</dd>
    </dl>

    {{-- 編集・削除ボタン --}}
    <div class="mb-4">
        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">
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
                        <h5 class="modal-title" id="exampleModalLabel">ユーザーの削除</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('message.delete', ['name' => $user->name]) }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <form style="display:inline" action="{{ url('users/'.$user->id) }}" method="post">
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

    {{-- ユーザーが作成した発表会一覧 --}}
    <div class="mb-4">
        <h2>作成した発表会</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td><a href="{{ url('events/'.$event->id) }}">{{ $event->title }}</a></td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
