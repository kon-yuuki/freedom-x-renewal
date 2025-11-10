<?php

global $util;
$pageinfo = $util->pageInfo();

//エリアから探すに使用している？
if (is_tax(["taxonomy_landi_area"])) {
  $post_type_tax = get_query_var('taxonomy');
}


// /landi/がURLに含まれているかをチェック(ヘッダーの出しわけに使用する変数を設定)
if (strstr($_SERVER['REQUEST_URI'], 'landi')) {
  $check_url_landi = 'landi';
} elseif (is_tax('taxonomy_case_study', 'landi')) {
  $check_url_landi = 'landi';
} elseif (strstr($_SERVER['REQUEST_URI'], 'magazine')) {
  $check_url_landi = 'landi';
} else {
  $check_url_landi = 'corp';
}

$group_customer = is_page('app') || strstr($_SERVER['REQUEST_URI'], 'magazine') || is_post_type_archive('landi_area') || is_tax('taxonomy_landi_area');
$img_path = get_template_directory_uri() . '/src/renewal/images/';
?>


<link rel='stylesheet' id='style-corp-css'
  href='<?= get_template_directory_uri(); ?>/src/css/style-corp.css?<?= date("YmdHi"); ?>' type='text/css'
  media='all' />

<?php 
  // 現在のページのスラッグを取得
  $current_slug = get_post_field('post_name', get_post());
  
  // スラッグ別にヘッダーを分ける
  $landi_use_slugs = ['landi', 'case'];
  $tateteku_slugs = ['tateteku'];
  $yobikomu_slugs = ['yobikomu'];
  
  $show_landi_use_header = in_array($current_slug, $landi_use_slugs);
  $show_tateteku_header = in_array($current_slug, $tateteku_slugs);
  $show_yobikomu_header = in_array($current_slug, $yobikomu_slugs);
  $show_default_header = !($show_landi_use_header || $show_tateteku_header || $show_yobikomu_header);
?>

<?php if ($show_default_header): ?>
<header class="l-header">
  <div class="l-header__lead sp-hidden">
    <div class="l-header__lead--left">
      <p class="l-header__lead--txt">FREEDOM Xは、<a href="" class="c-linelink"><span
            class="c-linelink__txt bottom-3">フリーダムグループ</span></a>における建築・不動産業界の営業DXを担うテック企業です。</p>
    </div>
    <div class="l-header__lead--relation">
      <div class="l-header__lead--relation--left">
        <a href="" class="l-header__lead--link c-linelink"><span class="c-linelink__txt bottom-3">フリーダム</span></a>
        <a href="" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">フリーダムマーケティング</span></a>
      </div>
      <div class="l-header__lead--relation--right">
        <a href="/service/landi" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">ランディ</span></a>
        <a href="/service/tateteku" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">タテテク</span></a>
        <a href="" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">注文建築のお役立ち情報（ランディマガジン）</span></a>
      </div>
    </div>
  </div>
  <?php
  if (strpos($util->pageInfo()->navigation(), 'blue') !== false):
  ?>
  <?php 
  if(is_front_page()):
  ?>
  <h1 class="l-header__logo"><a href="/" class="l-header__logo--link"><svg class="l-header__logo--img">
        <use href="#i-logo-white"></use>
      </svg></a>
  </h1>
  <?php 
  else:
    ?>
  <div class="l-header__logo"><a href="/" class="l-header__logo--link"><svg class="l-header__logo--img">
        <use href="#i-logo-white"></use>
      </svg></a>
  </div>
  <?php 
  endif;
  ?>
  <?php
  else:
  ?>
  <?php 
  if(is_front_page()):
  ?>
  <h1 class="l-header__logo"><a href="/" class="l-header__logo--link"><svg class="l-header__logo--img">
        <use href="#i-logo"></use>
      </svg></a>
  </h1>
  <?php else:  ?>
  <div class="l-header__logo"><a href="/" class="l-header__logo--link"><svg class="l-header__logo--img">
        <use href="#i-logo"></use>
      </svg></a>
  </div>
  <?php endif;  ?>
  <?php endif;  ?>
  <div class="l-header__inner">
    <nav class="l-header__nav" aria-label="グローバルメニュー">
      <ul class="l-header__nav--list">
        <li
          class="l-header__nav--item <?php if (strpos($util->pageInfo()->navigation(), 'top') !== false) echo ' is-current'; ?>">
          <a href="/" class="l-header__nav--link c-linelink--hidden"><span class="c-linelink__txt">トップ</span></a>
        </li>
        <li
          class="l-header__nav--item <?php if (strpos($util->pageInfo()->navigation(), 'feature') !== false) echo ' is-current'; ?>">
          <a href="/feature" class="l-header__nav--link c-linelink--hidden"><span class="c-linelink__txt">特徴</span></a>
        </li>
        <li
          class="l-header__nav--item <?php if (strpos($util->pageInfo()->navigation(), 'casestudy') !== false) echo ' is-current'; ?>">
          <a href="/case_study" class="l-header__nav--link c-linelink--hidden"><span
              class="c-linelink__txt">導入事例</span></a>
        </li>
        <li
          class="l-header__nav--item <?php if (strpos($util->pageInfo()->navigation(), 'service') !== false) echo ' is-current'; ?> has-megamenu">
          <a href="/service" class="l-header__nav--link c-linelink--hidden"><span class="c-linelink__txt">サービス<span
                class="sp-hidden">紹介</span></span></a>
          <div class="l-header__megamenu">
            <div class="l-header__megamenu--container">
              <div class="l-header__megamenu--heading">
                <a class="l-header__megamenu--link" href="/service" class="c-linelink"><span
                    class="c-linelink__txt">サービス紹介</span></a>
              </div>
              <div class="l-header__megamenu--grid">
                <div class="l-header__megamenu--item">
                  <a href="/service/landi" class="c-linelink--hidden l-header__megamenu--item--link">
                    <span class="c-linelink__txt l-header__megamenu--item--label">ランディPRO</span>
                    <div class="img-ov">
                      <span class="l-header__megamenu--item--txt">土地探し顧客の成約率を最大4倍にする営業支援ツール</span>
                      <img src="<?php echo $img_path ?>common/mega-landi.webp" alt="">
                    </div>
                  </a>
                </div>
                <div class="l-header__megamenu--item">
                  <a href="/service/tateteku" class="c-linelink--hidden l-header__megamenu--item--link">
                    <span class="c-linelink__txt l-header__megamenu--item--label">タテテク</span>
                    <div class="img-ov">
                      <span class="l-header__megamenu--item--txt">地型にぴったりなプランが生成できるプラン生成システム</span>
                      <img src="<?php echo $img_path ?>common/mega-tateteku.webp" alt="">
                    </div>
                  </a>
                </div>
                <div class="l-header__megamenu--item">
                  <a href="/service/yobikomu" class="c-linelink--hidden l-header__megamenu--item--link"><span
                      class="c-linelink__txt">ヨビコム</span></a>
                </div>
                <div class="l-header__megamenu--item">
                  <a href="" class="c-linelink--hidden l-header__megamenu--item--link blank"><span
                      class="c-linelink__txt">フリーダムマーケティング</span></a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li
          class="l-header__nav--item <?php if (strpos($util->pageInfo()->navigation(), 'company') !== false) echo ' is-current'; ?>">
          <a href="/company" class="l-header__nav--link c-linelink--hidden"><span
              class="c-linelink__txt">企業情報</span></a>
        </li>
        <li
          class="l-header__nav--item sp-hidden <?php if (strpos($util->pageInfo()->navigation(), 'recruit') !== false) echo ' is-current'; ?>">
          <a href="/recruit" class="l-header__nav--link c-linelink--hidden"><span class="c-linelink__txt">採用</span></a>
        </li>
        <li
          class="l-header__nav--item sp-hidden <?php if (strpos($util->pageInfo()->navigation(), 'news') !== false) echo ' is-current'; ?>">
          <a href="/newslist" class="l-header__nav--link c-linelink--hidden"><span
              class="c-linelink__txt">お知らせ</span></a>
        </li>
        <li class="l-header__nav--item sp-hidden"><a href="/alliance"
            class="l-header__nav--link c-linelink--hidden"><span class="c-linelink__txt">協業の相談</span></a>
        </li>
      </ul>
    </nav>
    <div class="l-header__cta--wrapper">
      <div class="l-header__cta">
        <?php get_template_part('/component/btn', null, [
          'url'   => '/materials',
          'label' => '資料請求',
        ]);  ?>
        <?php get_template_part('/component/btn', null, [
          'url'   => '/contact',
          'label' => 'お問い合わせ',
          'class' => 'bg-blue',
        ]);  ?>
      </div>
    </div>
    <button class="l-header__menu js-modal-open-close-btn pc-hidden" aria-controls="drawer-menu"
      data-open-class="is-drawer-open" type="button">
      <span class="u-visually-hidden">メニュー</span>
      <span class="l-header__menu--label">MENU</span>
      <div class="l-header__menu--dots">
        <span class="l-header__menu--dot"></span>
        <span class="l-header__menu--dot"></span>
        <span class="l-header__menu--dot"></span>
      </div>
      <span class="l-header__menu--line"></span>
    </button>
    <div class="l-header__drawer pc-hidden" id="drawer-menu" aria-hidden="true">
      <div class="l-header__drawer--scrollable">
        <div class="l-header__drawer--inner">
          <div class="l-header__drawer--btns">
            <?php get_template_part('/component/btn', null, [
            'url'   => '/contact',
            'label' => 'お問い合わせ',
            'class' => 'bg-blue',
          ]);  ?>
            <?php get_template_part('/component/btn', null, [
            'url'   => '/materials',
            'label' => '資料請求する',
          ]);  ?>
          </div>
          <nav class="l-header__drawer--nav" aria-label="ドロワーメニュー">
            <ul class="l-header__drawer--list">
              <li class="l-header__drawer--item">
                <a href="/" class="l-header__drawer--link">トップページ</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/feature" class="l-header__drawer--link">特徴</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/case_study" class="l-header__drawer--link">導入事例</a>
              </li>
              <li class="l-header__drawer--item js-accordion-parent-key">
                <button class="l-header__drawer--item--link js-accordion-parent-label" aria-expanded="true">
                  <span class="">
                    サービス紹介
                  </span>
                  <span class="l-header__drawer--item--icon"></span>
                </button>
                <div class="l-header__drawer--item--child js-accordion-parent-content" aria-hidden="false">
                  <div class="js-accordion-parent-content-inner l-header__drawer--item--child--inner">
                    <a href="/service"
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link "><span
                        class="c-linelink__txt bottom-3">サービス紹介トップ</span></a>
                    <a href="" class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link "><span
                        class="c-linelink__txt bottom-3">ランディPRO</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-landi.webp" alt=""></span></a>
                    <a href="/service/tateteku"
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link"><span
                        class="c-linelink__txt bottom-3">タテテク</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-tateteku.webp" alt=""></span></a>
                    <a href="/service/yobikomu"
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link"><span
                        class="c-linelink__txt bottom-3">ヨビコム</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-yobikomu.webp" alt=""></span></a>
                    <a href=""
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link blank deep"><span
                        class="c-linelink__txt bottom-3">フリーダムマーケティング</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-marketing.webp" alt=""></span></a>
                  </div>
                </div>
              </li>
              <li class="l-header__drawer--item">
                <a href="/company" class="l-header__drawer--link">企業情報</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/recruit" class="l-header__drawer--link">採用情報</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/newslist" class="l-header__drawer--link">お知らせ</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="" class="l-header__drawer--link">協業の相談</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/contact" class="l-header__drawer--link">お問い合わせ</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/materials" class="l-header__drawer--link">資料一覧</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="l-header__drawer--footer">
          <div class="l-header__drawer--inner">
            <a href="" class="l-header__drawer--logo">
              <svg>
                <use href="#i-logo"></use>
              </svg>
            </a>
            <div class="l-header__drawer--address">
              <a href="" class="c-linelink"><span class="c-linelink__txt bottom-3">〒103-0006<br>
                  東京都中央区日本橋富沢町11-12サンライズビル8階</span></a>
            </div>
            <div class="l-header__drawer--services">
              <a href="" class="l-header__drawer--services--item c-linelink"><span
                  class="c-linelink__txt">ランディ</span></a>
              <a href="/service/tateteku" class="l-header__drawer--services--item c-linelink"><span
                  class="c-linelink__txt">タテテク</span></a>
              <a href="/service/yobikomu" class="l-header__drawer--services--item c-linelink"><span
                  class="c-linelink__txt">ヨビコム</span></a>
            </div>
            <div class="l-header__drawer--bottom">
              <a href="" class="l-header__drawer--bottom--item c-linelink blank"><span
                  class="c-linelink__txt">フリーダム</span></a>
              <a href="" class="l-header__drawer--bottom--item c-linelink blank"><span
                  class="c-linelink__txt">フリーダムマーケティング</span></a>
              <a href="" class="l-header__drawer--bottom--item c-linelink blank"><span
                  class="c-linelink__txt">注文建築のお役立ち情報（ランディマガジン）</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-header__bg"></div>
  </div>
</header>
<?php endif; ?>

<?php 
if($show_landi_use_header):
?>
<header class="l-header">
  <div class="l-header__lead sp-hidden">
    <div class="l-header__lead--left">
      <p class="l-header__lead--txt">運営会社<a href="/" class="c-linelink"><span class="c-linelink__txt bottom-3">FREEDOM
            X(フリーダムエックス)</span></a></p>
    </div>
    <div class="l-header__lead--relation">
      <div class="l-header__lead--relation--left">
        <a href="/" class="l-header__lead--link c-linelink"><span class="c-linelink__txt bottom-3">総合トップ</span></a>
        <a href="/feature" class="l-header__lead--link c-linelink"><span class="c-linelink__txt bottom-3">特徴</span></a>
        <a href="/case_study" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">導入事例</span></a>
        <a href="/service" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">サービス紹介</span></a>
        <a href="/company" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">企業情報</span></a>
        <a href="/recruit" class="l-header__lead--link c-linelink"><span class="c-linelink__txt bottom-3">採用</span></a>
        <a href="/newslist" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">お知らせ</span></a>
        <a href="/alliance" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">協業の相談</span></a>
      </div>
      <div class="l-header__lead--relation--right">
        <a href="/materials" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">フリーダムX資料請求</span></a>
        <a href="/contact" class="l-header__lead--link c-linelink"><span
            class="c-linelink__txt bottom-3">総合お問い合わせ</span></a>
      </div>
    </div>
  </div>
  <div class="l-header__logo"><a href="/" class="l-header__logo--link"><img class="l-header__logo--img"
        src="<?php echo $img_path ?>/service/landi/i-landi-logo--red.webp" alt=""></a>
    <a href="/" class="c-linelink pc-hidden"><span class="c-linelink__txt">運営会社：FREEDOM X</span></a>
  </div>
  <div class="l-header__inner">
    <nav class="l-header__nav sp-hidden" aria-label="グローバルメニュー">
      <ul class="l-header__nav--list">
        <li
          class="l-header__nav--item <?php if (strpos($util->pageInfo()->navigation(), 'service-landi') !== false) echo ' is-current'; ?>">
          <a href="/service/landi" class="l-header__nav--link c-linelink--hidden"><span
              class="c-linelink__txt">ランディPROトップ</span></a>
        </li>
        <li
          class="l-header__nav--item <?php if (strpos($util->pageInfo()->navigation(), 'landi-case') !== false) echo ' is-current'; ?>">
          <a href="/service/landi/case" class="l-header__nav--link c-linelink--hidden"><span
              class="c-linelink__txt">機能と効果</span></a>
        </li>
        <li class="l-header__nav--item">
          <a href="/case_study/tag/landi" class="l-header__nav--link c-linelink--hidden"><span
              class="c-linelink__txt">成功事例</span></a>
        </li>
        <li class="l-header__nav--item">
          <a href="/company" class="l-header__nav--link c-linelink--hidden"><span
              class="c-linelink__txt">個人のお客様はこちら</span></a>
        </li>
        <li class="l-header__nav--item">
          <a href="/" class="l-header__nav--link c-linelink--hidden"><span class="c-linelink__txt">運営会社</span></a>
        </li>
      </ul>
    </nav>
    <div class="l-header__cta--wrapper">
      <div class="l-header__cta sp-hidden">
        <?php get_template_part('/component/btn', null, [
          'url'   => '/materials',
          'label' => '資料請求',
        ]);  ?>
        <?php get_template_part('/component/btn', null, [
          'url'   => '/contact',
          'label' => 'お問い合わせ',
          'class' => 'contact',
        ]);  ?>
      </div>
      <div class="l-header__cta pc-hidden">
        <a class="c-btn document" href="/document/">
          <span class="c-btn__lead">ランディPROがすぐわかる</span>
          <span class="c-btn__inner">
            <span class="c-btn__txt" data-text="資料をダウンロードする"><span class="words">資料をダウンロードする</span></span>
            <span class="c-btn__icon">
              <svg class="c-btn__svg">
                <use href="#i-arw-r"></use>
              </svg>
            </span>
          </span>
        </a>
        <a class="c-btn contact" href="/document/">
          <span class="c-btn__lead">ランディPROがすぐわかる</span>
          <span class="c-btn__inner">
            <span class="c-btn__txt" data-text="資料をダウンロードする"><span class="words">資料をダウンロードする</span></span>
            <span class="c-btn__icon">
              <svg class="c-btn__svg">
                <use href="#i-arw-r"></use>
              </svg>
            </span>
          </span>
        </a>
      </div>
    </div>
    <button class="l-header__menu js-modal-open-close-btn pc-hidden" aria-controls="drawer-menu"
      data-open-class="is-drawer-open" type="button">
      <span class="u-visually-hidden">メニュー</span>
      <span class="l-header__menu--label">MENU</span>
      <div class="l-header__menu--dots">
        <span class="l-header__menu--dot"></span>
        <span class="l-header__menu--dot"></span>
        <span class="l-header__menu--dot"></span>
      </div>
      <span class="l-header__menu--line"></span>
    </button>
    <div class="l-header__drawer pc-hidden" id="drawer-menu" aria-hidden="true">
      <div class="l-header__drawer--scrollable">
        <div class="l-header__drawer--inner">
          <div class="l-header__drawer--btns">
            <?php get_template_part('/component/btn', null, [
            'url'   => '/contact',
            'label' => 'お問い合わせ',
            'class' => 'bg-blue',
          ]);  ?>
            <?php get_template_part('/component/btn', null, [
            'url'   => '/materials',
            'label' => '資料請求する',
          ]);  ?>
          </div>
          <nav class="l-header__drawer--nav" aria-label="ドロワーメニュー">
            <ul class="l-header__drawer--list">
              <li class="l-header__drawer--item">
                <a href="/" class="l-header__drawer--link">トップページ</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/feature" class="l-header__drawer--link">特徴</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/case_study" class="l-header__drawer--link">導入事例</a>
              </li>
              <li class="l-header__drawer--item js-accordion-parent-key">
                <button class="l-header__drawer--item--link js-accordion-parent-label" aria-expanded="true">
                  <span class="">
                    サービス紹介
                  </span>
                  <span class="l-header__drawer--item--icon"></span>
                </button>
                <div class="l-header__drawer--item--child js-accordion-parent-content" aria-hidden="false">
                  <div class="js-accordion-parent-content-inner l-header__drawer--item--child--inner">
                    <a href="/service"
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link "><span
                        class="c-linelink__txt bottom-3">サービス紹介トップ</span></a>
                    <a href="" class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link "><span
                        class="c-linelink__txt bottom-3">ランディPRO</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-landi.webp" alt=""></span></a>
                    <a href="/service/tateteku"
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link"><span
                        class="c-linelink__txt bottom-3">タテテク</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-tateteku.webp" alt=""></span></a>
                    <a href="/service/yobikomu"
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link"><span
                        class="c-linelink__txt bottom-3">ヨビコム</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-yobikomu.webp" alt=""></span></a>
                    <a href=""
                      class="l-header__drawer--item--child--link c-linelink js-accordion-parent-link blank deep"><span
                        class="c-linelink__txt bottom-3">フリーダムマーケティング</span><span
                        class="l-header__drawer--item--child--img"><img
                          src="<?php echo $img_path ?>/common/drawer-marketing.webp" alt=""></span></a>
                  </div>
                </div>
              </li>
              <li class="l-header__drawer--item">
                <a href="/company" class="l-header__drawer--link">企業情報</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/recruit" class="l-header__drawer--link">採用情報</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/newslist" class="l-header__drawer--link">お知らせ</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="" class="l-header__drawer--link">協業の相談</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/contact" class="l-header__drawer--link">お問い合わせ</a>
              </li>
              <li class="l-header__drawer--item">
                <a href="/materials" class="l-header__drawer--link">資料一覧</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="l-header__drawer--footer">
          <div class="l-header__drawer--inner">
            <a href="" class="l-header__drawer--logo">
              <svg>
                <use href="#i-logo"></use>
              </svg>
            </a>
            <div class="l-header__drawer--address">
              <a href="" class="c-linelink"><span class="c-linelink__txt bottom-3">〒103-0006<br>
                  東京都中央区日本橋富沢町11-12サンライズビル8階</span></a>
            </div>
            <div class="l-header__drawer--services">
              <a href="" class="l-header__drawer--services--item c-linelink"><span
                  class="c-linelink__txt">ランディ</span></a>
              <a href="/service/tateteku" class="l-header__drawer--services--item c-linelink"><span
                  class="c-linelink__txt">タテテク</span></a>
              <a href="/service/yobikomu" class="l-header__drawer--services--item c-linelink"><span
                  class="c-linelink__txt">ヨビコム</span></a>
            </div>
            <div class="l-header__drawer--bottom">
              <a href="" class="l-header__drawer--bottom--item c-linelink blank"><span
                  class="c-linelink__txt">フリーダム</span></a>
              <a href="" class="l-header__drawer--bottom--item c-linelink blank"><span
                  class="c-linelink__txt">フリーダムマーケティング</span></a>
              <a href="" class="l-header__drawer--bottom--item c-linelink blank"><span
                  class="c-linelink__txt">注文建築のお役立ち情報（ランディマガジン）</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-header__bg"></div>
  </div>
</header>
<?php 
endif;
?>



<div id="renewal-wrap">
  <div id="wrapper">