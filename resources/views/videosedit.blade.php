<!-- 動画編集ページ -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('動画編集') }}</div>

                <!-- バリデーションエラーの表示に使用-->
                @include('common.errors')
                <!-- バリデーションエラーの表示に使用-->
                
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ url('videos/update') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="video_content" class="col-md-4 col-form-label text-md-right">{{ __('動画選択') }}</label>

                            <div class="col-md-6">
                                <input id="video_content" type="file" class="form-control @error('video_content') is-invalid @enderror" name="video_content" value="{{$video['video_content']}}" required autocomplete="video_content" autofocus>

                                @error('video_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$video['title']}}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('説明') }}</label>

                            <div class="col-md-6">
                            <textarea rows="10" cols="10" id="name" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $video['description'] }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('編集') }}
                                </button>
                            </div>
                        </div>
                        <!-- video_id値を送信 -->
                        <input type="hidden" name="id" value="{{$video['id']}}">
                        <!--/ video_id値を送信 -->
                        
                        <!-- room_id値を送信 -->
                        <input type="hidden" name="room_id" value="{{$video['room_id']}}">
                        <!--/ room_id値を送信 -->
                    </form>
                    <form action="{{ url('roomsshow/'.$video['room_id']) }}" method="GET" class="form-horizontal">
                        @csrf
                        <!-- ルーム入室ボタン -->
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn video-btn-cancel">
                            キャンセル
                            </button>
                        </div>
                        <!-- id値を送信 -->
                        <input type="hidden" name="room_id" value="{{$video['room_id']}}">
                        <!--/ id値を送信 -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection