// ページの先頭へスムーススクロールする記述
$('#page-top').click(function () {
  $('body,html').animate({
      scrollTop: 0//ページトップまでスクロール
  }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
  return false;//リンク自体の無効化
});

// フラッシュメッセージを一定の時間で消す
(function() {
  'use strict';

  // フラッシュメッセージのfadeout
  $(function(){
      $('.flash_message').fadeOut(6000);
  });

})();
