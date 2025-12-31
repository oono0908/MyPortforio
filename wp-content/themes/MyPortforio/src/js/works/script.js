// ===================================
// Worksページのスクロールアニメーション
// ===================================
jQuery(function ($) {
  // スクロールタイトルアニメーションモジュールを初期化
  if (typeof ScrollTitleAnimation !== "undefined") {
    ScrollTitleAnimation.init(".works__title");
  }
});

// ===================================
// Worksページの横スクロールアニメーション
// ===================================
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