/**
 * スクロールタイトルアニメーションモジュール
 * スクロール量に応じてタイトルのフォントサイズを動的に変化させる
 */
const ScrollTitleAnimation = (function ($) {
  // ===================================
  // 定数定義
  // ===================================
  const BREAKPOINT_MOBILE = 768;
  const MAX_FONT_SIZE = 1000;
  const MAX_SCROLL_PERCENT = 2;

  const MOBILE_CONFIG = {
    changeRate: 0.2,
    minSize: 15,
  };

  const DESKTOP_CONFIG = {
    changeRate: 0.1,
    minSize: 7,
  };

  // ===================================
  // 初期化
  // ===================================
  /**
   * スクロールタイトルアニメーションを初期化
   * @param {string} selector - アニメーション対象のセレクタ（例: '.about__title'）
   */
  function init(selector) {
    const $title = $(selector);

    // 対象要素が存在しない場合は何もしない
    if ($title.length === 0) {
      return;
    }

    /**
     * フォントサイズを更新する
     */
    function updateFontSize() {
      const scrollTop = $(window).scrollTop();
      const windowHeight = $(window).height();
      const windowWidth = $(window).width();

      // スクロール量に応じてサイズを計算（0から2の範囲）
      const scrollPercent = Math.min(scrollTop / windowHeight, MAX_SCROLL_PERCENT);

      // 画面幅によって設定を切り替え
      const isMobile = windowWidth <= BREAKPOINT_MOBILE;
      const config = isMobile ? MOBILE_CONFIG : DESKTOP_CONFIG;

      // フォントサイズを計算
      let fontSize =
        config.minSize +
        (MAX_FONT_SIZE - config.minSize) * scrollPercent * config.changeRate;

      // 最大値を制限
      fontSize = Math.min(fontSize, MAX_FONT_SIZE);

      // font-sizeを更新
      $title.css("font-size", fontSize + "vw");
    }

    // スクロールイベントにバインド
    $(window).on("scroll", updateFontSize);

    // 初期状態で一度実行
    updateFontSize();
  }

  // ===================================
  // 公開API
  // ===================================
  return {
    init: init,
  };
})(jQuery);

// グローバルスコープに公開（WordPress環境で使用するため）
window.ScrollTitleAnimation = ScrollTitleAnimation;


