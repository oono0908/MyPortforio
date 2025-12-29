# MyPortfolio WordPress Theme

カスタムポートフォリオサイトのWordPressオリジナルテーマです。

## 技術スタック

- **CMS**: WordPress
- **ビルドツール**: Vite
- **CSSプリプロセッサ**: Sass (SCSS記法)
- **JavaScript**: jQuery
- **CSS設計**: BEM (Block Element Modifier)

## ページ構成

- **トップページ** (`front-page.php`) - Hero、About、Works、Blog、Contactセクション
- **Aboutページ** (`page-about.php`) - プロフィール・経歴
- **Worksページ** (`archive-works.php`, `single-works.php`) - 制作実績一覧・詳細
- **Blogページ** (`archive-blog.php`, `single-blog.php`) - ブログ一覧・詳細
- **Contactページ** (`page-contact.php`) - お問い合わせフォーム

## 主な機能

- GSAP ScrollTriggerによる横スクロールアニメーション（Works）
- レスポンシブデザイン対応（PC/タブレット/スマートフォン）
- カスタム投稿タイプ（Works、Blog）
- カスタムタクソノミー（Blog Categories）
- WebP画像自動変換

## ディレクトリ構造

```
wp-content/themes/MyPortforio/
├── src/               # ソースファイル
│   ├── scss/         # Sassファイル
│   └── js/           # JavaScriptファイル
├── assets/           # コンパイル後のファイル
│   ├── css/
│   ├── js/
│   └── images/
├── *.php             # テンプレートファイル
├── functions.php     # テーマ機能定義
└── vite.config.js    # ビルド設定
```

## 開発環境セットアップ

### 必要要件

- Node.js (推奨: v18以上)
- WordPress環境

### インストール

```bash
cd wp-content/themes/MyPortforio
npm install
```

### 開発モード

```bash
npm run dev
```

自動的にファイル変更を監視し、ビルドを実行します。

### 本番ビルド

```bash
npm run build
```

最適化されたCSSとJavaScriptを `assets/` ディレクトリに出力します。

## コーディング規則

- **BEM命名規則**: `.block__element--modifier`
- **変数命名**: camelCase (jQuery要素は`$`プレフィックス)
- **レスポンシブ**: モバイルファースト
- **コミットメッセージ**: `feat:`, `fix:`, `style:`, `refactor:`など

詳細は `CLAUDE.md` を参照してください。

## ブラウザサポート

- Chrome (最新版)
- Firefox (最新版)
- Safari (最新版)
- Edge (最新版)
- iOS Safari (最新2バージョン)
- Android Chrome (最新2バージョン)

## ライセンス

Private

## 作成者

Shin
