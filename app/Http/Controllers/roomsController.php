<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使うClassを宣言:自分で追加
use App\Models\Room;   //Roomモデルを使えるようにする
use Validator;  //バリデーションを使えるようにする
use Auth;       //認証モデルを使用する

class RoomsController extends Controller{
    
    #indexアクションを定義
    public function index() {
        $rooms = Room::orderBy('created_at', 'asc')->get();
        return view('roomsindex',[
            'rooms' => $rooms
        ]);
        //return view('books',compact('books')); //も同じ意味
    }
    
    #newアクションを定義
    public function new() {
        return view('roomsnew');
    }

    #showアクションを定義
    public function show() {
        $rooms = Room::orderBy('created_at', 'asc')->get();
        // $videos = Video::orderBy('created_at', 'asc')->get();
        return view('roomsshow',[
            'rooms' => $rooms
            // 'videos' => $videos
        ]);
    }

    #editアクションを定義
    public function edit() {
        return view('roomsedit');
    }
}
