<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex flex-row align-items-center" href="{{ url('admin/performances') }}">
                    <span class="mr-1">{{ __('ピアノ発表会アプリ') }}</span><span class="badge badge-success">Admin</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('通常画面') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if (session('msg_success'))
            <div class="flash_message alert-success text-center py-3 my-0">
                {{ session('msg_success') }}
            </div>
        @endif
        @if (session('msg_failure'))
            <div class="flash_message alert-danger text-center py-3 my-0">
                {{ session('msg_failure') }}
            </div>
        @endif

        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="list-group">
                        @php
                            $flag = [
                                "events" => Request::is('admin/events', 'admin/events/*'),
                                "performances" => Request::is('admin/performances', 'admin/performances/*'),
                                "users" => Request::is('admin/users', 'admin/users/*'),
                                "musics" => Request::is('admin/musics', 'admin/musics/*')
                            ];
                        @endphp
                        <li class="list-group-item @if($flag["events"]) active @endif">
                            <a @if ($flag["events"]) class="text-light" @endif href="{{ route('admin.events.index') }}">{{ __('発表会') }}</a>
                        </li>
                        <li class="list-group-item @if($flag["performances"]) active @endif">
                            <a @if ($flag["performances"]) class="text-light" @endif href="{{ route('admin.performances.index') }}">{{ __('発表') }}</a>
                        </li>
                        <li class="list-group-item @if($flag["users"]) active @endif">
                            <a @if ($flag["users"]) class="text-light" @endif href="{{ route('admin.users.index') }}">{{ __('ユーザー') }}</a>
                        </li>
                        <li class="list-group-item @if($flag["musics"]) active @endif">
                            <a @if ($flag["musics"]) class="text-light" @endif href="{{ route('admin.musics.index') }}">{{ __('曲') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
