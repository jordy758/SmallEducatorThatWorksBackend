@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $course->name }}</div>

                    <div class="card-body">
                        You are giving this course to {{ count($course->students) }} student(s).
                        <hr/>
                        This course has {{ count($course->playLists) }} playlist(s). <br/><br/>
                        <ul>
                            @foreach ($course->playLists as $playList)
                                <li>
                                    <a href="{{ route('show_play_list', $playList) }}">
                                        {{ $playList->name }} with {{ count($playList->lessons) }} lessons.
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <hr/>
                        <a href="{{ route('add_play_list', ['course_id' => $course->id]) }}" class="btn btn-primary">Add PlayList</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
