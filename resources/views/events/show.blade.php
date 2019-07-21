@extends('layouts.app')

@section('content')
    <div class="col-lg-8 offset-lg-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('ホーム') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
            </ol>
        </nav>
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
            @can('teacher-higher')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('events/'.$event->id.'/musics') }}">{{ __('追加する曲を選ぶ') }}</a>
                </li>
            @endcan
        </ul>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            @component('components.events_th_link')
                                @slot('sort', $sort)
                                @slot('order', $order)
                                @slot('my_sort', 'performer_name')
                                @slot('event', $event)
                                @slot('text', __('発表者'))
                            @endcomponent
                        </th>
                        <th>
                            @component('components.events_th_link')
                                @slot('sort', $sort)
                                @slot('order', $order)
                                @slot('my_sort', 'music_title')
                                @slot('event', $event)
                                @slot('text', __('曲名'))
                            @endcomponent
                        </th>
                        <th>
                            @component('components.events_th_link')
                                @slot('sort', $sort)
                                @slot('order', $order)
                                @slot('my_sort', 'music_composer')
                                @slot('event', $event)
                                @slot('text', __('作曲者'))
                            @endcomponent
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($performances->count() > 0)
                        @foreach ($performances as $performance)
                            <tr>
                                <td>{{ $performance->performer->name }}</td>
                                <td>{{ $performance->music->title }}</td>
                                <td>{{ $performance->music->composer }}</td>
                                <td class="text-right">
                                    @if (Auth::user()->can('admin-higher') OR Auth::user()->can('owner', $performance))
                                        <a href="{{ url('performances/'.$performance->id.'/edit') }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal-{{ $performance->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <!-- 削除モーダルの設定 -->
                                        <div class="modal fade text-left" id="deleteModal-{{ $performance->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('発表の削除')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('閉じる') }}">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{ __('この発表を削除します') }}</p>
                                                        <dl class="row mb-0">
                                                            <dt class="col-md-4">{{ __('ID') }}</dt>
                                                            <dd class="col-md-8">{{ $performance->id }}</dd>
                                                            <dt class="col-md-4">{{ __('発表者') }}</dt>
                                                            <dd class="col-md-8">{{ $performance->performer->name }}</dd>
                                                            <dt class="col-md-4">{{ __('曲') }}</dt>
                                                            <dd class="col-md-8">{{ $performance->music->title }}</dd>
                                                            <dt class="col-md-4">{{ __('発表会') }}</dt>
                                                            <dd class="col-md-8">{{ $performance->event->title }}</dd>
                                                        </dl>
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
        <div class="d-flex justify-content-center">
            {{ $performances->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
