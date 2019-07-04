@extends('admin.app')
@php
    $title = __('Users');
@endphp
@section('content')
<div class="container">
    <div class="d-flex align-items-end">
    <h1>{{ $title }}</h1>
    <a class="btn btn-primary mb-2 ml-auto" href="{{ route('admin.users.create') }}">ユーザーの新規追加</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Role') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ url('admin/users/'.$user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
