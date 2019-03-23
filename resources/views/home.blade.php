@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Teacher Dashboard</div>

                    <div class="card-body">
                        You are giving {{ count($user->courses) }} course(s).<br/><br/>
                        <ul>
                            @foreach ($user->courses as $course)
                                <li><a href="{{ route('show_course', $course) }}">{{ $course->name }}</a> with {{ count($course->playLists) }} playlist(s)</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
