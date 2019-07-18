@extends('admin.app')

@section('content')
    {{-- 発表会1件の情報 --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("発表会詳細") }}</h2>
            <div class="ml-auto">
                <a href="{{ url('admin/events/'.$event->id.'/edit') }}" class="btn btn-primary btn-sm">
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
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('発表会の削除')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('閉じる') }}">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('発表会を削除します') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('閉じる') }}</button>
                                <form style="display:inline" action="{{ url('admin/events/'.$event->id) }}" method="post">
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
        <dd class="col-md-8">{{ $event->id }}</dd>
        <dt class="col-md-4">{{ __('タイトル') }}</dt>
        <dd class="col-md-8">{{ $event->title }}</dd>
        <dt class="col-md-4">{{ __('日付') }}</dt>
        <dd class="col-md-8">{{ $event->date }}</dd>
        <dt class="col-md-4">{{ __('詳細') }}</dt>
        <dd class="col-md-8">{{ $event->description }}</dd>
        <dt class="col-md-4">{{ __('作成者') }}</dt>
        <dd class="col-md-8"><a href="{{ url('admin/users/'.$event->user_id) }}">{{ $event->user->name }}</a></dd>
    </dl>
    </div></div>

    <h3 class="h5 mb-2">{{ __('この発表会の発表') }}</h2>
    {{-- 発表の表示 --}}
    <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('発表者') }}</th>
                        <th>{{ __('曲名') }}</th>
                        <th>{{ __('作曲者') }}</th>
                        <th>{{ __('作成者') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if($event->performances->count() > 0)
                        @foreach ($event->performances as $performance)
                            <tr data-href="{{ url('admin/performances/'.$performance->id) }}">
                                <td><a href="{{ url('admin/users/'.$performance->performer_id) }}">{{ $performance->performer->name }}</a></td>
                                <td><a href="{{ url('admin/musics/'.$performance->music_id) }}">{{ $performance->music->title }}</a></td>
                                <td>{{ $performance->music->composer }}</td>
                                <td><a href="{{ url('admin/users/'.$performance->user_id) }}">{{ $performance->user->name }}</a></td>
                            </tr>
                        @endforeach
                    @else
                        {{ __('発表会はありません') }}
                    @endif
                </tbody>
            </table>
        </div>
    @endsection
