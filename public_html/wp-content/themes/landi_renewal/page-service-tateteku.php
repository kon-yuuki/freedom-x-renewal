<?php
/*
Template Name:タテテク
*/
global $util;
$pageinfo = array(
  'page_id' => 'case',
  'navigation' => 'service renewal tateteku service-detail',
  'title' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';
?>



<section class="p-service-detail__fv">
  <div class="p-service-detail__client-rail splide">
    <div class="splide__track">
      <ul class="splide__list">
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
        <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
            height="" loading="lazy"></li>
      </ul>
    </div>
  </div>
  <div class="p-service-detail__fv-inner">
    <div class="p-service-detail__fv-heading">
      <h1 class="p-service-detail__fv-title"><strong>成約率</strong>を最大4倍にする<br>注文建築業界専門<br>営業支援DXツール
        <img class="p-service-detail__fv-logo" src="<?php echo $img_path ?>service/tatetekui-logo--white.webp"
          alt="タテテク" />
      </h1>
    </div>
    <p class="p-service-detail__fv-text">土地探し顧客への「資金計画合意」・「候補地確定」の課題をDXで効率化。<br>
      ITリテラシーに関係なく、誰でも簡単に接客・追客できる多数の機能で、確実に成約へ導きます。
    </p>
    <div class="p-service-detail__fv-badges">
      <div class="p-service-detail__fv-badge">
        <span class="p-service-detail__fv-badge-text">大手<br>ハウスメーカー</span>
        <span class="p-service-detail__fv-badge-num">100<span class="p-service-detail__fv-badge-unit">%</span>
        </span>
        <span class="p-service-detail__fv-badge-desc">導入中</span>
      </div>
      <div class="p-service-detail__fv-badge">
        <span class="p-service-detail__fv-badge-text">土地情報</span>
        <span class="p-service-detail__fv-badge-num">NO.1</span>
        <span class="p-service-detail__fv-badge-desc">の掲載数</span>
      </div>
      <div class="p-service-detail__fv-badge">
        <span class="p-service-detail__fv-badge-text">導入企業</span>
        <span class="p-service-detail__fv-badge-num">500<span class="p-service-detail__fv-badge-unit">社</span></span>
        <span class="p-service-detail__fv-badge-desc">以上</span>
      </div>
    </div>
    <img class="p-service-detail__fv-bg" src="<?php echo $img_path ?>service/tateteku/kv.webp" />
  </div>
  <div class=" splide js-serviceFooterSlider">
    <div class="splide__track">
      <ul class="splide__list">
        <li
          class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1 p-top-recruit__gallery--img--top">
          <img src="<?php echo $img_path ?>service/tateteku/slider_1.webp" alt="" loading="lazy">
        </li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1"><img
            src="<?php echo $img_path ?>service/tateteku/slider_2.webp" alt="" loading="lazy"></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1"><img
            src="<?php echo $img_path ?>service/tateteku/slider_3.webp" alt="" loading="lazy"></li>
        <li
          class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1 p-top-recruit__gallery--img--top">
          <img src="<?php echo $img_path ?>service/tateteku/slider_4.webp" alt="" loading="lazy">
        </li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1"><img
            src="<?php echo $img_path ?>service/tateteku/slider_5.webp" alt="" loading="lazy"></li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1"><img
            src="<?php echo $img_path ?>service/tateteku/slider_6.webp" alt="" loading="lazy"></li>
      </ul>
    </div>
  </div>

</section>

<main class="p-service-detail p-service-tateteku">
  <section class="p-service-detail__section p-service-detail__trouble  p-service-detail__trouble--1">
    <div class="p-service-detail__section-inner">
      <h2 class="p-service-detail__section-title center">
        <span class="p-service-detail__section-title-small">ハウスメーカー・工務店の</span><br>
        <span class="p-service-detail__section-title-large"><strong
            class="u-txt-red">プラン提案</strong>に関する<br>よくある住宅検討者の声</span>
      </h2>

      <picture class="p-service-detail__trouble-image">
        <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-person.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-person.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/tateteku/trouble-person.webp" alt="" width="" height=""
          loading="lazy">
      </picture>

      <div class="p-service-detail__trouble-card-list c-col col3">
        <div class="p-service-detail__trouble-card c-col__item">
          <p class="p-service-detail__trouble-card-label">01</p>
          <h3 class="p-service-detail__trouble-card-title">
            人口の減少により<br>
            他社との<span class="p-service-detail__trouble-card-title-accent">競争が</span><br>
            <span class="p-service-detail__trouble-card-title-accent">激化</span>している...
          </h3>
          <p class="p-service-detail__trouble-card-text">
            1社あたりの着客数が減少し、<br>
            宿社とのシェア獲得競争が<br>
            激化している
          </p>
          <picture class="p-service-detail__trouble-card-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem01.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem01.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/trouble-card-problem01.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>

        <div class="p-service-detail__trouble-card c-col__item">
          <p class="p-service-detail__trouble-card-label">02</p>
          <h3 class="p-service-detail__trouble-card-title">
            住宅展示場の<br>
            来場者数が<span class="p-service-detail__trouble-card-title-accent">減少</span>し、<br>
            <span class="p-service-detail__trouble-card-title-accent">出展費用</span>も<span
              class="p-service-detail__trouble-card-title-accent">高騰</span>している...
          </h3>
          <p class="p-service-detail__trouble-card-text">
            展示場の出展費用は土地代や人件費・<br>
            建築コストの上昇で高騰しているが、<br>
            来場者数はSNSやWEBの普及により減少。<br>
            そのため費用対効果が悪化している。
          </p>
          <picture class="p-service-detail__trouble-card-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem02.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem02.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/trouble-card-problem02.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>

        <div class="p-service-detail__trouble-card c-col__item">
          <p class="p-service-detail__trouble-card-label">03</p>
          <h3 class="p-service-detail__trouble-card-title">
            自社分譲地の仕入れは<br>
            <span class="p-service-detail__trouble-card-title-accent">不動産相場</span>の<br>
            <span class="p-service-detail__trouble-card-title-accent">下落リスク</span>が高い...
          </h3>
          <p class="p-service-detail__trouble-card-text">
            金利の高止まりや不透明なあと不動産相場の<br>
            下落リスクが高まっており、多額の初期費用や<br>
            先行投資が必要な自社分譲地の仕入れに躊躇を<br>
            抱えるのには不安を感じている。
          </p>
          <picture class="p-service-detail__trouble-card-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem03.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem03.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/trouble-card-problem03.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>
      </div>
    </div>
    <picture class="p-service-detail__dialog">
      <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-solution.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-solution.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/tateteku/trouble-solution.webp" alt="" width="" height=""
        loading="lazy">
    </picture>
  </section>
  <section class="p-service-detail__section p-service-detail__trouble p-service-detail__trouble--2">
    <div class="p-service-detail__section-inner">
      <h2 class="p-service-detail__section-title center">
        <span class="p-service-detail__section-title-small">ハウスメーカー・工務店の</span><br>
        <span class="p-service-detail__section-title-large">よくある<strong class="u-txt-red">
            3つのお悩み</strong></span>
      </h2>

      <picture class="p-service-detail__trouble-image">
        <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-person-2.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-person-2.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/tateteku/trouble-person-2.webp" alt="" width="" height=""
          loading="lazy">
      </picture>

      <div class="p-service-detail__trouble-card-list c-col col3">
        <div class="p-service-detail__trouble-card c-col__item">
          <p class="p-service-detail__trouble-card-label">問題01</p>
          <h3 class="p-service-detail__trouble-card-title">
            人口の減少により<br>
            他社との<span class="p-service-detail__trouble-card-title-accent">競争が</span><br>
            <span class="p-service-detail__trouble-card-title-accent">激化</span>している...
          </h3>
          <p class="p-service-detail__trouble-card-text">
            1社あたりの着客数が減少し、<br>
            宿社とのシェア獲得競争が<br>
            激化している
          </p>
          <picture class="p-service-detail__trouble-card-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-01.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-01.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-01.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>

        <div class="p-service-detail__trouble-card c-col__item">
          <p class="p-service-detail__trouble-card-label">問題02</p>
          <h3 class="p-service-detail__trouble-card-title">
            住宅展示場の<br>
            来場者数が<span class="p-service-detail__trouble-card-title-accent">減少</span>し、<br>
            <span class="p-service-detail__trouble-card-title-accent">出展費用</span>も<span
              class="p-service-detail__trouble-card-title-accent">高騰</span>している...
          </h3>
          <p class="p-service-detail__trouble-card-text">
            展示場の出展費用は土地代や人件費・<br>
            建築コストの上昇で高騰しているが、<br>
            来場者数はSNSやWEBの普及により減少。<br>
            そのため費用対効果が悪化している。
          </p>
          <picture class="p-service-detail__trouble-card-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-02.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-02.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-02.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>

        <div class="p-service-detail__trouble-card c-col__item">
          <p class="p-service-detail__trouble-card-label">問題03</p>
          <h3 class="p-service-detail__trouble-card-title">
            自社分譲地の仕入れは<br>
            <span class="p-service-detail__trouble-card-title-accent">不動産相場</span>の<br>
            <span class="p-service-detail__trouble-card-title-accent">下落リスク</span>が高い...
          </h3>
          <p class="p-service-detail__trouble-card-text">
            金利の高止まりや不透明なあと不動産相場の<br>
            下落リスクが高まっており、多額の初期費用や<br>
            先行投資が必要な自社分譲地の仕入れに躊躇を<br>
            抱えるのには不安を感じている。
          </p>
          <picture class="p-service-detail__trouble-card-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-03.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-03.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/trouble-card-problem-2-03.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>
      </div>
    </div>
    <picture class="p-service-detail__trouble-solution">
      <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-solution-2.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/tateteku/trouble-solution-2.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/tateteku/trouble-solution-2.webp" alt="" width="" height=""
        loading="lazy">
    </picture>
  </section>




  <div class="js-bg-to-blue-trigger" data-target="p-service-detail__intro" data-start="top center">
    <section class="p-service-detail__section p-service-detail__intro">
      <div class="p-service-detail__intro-wrap">
        <div class="p-service-detail__intro-hero">
          <h2 class="p-service-detail__intro-hero-title">
            『候補地確定』『資金計画合意』の課題を解決し、<br>
            成約率を最大4倍にするために開発されたのが<br>
            営業支援ツール
            <img class="p-service-detail__intro-hero-logo"
              src="<?php echo $img_path; ?>service/tateteku/i-tateteku-logo--red.webp" alt="ランディPRO" width="180"
              height="40">
          </h2>

          <div class="p-service-detail__intro-hero-device">
            <picture class="p-service-detail__intro-hero-device-main">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-device-main.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-device-main.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/tateteku/intro-device-main.webp" alt="ランディPROの画面イメージ" width=""
                height="" loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--01">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo01.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo01.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/tateteku/intro-photo01.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--02">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo02.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo02.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/tateteku/intro-photo02.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--03 close">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo03.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo03.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/tateteku/intro-photo03.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--04 close">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo04.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo04.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/tateteku/intro-photo04.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--05">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo05.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo05.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/tateteku/intro-photo05.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--06">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo06.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/tateteku/intro-photo06.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/tateteku/intro-photo06.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
          </div>


        </div>

        <div class="p-service-detail__intro-merit c-grid-inner">
          <div class="p-service-detail__intro-merit-inner">
            <h3 class="p-service-detail__intro-merit-title">
              ランディPROなら<br>
              <strong class="u-txt-green-bright">資金計画・候補地確定をDX化</strong>し、土地探し顧客案件の成約率向上が実現できます。
            </h3>
            <div class="p-service-detail__intro-hero-buttons">
              <a class="c-btn document white" href="">
                <span class="c-btn__lead">すぐに読める!</span>
                <span class="c-btn__inner">
                  <span class="c-btn__txt" data-text="資料ダウンロード"><span class="words">資料ダウンロード</span></span>
                  <span class="c-btn__icon">
                    <svg class="c-btn__svg">
                      <use href="#i-arw-r"></use>
                    </svg>
                  </span>
                </span>
              </a>

              <a class="c-btn contact red" href="">
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
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="c-grid-inner">
    <section class="c-section p-service-detail__plan">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">タテテクはたった30秒でプラン作成が可能です
        </h2>
      </div>
      <p class="c-txt">複雑な現地調査や測量作業は不要。土地の基本情報を入力するだけで、お客様の目の前で魅力的なプランを複数提示。
        従来の手法では時間のかかるプラン作成が、わずか30秒で完了します。また、条件や外観のテイスト変更で何度でも
        再作成でき、作成したプランをダウンロードすぐにその場で提案することが可能になります。
      </p>
      <picture class="p-service-detail__plan-main-image">
        <source srcset="<?php echo $img_path; ?>service/tateteku/plan_main.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/tateteku/plan_main.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/tateteku/plan_main.webp" alt="" width="" height="" loading="lazy">
      </picture>
      <picture class="p-service-detail__plan-other-image">
        <source srcset="<?php echo $img_path; ?>service/tateteku/plan_other.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/tateteku/plan_other.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/tateteku/plan_other.webp" alt="" width="" height="" loading="lazy">
      </picture>
    </section>
    <section class="c-section p-service-detail__possible">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">タテテクの導入で実現できること
        </h2>
      </div>
      <p class="c-txt">タテテクがあれば、これまで対応できなかった注文住宅検討者の多様な要望にも即座に答えられます。
        高速かつ柔軟なプラン提案で、顧客から選ばれる建築パートナーに。</p>

      <div class="p-service-detail__possible-item c-col col2">
        <div class="c-col__item">
          <h3 class="p-service-detail__possible-item-ttl">現地調査・役所調査なしで
            営業担当者がその場でプラン提案できる
            から競合と差別化できる</h3>
          <p class="p-service-detail__possible-item-txt">「来場時にプランを書いても合えない」「プラン提案まで時間がかかる」といった顧客の悩みを解決。
            設計士の工数を使わずとも、営業担当者が簡単に複数のプランをその場で生成・提案できるため、お客様の期待にスピーディーに応えられます。
            スピーディーな対応が、競合との差別化につながり、最終候補に選ばれる大きな一歩となります。さらに、いち早くプランを現実できることで商談の主導権を握りやすくなり、成約へとつながる確率も高まります。</p>
        </div>
        <div class="c-col__item">
          <picture class="p-service-detail__possible-item-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_1.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_1.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/possible_1.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>
      </div>
      <div class="p-service-detail__possible-item c-col col2 rev">
        <div class="c-col__item">
          <h3 class="p-service-detail__possible-item-ttl">検討中の候補地に
            どんな家が建てられるか30秒で分かるから
            意思決定しやすくなる</h3>
          <p class="p-service-detail__possible-item-txt">「この土地に理想の家が建てられるのか？」そんな顧客の不安に
            タテテクなら30秒で即答。
            気になる候補地が出てくるたびにその場で、地形や土地条件に合わせた複数の建築プラン（建物予算付き）を自動生成。限られた検討期間の中でも、納得できる判断材料をスピーディに提供し、顧客の土地購入における意思決定を後押しします。
          </p>
        </div>
        <div class="c-col__item">
          <picture class="p-service-detail__possible-item-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_2.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_2.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/possible_2.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>
      </div>
      <div class="p-service-detail__possible-item c-col col2">
        <div class="c-col__item">
          <h3 class="p-service-detail__possible-item-ttl">複数のプラン提示で
            顧客のイメージを正確に把握できるから
            要望の食い違いを防止できる</h3>
          <p class="p-service-detail__possible-item-txt">
            「要望がなかなか反映されてない」という顧客の不満を解消。プラン提案時にテイストの異なる複数のプランを生成し提示することで、顧客とのイメージの相違を防ぎ、顧客の好みを具体的に把握できます。これにより、本プラン提案ではズレのない満足度の高いプランを効率的にご提案でき、最終候補企業として選ばれやすくなります。
          </p>
        </div>
        <div class="c-col__item">
          <picture class="p-service-detail__possible-item-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_3.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_3.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/possible_3.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>
      </div>
      <div class="p-service-detail__possible-item c-col col2 rev">
        <div class="c-col__item">
          <h3 class="p-service-detail__possible-item-ttl">その場で成約に直結する提案書を作成し、
            顧客にお持ち帰りいただけるので、
            顧客満足度を向上させつつ
            営業工数を大幅にカットできる。</h3>
          <p class="p-service-detail__possible-item-txt">
            提案資料の作成工数を削減できるだけでなく、生成したプランをそのまま顧客にプレゼントすることで、自宅でもじっくり比較検討できるようになります。これにより、顧客の検討の質、スピードが高まり、意思決定がスムーズに進み、成約に繋がります。
          </p>
        </div>
        <div class="c-col__item">
          <picture class="p-service-detail__possible-item-image">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_4.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/tateteku/possible_4.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/tateteku/possible_4.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>
      </div>
      <div class="p-service-detail__btn-wrapper">
        <?php get_template_part('/component/btn', null, [
            'url'   => '/service',
            'label' => 'タテテクの特徴を見る',
          ]);  ?>
      </div>
    </section>
  </div>


  <section class="p-service-detail__cta js-parallax-wrapper" data-parallax-sp="false">
    <picture class="p-service-detail-cta__image js-parallax-target" aria-hidden="true" data-parallax-start="top bottom">
      <source srcset="<?php echo $img_path; ?>service/tateteku/cta-background.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/tateteku/cta-background.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/tateteku/cta-background.webp" alt="" width="" height="" loading="lazy">
    </picture>

    <div class="p-service-detail-cta__content">
      <h2 class="p-service-detail-cta__title">
        〇〇のことなら、〇〇に強い<br>
        私たちにご相談ください。
      </h2>

      <div class="p-service-detail-cta__buttons">
        <a class="c-btn document" href="">
          <span class="c-btn__lead">ランディPROがすぐわかる</span>
          <span class="c-btn__inner">
            <span class="c-btn__txt" data-text="資料をダウンロード"><span class="words">資料をダウンロード</span></span>
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
    </div>
  </section>

  <div class="c-grid-inner">
    <section class="p-service-detail__section p-service-detail__client">
      <h2 class="p-service-detail__section-title large center"><strong class="c-red">
          <strong class="u-txt-red">大手ハウスメーカー16社の100％が導入中</strong><br>
        </strong>500社以上から支持されています。</h2>
      <div class="p-service-detail__client-rail splide">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
          </ul>
        </div>
      </div>
      <div class="p-service-detail__client-rail splide reverse">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>service/landi/landi-rail_1.webp" alt="" width=""
                height=""></li>
          </ul>
        </div>
      </div>
    </section>
    <section class="p-feature-casestudy c-section">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">解決してきた課題<span class="sp-hidden">（事例紹介）</span>
        </h2>
        <a href="/casestudy" class="c-btn">
          <span class="c-btn__inner">
            <span class="c-btn__txt" data-text="詳しくはこちら"><span class="words">詳しくはこちら</span></span>
            <span class="c-btn__icon">
              <svg class="c-btn__svg">
                <use href="#i-arw-r"></use>
              </svg>
            </span>
          </span></a>
      </div>
      <?php
        // casestudy_tagタクソノミーで「landi」タグが付いたcase_study投稿の最新4件を取得
        $tateteku_case_study_query = new WP_Query(array(
          'post_type'      => 'case_study',
          'posts_per_page' => 4,
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC',
          'tax_query'      => array(
            array(
              'taxonomy' => 'casestudy_tag',
              'field'    => 'slug',
              'terms'    => 'tateteku',
            ),
          ),
        ));
        ?>

      <ul class="p-top-casestudy__latest--list c-col col4">
        <?php if ($tateteku_case_study_query->have_posts()) : ?>
        <?php while ($tateteku_case_study_query->have_posts()) : $tateteku_case_study_query->the_post(); ?>
        <?php
              $post_id = get_the_ID();
              $title = get_the_title();
              $post_link = get_permalink();
              $client = get_field('case_company', $post_id);
              
              // カテゴリー情報（taxonomy_case_study）を取得
              $categories = get_the_terms($post_id, 'taxonomy_case_study');
              $category_name = '';
              $category_url = '';
              if (!empty($categories) && !is_wp_error($categories)) {
                $category = $categories[0];
                $category_name = $category->name;
                $category_url = get_term_link($category);
              }
              
              // タグ情報（casestudy_tag）を取得
              $tags = get_the_terms($post_id, 'casestudy_tag');
              
              // 画像を取得
              $thumbnail_url = '';
              if (has_post_thumbnail($post_id)) {
                $thumbnail_url = get_the_post_thumbnail_url($post_id, 'medium');
              } else {
                $case_main_img = get_field('case_main_img', $post_id);
                if ($case_main_img && !empty($case_main_img)) {
                  $thumbnail_url = $case_main_img;
                } else {
                  $thumbnail_url = $img_path . 'top/casestudy_thumb.webp';
                }
              }
              ?>
        <li class="c-col__item p-feature-casestudy__item">
          <div class="p-top-casestudy__latest--inner c-card c-linelink">
            <a href="<?php echo esc_url($post_link); ?>" class="c-card-mainLink"><span
                class="u-visually-hidden"><?php echo esc_html($title); ?></span></a>
            <div class="c-card-body">
              <div class="p-top-casestudy__latest--item--inner">
                <?php if ($client): ?>
                <span class="p-top-casestudy__client"><?php echo esc_html($client); ?></span>
                <?php endif; ?>
                <h3 class="p-top-casestudy__ttl"><span
                    class="c-linelink__txt bottom-5"><?php echo esc_html($title); ?></span>
                </h3>
                <?php if ($category_name): ?>
                <ul class="c-cat-list">
                  <li class="c-cat-list__item"><a href="<?php echo esc_url($category_url); ?>"
                      class="c-cat-list__link c-card-innerLink"><?php echo esc_html($category_name); ?></a></li>
                </ul>
                <?php endif; ?>
                <?php if (!empty($tags) && !is_wp_error($tags)): ?>
                <ul class="c-tag-list">
                  <?php foreach ($tags as $tag): ?>
                  <li class="c-tag-list__item"><a href="<?php echo esc_url(get_term_link($tag)); ?>"
                      class="c-tag-list__link c-card-innerLink c-linelink--hidden"><span
                        class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span></a></li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>
              </div>
              <div class="img-ov">
                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
              </div>
            </div>
          </div>
        </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else: ?>
        <!-- 投稿がない場合のフォールバック -->
        <li class="c-col__item p-feature-casestudy__item">
          <div class="p-top-casestudy__latest--inner c-card">
            <div class="c-card-body">
              <p>現在、ランディPROの事例がありません。</p>
            </div>
          </div>
        </li>
        <?php endif; ?>
      </ul>
    </section>

    <section class="c-section p-service-detail__contact">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">お気軽にお問い合わせください</h2>
      </div>

      <div class="p-service-detail__contact-content">
        <div class="p-service-detail__contact-info">
          <p class="p-service-detail__contact-info-text">
            ランディPROご利用開始までの流れは<br>
            下記の通りです。
          </p>

          <div class="p-service-detail__contact-methods">
            <div class="p-service-detail__contact-method">
              <h3 class="p-service-detail__contact-method-title">入力フォームからのご相談</h3>
              <a class="p-service-detail__contact-method-link c-linelink" href="/contact"><span
                  class="c-linelink__txt">入力フォームはこちら</span></a>
            </div>

            <div class="p-service-detail__contact-method">
              <h3 class="p-service-detail__contact-method-title">オンラインからのご相談</h3>
              <a class="p-service-detail__contact-method-link c-linelink"
                href="mailto:supportcenter@freedom.co.jp"><span
                  class="c-linelink__txt">supportcenter@freedom.co.jp</span></a>
            </div>

            <div class="p-service-detail__contact-method">
              <h3 class="p-service-detail__contact-method-title">ご訪問してのご相談</h3>
              <p class="p-service-detail__contact-method-text">
                ご入用な場合は、<br>
                ご訪問してのご懸念解消や<br>
                導入決定者さまへの<br>
                ご説明を承っております。
              </p>
            </div>
          </div>
        </div>

        <div class="p-service-detail__contact-steps">
          <div class="p-service-detail__contact-step">
            <span class="p-service-detail__contact-step-number">STEP01</span>
            <div class="p-service-detail__contact-detail">
              <div class="p-service-detail__contact-step-visual">
                <picture class="p-service-detail__contact-step-icon">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step01.avif" type="image/avif">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step01.webp" type="image/webp">
                  <img src="<?php echo $img_path; ?>service/landi/contact-step01.webp" alt="" width="" height=""
                    loading="lazy">
                </picture>
              </div>
              <div class="p-service-detail__contact-step-content">
                <h4 class="p-service-detail__contact-step-title">詳しい資料の入手</h4>
              </div>
            </div>
          </div>

          <div class="p-service-detail__contact-step">
            <span class="p-service-detail__contact-step-number">STEP02</span>
            <div class="p-service-detail__contact-detail">
              <div class="p-service-detail__contact-step-visual">
                <picture class="p-service-detail__contact-step-icon">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step02.avif" type="image/avif">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step02.webp" type="image/webp">
                  <img src="<?php echo $img_path; ?>service/landi/contact-step02.webp" alt="" width="" height=""
                    loading="lazy">
                </picture>
              </div>
              <div class="p-service-detail__contact-step-content">
                <h4 class="p-service-detail__contact-step-title">ご不明点を解消</h4>
                <p class="p-service-detail__contact-step-text">
                  以下内容を教えていただくとスムーズです<br>
                  ・ご希望の日時を3候補<br>
                  ・ご使用されるWEB会議システム
                </p>
                <p class="p-service-detail__contact-step-note">
                  ※45分〜1時間程度を想定<br>
                  ※ご訪問してのご説明も可能です。お気軽にお申しつけください
                </p>
              </div>
            </div>
          </div>

          <div class="p-service-detail__contact-step">
            <span class="p-service-detail__contact-step-number">STEP03</span>
            <div class="p-service-detail__contact-detail">
              <div class="p-service-detail__contact-step-visual">
                <picture class="p-service-detail__contact-step-icon">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step03.avif" type="image/avif">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step03.webp" type="image/webp">
                  <img src="<?php echo $img_path; ?>service/landi/contact-step03.webp" alt="" width="" height=""
                    loading="lazy">
                </picture>
              </div>
              <div class="p-service-detail__contact-step-content">
                <h4 class="p-service-detail__contact-step-title">社内検討後にご連絡ください</h4>
              </div>
            </div>
          </div>

          <div class="p-service-detail__contact-step">
            <span class="p-service-detail__contact-step-number">STEP04</span>
            <div class="p-service-detail__contact-detail">
              <div class="p-service-detail__contact-step-visual">
                <picture class="p-service-detail__contact-step-icon">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step04.avif" type="image/avif">
                  <source srcset="<?php echo $img_path; ?>service/landi/contact-step04.webp" type="image/webp">
                  <img src="<?php echo $img_path; ?>service/landi/contact-step04.webp" alt="" width="" height=""
                    loading="lazy">
                </picture>
              </div>
              <div class="p-service-detail__contact-step-content">
                <h4 class="p-service-detail__contact-step-title">ご要望をヒアリング後、お見積もり書提出</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>






</main>


<?php get_footer(); ?>