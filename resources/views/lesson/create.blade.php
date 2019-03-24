@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Lesson') }}</div>

                    <div class="card-body">
                        @if (count($playlists) === 0)
                        <form method="POST" action="{{ route('redirect_to_playlists') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

                                <div class="col-md-6">
                                    <select id="course_id" class="form-control" name="course_id" onchange="this.form.submit()">
                                        <option>Pick a course</option>
                                        @foreach ($courses as $course)
                                            @if (count($course->playLists) > 0)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                        @else
                        <form method="POST" action="{{ route('store_lesson') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="playlist_id" class="col-md-4 col-form-label text-md-right">{{ __('Playlist') }}</label>

                                <div class="col-md-6">
                                    <select id="play_list_id" class="form-control" name="play_list_id">
                                        @foreach ($playlists as $playlist)
                                            <option value="{{ $playlist->id }}" {{$playlist_id == $playlist->id ? 'selected' : null}}>{{ $playlist->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('play_list_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('play_list_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="email" type="email" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Lesson') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
