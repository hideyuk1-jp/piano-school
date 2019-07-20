@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <h2 class="h4 border-bottom pb-2 mb-4">{{ __('発表会') }}</h2>
        @foreach ($events as $event)
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
        @endforeach
    </div>
@endsection
