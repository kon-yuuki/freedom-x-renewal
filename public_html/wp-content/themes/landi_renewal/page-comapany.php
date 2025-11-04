<?php 
/*
Template Name:企業情報
*/ 
global $util;
$pageinfo = array(
  'page_id' => 'company',
  'navigation' => 'company renewal blue',
  'title' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';
?>

<nav class="c-breadNav white">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">企業情報
      </span>
    </li>
  </ul>
</nav>

<section class="p-company-fv c-bg-blue">
  <div class="l-fv flex">
    <hgroup class="l-fv__heading">
      <h1 class="l-fv__heading--sub"><a href="#" class="c-linelink "><span class="c-linelink__txt is-ib">企業情報</span></a>
      </h1>
      <p class="l-fv__heading--main big">不動産DXを実現する<br>
        革新の軌跡</p>
    </hgroup>
    <p class="l-fv__txt sp-hidden">FREEDOM Xは<br>フリーダムグループにおける<br>建築・不動産業界の営業DXを担うテック企業です</p>
  </div>

  <div class="p-top-recruit__gallery splide js-companyGallerySlider">
    <div class="splide__track">
      <ul class="splide__list">
        <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
      </ul>
    </div>
  </div>
</section>

<main class="p-company">
  <div class="c-bg-blue">
    <div class="c-grid-inner">
      <nav class="c-anchor">
        <ul class="c-anchor__list">
          <li class="c-anchor__item">
            <a href="#philosophy" class="c-linelink c-anchor__link">
              <span class="c-linelink__txt">企業理念</span>
              <span class="c-anchor__icon">
                <svg class="c-anchor__arw">
                  <use href="#i-arw-down"></use>
                </svg>
              </span>
            </a>
          </li>
          <li class="c-anchor__item">
            <a href="#message" class="c-linelink c-anchor__link">
              <span class="c-linelink__txt">代表メッセージ</span>
              <span class="c-anchor__icon">
                <svg class="c-anchor__arw">
                  <use href="#i-arw-down"></use>
                </svg>
              </span>
            </a>
          </li>
          <li class="c-anchor__item">
            <a href="#group" class="c-linelink c-anchor__link">
              <span class="c-linelink__txt">グループ会社</span>
              <span class="c-anchor__icon">
                <svg class="c-anchor__arw">
                  <use href="#i-arw-down"></use>
                </svg>
              </span>
            </a>
          </li>
          <li class="c-anchor__item">
            <a href="#outline" class="c-linelink c-anchor__link">
              <span class="c-linelink__txt">会社概要</span>
              <span class="c-anchor__icon">
                <svg class="c-anchor__arw">
                  <use href="#i-arw-down"></use>
                </svg>
              </span>
            </a>
          </li>
          <li class="c-anchor__item">
            <a href="#location" class="c-linelink c-anchor__link">
              <span class="c-linelink__txt">拠点</span>
              <span class="c-anchor__icon">
                <svg class="c-anchor__arw">
                  <use href="#i-arw-down"></use>
                </svg>
              </span>
            </a>
          </li>
          <li class="c-anchor__item">
            <a href="#history" class="c-linelink c-anchor__link">
              <span class="c-linelink__txt">沿革</span>
              <span class="c-anchor__icon">
                <svg class="c-anchor__arw">
                  <use href="#i-arw-down"></use>
                </svg>
              </span>
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <section class="p-company-philosophy" id="philosophy">
      <div class="c-grid-inner">
        <h2 class="c-ttl__h2 c-sp-section-separate c-mt-0__sp">企業理念</h2>
      </div>
      <div class="p-top-philosophy__copy">
        <div class="p-top-philosophy__copy--inner">
          教育よりも早く、<br>採用より確実に。<br>知的生産性に、革命を。
        </div>
        <div class="p-top-philosophy__gallery">
          <div class="p-top-philosophy__gallery--img1">
            <img src="<?php echo $img_path ?>top/philosophy_1.webp" alt="" class="">
          </div>
          <div class="p-top-philosophy__gallery--img2">
            <img src="<?php echo $img_path ?>top/philosophy_2.webp" alt="" class="">
          </div>
        </div>
        <div class="p-top-philosophy__gallery second">
          <div class="p-top-philosophy__gallery--img1">
            <img src="<?php echo $img_path ?>top/philosophy_1.webp" alt="" class="">
          </div>
          <div class="p-top-philosophy__gallery--img2">
            <img src="<?php echo $img_path ?>top/philosophy_2.webp" alt="" class="">
          </div>
        </div>
        <div class="p-top-philosophy__gallery bottom">
          <div class="p-top-philosophy__gallery--img1">
            <img src="<?php echo $img_path ?>top/philosophy_3.webp" alt="" class="">
          </div>
          <div class="p-top-philosophy__gallery--img2">
            <img src="<?php echo $img_path ?>top/philosophy_4.webp" alt="" class="">
          </div>
        </div>
      </div>
      <div class="p-top-philosophy__content">
        <p class="p-top-philosophy__txt">
          優秀な人材の育成は、どんな会社においても大きな課題です。<br>
          しかし、人の育成はどうしても不確実で、<br>
          時間もお金もかかるものです。<br>
          当社は、不確実で時間のかかる「人材育成」ではなく、<br>
          テクノロジーの力で人材の能力を底上げできないか<br>
          という課題意識から生まれた会社です。<br>
          私たちがつくるのは、たとえ経験が浅い人でも、<br>
          無駄な寄り道をすることなく、最短で正解に辿り着ける未来。<br>
          それは、顧客の課題と向き合う時間を生みだし、<br>
          コンサルティングの質を高めていくことにつながります。<br>
          当社は実績に裏付けされた知見とテクノロジーの力で、<br>
          建築・不動産領域の知的生産性に革命をもたらします。
        </p>
      </div>
    </section>

    <div class="c-grid-inner">
      <section class="p-company-message" id="message">
        <h2 class="c-ttl__h2 c-sp-section-separate">代表メッセージ</h2>
        <div class="p-company-message__main">
          <p class="p-company-message__txt">
            ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
          </p>
          <p class="p-company-message__profile pc-hidden">
            FREEDOM X株式会社<br>代表取締役社長 衣笠茂樹
          </p>
          <div class="p-company-message__image">
            <picture>
              <source srcset="<?php echo $img_path ?>company/message.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/message.webp" alt="代表" width="800" height="600"
                class="p-company-message__img">
            </picture>
            <p class="p-company-message__profile sp-hidden">
              FREEDOM X株式会社<br>代表取締役社長 衣笠茂樹
            </p>
          </div>
        </div>
      </section>
    </div>

  </div>

  <div class="c-grid-inner">
    <section class="p-company-group c-section c-pt-0__sp" id="group">
      <h2 class="c-ttl__h2 c-sp-section-separate c-mt-0__sp">グループ会社</h2>
      <div class="p-company-group__main">
        <picture>
          <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
          <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
        </picture>
      </div>
      <div class="p-company-group__content c-col col3">
        <a class="c-col__item p-company-group__content--item c-linelink blank" href="" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-group__ttl"><span class="c-linelink__txt bottom-3">FREEDOM株式会社</span>
          </h3>
          <p class="p-company-group__txt">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
        </a>
        <a class="c-col__item p-company-group__content--item c-linelink blank" href="" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-group__ttl"><span class="c-linelink__txt bottom-3">FREEDOM株式会社</span>
          </h3>
          <p class="p-company-group__txt">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
        </a>
        <a class="c-col__item p-company-group__content--item c-linelink blank" href="" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-group__ttl"><span class="c-linelink__txt bottom-3">FREEDOM株式会社</span>
          </h3>
          <p class="p-company-group__txt">ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト</p>
        </a>

      </div>
    </section>

    <section class="p-company-outline c-section c-pt-0__sp" id="outline">
      <h2 class="c-ttl__h2 c-sp-section-separate">会社概要</h2>
      <dl class="c-definition__list">
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">会社名</dt>
          <dd class="c-definition__detail">FREEDOM X株式会社</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">代表者</dt>
          <dd class="c-definition__detail">代表取締役社長 衣笠 茂樹</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">設立</dt>
          <dd class="c-definition__detail">2019年9月17日</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">資本金</dt>
          <dd class="c-definition__detail">3,000万円</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">事業内容</dt>
          <dd class="c-definition__detail">建築・不動産領域におけるDXコンサルティング<br>
            ランディ、タテテクの開発<br>
            ランディPRO(システム)の販売<br>
            Webマーケティング支援</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">認証</dt>
          <dd class="c-definition__detail">
            <div class="p-company-outline__certification">
              <div class="p-company-outline__certification--image"><img
                  src="<?php echo $img_path ?>common/privacy-logo.svg" alt="プライバシーマーク" width="122" height="122"></div>
              <div class="p-company-outline__certification--content">
                <p class="p-company-outline__certification--txt"><span
                    class="p-company-outline__certification--txt--ttl">事業者名称</span> : <br class="pc-hidden">FREEDOM
                  X株式会社</p>
                <p class="p-company-outline__certification--txt"><span
                    class="p-company-outline__certification--txt--ttl">登録番号</span> : <br class="pc-hidden">第17004573号
                </p>
                <p class="p-company-outline__certification--txt"><span
                    class="p-company-outline__certification--txt--ttl">認定取得日</span> : <br class="pc-hidden">2023年2月20日
                </p>
                <p class="p-company-outline__certification--txt"><span
                    class="p-company-outline__certification--txt--ttl">認定機関</span> : <br class="pc-hidden">一般財団法人
                  日本情報経済社会推進協会（JIPDEC）</p>
              </div>
            </div>
          </dd>
        </div>
      </dl>
    </section>

    <section class="p-company-location c-section c-pt-0__sp" id="location">
      <h2 class="c-ttl__h2 c-sp-section-separate">拠点</h2>
      <div class="p-company-location__main c-col col3">
        <a href="" class="c-col__item c-linelink" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-location__ttl">拠点名拠点名拠点名</h3>
          <p class="p-company-location__address"><span class="c-linelink__txt bottom-3">〒103-0006<br>東京都中央区日本橋富沢町11-12
              サンライズビル8階</span><span class="span blank-icon"></span>
          </p>
        </a>
        <a href="" class="c-col__item c-linelink" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-location__ttl">拠点名拠点名拠点名</h3>
          <p class="p-company-location__address"><span
              class="c-linelink__txt bottom-3">〒103-0006<br>東京都中央区日本橋富沢町11-12ビル8階</span><span
              class="span blank-icon"></span>
          </p>
        </a>
        <a href="" class="c-col__item c-linelink" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-location__ttl">拠点名拠点名拠点名</h3>
          <p class="p-company-location__address"><span
              class="c-linelink__txt bottom-3">〒103-0006<br>東京都中央区日本橋富沢町11-12ビル8階</span><span
              class="span blank-icon"></span>
          </p>
        </a>
        <a href="" class="c-col__item c-linelink" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-location__ttl">拠点名拠点名拠点名</h3>
          <p class="p-company-location__address"><span
              class="c-linelink__txt bottom-3">〒103-0006<br>東京都中央区日本橋富沢町11-12ビル8階</span><span
              class="span blank-icon"></span>
          </p>
        </a>
        <a href="" class="c-col__item c-linelink" target="_blank">
          <div class="img-ov">
            <picture>
              <source srcset="<?php echo $img_path ?>company/freedom.avif" type="image/avif">
              <img src="<?php echo $img_path ?>company/freedom.webp" alt="" width="800" height="600">
            </picture>
          </div>
          <h3 class="p-company-location__ttl">拠点名拠点名拠点名</h3>
          <p class="p-company-location__address"><span
              class="c-linelink__txt bottom-3">〒103-0006<br>東京都中央区日本橋富沢町11-12ビル8階</span><span
              class="span blank-icon"></span>
          </p>
        </a>
      </div>
    </section>
    <section class="p-company-history c-section c-pt-0__sp" id="history">
      <h2 class="c-ttl__h2 c-sp-section-separate">沿革</h2>
      <dl class="c-definition__list">
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">2011年4月</dt>
          <dd class="c-definition__detail">フリーダムアーキテクツにて、土地探し顧客に向けたサービスとして土地情報の提供を目的とした専門部署を設立</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">2011年4月</dt>
          <dd class="c-definition__detail">フリーダムアーキテクツにて、土地探し顧客に向けたサービスとして土地情報の提供を目的とした専門部署を設立</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">2011年4月</dt>
          <dd class="c-definition__detail">フリーダムアーキテクツにて、土地探し顧客に向けたサービスとして土地情報の提供を目的とした専門部署を設立</dd>
        </div>
        <div class="c-definition__inner">
          <dt class="c-definition__ttl">2011年4月</dt>
          <dd class="c-definition__detail">フリーダムアーキテクツにて、土地探し顧客に向けたサービスとして土地情報の提供を目的とした専門部署を設立</dd>
        </div>
      </dl>
    </section>

    <div class="c-cta">
      <picture>
        <source srcset="<?php echo $img_path ?>common/cta-dummy.avif" type="image/avif">
        <img src="<?php echo $img_path ?>common/cta-dummy.webp" alt="" width="800" height="600">
      </picture>
    </div>
  </div>


</main>


<?php get_footer(); ?>