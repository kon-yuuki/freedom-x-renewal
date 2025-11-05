<?php

$post_type_tax = get_query_var('taxonomy');

$img_path = get_template_directory_uri() . '/src/renewal/images/';

// /landi/がURLに含まれているかをチェック
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

//form関係のページにはSP時の下部バナーを表示しない
//materialは表示して、materialの下層は表示しない
$url = $_SERVER['REQUEST_URI'];

$target = 'materials';
$materialsCondition = false;

if (str_contains($url, $target)) {
  $position = strpos($url, $target);

  if ($position + strlen($target) === strlen($url)) {
    $materialsCondition = false;
  } else {
    $materialsCondition = true;
  }
}

$no_banner = str_contains($url, 'recruit') || str_contains($url, 'contact') || str_contains($url, 'landi_contact') || str_contains($url, 'landi_download') || $materialsCondition;

define('BANNER_CONDITIONS', $no_banner);
function bottom_banner_margin()
{
  if (BANNER_CONDITIONS) {
    echo '<script type="text/javascript">
							// bodyのHTMLCollection から最初の要素を取得する
							const bodyElement = document.getElementsByTagName("body")[0]; 
					
							// body 要素が存在するか確認する
							if (bodyElement) {
									// paddingBottom を設定する
									bodyElement.style.paddingBottom = "0";
							} else {
									console.error("Body element not found.");
							}
					</script>';
  }
}
bottom_banner_margin();
?>

</div><!-- #wrapper -->


<?php
// serviceページのlandiのページまたは子ページの場合のみ表示
if (is_page() && (
  $post->post_parent == get_page_by_path('service/landi')->ID ||
  is_page('service/landi')
)) :
?>
<div class="p-landi-footer">
  <div class="p-landi-footer__inner">
    <h2 class="p-landi-footer__ttl">注文建築業界の土地探し顧客案件の成約率向上のことなら、<br>
      業界特化のDXコンサルティングに強い<br>
      私たちにご相談ください。</h2>
    <div class="p-landi-footer__btns">
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
        <picture>
          <source srcset="<?php echo $img_path; ?>service/landi/document.avif" type="image/avif">
          <source srcset="<?php echo $img_path; ?>service/landi/document.webp" type="image/webp">
          <img src="<?php echo $img_path; ?>service/landi/document.webp" alt="" width="" height="">
        </picture>
      </a>
      <a class="c-btn contact" href="">
        <span class="c-btn__lead">まずは無料で</span>
        <span class="c-btn__inner">
          <span class="c-btn__txt" data-text="お問い合わせする"><span class="words">お問い合わせする</span></span>
          <span class="c-btn__icon">
            <svg class="c-btn__svg">
              <use href="#i-arw-r"></use>
            </svg>
          </span>
        </span>
        <picture>
          <source srcset="<?php echo $img_path; ?>service/landi/contact.avif" type="image/avif">
          <source srcset="<?php echo $img_path; ?>service/landi/contact.webp" type="image/webp">
          <img src="<?php echo $img_path; ?>service/landi/contact.webp" alt="" width="" height="">
        </picture>
      </a>
    </div>
    <p class="p-landi-footer__txt">100%※大手ハウスメーカー10社中10社が導入しています。（自社調べ）
      大手ハウスメーカー10社の選定方法：「23住宅メーカーの競争力分析(2023年8月25日発刊)」(住宅産業研究所)に掲載された企業の
      販売実績の総販売戸数(2022年度分の注文住宅数)を比較し上位から10社を大手ハウスメーカー10社として表記しています。
      大手ハウスメーカー10社は、以下の通りです。
      積水ハウス株式会社、パナソニックホームズ株式会社、株式会社アイ工務店、住友林業株式会社、株式会社一条工務店、タマホーム株式会社、
      積水化学工業株式会社、旭化成ホームズ株式会社、ミサワホーム株式会社、大和ハウス工業株式会社
      導入率の算出方法:2024年11月1日時点でランディPROを1ID以上ご利用いただいている支店を対象として算出しています。</p>
    <nav class="p-landi-footer__nav">
      <div class="p-landi-footer__nav--main">
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">ランディPROトップ</span></a>
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">機能と効果</span></a>
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">成功事例</span></a>
      </div>
      <div class="p-landi-footer__nav--blank">
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">個人向けサービス「ランディ」 </span></a>
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">非公開物件を探す</span></a>
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">ユーザーID発行ができる導入店</span></a>
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">ランディマガジン</span></a>
      </div>
      <ul class="p-landi-footer__nav--list">
        <li class="p-landi-footer__nav--item"><a href="" class="c-linelink"><span class="c-linelink__txt">
              ノウハウ</span></a></li>
        <li class="p-landi-footer__nav--item"><a href="" class="c-linelink"><span class="c-linelink__txt">
              体験談</span></a></li>
        <li class="p-landi-footer__nav--item"><a href="" class="c-linelink"><span class="c-linelink__txt">
              お金について</span></a></li>
      </ul>
    </nav>
    <picture class="p-landi-footer__kv">
      <source srcset="<?php echo $img_path; ?>service/landi/landi-footer.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/landi/landi-footer.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/landi/landi-footer.webp" alt="" width="" height="">
    </picture>
  </div>
  <div class=" splide js-serviceFooterSlider">
    <div class="splide__track">
      <ul class="splide__list">
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_1.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--2"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_2.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--3"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_3.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--4"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_4.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--5"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_5.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--6"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_6.webp" alt=""></li>
      </ul>
    </div>
  </div>
</div>
<?php endif;  ?>
<?php
// serviceページのtatetekuのページまたは子ページの場合のみ表示
if (is_page() && (
  $post->post_parent == get_page_by_path('service/tateteku')->ID ||
  is_page('service/tateteku')
)) :
?>
<div class="p-landi-footer tateteku">
  <div class="p-landi-footer__inner">
    <h2 class="p-landi-footer__ttl">注文建築業界の土地探し顧客案件の成約率向上のことなら、<br>
      業界特化のDXコンサルティングに強い<br>
      私たちにご相談ください。</h2>
    <div class="p-landi-footer__btns">
      <a class="c-btn document" href="">
        <span class="c-btn__lead">タテテクがすぐわかる</span>
        <span class="c-btn__inner">
          <span class="c-btn__txt" data-text="資料をダウンロードする"><span class="words">資料をダウンロードする</span></span>
          <span class="c-btn__icon">
            <svg class="c-btn__svg">
              <use href="#i-arw-r"></use>
            </svg>
          </span>
        </span>
      </a>
      <a class="c-btn contact" href="">
        <span class="c-btn__lead">まずは無料で</span>
        <span class="c-btn__inner">
          <span class="c-btn__txt" data-text="お問い合わせする"><span class="words">お問い合わせする</span></span>
          <span class="c-btn__icon">
            <svg class="c-btn__svg">
              <use href="#i-arw-r"></use>
            </svg>
          </span>
        </span>
      </a>
    </div>
    <p class="p-landi-footer__txt">100%※大手ハウスメーカー10社中10社が導入しています。（自社調べ）
      大手ハウスメーカー10社の選定方法：「23住宅メーカーの競争力分析(2023年8月25日発刊)」(住宅産業研究所)に掲載された企業の
      販売実績の総販売戸数(2022年度分の注文住宅数)を比較し上位から10社を大手ハウスメーカー10社として表記しています。
      大手ハウスメーカー10社は、以下の通りです。
      積水ハウス株式会社、パナソニックホームズ株式会社、株式会社アイ工務店、住友林業株式会社、株式会社一条工務店、タマホーム株式会社、
      積水化学工業株式会社、旭化成ホームズ株式会社、ミサワホーム株式会社、大和ハウス工業株式会社
      導入率の算出方法:2024年11月1日時点でランディPROを1ID以上ご利用いただいている支店を対象として算出しています。</p>
    <nav class="p-landi-footer__nav">
      <div class="p-landi-footer__nav--main">
        <a href="" class="c-linelink--hidden"><span class="c-linelink__txt">タテテクトップ</span></a>
        <a href="/casestudy/tag/tateku" class="c-linelink--hidden"><span class="c-linelink__txt">成功事例</span></a>
      </div>
    </nav>
    <picture class="p-landi-footer__kv">
      <source srcset="<?php echo $img_path; ?>service/tateteku/landi-footer.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/tateteku/landi-footer.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/tateteku/landi-footer.webp" alt="" width="" height="">
    </picture>
  </div>
  <div class=" splide js-serviceFooterSlider">
    <div class="splide__track">
      <ul class="splide__list">
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_1.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--2"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_2.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--3"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_3.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--4"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_4.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--5"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_5.webp" alt=""></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--6"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_6.webp" alt=""></li>
      </ul>
    </div>
  </div>
</div>
<?php endif;  ?>
<div class="c-bg-blue">
  <section class="l-cta c-bg-blue">
    <div class="l-cta__inner c-grid-outer">
      <a class="l-cta__item c-btn__wrapper" href="/contact">
        <hgroup class="p-top-heading">
          <p class="p-top-heading__sub">Contact</p>
          <h2 class="p-top-heading__main">お問い合わせ</h2>
        </hgroup>
        <p class="l-cta__txt">採用やパートナー応募<br>お見積もり依頼や詳しいご相談をされたい場合には<br>お問い合わせフォームをご活用ください。</p>
        <?php get_template_part('/component/btn', null, [
          'label' => 'お問い合わせする',
          'class' => 'white sp-big',
          'tag' => "div"
        ]);  ?>
      </a>
      <a class="l-cta__item c-btn__wrapper" href="/materials">
        <hgroup class="p-top-heading">
          <p class="p-top-heading__sub">Request Information</p>
          <h2 class="p-top-heading__main">資料請求</h2>
        </hgroup>
        <p class="l-cta__txt">社内で検討されたい方のために<br>実績などをまとめた会社案内を<br>PDFでご用意しています。ご自由にダウンロードください。</p>
        <?php get_template_part('/component/btn', null, [
          'label' => '資料をダウンロードする',
          'class' => 'white sp-big',
          'tag' => "div"
        ]);  ?>
      </a>
    </div>
  </section>

  <footer class="l-footer c-bg-blue">
    <div class="l-footer__inner c-grid-outer">
      <div class="l-footer__main">
        <div class="l-footer__left">
          <span class="l-footer__company">FREEDOM X株式会社</span>
          <a href="https://g.co/kgs/oEXEmqc" target="_blank" class="c-linelink l-footer__address"><span
              class="c-linelink__txt bottom-3">〒103-0006<br>
              東京都中央区日本橋富沢町11-12<br class="sp-hidden">サンライズビル8階</span></a>
        </div>
        <nav class="l-footer__nav">
          <div class="l-footer__nav--col">
            <div class="l-footer__nav--parent"><a href="/" class="l-footer__nav--parent--link c-linelink--hidden"><span
                  class="c-linelink__txt">トップページ</span></a></div>
            <div class="l-footer__nav--parent"><a href="/feature"
                class="l-footer__nav--parent--link c-linelink--hidden"><span class="c-linelink__txt">特徴</span></a>
            </div>
            <div class="l-footer__nav--parent js-accordion-parent-key is-open">
              <a href="/case_study"
                class="l-footer__nav--parent--link c-linelink--hidden js-accordion-parent-link sp-hidden"><span
                  class="c-linelink__txt">事例紹介</span></a>
              <button class="pc-hidden l-footer__nav--parent--link js-accordion-parent-label">
                <span class="">
                  事例紹介
                </span>
                <span class="l-footer__nav--parent--icon"></span>
              </button>
              <div class="l-footer__nav--child js-accordion-parent-content">
                <div class="js-accordion-parent-content-inner l-footer__nav--child--inner">
                  <a href="/case_study"
                    class="l-footer__nav--child--link c-linelink js-accordion-parent-link pc-hidden"><span
                      class="c-linelink__txt bottom-3">事例紹介トップ</span></a>
                  <a href="/case_study" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">成約率改善</span></a>
                  <a href="/case_study" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">集客拡大</span></a>
                  <a href="/case_study" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">残業代抑制</span></a>
                  <a href="/case_study" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">顧客行動の可視化</span></a>
                  <a href="/case_study" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">人材育成</span></a>
                  <a href="/case_study" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">中長期顧客からの成約UP</span></a>
                </div>
              </div>

            </div>
          </div>
          <div class="l-footer__nav--col">
            <div class="l-footer__nav--parent js-accordion-parent-key is-open">
              <a href="/service"
                class="l-footer__nav--parent--link c-linelink--hidden js-accordion-parent-link sp-hidden"><span
                  class="c-linelink__txt">サービストップ</span></a>
              <button class="pc-hidden l-footer__nav--parent--link js-accordion-parent-label">
                <span class="">
                  サービストップ
                </span>
                <span class="l-footer__nav--parent--icon"></span>
              </button>
              <div class="l-footer__nav--child js-accordion-parent-content">
                <div class="js-accordion-parent-content-inner l-footer__nav--child--inner">
                  <a href="/service"
                    class="l-footer__nav--child--link c-linelink js-accordion-parent-link pc-hidden"><span
                      class="c-linelink__txt bottom-3">サービストップ</span></a>
                  <a href="" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">ランディPRO</span></a>
                  <a href="" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">タテテク</span></a>
                </div>
              </div>
            </div>

            <div class="l-footer__nav--parent js-accordion-parent-key is-open">
              <a href="/company"
                class="l-footer__nav--parent--link c-linelink--hidden js-accordion-parent-link sp-hidden"><span
                  class="c-linelink__txt">企業情報</span></a>
              <button class="pc-hidden l-footer__nav--parent--link js-accordion-parent-label">
                <span class="">
                  企業情報
                </span>
                <span class="l-footer__nav--parent--icon"></span>
              </button>
              <div class="l-footer__nav--child js-accordion-parent-content">
                <div class="js-accordion-parent-content-inner l-footer__nav--child--inner">
                  <a href="/company"
                    class="l-footer__nav--child--link c-linelink js-accordion-parent-link pc-hidden"><span
                      class="c-linelink__txt bottom-3">企業情報</span></a>
                  <a href="/company#philosophy"
                    class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">企業理念</span></a>
                  <a href="/company#outline"
                    class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">会社概要</span></a>
                  <a href="/company#history"
                    class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">沿革</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="l-footer__nav--col">
            <div class="l-footer__nav--parent js-accordion-parent-key is-open">
              <a href="/recruit"
                class="l-footer__nav--parent--link c-linelink--hidden js-accordion-parent-link sp-hidden"><span
                  class="c-linelink__txt">採用情報</span></a>
              <button class="pc-hidden l-footer__nav--parent--link js-accordion-parent-label">
                <span class="">
                  採用情報
                </span>
                <span class="l-footer__nav--parent--icon"></span>
              </button>
              <div class="l-footer__nav--child js-accordion-parent-content">
                <div class="js-accordion-parent-content-inner l-footer__nav--child--inner">
                  <a href="/recruit"
                    class="l-footer__nav--child--link c-linelink js-accordion-parent-link pc-hidden"><span
                      class="c-linelink__txt bottom-3">採用情報</span></a>
                  <a href="" class="l-footer__nav--child--link c-linelink js-accordion-parent-link"><span
                      class="c-linelink__txt bottom-3">募集要項</span></a>
                </div>
              </div>
            </div>
            <div class="l-footer__nav--parent"><a href="/newslist"
                class="l-footer__nav--parent--link c-linelink--hidden"><span
                  class="c-linelink__txt bottom-5">お知らせ</span></a>
            </div>
          </div>
          <div class="l-footer__nav--col">
            <div class="l-footer__nav--parent"><a href="/alliance"
                class="l-footer__nav--parent--link c-linelink--hidden"><span class="c-linelink__txt">パートナー募集</span></a>
            </div>
            <div class="l-footer__nav--parent"><a href="/contact"
                class="l-footer__nav--parent--link c-linelink--hidden"><span class="c-linelink__txt">お問い合わせ</span></a>
            </div>
            <div class="l-footer__nav--parent"><a href="/materials"
                class="l-footer__nav--parent--link c-linelink--hidden"><span class="c-linelink__txt">資料一覧</span></a>
            </div>
            <div class="l-footer__nav--parent"><a href="/privacy"
                class="l-footer__nav--parent--link c-linelink--hidden"><span
                  class="c-linelink__txt">プライバシーポリシー</span></a>
            </div>
          </div>
        </nav>
      </div>
      <div class="l-footer__relation-links">
        <div class="l-footer__relation-links--left">
          <a href="https://info.freedom.co.jp/" target="_blank" class="c-linelink l-footer__relation-links--link"><span
              class="c-linelink__txt bottom-3">フリーダム</span></a>
          <a href="" class="c-linelink l-footer__relation-links--link"><span
              class="c-linelink__txt bottom-3">フリーダムマーケティング</span></a>
        </div>
        <div class="l-footer__relation-links--right">
          <a href="" class="c-linelink l-footer__relation-links--link"><span
              class="c-linelink__txt bottom-3">ランディ</span></a>
          <a href="" class="c-linelink l-footer__relation-links--link"><span
              class="c-linelink__txt bottom-3">タテテク</span></a>
          <a href="/magazine" class="c-linelink l-footer__relation-links--link"><span
              class="c-linelink__txt bottom-3">注文建築のお役立ち情報（ランディマガジン）</span></a>
        </div>
      </div>
      <div class="l-footer__aside">
        <div class="l-footer__aside--left">
          <p class="l-footer__aside--copy">教育よりも早く、<br>採用より確実に。<br>知的生産性に、革命を。</p>
          <p class="l-footer__aside--txt">FREEDOM Xは、フリーダムグループにおける<br class="pc-hidden">建築・不動産業界の営業DXを担うテック企業です。</p>
        </div>
        <div class="l-footer__aside--right">
          <a href="/" class="l-footer__logo">
            <img src="<?php echo $img_path ?>common/logo-white.webp" alt="">
          </a>
          <p class="l-footer__copyright">Copyright ©︎ 2025 All Rights Reserved by FREEDOM X Co., Ltd.</p>
        </div>
      </div>
    </div>
  </footer>
</div>

<div id="modal_bg"></div>

<script>
// 郵便番号の自動取得
jQuery('.zip_number').keyup(function() {
  AjaxZip3.zip2addr('zip', '', 'prefectures', 'address1', '', '');
});
</script>

<?php if (
  is_post_type_archive(["magazine"]) ||
  isset($post_type_tax) && $post_type_tax == "taxonomy_magazine"
): ?>
<script>
// 「さらに見る」を押下した際の無限スクロールを実装
jQuery(function() {
  $(window).on('load', function() {
    $('.magazine_more').on('click', function() {

      // タームを取得
      var term = $(this).attr("id");

      // 現在の取得件数とオフセットを記録
      var termById = '#' + term;
      var offset = $(termById + '.offset').text();

      var domain = document.domain;

      console.log(domain);

      // 総投稿件数
      var allpost = "";

      // 全件取得とカテゴリ別取得でAPIの向き先を変える
      if (term == "all") {
        var apiUrl = "https://" + domain + "/wp-json/wp/v2/get_magazine_all?offset=" + offset;
      } else {
        var apiUrl = "https://" + domain + "/wp-json/wp/v2/get_magazine?term=" + term + "&offset=" +
          offset;
      }

      // Ajax
      $.ajax({
        type: "get",
        url: apiUrl,
      }).done(function(data) {
        console.log(data);
        if (data) {
          // 取得した投稿データを画面に追加
          $.each(data, function(index, value) {
            $(termById + "_wrap" + ".item_wrap").append('<div class="item"><a href="' + value
              .link +
              '"></a><figure><img loading="lazy" src="' + value.thum + '" alt="' + value
              .post_title + '"></figure><div class="item_text"><div class="category"><em>' +
              value
              .termName.slug + '</em><span>' + value.termName.name + '</span></div><p>' + value
              .post_title + '</p></div></div>');
            allpost = value.all;
          })

          //　投稿の取得数をカウント
          addCount = data.length;
          // 現在の取得状況を記録
          addOffset = parseInt(addCount) + parseInt(offset);
          // 投稿の取得数数を記録
          $(termById + '.offset').text(addOffset)

          // 取得した投稿数が総投稿数と一致した場合に「さらに見る」ボタンを隠す
          if (parseInt(allpost) == parseInt(addOffset)) {
            $('.magazine_more' + termById).css("display", "none");
          }
        }

      })
    })
  });
});
</script>
<?php elseif (is_page('landi')) : ?>
<script>
$('body').addClass('landi');
</script>
<?php endif; ?>

<?php //ポップアップACF取得

$page_id = 1124;
$today = date("YmdHi");

// TOP用
$popup_url = get_field('popup_url', $page_id);
$popup_src = get_field('popup_img', $page_id);
$popup_img = wp_get_attachment_url($popup_src);
$popup_txt = get_field('popup_txt', $page_id);
$popup_limit = get_field('popup_limit', $page_id);

// /app/用
$popup_app_url = get_field('popup_app_url', $page_id);
$popup_app_src = get_field('popup_app_img', $page_id);
$popup_app_img = wp_get_attachment_url($popup_app_src);
$popup_app_txt = get_field('popup_app_txt', $page_id);
$popup_app_limit = get_field('popup_app_limit', $page_id);

// /magazine/用
$popup_mg_url  = get_field('popup_mg_url', $page_id);
$popup_mg_src = get_field('popup_mg_img', $page_id);
$popup_mg_img = wp_get_attachment_url($popup_mg_src);
$popup_mg_img = get_field('popup_mg_img', $page_id);
$popup_mg_txt = get_field('popup_mg_txt', $page_id);
$popup_mg_limit = get_field('popup_mg_limit', $page_id);

?>

<?php //郵便番号自動入力
if (is_singular(["recruit"])): ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script>
$(function() {
  $("#zip").keyup(function() {
    AjaxZip3.zip2addr("zip", "", "pref", "city", "town");
  });
});
</script>
<?php endif; ?>

<?php if (is_front_page() || is_page(array('landi', 'counter')) || is_post_type_archive('news')): ?>

<?php if ($popup_limit > $today): ?>
<div id="PopUp">
  <span class="close"><span></span><span></span></span>
  <a href="<?= $popup_url; ?>" target="_blank" id="popups"><img loading="lazy" src="<?= $popup_src; ?>"
      alt="<?= $popup_txt; ?>"></a>
</div>
<?php endif; ?>

<?php elseif (is_page('app')): ?>

<?php if ($popup_app_limit > $today): ?>
<div id="PopUp">
  <span class="close"><span></span><span></span></span>
  <a href="<?= $popup_app_url; ?>" target="_blank" id="popups"><img loading="lazy" src="<?= $popup_app_src; ?>"
      alt="<?= $popup_app_txt; ?>"></a>
</div>
<?php endif; ?>

<?php elseif (is_post_type_archive('magazine') || is_singular('magazine')): ?>

<?php if ($popup_mg_limit > $today): ?>
<div id="PopUp">
  <span class="close"><span></span><span></span></span>
  <a href="<?= $popup_mg_url; ?>" target="_blank" id="popups"><img loading="lazy" src="<?= $popup_mg_img; ?>"
      alt="<?= $popup_mg_txt; ?>"></a>
</div>
<?php endif; ?>

<?php endif; ?>

<!-- オンライン相談ページのdatepickerの制御 -->
<?php if (is_page("online")): ?>
<script src="<?php echo get_template_directory_uri(); ?>/src/js/datapickerControll.js" type="text/javaScript"
  charset="utf-8"></script>
<?php endif; ?>

<!-- slick -->
<?php if (is_post_type_archive(["landi_area"]) || is_page('landi') || is_page('alliance') ||  is_post_type_archive(["recruit"])): ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js">
</script>
<script>
$('.company .slider').slick({
  autoplay: true,
  autoplaySpeed: 0,
  speed: 5000,
  cssEase: "linear",
  slidesToShow: 10,
  swipe: false,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 740,
    settings: {
      slidesToShow: 4,
    }
  }]
});

// /alliance/
$('.border .slider').slick({
  autoplay: true,
  autoplaySpeed: 0,
  speed: 5000,
  cssEase: "linear",
  slidesToShow: 4,
  swipe: false,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 740,
    settings: {
      slidesToShow: 3,
    }
  }]
});

// /recruit/
$('.archive_recruit .slider').slick({
  autoplay: true,
  autoplaySpeed: 4000,
  slidesToShow: 1,
  swipe: true,
  dots: true,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  centerMode: true,
  centerPadding: '21.615vw',

  responsive: [{
    breakpoint: 740,
    settings: {
      slidesToShow: 1,
      centerMode: false,
    }
  }]
});

$('.slider.top').slick({
  autoplay: true,
  autoplaySpeed: 0,
  speed: 5000,
  cssEase: "linear",
  slidesToShow: 6,
  swipe: false,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 740,
    settings: {
      slidesToShow: 4,
    }
  }]
});

$('.slider.middle').slick({
  autoplay: true,
  autoplaySpeed: 0,
  speed: 4000,
  cssEase: "linear",
  slidesToShow: 6,
  swipe: false,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 740,
    settings: {
      slidesToShow: 4,
    }
  }]
});

$('.slider.bottom').slick({
  autoplay: true,
  autoplaySpeed: 0,
  speed: 6000,
  cssEase: "linear",
  slidesToShow: 6,
  swipe: false,
  arrows: false,
  pauseOnFocus: false,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 740,
    settings: {
      slidesToShow: 4,
    }
  }]
});
</script>
<?php endif; ?>