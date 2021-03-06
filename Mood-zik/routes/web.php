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

Route::get('/', 'HomeController@show');

Route::get('/post', 'PostController@index')->name('post');
Route::post('/post', 'PostController@storePost')->name('post');

Route::get('/posts', 'PostController@showMyPosts')->name('posts');

Route::get('/playlists', 'PlaylistController@storePlaylist')->name('playlists');
//Route::post('/playlists', 'PlaylistController@storePlaylist')->name('playlists');
Route::get('/playlist', 'PlaylistController@showPlaylist')->name('playlist');

Route::post('/add_to_playlists', 'PlaylistController@addToPlaylist')->name('add_to_playlist');

Route::get('/login', 'Auth\LoginController@show')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@show')->name('home');

Route::get('/profile', 'ProfileController@show')->name('profile');
Route::get('/user/{id}', 'ProfileController@showUser')->name('user');


Route::get('/post/action', 'PostController@action')->name('live_search.action');
