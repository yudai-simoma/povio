<!-- ルーム詳細ページ -->
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
  <body>
    <main>
      <div class="video-header">
        <div class="videosindex">{{ $room->name}}</div>
        <!--  動画投稿ボタン -->
        @if (Auth::id() == $room->user_id)
        <form action="{{ url('videosnew/'.$room->id) }}" method="GET" class="video-float3">
          @csrf
          <button type="submit" class="videocreate">
            動画投稿
          </button>
        </form>
        @endif

        <!-- <a href="../videosnew" class="video-float3"><span class="videocreate">動画投稿</span></a> -->
      </div>

     <!-- 現在のvideo -->
      @if (count($videos) > 0)
        @foreach ($videos as $video)
        @if ($room->id == $video->room_id)
          <table class="video-table">
            <tbody>
              <tr class="video-main">
                <td class="user-video-name">
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="video-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('編集') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('削除') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                  </li>
                  <!-- 動画 -->
                  <div id="video-detail" class="hide-area"> 
                    <iframe src="/upload/{{ $video->video_content }}" frameborder="0" class="user-video"></iframe>
                  </div>

                  <div class="video-title">
                    <!-- 動画タイトル -->
                    <div class="video-name">{{ $video->title }}</div>
                    <!-- 動画説明 -->
                    <div class="video-supplement">{{ $video->description }}</div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        @endif
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