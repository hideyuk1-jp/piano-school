@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("ユーザー詳細") }}</h2>
            <div class="ml-auto">
                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-primary btn-sm">
                    {{ __('編集') }}
                </a>
                <a href="#" class="btn btn-danger btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
                    {{ __('削除') }}
                </a>
                <!-- 削除モーダルの設定 -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('ユーザーの削除')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('閉じる') }}">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('ユーザーを削除します') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('閉じる') }}</button>
                                <form style="display:inline" action="{{ url('admin/users/'.$user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ __('削除') }}
                                    </button>
                                </form>
                            </div><!-- /.modal-footer -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-md-4">{{ __('ID') }}</dt>
                <dd class="col-md-8">{{ $user->id }}</dd>
                <dt class="col-md-4">{{ __('名前') }}</dt>
                <dd class="col-md-8">{{ $user->name }}</dd>
                <dt class="col-md-4">{{ __('メールアドレス') }}</dt>
                <dd class="col-md-8">{{ $user->email }}</dd>
                <dt class="col-md-4">{{ __('権限') }}</dt>
                <dd class="col-md-8">{{ $user->role }}</dd>
                <dt class="col-md-4">{{ __('作成日時') }}</dt>
                <dd class="col-md-8">{{ $user->created_at }}</dd>
                <dt class="col-md-4">{{ __('更新日時') }}</dt>
                <dd class="col-md-8">{{ $user->updated_at }}</dd>
            </dl>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="h5 mb-2">{{ __('このユーザーの発表') }}</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('曲') }}</th>
                            <th>{{ __('発表会') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($user->performances->count() > 0)
                            @foreach ($user->performances as $performance)
                                <tr data-href="{{ url('admin/performances/'.$performance->id) }}">
                                    <td><a href="{{ url('admin/musics/'.$performance->music_id) }}">{{ $performance->music->title }}（{{ $performance->music->composer }}）</a></td>
                                    <td><a href="{{ url('admin/events/'.$performance->event_id) }}">{{ $performance->event->title }}（{{ $performance->event->date }}）</a></td>
                                    <td class="text-right"><a href="{{ url('admin/performances/'.$performance->id) }}" class="btn btn-secondary btn-sm">{{ __('詳細') }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="3">{{ __('発表はありません') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">

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
        <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-primary">
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
                        <form style="display:inline" action="{{ url('admin/users/'.$user->id) }}" method="post">
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
