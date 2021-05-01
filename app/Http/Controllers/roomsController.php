<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使うClassを宣言:自分で追加
use App\Models\Room;   //Roomモデルを使えるようにする
use Validator;  //バリデーションを使えるようにする
use Auth;       //認証モデルを使用する

class RoomsController extends Controller{
    
    #トップページを表示
    public function index() {
        $rooms = Room::orderBy('created_at', 'asc')->get();
        return view('roomsindex', [
            'rooms' => $rooms
        ]);
        //return view('books',compact('books')); //も同じ意味
    }
    
    #ルーム作成ページを表示
    public function new() {
        $rooms = Room::where('user_id',Auth::user()->id)->orderBy('created_at', 'asc')->get();
        return view('roomsnew', [
            'rooms' => $rooms
        ]);
    }

    #ルーム作成の処理
    public function create(Request $request) {

        //バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required | min:1 | max:50',
            'supplement' => 'required | min:1 | max:1000',
            'price' => 'required | max:6 | integer',
            'password' => 'required | regex:/^(?=.*?[a-z])(?=.*?\d)[a-z\d]+$/i | min:6 | max:30',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('roomsnew')
                ->withInput()
                ->withErrors($validator);
        }

        //登録処理
        $rooms = new Room;
        $rooms->user_id  = Auth::user()->id; //追加のコード
        $rooms->name =    $request->name;
        $rooms->supplement =  $request->supplement;
        $rooms->price =  $request->price;
        $rooms->password =    $request->password;
        $rooms->save(); 
        return redirect('/')->with('message', 'ルームを作成しました');
    }

    #ルーム詳細ページを表示
    public function show($room_id) {
        $rooms = Room::find($room_id);
        return view('roomsshow', [
            'room' => $rooms
        ]);
    }

    #ルーム編集ページを表示
    public function edit($room_id) {
        $rooms = Room::where("user_id", Auth::user()->id)->find($room_id);
        return view('roomsedit',[
            "room" => $rooms
        ]);
    }

    //ルーム編集処理
    public function update(Request $request) {
        
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required | min:1 | max:50',
            'supplement' => 'required | min:1 | max:1000',
            'price' => 'required | max:6 | integer',
            'password' => 'required | regex:/^(?=.*?[a-z])(?=.*?\d)[a-z\d]+$/i | min:6 | max:30',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        // 編集処理
        $rooms = Room::find($request->id);
        $rooms->name = $request->name;
        $rooms->supplement = $request->supplement;
        $rooms->price = $request->price;
        $rooms->password = $request->password;
        $rooms->save(); 
        return redirect('/')->with('message', 'ルームを編集しました');
    }

    // ルームの削除機能
     public function destroy(Room $room) {
        $room->delete();
        return redirect('/')->with('message', 'ルームを削除しました');
    }
}
