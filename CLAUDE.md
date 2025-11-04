# CLAUDE.md

このファイルは、Claude Code (claude.ai/code) がこのリポジトリで作業する際のガイダンスを提供します。

## プロジェクト概要

FREEDOM-Xは、従来のWordPress開発と最新のフロントエンドツールを組み合わせたWordPressプロジェクトです。CSS、JavaScript、画像最適化のためのカスタムビルドシステムを使用し、`landi_renewal`というWordPressテーマに出力されます。

## 開発コマンド

### セットアップ
```bash
# 依存パッケージのインストール
yarn

# 開発モード（ソースマップ付き）
yarn dev

# 本番モード
yarn start
```

### ビルドコマンド
```bash
# 本番用にすべてのアセットをビルド
yarn build

# 個別のアセットタイプをビルド
yarn css:build    # SCSSをコンパイル・ミニファイ
yarn js:build     # WebpackでJavaScriptをバンドル
yarn image:build  # 画像を最適化・変換
```

### ウォッチコマンド（開発用）
```bash
# すべてのアセットタイプを監視
yarn dev  # server, css:watch, js:watch, image:watchを含む

# 個別のアセットタイプを監視
yarn css:watch    # SCSSファイルを監視
yarn js:watch     # JavaScriptファイルを監視
yarn image:watch  # 画像ファイルを監視
```

### サーバー
```bash
yarn server  # Dockerコンテナとブラウザー同期を開始（ポート3000）
```

## アーキテクチャ

### ソースディレクトリ構造
```
src/
├── sass/           # ITCSSアーキテクチャを使用したSCSSファイル
├── js/             # コンポーネント指向のモダンJavaScript
└── imgs/           # 最適化用のソース画像
```

### ビルド出力
すべてのアセットは以下にビルドされます: `public_html/wp-content/themes/landi_renewal/src/renewal/`
- CSS: autoprefixerとミニファイ化を含むSCSSからのコンパイル
- JavaScript: Babelトランスパイルを含むWebpackバンドル
- 画像: AVIF、WebP、JPG形式で最適化

### WordPressテーマ構造
```
public_html/wp-content/themes/landi_renewal/
├── functions/          # モジュラーPHP機能
├── template-parts/     # 再利用可能なテンプレートコンポーネント
├── component/          # 小さなPHPコンポーネント
├── form/              # クラス付きカスタムフォームシステム
└── src/renewal/       # ビルド出力先
```

## 主要設定

### package.json設定
ビルドプロセスは package.json の `config` セクションで制御されます:
- `css.dest`: コンパイル済みCSSの出力ディレクトリ
- `js.dest`: バンドル済みJavaScriptの出力ディレクトリ
- `image.dest`: 最適化画像の出力ディレクトリ
- `js.entry`: Webpackエントリーポイント（現在 "main,loading"）

### Docker設定
- Webサーバー: PHP 8.0 + Apache（ポート3002）
- データベース: MySQL 5.7（ホスト: mysql、ユーザー: root、パスワード: red）
- phpMyAdmin: ポート3003で利用可能

### BrowserSync
- 自動的にポート3000で開始
- DockerのWebサーバーにプロキシ
- WordPressコアファイルを監視から除外

## 画像最適化

画像はファイル名の構文を通じて品質設定をサポートします:
```bash
# カスタム品質設定
sample{jpg_75}.jpg           # JPEG 75%品質
sample{webp_50}.png          # WebP 50%品質で生成
sample{avif_60}.jpg          # AVIF 60%品質で生成
sample{compress_none}.png    # 圧縮をスキップ
```

デフォルト品質設定:
- JPEG: 85%
- PNG: 0.8-1.0
- WebP: 85%
- AVIF: 50%

## 依存関係

### フロントエンドライブラリ
- GSAP（アニメーション）
- Lenis（スムーススクロール）
- Splide（スライダー）
- Vue.js 3
- jQuery（WordPress経由で読み込み）

### ビルドツール
- Webpack 5 with Babel
- SASS（Dart Sass）
- PostCSS with Autoprefixer
- 複数フォーマットサポート付きImagemin

## WordPressカスタマイズ

### カスタム投稿タイプ
`functions/posttype.php` のPostTypeクラスを使用して、柔軟なコンテンツタイプ作成を管理。

### フォームシステム
`form/` ディレクトリのカスタムフォーム処理:
- バリデーションクラス
- メールテンプレート
- ファイルアップロード機能
- お問い合わせと資料ダウンロード用の個別フォーム

### パフォーマンス最適化
- WordPressヘッドクリーンアップ（不要な要素を削除）
- カスタムjQuery読み込み
- アセットバージョニング
- DNS prefetch最適化
- 絵文字スクリプト削除

# PDFLOCSS命名規則

## 概要
PDFLOCSSは本家FLOCSSをベースにした、より実務的で理解しやすいCSS設計手法です。
「初見でもわかりやすく、誰にでも理解しやすい」がコンセプトです。

## 基本的な命名規則

### 接頭辞（本家FLOCSSと同じ）
- **Layout**: `l-` - レイアウト要素
- **Component**: `c-` - 再利用可能なコンポーネント
- **Project**: `p-` - プロジェクト固有の要素
- **Utility**: `u-` - ユーティリティクラス

### MindBEMding記法
- **Block**: `.Block`
- **Element**: `.Block__Element`
- **Modifier**: `.Block--Modifier` または `.Block__Element--Modifier`
- **注意**: Element の2階層目（`.Block__Element__Element`）は非推奨

### 単語の区切り
- **ケバブケース**: 単語と単語はハイフンでつなぐ
- 例：`l-header__nav-item`, `c-button-group`

### 連番の書き方
- **ゼロパディング**: 2桁で統一
- **ハイフンなし**: 連番の前にハイフンを入れない
- 例：`item01`, `item02`, `item10`, `item11`
- ❌ 悪い例：`item-01`, `item1`

## 実装のポイント

### シングルクラス設計
- 基本的に1要素に1クラス
- スタイルの散らばりを防ぐ
- Modifierなどで複数クラスになることもある

### クラスセレクタ統一
- idセレクタ、タグセレクタは基本使用しない
- 詳細度を統一して修正しやすくする
- 例外：`img`, `iframe`は外側を囲んで`.wrapper img {}`は許容

### 全要素にクラス付与
- スタイルがなくてもクラスを入れる
- 要素の役割を明示するため
- HTMLの構造変更時に不自然にならない

## ディレクトリ構成とファイル分割

### ページ・セクション分割
- モジュール分割ではなく、ページとセクションで分割
- 1ページの修正で基本的に1ファイルのみ編集
- 「componentかprojectか」の悩みを解消

### ディレクトリ構造
```
foundation/
  ├── _base.scss
  ├── _variables.scss
  └── _mixins.scss
layout/
  ├── _header.scss
  ├── _footer.scss
  └── _main.scss
object/
  ├── component/
  │   ├── _button.scss
  │   ├── _link.scss
  │   └── _utility.scss
  ├── project/
  │   ├── _top.scss
  │   ├── _about.scss
  │   └── _company.scss
  └── utility/
      └── _utility.scss
style.scss
```

## 命名例

### Layout（レイアウト）
```scss
.l-header
.l-header__wrap
.l-header__inner
.l-header__logo
.l-header__nav
.l-header__nav-list
.l-header__nav-item
.l-header__nav-link
.l-header__dropdown
.l-header__dropdown-item
```

### Component（コンポーネント）
```scss
.c-btn
.c-btn__txt
.c-btn__icon
.c-btn--primary
.c-btn--secondary

.c-card
.c-card__image
.c-card__body
.c-card__title
.c-card__text

.c-linelink
.c-linelink__txt
```

### Project（プロジェクト固有）
```scss
.p-top-fv
.p-top-fv__heading
.p-top-fv__text
.p-top-fv__button

.p-about-intro
.p-about-intro__image
.p-about-intro__content
```

### Utility（ユーティリティ）
```scss
.u-text-center
.u-margin-small
.u-visually-hidden
.u-sp-only
.u-pc-only
```

## メリット

1. **脳死でもできる**: ルールが明確で迷わない
2. **ファイル特定が簡単**: クラス名から場所がわかる
3. **影響範囲が明確**: 擬似スコープで汚染を防ぐ
4. **認識の差が出ない**: 誰でもわかる基準
5. **中規模まで対応**: 10-20ページ程度なら余裕

## PDFLOCSS変更タスクのルール

### DOM構造の変更について
- **既存のDOM構造は変更しない**
- **クラス名のみをPDFLOCSS形式に変更する**
- HTMLの階層や要素の追加・削除は行わない
- タグの種類（div、p、h2など）も変更しない

### 実装時の注意
- 元のクラス名（grid、col、row、num、iconなど）をPDFLOCSS形式に置き換える
- 既存の構造を尊重して、必要最小限の変更に留める
- 機能的なクラス（splideクラスなど）は残す
- **元のクラスがない要素には、文脈から適切なPDFLOCSSクラスを付与する**
- **c-btn要素は`get_template_part`で読み込むように変更する**
- **c-btnでblankクラスがついているものは、追加クラスで`blank`を付与し、iconのhrefは`i-blank`にする**
- **imgタグにはwidth属性とheight属性を付与する（値は空で良い）**
- **既存のc接頭辞クラスは変更しない（ハイフンや_の使い方が間違っていれば指摘して確認を取る）**
- **holeクラスは`p-top-canvas__hole`にする（topページ共通モジュール）**
- **不適切なタグの使い方を見つけた場合は指摘して変更するか確認を取る**
- **画像の読み込みは全てwebpとavifをpictureタグで出し分けする**
- **私が指示するまで何も変更しない**

## 画像読み込み設定ルール（汎用）

### 画像の格納場所
- **HTMLで読み込む画像：** `src/public/images/` 配下に格納
- **CSS/JSで読み込む画像：** `src/assets/images/` 配下に格納

### 開発・本番環境でのパス切り替え
```php
// 例：トップページ画像の場合
$img_path = (defined('WP_DEBUG') && WP_DEBUG) 
    ? 'http://localhost:5174/images/top/' 
    : get_template_directory_uri() . '/images/top/';
```

**動作：**
- **開発時（WP_DEBUG = true）：** Viteサーバーから直接読み込み（リアルタイム反映）
- **本番時（WP_DEBUG = false）：** ビルド後のWordPressテーマディレクトリから読み込み

### pictureタグでの実装例
```php
<picture class="クラス名">
  <source srcset="<?php echo $img_path; ?>filename.avif" type="image/avif">
  <source srcset="<?php echo $img_path; ?>filename.webp" type="image/webp">
  <img src="<?php echo $img_path; ?>filename.webp" alt="" width="" height="">
</picture>
```

### Vite設定での監視設定
```javascript
server: {
  watch: {
    include: [
      "src/**/*",
      "src/public/**/*", // 画像ファイルの監視を明示的に追加
      "wordpress/themes/TEMPLATE_NAME/**/*.php",
      "wordpress/themes/TEMPLATE_NAME/**/*.css",
      "wordpress/themes/TEMPLATE_NAME/**/*.js",
    ],
  },
}
```

### メリット
- 開発時：ビルド不要で画像変更が即座に反映
- 本番時：最適化された画像を使用
- JS/CSSと統一された開発フロー
- 環境変数での自動切り替え

## CSS ファイル整理ルール

### ファイル内の構成
1. **セクションコメント:** 各セクションの前に明確なコメントブロックを配置
```scss
/* ========================================
 * セクション名
 * ======================================== */
```

2. **関連性での配置:** セレクタは以下の順序で配置
   - メインのセクションセレクタ（例：`.p-top-fv`）
   - そのセクション内の子要素セレクタ（例：`.p-top-fv__title`）
   - 関連する要素を近くに配置
   - ネストした要素は親の直後に配置

3. **重複の統合:** 同じセレクタが複数回定義されている場合は1つにまとめる

4. **階層の保持:** BEMの階層構造（Block > Element > Modifier）は維持する

### 例
```scss
/* ========================================
 * p-top-fv セクション
 * ======================================== */
.p-top-fv {
  // メインスタイル
}

.p-top-fv__title {
  // タイトルスタイル
}

.p-top-fv__title-accent {
  // タイトルアクセント
}
```

### プロパティ記載順序
CSSプロパティは以下の順序で記載する：

1. **レイアウト・ポジション系**
   - position, top, right, bottom, left, z-index, inset
   - display, visibility, overflow
   - flex, flex-direction, justify-content, align-items, gap
   - grid, grid-template-columns, grid-area
   - float, clear

2. **ボックスモデル系**
   - width, height, min-width, max-width, min-height, max-height
   - margin, padding
   - border, border-radius
   - box-sizing, box-shadow

3. **タイポグラフィ系**
   - font, font-family, font-size, font-weight, line-height
   - text-align, text-decoration, text-transform
   - color

4. **背景・装飾系**
   - background, background-color, background-image
   - opacity, transform, transition, animation

5. **その他**
   - cursor, user-select, pointer-events

## 注意点

- プロジェクト固有の色・フォント・サイズは後から追加
- 基本レイアウトのみを先に整備
- 変数は最小限（サイズ、アニメーション系のみ）
- 汎用性を重視した設計
