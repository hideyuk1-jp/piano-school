<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Performance;
use App\User;
use App\Music;
use App\Event;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $performances = Performance::all();
        return view('performances.index', ['performances' => $performances]);
        */
    }

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
        if ($request->music === NULL) {
            $musics = Music::all();
        } else {
            $musics = Music::where('id', $music_id)->get();
        }
        if ($request->event === NULL) {
            $events = Event::orderBy('date', 'desc')->get();
        } else {
            $events = Event::where('id', $event_id)->get();
        }

        return view('performances.create', ['performers' => $performers, 'musics' => $musics, 'events' => $events, 'music_id' => $music_id, 'event_id' => $event_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $music = Music::find($request->music);
        $event = Event::find($request->event);

        if (!$music->isAddable($event)) {
            session()->flash('msg_failure', '曲数が上限に達しています');
            return back()->withInput();
        }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Performance $performance)
    {
        /*
        return view('admin.performances.show', ['performance' => $performance]);
        */
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
    public function update(Request $request, Performance $performance)
    {
        $music = Music::find($request->music);
        $event = Event::find($request->event);

        if (!$music->isAddable($event)) {
            session()->flash('msg_failure', '曲数が上限に達しています');
            return redirect('performances/'.$performance->id.'/edit');
        }

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
        /*
        $performance->delete();
        session()->flash('msg_success', '発表を削除しました');
        return redirect('admin/performances');
        */
    }
}
