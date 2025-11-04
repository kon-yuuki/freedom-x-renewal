<?php
$pageinfo = array(
  'page_id' => 'material',
  'navigation' => 'contact renewal header-bg-gray',
  'title' => '資料ダウンロード｜東京のWeb制作会社・ホームページ制作｜QUOITWORKS Inc.（株式会社クオートワークス）',
  'page_color' => 'pink'
);
$pageinfo['description'] = '「有用性」と「美しさ」を兼ね備えた課題解決を提供するデザイン会社、クオートワークスです。この頁は「' . get_the_title() . '」をご紹介しております。';
set_query_var('pageinfo', $pageinfo);
$assetsPath = get_template_directory_uri();
get_header();
?>


<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">資料ダウンロード(入力エラー)</span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <h1 class="l-fv__heading--main">資料ダウンロード(入力エラー)</h1>
  </hgroup>
</div>

<main class="p-contact c-main non-module c-content">
  <div class="p-contact__col">
    <p class="p-contact__lead">入力内容に誤りがあります。<br>入力画面に戻り必須項目・正しい値を入力し再度送信して下さい。
    </p>
    <a href="<?php echo FORM_KIND_PATH; ?>" class="c-btn fix">
      <span class="c-btn__inner">
        <span class="c-btn__icon">
          <svg class="c-btn__svg">
            <use href="#i-arw-r"></use>
          </svg>
        </span>
        <span class="c-btn__txt">修正する</span>
      </span>
    </a>
  </div>
</main>



<?php get_footer(); ?>