@extends('admin.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("曲詳細") }}</h2>
            <div class="ml-auto">
                <a href="{{ url('admin/musics/'.$music->id.'/edit') }}" class="btn btn-primary btn-sm">
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
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('曲の削除')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('閉じる') }}">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('曲を削除します') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('閉じる') }}</button>
                                <form style="display:inline" action="{{ url('admin/musics/'.$music->id) }}" method="post">
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
                <dd class="col-md-8">{{ $music->id }}</dd>
                <dt class="col-md-4">{{ __('曲名') }}</dt>
                <dd class="col-md-8">{{ $music->title }}</dd>
                <dt class="col-md-4">{{ __('作曲者') }}</dt>
                <dd class="col-md-8">{{ $music->composer }}</a></dd>
                <dt class="col-md-4">{{ __('上限') }}</dt>
                <dd class="col-md-8">{{ $music->limit }}</a></dd>
                <dt class="col-md-4">{{ __('作成日時') }}</dt>
                <dd class="col-md-8">{{ $music->created_at }}</dd>
                <dt class="col-md-4">{{ __('更新日時') }}</dt>
                <dd class="col-md-8">{{ $music->updated_at }}</dd>
            </dl>
        </div>
    </div>
@endsection
