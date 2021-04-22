<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller{
    
    #indexアクションを定義
    public function index() {
        return view('roomsindex');
    }
    
    #newアクションを定義
    public function new() {
        return view('roomsnew');
    }

    #showアクションを定義
    public function show() {
        return view('roomsshow');
    }

    #editアクションを定義
    public function edit() {
        return view('roomsedit');
    }
}
