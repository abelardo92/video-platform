<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/home/{filter?}', array(
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

Route::get('/videos/edit/{video_id}', array(
    'as' => 'videos.edit',
    'middleware' => 'auth',
    'uses' => 'VideosController@edit',
));

Route::get('/videos/edit/{video_id}', array(
    'as' => 'videos.edit',
    'uses' => 'VideosController@edit',
));

Route::get('/videos/search/{search?}/{filter?}', array(
    'as' => 'videos.search',
    'middleware' => 'auth',
    'uses' => 'VideosController@search',
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

Route::get('/videos/delete/{video_id}', array(
    'as' => 'videos.delete',
    'uses' => 'VideosController@delete'
));

Route::get('/comments/delete/{comment_id}', array(
    'as' => 'comments.delete',
    'uses' => 'CommentsController@delete'
));

Route::post('/comments/store', array(
    'as' => 'comments.store',
    'middleware' => 'auth',
    'uses' => 'CommentsController@store',
));

// clear cache
Route::get('/clear-cache', function(){
    $code = Artisan::call('cache:clear');
    echo "Cache cleared";
});
