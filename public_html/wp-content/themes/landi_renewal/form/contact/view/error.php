<?php
$pageinfo = array(
  'page_id' => 'contact',
  'navigation' => 'contact renewal header-bg-gray',
  'title' => 'お問い合わせ｜建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。',
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
      <span class="c-breadNav-link">お問い合わせ</span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <h1 class="l-fv__heading--main">お問い合わせ</h1>
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