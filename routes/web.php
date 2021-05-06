<?php
use App\Models\Room;
use Illuminate\Http\Request;


// ルームの一覧表示(rooms.blade.php)
Route::get('/','roomsController@index');

// ルームの追加画面
Route::get('/roomsnew','roomsController@new');

// ルームの追加処理
Route::post('rooms','roomsController@create');

// ルームの詳細画面
Route::get('/roomsshow/{rooms}','roomsController@show')->name('room.show');

// ルームの編集画面
Route::post('/roomsedit/{rooms}','roomsController@edit');

// ルームの編集処理
Route::post('/rooms/update','roomsController@update');

// //  ルームを削除 
Route::delete('/room/{room}','roomsController@destroy');



// 動画の投稿ページ
Route::get('videosnew/{rooms}','videosController@new');

// 動画の追加処理
Route::post('videos','videosController@store');

// 動画の編集画面
Route::post('/videosedit/{videos}','videosController@edit');

// 動画の編集処理
Route::post('/videos/update','videosController@update');

//  動画の削除 
Route::delete('/video/{video}','videosController@destroy');


// ユーザー登録で記述
Auth::routes();
Route::get('/home', 'roomsController@index')->name('home');

