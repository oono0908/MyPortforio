// ===================================
// Contactページのスクロールアニメーション
// ===================================
jQuery(function ($) {
  // スクロールタイトルアニメーションモジュールを初期化
  if (typeof ScrollTitleAnimation !== "undefined") {
    ScrollTitleAnimation.init(".js-scroll-title");
  }
});

jQuery(function ($) {
  // ===================================
  // お問い合わせフォームのバリデーション
  // ===================================
  const $contactForm = $("#contactForm");
  const $nameInput = $("#contact-name");
  const $emailInput = $("#contact-email");
  const $messageInput = $("#contact-message");
  const $submitButton = $("#contactSubmit");

  /**
   * エラーメッセージを表示する
   * @param {jQuery} $input - 入力フィールド要素
   * @param {string} message - エラーメッセージ
   */
  function showError($input, message) {
    const errorId = $input.attr("aria-describedby");
    const $error = $("#" + errorId);

    $error.text(message);
    $input.addClass("is-error");
    $input.attr("aria-invalid", "true");
  }

  /**
   * エラーメッセージを削除する
   * @param {jQuery} $input - 入力フィールド要素
   */
  function clearError($input) {
    const errorId = $input.attr("aria-describedby");
    const $error = $("#" + errorId);

    $error.text("");
    $input.removeClass("is-error");
    $input.removeAttr("aria-invalid");
  }

  /**
   * お名前のチェック（エラーメッセージ表示なし）
   * @returns {boolean} バリデーション結果
   */
  function checkName() {
    const name = $nameInput.val().trim();
    return name !== "";
  }

  /**
   * メールアドレスのチェック（エラーメッセージ表示なし）
   * @returns {boolean} バリデーション結果
   */
  function checkEmail() {
    const email = $emailInput.val().trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return email !== "" && emailPattern.test(email);
  }

  /**
   * お問い合わせ内容のチェック（エラーメッセージ表示なし）
   * @returns {boolean} バリデーション結果
   */
  function checkMessage() {
    const message = $messageInput.val().trim();
    return message !== "";
  }

  /**
   * お名前のバリデーション（エラーメッセージ表示あり）
   * @returns {boolean} バリデーション結果
   */
  function validateName() {
    const name = $nameInput.val().trim();

    if (name === "") {
      showError($nameInput, "お名前を入力してください");
      return false;
    }

    clearError($nameInput);
    return true;
  }

  /**
   * メールアドレスのバリデーション（エラーメッセージ表示あり）
   * @returns {boolean} バリデーション結果
   */
  function validateEmail() {
    const email = $emailInput.val().trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email === "") {
      showError($emailInput, "メールアドレスを入力してください");
      return false;
    }

    if (!emailPattern.test(email)) {
      showError($emailInput, "正しいメールアドレスを入力してください");
      return false;
    }

    clearError($emailInput);
    return true;
  }

  /**
   * お問い合わせ内容のバリデーション（エラーメッセージ表示あり）
   * @returns {boolean} バリデーション結果
   */
  function validateMessage() {
    const message = $messageInput.val().trim();

    if (message === "") {
      showError($messageInput, "お問い合わせ内容を入力してください");
      return false;
    }

    clearError($messageInput);
    return true;
  }

  /**
   * 送信ボタンの活性/非活性を更新
   */
  function updateSubmitButton() {
    const isNameValid = checkName();
    const isEmailValid = checkEmail();
    const isMessageValid = checkMessage();
    const isAllValid = isNameValid && isEmailValid && isMessageValid;

    if (isAllValid) {
      $submitButton.prop("disabled", false);
      $submitButton.attr("aria-disabled", "false");
    } else {
      $submitButton.prop("disabled", true);
      $submitButton.attr("aria-disabled", "true");
    }
  }

  // リアルタイムバリデーション（フォーカスが外れた時）
  $nameInput.on("blur", function() {
    validateName();
    updateSubmitButton();
  });

  $emailInput.on("blur", function() {
    validateEmail();
    updateSubmitButton();
  });

  $messageInput.on("blur", function() {
    validateMessage();
    updateSubmitButton();
  });

  // 入力時にエラーをクリアし、ボタンの状態を更新
  $nameInput.on("input", function() {
    if ($(this).hasClass("is-error")) {
      clearError($(this));
    }
    updateSubmitButton();
  });

  $emailInput.on("input", function() {
    if ($(this).hasClass("is-error")) {
      clearError($(this));
    }
    updateSubmitButton();
  });

  $messageInput.on("input", function() {
    if ($(this).hasClass("is-error")) {
      clearError($(this));
    }
    updateSubmitButton();
  });

  // フォーム送信時のバリデーション
  $contactForm.on("submit", function(e) {
    e.preventDefault();

    // 全てのバリデーションを実行
    const isNameValid = validateName();
    const isEmailValid = validateEmail();
    const isMessageValid = validateMessage();

    // 全て有効な場合のみフォームを送信
    if (isNameValid && isEmailValid && isMessageValid) {
      // フォームの送信処理
      // 実際の送信処理を実装する場合はここに記述
      alert("フォームが送信されました（実際の送信処理は未実装）");

      // フォームをリセット
      this.reset();

      // ボタンを再度非活性化
      updateSubmitButton();
    } else {
      // 最初のエラーフィールドにフォーカス
      if (!isNameValid) {
        $nameInput.focus();
      } else if (!isEmailValid) {
        $emailInput.focus();
      } else if (!isMessageValid) {
        $messageInput.focus();
      }
    }
  });

  // 初期状態でボタンの状態を更新
  updateSubmitButton();
});