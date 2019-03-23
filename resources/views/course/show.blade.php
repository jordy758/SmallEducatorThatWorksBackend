@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $course->name }}</div>

                    <div class="card-body">
                        You are giving this course to {{ count($course->students) }} student(s). Students can use the following key to enroll on this course, even after creation <code>{{ $course->enrollment_key }}</code>
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
                        <a href="{{ route('add_play_list', ['course_id' => $course->id]) }}" class="btn btn-primary">Add PlayList</a>&nbsp;&nbsp;
                        <a href="{{ route('home') }}">Back to courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
