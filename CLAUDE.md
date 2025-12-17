# プロジェクト概要

このプロジェクトは[プロジェクト名]のWordPressオリジナルテーマ開発です。

## 技術スタック

- **CMS**: WordPress
- **テンプレート**: PHP + HTML
- **ビルドツール**: Vite
- **CSSプリプロセッサ**: Sass (SCSS記法)
- **JavaScript**: jQuery
- **CSS設計**: BEM (Block Element Modifier)

---

# コーディング規則

## BEM命名規則

### 基本構造
```
.block
.block__element
.block__element--modifier
.block--modifier
```

### 命名ルール
- **Block**: 機能的な単位（例: `header`, `card`, `button`）
- **Element**: Blockの構成要素（例: `card__title`, `card__image`）
- **Modifier**: 状態や見た目の変化（例: `button--primary`, `card--featured`）

### 良い例
```scss
.product-card { }
.product-card__image { }
.product-card__title { }
.product-card__price { }
.product-card--featured { }
.product-card__button--disabled { }
```


---

## jQuery 規則


### 命名規則
```javascript
// 定数: UPPER_SNAKE_CASE
const API_ENDPOINT = 'https://api.example.com';
const MAX_ITEMS = 10;

// 変数・関数: camelCase
let currentIndex = 0;
function handleClickEvent() { }

// クラス: PascalCase
class ProductSlider { }

// jQuery要素: $プレフィックス
const $header = $('.header');
const $menuButton = $('.header__menu-button');
```

### jQueryベストプラクティス
```javascript
// ❌ 避けるべき
$('.button').click(function() {
  $(this).addClass('is-active');
  $('.modal').fadeIn();
});

// ✅ 推奨
const $button = $('.button');
const $modal = $('.modal');

$button.on('click', function(e) {
  e.preventDefault();
  $(this).addClass('is-active');
  $modal.fadeIn(300);
});
```

---

## パフォーマンス

### 画像最適化
- WebP形式の使用
- レスポンシブ画像（srcset使用）
- 遅延読み込み（lazy loading）

### CSS/JS最適化
- 不要なコードの削除
- クリティカルCSSの抽出
- ファイルの結合・圧縮（Viteが自動処理）

---

## ブラウザサポート

- Chrome (最新版)
- Firefox (最新版)
- Safari (最新版)
- Edge (最新版)
- iOS Safari (最新2バージョン)
- Android Chrome (最新2バージョン)

---

## Git運用

### コミットメッセージ
```
feat: 新機能追加
fix: バグ修正
style: スタイル変更
refactor: リファクタリング
docs: ドキュメント更新
chore: ビルド設定など
```

### ブランチ命名
```
feature/add-contact-form
fix/header-layout-issue
refactor/improve-slider-performance
```

---

## チェックリスト

### コーディング完了時
- [ ] BEM命名規則に従っているか
- [ ] レスポンシブ対応が完了しているか
- [ ] ブラウザ互換性テスト完了
- [ ] アクセシビリティチェック完了
- [ ] パフォーマンス測定（Lighthouse）
- [ ] コードレビュー完了
- [ ] 不要なコメント・console.logの削除

### WordPress固有チェック
- [ ] すべての出力がエスケープ処理されているか
- [ ] Nonce検証が実装されているか
- [ ] SQLクエリがプリペアドステートメントを使用しているか
- [ ] テーマの有効化/無効化でエラーが出ないか
- [ ] プラグインとの競合チェック
- [ ] マルチサイト対応（必要な場合）
- [ ] 翻訳準備（.potファイル生成）
- [ ] functions.phpの読み込み順序確認
- [ ] カスタム投稿タイプのパーマリンク設定確認
- [ ] 画像サイズの最適化設定確認

---

## 参考リンク

- [WordPress公式ドキュメント](https://developer.wordpress.org/)
- [WordPress Codex日本語版](https://wpdocs.osdn.jp/)
- [Theme Handbook](https://developer.wordpress.org/themes/)
- [Plugin Handbook](https://developer.wordpress.org/plugins/)
- [BEM公式ドキュメント](https://en.bem.info/)
- [Sass公式ドキュメント](https://sass-lang.com/)
- [jQuery公式ドキュメント](https://jquery.com/)
- [Vite公式ドキュメント](https://vitejs.dev/)
- [WCAG 2.1ガイドライン](https://www.w3.org/WAI/WCAG21/quickref/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
