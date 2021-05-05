<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使うClassを宣言:自分で追加
use App\Models\Video;   //Videoモデルを使えるようにする
use App\Models\Room;   //Roomモデルを使えるようにする
use Validator;  //バリデーションを使えるようにする
use Auth;       //認証モデルを使用する

class VideosController extends Controller{

    #動画投稿ページを表示
    public function new($room_id) {
        $rooms = Room::where("user_id", Auth::user()->id)->find($room_id);
        $videos = Video::orderBy('created_at', 'asc')->get();
        return view('videosnew', [
            "room" => $rooms,
            'videos' => $videos
        ]);
    }

    //動画投稿
    public function store(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'video_content' => 'required',
            'title' => 'required | min:1 | max:50',
            'description' => 'required | min:1 | max:1000',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        
        // 動画投稿処理
        $file = $request->file('video_content'); //file取得
        if( !empty($file) ){                //fileが空かチェック
              $filename = $file->getClientOriginalName();   //ファイル名を取得
              $move = $file->move('../upload/',$filename);  //ファイルを移動
        }else{
              $filename = "";
        }

        // Eloquentモデル（登録処理）
        $videos = new Video;
        $videos->room_id  = $request->room_id;
        $videos->video_content = $filename;
        $videos->title =  $request->title;
        $videos->description =  $request->description;
        $videos->save(); 
        return redirect(route('room.show', [
            'rooms' => $request->room_id,
        ]))->with('message', '動画投稿が完了しました');
    }

    #動画編集ページ表示
    public function edit($video_id) {
        $videos = Video::find($video_id);
        return view('videosedit',[
            "video" => $videos
        ]);
    }

    //動画編集処理
    public function update(Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'video_content' => 'required',
            'title' => 'required | min:1 | max:50',
            'description' => 'required | min:1 | max:1000',
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
            $video_id = $request -> input('id');
            $room_id  = $request -> input('room_id');
            $video_content = $request -> input('video_content');
            $title = $request -> input('title');
            $description = $request -> input('description');
            $video = array(
                'id' => $video_id,
                'room_id' => $room_id,
                'video_content' => $video_content,
                'title' => $title,
                'description' => $description,
            );
            return view('videosedit',[
                'video' => $video
            ])
                ->withErrors($validator);
        }
        
        // 動画の編集処理
        $file = $request->file('video_content'); //file取得
        if( !empty($file) ){                //fileが空かチェック
              $filename = $file->getClientOriginalName();   //ファイル名を取得
              $move = $file->move('../upload/',$filename);  //ファイルを移動
        }else{
              $filename = "";
        }

        // 編集処理
        $videos = Video::find($request->id);
        $videos->video_content = $filename;
        $videos->title =  $request->title;
        $videos->description =  $request->description;
        $videos->save(); 
        return redirect(route('room.show', [
            'rooms' => $request->room_id,
        ]))->with('message', '動画投稿が完了しました');
        // return redirect()->action('RoomsController@show')->with('message', '動画を編集しました');
    }

    // ルームの削除機能
    public function destroy(Video $video) {
        $video->delete();
        return back()->with('message', '動画を削除しました');
    }
}
