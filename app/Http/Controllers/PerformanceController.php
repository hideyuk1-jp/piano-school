<?php

namespace App\Http\Controllers;

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
        $performances = Performance::all();

        return view('performances.index', ['performances' => $performances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $performers = User::where('role', 15)->get();
        $musics = Music::all();
        $events = Event::all();

        return view('performances.create', ['performers' => $performers, 'musics' => $musics, 'events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $performance = new Performance;
        $performance->performer_id = $request->performer;
        $performance->music_id = $request->music;
        $performance->event_id = $request->event;
        $performance->user_id = Auth::id();
        $performance->save();
        session()->flash('msg_success', '発表を新規追加しました');
        return redirect('performances/'.$performance->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Performance $performance)
    {
        return view('performances.show', ['performance' => $performance]);
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
        $events = Event::all();

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
        $performance->performer_id = $request->performer;
        $performance->music_id = $request->music;
        $performance->event_id = $request->event;
        $performance->save();
        session()->flash('msg_success', '発表を更新しました');
        return redirect('performances/'.$performance->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
