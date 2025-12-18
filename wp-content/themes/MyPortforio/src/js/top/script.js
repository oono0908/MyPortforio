jQuery(function ($) {
  const swiper = new Swiper(".swiper", {
    loop: true, // ループを有効にする
    speed: 6000, // アニメーション速度（ミリ秒）
    allowTouchMove: false, // タッチ操作を無効にする（任意）
    autoplay: {
      delay: 0, // 停止時間を0に設定して途切れなくする
      disableOnInteraction: false, // ユーザー操作後も自動再生を継続
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        centeredSlides: true,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
});

jQuery(document).ready(function ($) {
  var TxtRotate = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = "";
    this.tick();
    this.isDeleting = false;
  };

  TxtRotate.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    $(this.el).html('<span class="wrap">' + this.txt + "</span>");

    var that = this;
    var delta = 100 - Math.random() * 30;

    if (this.isDeleting) {
      delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === "") {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
    }

    setTimeout(function () {
      that.tick();
    }, delta);
  };

  // 初期化
  $(".txt-rotate").each(function () {
    var $this = $(this);
    var toRotate = $this.attr("data-rotate");
    var period = $this.attr("data-period");

    if (toRotate) {
      new TxtRotate(this, JSON.parse(toRotate), period);
    }
  });

  // CSSを追加
  $(
    "<style>.txt-rotate > .wrap { border-right: 0.08em solid #666 }</style>"
  ).appendTo("head");
});
