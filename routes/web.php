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
    Route::post('updateProfile','PostController@updateProfile')->name('updateProfile');
    Route::post('updateProfilePost','PostController@updateProfilePost');
    Route::resource('post','PostController')->only('index');
    Route::middleware('UpdateGender')->group(function () {
            Route::resource('post','PostController')->except('index');
            Route::post('makeComment','PostController@makeComment');
        });
    Route::get('/login/{social}','Auth\LoginController@socialLogin')
            ->where('social','twitter|facebook|linkedin|google|github');
    Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')
            ->where('social','twitter|facebook|linkedin|google|github');
});
