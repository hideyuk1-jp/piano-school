@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card mb-4 p-0">
            <div class="card-body d-flex">
                <div class="text-center d-flex flex-column">
                    <div class="h4 text-danger"><i class="fas fa-music"></i></div>
                    <span class="badge badge-light">{{ $event->performances->count() }}</span>
                </div>
                <div class="ml-4">
                    <div class="mb-2">
                        <a href="{{ url('events/'.$event->id) }}">{{ $event->title }}</a>
                        <span class="text-muted"> - {{ $event->date }}</span>
                    </div>
                    <div>
                        {{ $event->description }}
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <span class="nav-link active">{{ __('発表') }}</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('events/'.$event->id.'/musics') }}">{{ __('追加する曲を選ぶ') }}</a>
            </li>
        </ul>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('発表者') }}</th>
                        <th>{{ __('曲') }}</th>
                        <th>{{ __('作曲者') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($event->performances->count() > 0)
                        @foreach ($event->performances as $performance)
                            <tr>
                                <td>{{ $performance->performer->name }}</td>
                                <td>{{ $performance->music->title }}</td>
                                <td>{{ $performance->music->composer }}</td>
                                <td class="text-right">
                                    @if (Auth::user()->can('admin-higher') OR Auth::user()->id === $performance->user_id)
                                        <a href="{{ url('performances/'.$performance->id.'/edit') }}" class="btn btn-primary btn-sm">
                                            {{ __('編集') }}
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
                                            {{ __('削除') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="4">{{ __('発表はありません') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- 削除モーダルの設定 -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('発表の削除')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('閉じる') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('発表を削除します') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('閉じる') }}</button>
                        <form style="display:inline" action="{{ url('performances/'.$performance->id) }}" method="post">
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
    @endsection
