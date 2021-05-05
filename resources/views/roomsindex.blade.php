<!-- トップページ -->
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja"> 
  <body>
    <main>
      <div class="text">
        <div id="header" class="fadeDownTrigger">
            <h1 class="smoothTrigger">動画配信に新たな形を</h1>
            <div class="header-area">
            <!--/header-area--></div>
        </div>
            
        <section class="fluid-area">
          <div class="fluid-lead">
            <p class="smoothTrigger">このアプリは動画配信の新たな形として作られたサービスです。<br>誰でも自身のコンテンツを動画で投稿し<br>それを見たいユーザーはサブスクとして<br>閲覧することができます。</p>
          </div>   
        </section>
      </div>
    
      <div id="video-detail" class="hide-area"> <!--==hide video==-->
        <video poster="img/movie.jpg" webkit-playsinline playsinline controls autoplay muted loop class="video">
          <source src="public/video/ダンスvideo.mp4" type="video/mp4">
        </video>
        <p class="video-text">Music ManPV ※音は再生しません</p>
      </div>

      <div class="room-header">
        <div class="roomsindex">ルーム一覧</div>
        @if (Auth::check())
        <a href="roomsnew" class="float3"><span class="roomcreate">ルーム作成</span></a>
        @endif
      </div>

     <!-- 現在のroom -->
      @if (count($rooms) > 0)
        @foreach ($rooms as $room)
          <table class="table">
            <tbody>
              <tr class="room-main">
                <td>
                  <!-- ルームタイトル -->
                  <div class="room-name">{{ $room->name }}</div>
                  <!-- ルーム説明 -->
                  <div class="rooom-supplement">{{ $room->supplement }}</div>
                </td>
              </tr>

              <!-- ルーム金額 -->
              <tr class="room-money">
                <td>
                    <div class="room-price">月額<br>{{ $room->price }}<br>円</div>
                    <!-- <div class="room-price"><br>{{ "ユーザー名" }}<br></div> -->
                </td>
              </tr>

              <tr class="room-btn">
                <td>
                  @if (Auth::check())
                    @if (Auth::id() == $room->user_id)
                      <!--  ルーム: 編集ボタン -->
                      <form action="{{ url('roomsedit/'.$room->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-primary">
                            編集
                        </button>
                      </form>
                      <!-- ルーム: 削除ボタン -->
                      <form action="{{ url('room/'.$room->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">
                            削除
                        </button>
                      </form>
                      <!-- ルーム入室 -->
                      <form action="{{ url('roomsshow/'.$room->id) }}" method="GET" class="form-horizontal">
                        @csrf
                        <!-- ルーム入室ボタン -->
                        <button type="submit" class="btn-enter">
                          入室
                        </button>
                        <!-- id値を送信 -->
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <!--/ id値を送信 -->
                      </form>
                    @else
                      <!-- ルーム入室 -->
                      <form action="{{ url('roomsshow/'.$room->id) }}" method="GET" class="form-horizontal">
                        @csrf
                        <!-- ルームパスワード -->
                        <input type="text" name="password" placeholder="パスワード" class="form-control">
                        <!-- ルーム入室ボタン -->
                        <button type="submit" class="btn-enter">
                          入室
                        </button>
                        <!-- id値を送信 -->
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <!--/ id値を送信 -->
                      </form>
                    @endif
                  @else
                    <div class="flrst-login">入室するには<br>ログインして<br>ください</div>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        @endforeach
      @endif

      <!-- ページ先頭にスムーススクロール -->
      <div id="page-top"><a href="#header"></a></div>
    </main>   
      
    <!--=============JS ===============--> 
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--自作のJS-->
    <script src="{{ asset('js/script.js') }}" defer></script>
  </body>
</html>

@endsection
