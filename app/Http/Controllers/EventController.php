<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        return view('admin.events.create');
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $event = new event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->user_id = Auth::id();
        $event->save();
        session()->flash('msg_success', 'イベントを新規追加しました');
        return redirect('admin/events/'.$event->id);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show', ['event' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addableMusics(Event $event)
    {
        return view('events.addable_musics', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        /*
        return view('admin.events.edit', ['event' => $event]);
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        /*
        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->save();
        session()->flash('msg_success', 'イベント情報を更新しました');
        return redirect('admin/events/'.$event->id);
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        /*
        $event->delete();
        session()->flash('msg_success', 'イベントを削除しました');
        return redirect('admin/events');
        */
    }
}
