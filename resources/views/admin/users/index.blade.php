@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex align-items-end border-bottom">
            <h2 class="h4 mb-0">{{ __("ユーザー") }}</h2>
            <div class="ml-auto">
                <a class="btn btn-primary btn-sm ml-auto" href="{{ route('admin.users.create') }}">{{ __('ユーザーを追加') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('名前') }}</th>
                            <th>{{ __('メールアドレス') }}</th>
                            <th>{{ __('権限') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->count() > 0)
                            @foreach ($users as $user)
                                <tr data-href="{{ url('admin/users/'.$user->id) }}">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td class="text-right"><a href="{{ url('admin/users/'.$user->id) }}" class="btn btn-secondary btn-sm">{{ __('詳細') }}</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">{{ __('ユーザーはいません') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection