jQuery(function ($) {
  const swiper = new Swiper(".js-swiper", {
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
  $(".js-txt-rotate").each(function () {
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

jQuery(document).ready(function ($) {
  $(".js-blog-item-hover")
    .stop(true, false)
    .hover(
      function (e) {
        $(this).stop(true, false).addClass("is-bouncing");
      },
      function (e) {
        setTimeout(() => {
          $(this).stop(true, false).removeClass("is-bouncing");
        }, 500);
      }
    );
});

jQuery(document).ready(function ($) {
  let worksItem = $(".js-works-item-hover");
  let worksItemCover = $(".js-works-item-cover");
  worksItem.hover(
    function (e) {
      $(this).find(worksItemCover).stop(true, false).addClass("is-slideUp");
    },
    function (e) {
      setTimeout(() => {
        $(this)
          .find(worksItemCover)
          .stop(true, false)
          .removeClass("is-slideUp");
      }, 300);
    }
  );
});


jQuery(function($) {
  let noiseInterval;

  $('.js-contact-noise').hover(
    function() {
      const $container = $(this).closest('.js-contact-container');
      const $title = $(this).find('.js-scroll-title');

      // ホバー時にborder-radiusを0に
      $container.css('border-radius', '0');
      
      // ノイズアニメーション開始
      noiseInterval = setInterval(function() {
        // ランダムなborder-width (1-3px)
        const borderTop = Math.floor(Math.random() * 3) + 1;
        const borderRight = Math.floor(Math.random() * 3) + 1;
        const borderBottom = Math.floor(Math.random() * 3) + 1;
        const borderLeft = Math.floor(Math.random() * 3) + 1;
        
        // ランダムな位置移動 (-2px ~ 2px)
        const containerX = (Math.random() * 4 - 2).toFixed(1);
        const containerY = (Math.random() * 4 - 2).toFixed(1);
        
        // コンテナのノイズ適用
        $container.css({
          'border-width': borderTop + 'px ' + borderRight + 'px ' + borderBottom + 'px ' + borderLeft + 'px',
          'transform': 'translate(' + containerX + 'px, ' + containerY + 'px)'
        });
        
        // テキストのランダムな動き
        const textX = (Math.random() * 4 - 2).toFixed(1);
        const textY = (Math.random() * 4 - 2).toFixed(1);
        const skew = (Math.random() * 4 - 2).toFixed(1);
        
        $title.css({
          'transform': 'translate(' + textX + 'px, ' + textY + 'px) skew(' + skew + 'deg)'
        });
        
      }, 50);
      
      $container.data('noiseInterval', noiseInterval);
    },
    function() {
      const $container = $(this).closest('.js-contact-container');
      const $title = $(this).find('.js-scroll-title');
      
      // インターバルをクリア
      clearInterval($container.data('noiseInterval'));
      
      // 元の状態に戻す
      $container.css({
        'border-width': '2px',
        'border-radius': '8px',
        'transform': 'translate(0, 0)'
      });
      
      $title.css({
        'transform': 'translate(0, 0) skew(0deg)'
      });
    }
  );
});