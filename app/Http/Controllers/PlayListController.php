<?php

namespace App\Http\Controllers;

use App\Course;
use App\PlayList;
use Illuminate\Http\Request;

class PlayListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('playlist/index', ['user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist/create', ['courses' => Course::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create the base course
        $playlist = new PlayList($request->all());
        $playlist->save();

        $request->session()->flash('status', 'The playlist was successfully added!');
        return redirect(route('show_play_list', $playlist));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlayList  $playList
     * @return \Illuminate\Http\Response
     */
    public function show(PlayList $playList)
    {
        return view('playlist/show', ['playlist' => $playList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlayList  $playList
     * @return \Illuminate\Http\Response
     */
    public function edit(PlayList $playList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlayList  $playList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlayList $playList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlayList  $playList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayList $playList)
    {
        //
    }
}
