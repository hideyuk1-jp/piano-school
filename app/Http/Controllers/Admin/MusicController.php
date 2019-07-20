<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MusicRequest;
use App\Music;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::latest()->get();

        return view('admin.musics.index', ['musics' => $musics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MusicRequest $request)
    {
        $music = new music;
        $music->title = $request->title;
        $music->composer = $request->composer;
        $music->limit = $request->limit;
        $music->save();
        session()->flash('msg_success', '曲を新規追加しました');
        return redirect('admin/musics/'.$music->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        return view('admin.musics.show', ['music' => $music]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        return view('admin.musics.edit', ['music' => $music]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MusicRequest $request, Music $music)
    {
        $music->title = $request->title;
        $music->composer = $request->composer;
        $music->limit = $request->limit;
        $music->save();
        session()->flash('msg_success', '曲を更新しました');
        return redirect('admin/musics/'.$music->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        $music->delete();
        session()->flash('msg_success', '曲を削除しました');
        return redirect('admin/musics');
    }
}
