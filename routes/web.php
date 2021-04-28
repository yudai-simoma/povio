<?php
use App\Models\Room;
use Illuminate\Http\Request;


// ルームの一覧表示(rooms.blade.php)
Route::get('/','RoomsController@index');

// ルームの追加画面
Route::get('/roomsnew','RoomsController@new');

// ルームの追加処理
Route::post('rooms','RoomsController@store');

// ルームの詳細画面
Route::get('/roomsshow','RoomsController@show');

// ルームの編集画面
Route::post('/roomsedit/{rooms}','RoomsController@edit')->name('room.edit');

Route::get('/roomsedit/{rooms}','RoomsController@edit');

// ルームの編集処理
Route::post('/rooms/update','RoomsController@update');

// //  ルームを削除 
Route::delete('/room/{room}','RoomsController@destroy');



// 動画の一覧表示(videos.blade.php)
Route::get('/videos','VideosController@index');

// 動画の追加画面
Route::get('/videosnew','VideosController@new');

// // 動画の追加処理
// Route::post('/videos','VideosController@store');

// 動画の編集画面
Route::get('/videosedit','VideosController@edit');

// // 動画の編集処理
// Route::post('/videos','VideosController@store');

// //  動画の削除 
// Route::delete('/video/{video}','VideosController@destroy');


// ユーザー登録で記述
Auth::routes();
Route::get('/home', 'RoomsController@index')->name('home');

