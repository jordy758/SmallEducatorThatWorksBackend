<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/courses/create', 'CourseController@create')->name('add_course');
    Route::post('/courses/store', 'CourseController@store')->name('store_course');
    Route::get('/courses/show/{course}', 'CourseController@show')->name('show_course');

    Route::get('/playlists/create', 'PlayListController@create')->name('add_play_list');
    Route::post('/playlists/store', 'PlayListController@store')->name('store_play_list');
    Route::get('/playlists/show/{playList}', 'PlayListController@show')->name('show_play_list');

    Route::get('/lessons/create', 'LessonController@create')->name('add_lesson');
    Route::post('/lessons/store', 'LessonController@store')->name('store_lesson');
    Route::get('/lessons/show/{lesson}', 'LessonController@show')->name('show_lesson');
    Route::post('/lessons/redirect', 'LessonController@redirect')->name('redirect_to_playlists');
});
