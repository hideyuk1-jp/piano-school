<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Performance;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('events.index', ['events' => $events]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Request $request)
    {
        $sort = $request->sort;
        $order = $request->order;
        $performances = Performance::where('event_id', $event->id)
            ->join('musics', 'performances.music_id', '=', 'musics.id')
            ->join('users', 'performances.performer_id', '=', 'users.id')
            ->select('performances.*', 'musics.title as music_title', 'musics.composer as music_composer', 'users.name as performer_name');
        if (is_null($sort) || is_null($order)) {
            $performances = $performances->orderBy('performer_id', 'asc');
        } else {
            $performances = $performances->orderBy($request->sort, $request->order);
        }
        $performances = $performances->paginate(5);
        return view('events.show', ['event' => $event, 'performances' => $performances, 'sort' => $sort, 'order' => $order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function musics(Event $event)
    {
        return view('events.musics', ['event' => $event]);
    }
}
