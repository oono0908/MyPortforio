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
    // 文字サイズを30vwから200vwまで変化させる
    var minSize;
    var maxSize = 1000;
    if (windowWidth <= 768) {
      // スマホの場合：変化量を大きく
      changeRate = 0.2;
      minSize = 15;
    } else {
      // PCの場合：変化量を小さく
      changeRate = 0.1;
      minSize = 7;
    }

    var fontSize = minSize + (maxSize - minSize) * scrollPercent * changeRate;

    // font-sizeを更新（最大値を制限）
    fontSize = Math.min(fontSize, maxSize);
    $(".works__title").css("font-size", fontSize + "vw");
  });
  // 初期状態で一度実行
  $(window).trigger("scroll");
});

jQuery(document).ready(function ($) {
  $(".works__main-inner").on("scroll", function () {
    $(".works__item").each(function () {
      if ($(this).offset().left <= $(window).scrollLeft() + 250) {
        $(this).stop(true, false).addClass("is-active");
      } else {
        $(this).stop(true, false).removeClass("is-active");
      }
    });
  });
  $(window).trigger("scroll");
});

// jQuery(function ($) {
//   const container = $(".works__main");
//   const slides = $(".works__item");
//   const containerWidth = container.width();

//   gsap.to(slides, {
//     // slidesに対して以下のアニメーションを設定
//     xPercent: -110 * slides.length, // 横に動く方向と距離（この例は右側にスライドの合計幅より少し横スクロール）
//     ease: "none", //アニメーションの種類をnoneにする
//     scrollTrigger: {
//       trigger: container[0], //containerに到達したら発火（jQueryオブジェクトからDOM要素を取得）
//       pin: true, // ピン留をtrueにすることでcontainerの縦スクロールが止まる
//       scrub: 1, //スクロール当たりのアニメーションが動く時間
//       end: () => "+=" + containerWidth, // 横スクロールが終わる地点
//       anticipatePin: 1, // ピン留のタイミング
//       invalidateOnRefresh: true, // リサイズ時の調整でtrueにしておく
//     },
//   });
// });

jQuery(function ($) {
  const container = $(".works__main");
  const slides = $(".works__item");
  const containerWidth = container.width();
  
  // スマホ判定（768px以下をスマホとする場合）
  const isMobile = window.innerWidth <= 768;

  gsap.to(slides, {
    xPercent: isMobile ? -120 * slides.length : -110 * slides.length,
    ease: "none",
    scrollTrigger: {
      trigger: container[0],
      pin: true,
      scrub: 1,
      end: () => {
        if (isMobile) {
          // スマホの場合：実際のスライド幅を計算
          const totalWidth = slides.toArray().reduce((acc, slide) => {
            return acc + $(slide).outerWidth(true);
          }, 0);
          return "+=" + (totalWidth - container.width());
        } else {
          // PCの場合：元の計算
          return "+=" + containerWidth;
        }
      },
      anticipatePin: 1,
      invalidateOnRefresh: true,
    },
  });
});