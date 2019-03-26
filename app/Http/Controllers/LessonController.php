<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use App\PlayList;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $course = Course::find($request->get('course_id'));
        return view('lesson/create', [
            'playlists' => $course ? $course->playLists : [],
            'courses' => Course::all(),
            'playlist_id' => $request->get('playlist_id')
        ]);
    }

    public function redirect(Request $request)
    {
        return redirect(
            route('add_lesson', [
                'course_id' => $request->get('course_id')
            ])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create the base course
        $lesson = new Lesson($request->all());
        $lesson->save();

        $request->session()->flash('status', 'The lesson was successfully added!');
        return redirect(route('show_lesson', $lesson));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('lesson/show', ['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update($request->all());
        return redirect(route('show_lesson', $lesson));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson $lesson
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect(route('show_playlist', $lesson->playList()));
    }
}
