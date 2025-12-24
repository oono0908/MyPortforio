import Chaffle from 'chaffle';

jQuery(function($) {
  $('[data-chaffle]').each(function() {
    const chaffle = new Chaffle(this, { /* options */ });

    $(this).on('mouseover', function() {
      chaffle.init();
    });
  });
});


jQuery(function ($) {

  $("[data-chaffle]").each(function (index) {
    const chaffle = new Chaffle(this, {
      /* options */
    });

    // 初回実行
    chaffle.init();

    // 5秒ごとに実行
    setInterval(function () {
      chaffle.init();
    }, 5000);
  });
});
