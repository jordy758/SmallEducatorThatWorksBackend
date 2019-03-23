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
                                    {{ $lesson->name }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="" class="btn btn-primary">Add Lesson</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
