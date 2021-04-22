<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller{

    #indexアクションを定義
    public function index() {
        return view('videosindex');
    }

    #newアクションを定義
    public function new() {
        return view('videosnew');
    }

    #editアクションを定義
    public function edit() {
        return view('videosedit');
    }
}
