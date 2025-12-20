jQuery(function ($) {
  // スクロールに応じて文字サイズとpositionを変化させる
  $(window).on("scroll", function () {
    var scrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

    // スクロール量に応じてサイズを計算（0から1の範囲）
    var scrollPercent = Math.min(scrollTop / windowHeight, 2);
    // 画面幅によって変化量を調整
    var changeRate;
    if (windowWidth <= 768) {
      // スマホの場合：変化量を大きく
      changeRate = 0.2;
    } else {
      // PCの場合：変化量を小さく
      changeRate = 0.1;
    }

    // 文字サイズを30vwから200vwまで変化させる
    var minSize = 3;
    var maxSize = 1000;

    var fontSize = minSize + (maxSize - minSize) * scrollPercent * changeRate;

    // font-sizeを更新（最大値を制限）
    fontSize = Math.min(fontSize, maxSize);
    $(".about__title").css("font-size", fontSize + "vw");

  });

  // 初期状態で一度実行
  $(window).trigger("scroll");
});

