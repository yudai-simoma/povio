<!-- 動画投稿ページ -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('動画投稿') }}</div>

                <!-- バリデーションエラーの表示に使用-->
                @include('common.errors')
                <!-- バリデーションエラーの表示に使用-->

                <div class="video-body">
                    <form enctype="multipart/form-data" action="{{ url('videos') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="video_content" class="video_content col-md-4 col-form-label text-md-right">{{ __('動画選択') }}</label>

                            <div class="col-md-6">
                            <input id="video_content" type="file" name="video_content" value="{{ old('video_content') }}" required autocomplete="video_content" autofocus>

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
                                <input id="title" type="text" class="form-control @error('email') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('動画の説明') }}</label>

                            <div class="col-md-6">
                                <textarea rows="10" cols="10" id="name" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') }}</textarea>

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
                                    {{ __('投稿') }}
                                </button>
                            </div>
                        </div>

                        <!-- id値を送信 -->
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <!--/ id値を送信 -->
                    </form>
                    <form action="{{ url('roomsshow/'.$room['id']) }}" method="GET" class="form-horizontal">
                        @csrf
                        <!-- ルームに戻るボタン -->
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn video-btn-cancel">
                            戻る
                            </button>
                        </div>
                        <!-- id値を送信 -->
                        <input type="hidden" name="room_id" value="{{$room['id']}}">
                        <!--/ id値を送信 -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection