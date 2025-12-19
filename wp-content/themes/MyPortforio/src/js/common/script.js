import Chaffle from 'chaffle';

// Chaffle.jsの初期化（ヘッダーナビゲーション）
jQuery(function($) {
  $('[data-chaffle]').each(function() {
    const chaffle = new Chaffle(this, { /* options */ });

    $(this).on('mouseover', function() {
      chaffle.init();
    });
  });
});