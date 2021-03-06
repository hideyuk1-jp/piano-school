<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PerformanceRequest;
use App\Performance;
use App\User;
use App\Music;
use App\Event;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $performers = User::where('role', 15)->get();
        $music_id = intval($request->music);
        $event_id = intval($request->event);
        $musics = Music::all();
        $events = Event::orderBy('date', 'desc')->get();

        return view('performances.create', ['performers' => $performers, 'musics' => $musics, 'events' => $events, 'music_id' => $music_id, 'event_id' => $event_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerformanceRequest $request)
    {
        $performance = new Performance;
        $performance->performer_id = $request->performer;
        $performance->music_id = $request->music;
        $performance->event_id = $request->event;
        $performance->user_id = Auth::id();
        $performance->save();
        session()->flash('msg_success', '発表を新規追加しました');
        return redirect('events/'.$request->event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Performance $performance)
    {
        $performers = User::where('role', 15)->get();
        $musics = Music::all();
        $events = Event::orderBy('date', 'desc')->get();

        return view('performances.edit', ['performance' => $performance, 'performers' => $performers, 'musics' => $musics, 'events' => $events]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerformanceRequest $request, Performance $performance)
    {
        $performance->performer_id = $request->performer;
        $performance->music_id = $request->music;
        $performance->event_id = $request->event;
        $performance->save();
        session()->flash('msg_success', '発表を更新しました');
        return redirect('events/'.$performance->event_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Performance $performance)
    {
        $performance->delete();
        session()->flash('msg_success', '発表を削除しました');
        return redirect('events/'.$performance->event_id);
    }
}
