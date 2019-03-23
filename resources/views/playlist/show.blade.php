@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $playlist->name }}</div>

                    <div class="card-body">
                        This playlist has {{ count($playlist->lessons) }} lesson(s).
                        <hr/>
                        <ul>
                            @foreach ($playlist->lessons as $lesson)
                                <li>
                                    <a href="{{ route('show_lesson', $lesson) }}">{{ $lesson->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <hr />
                        <a href="{{ route('add_lesson', ['course_id' => $playlist->course_id, 'playlist_id' => $playlist->id]) }}" class="btn btn-primary">Add Lesson</a>&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('show_course', $playlist->course) }}">Back to course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
