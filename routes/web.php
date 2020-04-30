<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', array(
    'as' => 'home',
    'uses' => 'HomeController@index',
));

Route::get('/videos/create', array(
    'as' => 'videos.create',
    'middleware' => 'auth',
    'uses' => 'VideosController@create',
));

Route::post('/videos/store', array(
    'as' => 'videos.store',
    'middleware' => 'auth',
    'uses' => 'VideosController@store',
));

Route::get('/image/{filename}', array(
    'as' => 'imageVideo',
    'uses' => 'VideosController@getImage',
));

Route::get('/video/{filename}', array(
    'as' => 'videos.video',
    'uses' => 'VideosController@getVideo',
));

Route::get('/videos/{video_id}', array(
    'as' => 'videos.view',
    'uses' => 'VideosController@view'
));

Route::post('/comments/store', array(
    'as' => 'comments.store',
    'middleware' => 'auth',
    'uses' => 'CommentsController@store',
));
