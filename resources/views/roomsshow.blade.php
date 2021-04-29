<!-- ルーム詳細ページ -->
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
  <body>
    <main>
      <div class="video-header">
        <div class="videosindex">{{ $rooms->name }}</div>
        <a href="#" class="video-float3"><span class="videocreate">動画投稿</span></a>
      </div>

     <!-- 現在のvideo -->
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
                  <!-- ルームタイトル -->
                  <div id="video-detail" class="hide-area"> 
                    <video poster="img/movie.jpg" webkit-playsinline playsinline controls class="user-video">
                      <source src="public/video/movie.mp4" type="video/mp4">
                      <source src="public/video/movie.ogv" type="video/ogv">
                      <source src="public/video/movie.webm" type="video/webm">
                    </video>
                  </div>

                  <div class="video-title">
                    <!-- ルームタイトル -->
                    <div class="video-name">{{ "タイトル" }}</div>
                    <!-- ルーム説明 -->
                    <div class="video-supplement">{{ "動画の説明" }}</div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

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