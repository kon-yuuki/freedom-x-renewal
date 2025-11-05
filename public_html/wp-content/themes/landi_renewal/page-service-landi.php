<?php
/*
Template Name:ランディPRO
*/
global $util;
$pageinfo = array(
  'page_id' => 'case',
  'navigation' => 'service renewal',
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
      <h2 class="p-service-detail__fv-title"><strong>成約率</strong>を最大4倍にする<br>注文建築業界専門<br>営業支援DXツール
        <img class="p-service-detail__fv-logo" src="<?php echo $img_path ?>service/landi/i-landi-logo--white.webp"
          alt="ランディPRO" />
      </h2>
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
    <img class="p-service-detail__fv-bg" src="<?php echo $img_path ?>service/landi/landi-kv.webp" />
  </div>
  <div class=" splide js-serviceFooterSlider">
    <div class="splide__track">
      <ul class="splide__list">
        <li
          class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--1 p-top-recruit__gallery--img--bottom">
          <img src="<?php echo $img_path ?>service/landi/landi-slider_1.webp" alt="" loading="lazy">
        </li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--2"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_2.webp" alt="" loading="lazy"></li>
        <li
          class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--3 p-top-recruit__gallery--img--bottom">
          <img src="<?php echo $img_path ?>service/landi/landi-slider_3.webp" alt="" loading="lazy">
        </li>
        <li
          class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--4 p-top-recruit__gallery--img--top">
          <img src="<?php echo $img_path ?>service/landi/landi-slider_4.webp" alt="" loading="lazy">
        </li>
        <li
          class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--5 p-top-recruit__gallery--img--bottom">
          <img src="<?php echo $img_path ?>service/landi/landi-slider_5.webp" alt="" loading="lazy">
        </li>
        <li class="splide__slide p-top-recruit__gallery--img p-top-recruit__gallery--img--6"><img
            src="<?php echo $img_path ?>service/landi/landi-slider_6.webp" alt="" loading="lazy"></li>
      </ul>
    </div>
  </div>

</section>

<main class="p-service-detail">
  <section class="p-service-detail__section p-service-detail__trouble">
    <div class="p-service-detail__section-inner">
      <h2 class="p-service-detail__section-title center">
        <span class="p-service-detail__section-title-small">ハウスメーカー・工務店の</span><br>
        <span class="p-service-detail__section-title-large">よくある<strong class="u-txt-red">
            3つのお悩み</strong></span>
      </h2>

      <picture class="p-service-detail__trouble-image">
        <source srcset="<?php echo $img_path; ?>service/landi/trouble-person.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/landi/trouble-person.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/landi/trouble-person.webp" alt="" width="" height="" loading="lazy">
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
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-card-problem01.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-card-problem01.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/trouble-card-problem01.webp" alt="" width="" height=""
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
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-card-problem02.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-card-problem02.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/trouble-card-problem02.webp" alt="" width="" height=""
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
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-card-problem03.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-card-problem03.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/trouble-card-problem03.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
        </div>
      </div>


      <!-- <div class="p-service-detail__trouble-solution">
          <p class="p-service-detail__trouble-question">
            変化する外部環境に追いつけず、「手の打ちようがない」と感じていませんか?
          </p>
          <p class="p-service-detail__trouble-solution-text">
            これら3つのお悩みは<br>
            既に<span class="p-service-detail__trouble-solution-text-accent">来場済みの土地探し顧客の成約率を<br>
              高める</span>ことで解決できるんです!
          </p>
          <div class="p-service-detail__trouble-solution-logo">
            <picture class="p-service-detail__trouble-solution-logo-image">
              <source srcset="<?php echo $img_path; ?>service/landi/logo-tochi.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/logo-tochi.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/logo-tochi.webp" alt="公式サイトメーカーTO-CHI" width="" height="">
            </picture>
          </div>
          <picture class="p-service-detail__trouble-solution-image p-service-detail__trouble-solution-image--03">
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-solution-photo03.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-solution-photo03.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/trouble-solution-photo03.webp" alt="" width="" height="">
          </picture>

          <picture class="p-service-detail__trouble-solution-image p-service-detail__trouble-solution-image--04">
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-solution-photo04.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/trouble-solution-photo04.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/trouble-solution-photo04.webp" alt="" width="" height="">
          </picture>
        </div> -->
    </div>
    <picture class="p-service-detail__trouble-solution">
      <source srcset="<?php echo $img_path; ?>service/landi/trouble-solution.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/landi/trouble-solution.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/landi/trouble-solution.webp" alt="" width="" height="" loading="lazy">
    </picture>
  </section>

  <section class="p-service-detail__section p-service-detail__reason section-dot-separate">
    <div class="c-grid-inner">
      <h2 class="p-service-detail__section-title center">
        <span class="p-service-detail__section-title-small">土地顧客の成約率を高める理由01</span><br>
        <span class="p-service-detail__section-title-large">土地探し顧客は<br><strong
            class="u-txt-red">消極的選択で『建売』を購入</strong>している</span>
      </h2>

      <picture class="p-service-detail__reason-image">
        <source srcset="<?php echo $img_path; ?>service/landi/reason-visual.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/landi/reason-visual.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/landi/reason-visual.webp" alt="" width="" height="" loading="lazy">
      </picture>

      <p class="p-service-detail__reason-text p-service-detail__text u-align-center">
        人口減少により、注文住宅着工戸数も年々減っている一方で、建売の着工戸数は増えています。<br>
        このことから、土地探し顧客が土地を見つけられずに、『建売』を購入しているという現状が示唆されます。<br>
        実際に、『注文住宅を建てたい』と考えていた層でも、土地探しに行き詰まると、最終的に建売住宅へと妥協するということが起こっています。<br>
        そのため『<strong class="c-red">土地探し顧客をいかに注文住宅で成約させるか</strong>』が課題です。
      </p>

      <picture class="p-service-detail__dialog">
        <source srcset="<?php echo $img_path; ?>service/landi/reason-dialog.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/landi/reason-dialog.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/landi/reason-dialog.webp" alt="" width="" height="" loading="lazy">
      </picture>
    </div>

    <picture class="p-service-detail__reason-background">
      <source srcset="<?php echo $img_path; ?>service/landi/reason-background.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/landi/reason-background.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/landi/reason-background.webp" alt="" width="" height="" loading="lazy">
    </picture>
  </section>

  <section class="p-service-detail__section p-service-detail__reason02 section-clip">
    <div class="p-service-detail__reason02-top">
      <div class="p-service-detail__reason02-inner c-grid-inner">
        <div class="p-service-detail__reason02-heading">
          <h2 class="p-service-detail__section-title">
            <span class="p-service-detail__section-title-small">土地顧客の成約率を高める理由02</span><br>
            <span class="p-service-detail__section-title-large">全国的に見れば<br><span
                class="p-service-detail__section-title-accent">土地ありと土地探し顧客</span>の<br>来場後の成約率はほぼ同じ</span>
          </h2>
          <div class="p-service-detail__reason02-text">
            <p class="p-service-detail__text">
              建築済みのお客様に向うと、75%(4人中3人)が土地探し顧客でした。<br>
              そして、これは住宅展示場に来られるお客様のうち、<br>
              土地探し顧客の割合(こちらも4人中3人で75%)と全く同じです。
            </p>
            <p class="p-service-detail__text">
              入り口である『来場』と、出口である『ご成約』で、<br>
              お客様の土地のありなしの内訳は全く変わりません。
            </p>
            <p class="p-service-detail__text">
              これはつまり、業界全体で見れば<br>
              『<strong class="c-red">土地があるかないか</strong>』は、<strong class="c-red">ご契約のしやすさに本来関係ない</strong>、<br>
              ということを示唆しています。
            </p>
          </div>
        </div>
        <div class="p-service-detail__reason02-content">
          <div class="p-service-detail__reason02-graph">
            <picture class="p-service-detail__reason02-graph-image">
              <source srcset="<?php echo $img_path; ?>service/landi/reason02-graph.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/reason02-graph.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/reason02-graph.webp" alt="来場時と建築済みの土地あり土地探しの内訳比較グラフ"
                width="" height="" loading="lazy">
            </picture>
          </div>
        </div>
      </div>

      <picture class="p-service-detail__reason02-dialog--1">
        <source srcset="<?php echo $img_path; ?>service/landi/reason02-dialog--1.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/landi/reason02-dialog--1.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/landi/reason02-dialog--1.webp" alt="" width="" height=""
          loading="lazy">
      </picture>
    </div>

    <div class="p-service-detail__reason02-bottom c-grid-inner">
      <div class="p-service-detail__reason02-bottom-text">
        <p class="p-service-detail__text">
          もし『土地探し顧客は決まりにくい』と感じている<br>
          場合、それは競合他社がうまく対応して、<br>
          本来御社で成約になるはずだった顧客と<br>
          契約しているということです。
        </p>
        <p class="p-service-detail__text">
          土地探し顧客の成約率が、土地あり顧客に比べて<br>
          低いならば、それは深刻な営業課題と<br>
          言えるということになります。
        </p>
      </div>

      <div class="p-service-detail__reason02-bottom-graph ">
        <picture class="p-service-detail__reason02-bottom-graph-image">
          <source srcset="<?php echo $img_path; ?>service/landi/reason02-bottom-graph.avif" type="image/avif">
          <source srcset="<?php echo $img_path; ?>service/landi/reason02-bottom-graph.webp" type="image/webp">
          <img src="<?php echo $img_path; ?>service/landi/reason02-bottom-graph.webp"
            alt="土地探し苦手なハウスメーカーと土地探し得意なハウスメーカーの成約率比較グラフ" width="" height="" loading="lazy">
        </picture>
      </div>
    </div>

    <div class="p-service-detail__reason02-dialog">
      <div class="p-service-detail__reason02-dialog-inner">
        <picture class="p-service-detail__reason02-dialog-image">
          <source srcset="<?php echo $img_path; ?>service/landi/reason02-dialog2.avif" type="image/avif">
          <source srcset="<?php echo $img_path; ?>service/landi/reason02-dialog2.webp" type="image/webp">
          <img src="<?php echo $img_path; ?>service/landi/reason02-dialog2.webp" alt="" width="" height=""
            loading="lazy">
        </picture>
        <picture class="p-service-detail__reason02-dialog-illust">
          <source srcset="<?php echo $img_path; ?>service/landi/reason02-dialog-illust.avif" type="image/avif">
          <source srcset="<?php echo $img_path; ?>service/landi/reason02-dialog-illust.webp" type="image/webp">
          <img src="<?php echo $img_path; ?>service/landi/reason02-dialog-illust.webp" alt="" width="" height=""
            loading="lazy">
        </picture>
      </div>
    </div>
  </section>

  <section class="p-service-detail__section p-service-detail__reason03">
    <div class="p-service-detail__reason03-inner c-grid-inner">
      <div class="p-service-detail__reason03-heading">
        <h2 class="p-service-detail__section-title">
          <span class="p-service-detail__section-title-small">土地顧客の成約率を高める理由03</span><br>
          <span class="p-service-detail__section-title-large">高い成約率の秘訣は<br>『<span
              class="p-service-detail__section-title-accent">自社ファン化</span>』『<span
              class="p-service-detail__section-title-accent">資金計画合意</span>』<br>『<span
              class="p-service-detail__section-title-accent">候補地確定</span>』を同時並行で<br>行うことにあります。</span>
        </h2>
        <div class="p-service-detail__reason03-text">
          <p class="p-service-detail__text">
            土地なし顧客の成約は、どれか一つが突出しても獲得できません。<br>
            「自社ファン化」で信頼を得ても、「資金計画」が不明確では具体化せず、<br>
            「候補地」が決まらなければ家族は建ちません。<br>
            顧客は全ての不安が払拭され、未来が描けた時に決断するのです。
          </p>
          <p class="p-service-detail__text">
            平均点以上でご要素を兼ね備えるハウスメーカー・工務店こそ、<br>
            土地探し顧客の成約率を高め、成功しています。<br>
            ハウスメーカー・工務店の多くは、「自社ファン化」(デザイン性など)を完々得<br>
            意とされていますが、<br>
            それだけでは成約率を高めるための条件としては、不十分になります。
          </p>
        </div>
      </div>

      <div class="p-service-detail__reason03-content">

        <picture class="p-service-detail__reason03-diagram">
          <source srcset="<?php echo $img_path; ?>service/landi/reason03-diagram.avif" type="image/avif">
          <source srcset="<?php echo $img_path; ?>service/landi/reason03-diagram.webp" type="image/webp">
          <img src="<?php echo $img_path; ?>service/landi/reason03-diagram.webp" alt="自社ファン化、資金計画の合意、候補地の確定の3つの要素図"
            width="" height="" loading="lazy">
        </picture>
      </div>

    </div>

    <div class="p-service-detail__reason03-dialog">
      <div class="p-service-detail__reason03-dialog-inner">
        <picture class="p-service-detail__reason03-image">
          <source srcset="<?php echo $img_path; ?>service/landi/reason03-dialog.avif" type="image/avif">
          <source srcset="<?php echo $img_path; ?>service/landi/reason03-dialog.webp" type="image/webp">
          <img src="<?php echo $img_path; ?>service/landi/reason03-dialog.webp" alt="" width="" height=""
            loading="lazy">
        </picture>
      </div>
      <picture class="p-service-detail__reason03-illustration">
        <source srcset="<?php echo $img_path; ?>service/landi/reason03-illustration.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/landi/reason03-illustration.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/landi/reason03-illustration.webp" alt="" width="" height=""
          loading="lazy">
      </picture>
    </div>

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
              src="<?php echo $img_path; ?>service/landi/i-landi-logo--red.webp" alt="ランディPRO" width="180" height="40">
          </h2>

          <div class="p-service-detail__intro-hero-device">
            <picture class="p-service-detail__intro-hero-device-main">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-device-main.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-device-main.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-device-main.webp" alt="ランディPROの画面イメージ" width=""
                height="" loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--01">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo01.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo01.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-photo01.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--02">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo02.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo02.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-photo02.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--03 close">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo03.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo03.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-photo03.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--04 close">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo04.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo04.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-photo04.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--05">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo05.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo05.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-photo05.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <picture class="p-service-detail__intro-hero-photo p-service-detail__intro-hero-photo--06">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo06.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-photo06.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-photo06.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
          </div>

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

        <div class="p-service-detail__intro-merit c-grid-inner">
          <div class="p-service-detail__intro-merit-inner">
            <h3 class="p-service-detail__intro-merit-title">
              ランディPROなら<br>
              <strong class="u-txt-green-bright">資金計画・候補地確定をDX化</strong>し、土地探し顧客案件の成約率向上が実現できます。
            </h3>

            <picture class="p-service-detail__intro-merit-diagram">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-merit-diagram.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/intro-merit-diagram.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/intro-merit-diagram.webp" alt="ランディPROを利用するメリット図" width=""
                height="" loading="lazy">
            </picture>
          </div>

          <?php get_template_part('/component/btn', null, [
              'url'   => '/service/landi/case',
              'label' => '機能と効果を見る',
            ]);  ?>
        </div>
      </div>
    </section>
  </div>

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

    <section class="p-service-detail__section p-service-detail__support">
      <h2 class="p-service-detail__section-title large center">
        なぜ『ランディPRO』が<br><strong class="u-txt-red">支持される</strong>のか
      </h2>

      <div class="p-service-detail__support-item">
        <div class="p-service-detail__support-item-inner c-col col2">
          <div class="p-service-detail__support-item-heading c-col__item">
            <h3 class="p-service-detail__section-title">
              <span class="p-service-detail__section-title-small">ランディPROが支持される理由01</span><br>
              <span class="p-service-detail__section-title-large"><strong
                  class="u-txt-red">業界No.1の<br>35万件の物件情報量</strong>だから<br>成約率を劇的に向上させる</span>
            </h3>
            <div class="p-service-detail__support-item-text">
              <p class="p-service-detail__support-item-text-item">
                全国の35万件にもおよぶ土地情報を自動で収集、一元化。<br>
                非公開物件も含むWEB上に公開されている全ての土地情報を集約している<br>
                ため、営業担当者の負担を軽減しながら、顧客自身でも候補地を簡単に<br>
                見つけることができ、成約率の大幅な向上を実現します。
              </p>
            </div>

          </div>
          <div class="p-service-detail__support-item-graph c-col__item">
            <picture class="p-service-detail__support-item-graph-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-graph01.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-graph01.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-graph01.webp"
                alt="物件数比較グラフ ランディPRO No.1 約350,000件" width="" height="" loading="lazy">
            </picture>
          </div>
        </div>


      </div>
      <div class="p-service-detail__support-item">
        <h3 class="p-service-detail__section-title">
          <span class="p-service-detail__section-title-small">ランディPROが支持される理由02</span><br>
          <span class="p-service-detail__section-title-large small"><strong
              class="u-txt-red">土地探ししやすい機能が豊富</strong>だから受注確度の高い土地がすぐ見つかる</span>
        </h3>

        <div class="p-service-detail__support-item-features c-col col5">
          <div class="p-service-detail__support-item-feature c-col__item">
            <picture class="p-service-detail__support-item-feature-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature01.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature01.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-feature01.webp" alt="" width="" height=""
                loading="lazy">
            </picture>

            <p class="p-service-detail__support-item-feature-text">
              <strong class="u-txt-green">車種物件の統合・名寄せを<br>自動化し</strong>、土地探しの<br>わずらわしさを排除できる
            </p>
          </div>

          <div class="p-service-detail__support-item-feature c-col__item">
            <picture class="p-service-detail__support-item-feature-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature02.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature02.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-feature02.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
            <p class="p-service-detail__support-item-feature-text">
              <strong class="u-txt-green">Googleマップ</strong>上に<br>物件情報を表示できる
            </p>
          </div>

          <div class="p-service-detail__support-item-feature c-col__item">
            <picture class="p-service-detail__support-item-feature-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature03.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature03.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-feature03.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
            <p class="p-service-detail__support-item-feature-text">
              <strong class="u-txt-green">顧客と営業の双方で</strong><br>WEB上の全土地情報から<br>土地が探せる
            </p>
          </div>

          <div class="p-service-detail__support-item-feature c-col__item">
            <picture class="p-service-detail__support-item-feature-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature04.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature04.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-feature04.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
            <p class="p-service-detail__support-item-feature-text">
              <strong class="u-txt-green">建築可能な<br>床面積</strong>から土地が探せる
            </p>
          </div>

          <div class="p-service-detail__support-item-feature c-col__item">
            <picture class="p-service-detail__support-item-feature-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature05.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-feature05.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-feature05.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
            <p class="p-service-detail__support-item-feature-text">
              <strong class="u-txt-green">顧客自身で<br>土地が継続的に探せる</strong>から<br>土地相場理解が速くなる
            </p>
          </div>
        </div>
      </div>

      <div class="p-service-detail__support-item">
        <div class="p-service-detail__support-item-inner c-col col2">
          <div class="p-service-detail__support-item-heading c-col__item">
            <h3 class="p-service-detail__section-title">
              <span class="p-service-detail__section-title-small">ランディPROが支持される理由03</span><br>
              <span class="p-service-detail__section-title-large small">継続商談を可能にする追客機能があるから、<br><span
                  class="p-service-detail__section-title-accent">検討中の顧客も取りこぼさず<br>成約できる</span></span>
            </h3>
            <picture class="p-service-detail__support-item-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-image03.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-image03.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-image03.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
          </div>
          <div class="p-service-detail__support-item-points c-col__item">
            <div class="p-service-detail__support-item-point">
              <picture class="p-service-detail__support-item-point-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/support-icon01.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/support-icon01.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/support-icon01.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
              <p class="p-service-detail__support-item-point-text">
                <strong class="u-txt-green">顧客IDの有効期限機能</strong>で<br>受注確度の高い顧客が再来場
              </p>
            </div>

            <div class="p-service-detail__support-item-point">
              <picture class="p-service-detail__support-item-point-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/support-icon02.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/support-icon02.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/support-icon02.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
              <p class="p-service-detail__support-item-point-text">
                <strong class="u-txt-green">検索動向を可視化し</strong>、<br>顧客ごとに効果的なフォローが可能に
              </p>
            </div>

            <div class="p-service-detail__support-item-point">
              <picture class="p-service-detail__support-item-point-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/support-icon03.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/support-icon03.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/support-icon03.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
              <p class="p-service-detail__support-item-point-text">
                顧客ごとに<br>
                <strong class="u-txt-green">希望に沿った物件情報をAIが自動送付</strong>
              </p>
            </div>
          </div>
        </div>



      </div>
      <div class="p-service-detail__support-item">
        <h3 class="p-service-detail__section-title">
          <span class="p-service-detail__section-title-small">ランディPROが支持される理由04</span><br>
          <span class="p-service-detail__section-title-large small">資金シミュレーション機能があるから<br><span
              class="p-service-detail__section-title-accent">顧客と資金計画の合意形成をスムーズ</span>にし、自社受注までしっかりサポートできる</span>
        </h3>

        <p class="p-service-detail__support-item-lead">
          資金計画シュミレーションを活用することで、建物予算と土地予算をそれぞれ明確にして、土地探しを進めることができます。
        </p>

        <div class="p-service-detail__support-item-simulations c-col col3">
          <div class="p-service-detail__support-item-simulation c-col__item">
            <picture class="p-service-detail__support-item-simulation-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-simulation01.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-simulation01.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-simulation01.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
            <p class="p-service-detail__support-item-simulation-text">
              建物と土地の予算バランスを算定できる
            </p>
          </div>

          <div class="p-service-detail__support-item-simulation c-col__item">
            <picture class="p-service-detail__support-item-simulation-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-simulation02.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-simulation02.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-simulation02.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
            <p class="p-service-detail__support-item-simulation-text">
              予算内に合う土地を瞬時に表示できる
            </p>
          </div>

          <div class="p-service-detail__support-item-simulation c-col__item">
            <picture class="p-service-detail__support-item-simulation-image">
              <source srcset="<?php echo $img_path; ?>service/landi/support-simulation03.avif" type="image/avif">
              <source srcset="<?php echo $img_path; ?>service/landi/support-simulation03.webp" type="image/webp">
              <img src="<?php echo $img_path; ?>service/landi/support-simulation03.webp" alt="" width="" height=""
                loading="lazy">
            </picture>
            <p class="p-service-detail__support-item-simulation-text">
              土地と建物の総額予算とローン支払額が一目瞭然<br>で確認できる
            </p>
          </div>
        </div>

        <div class="p-service-detail__support-item-btn">
          <?php get_template_part('/component/btn', null, [
            'url'   => '/service/landi/case',
            'label' => '機能と効果を見る',
          ]);  ?>
        </div>
      </div>
    </section>
  </div>


  <section class="p-service-detail__cta js-parallax-wrapper" data-parallax-sp="false">
    <picture class="p-service-detail-cta__image js-parallax-target" aria-hidden="true" data-parallax-start="top bottom">
      <source srcset="<?php echo $img_path; ?>service/landi/cta-background.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/landi/cta-background.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/landi/cta-background.webp" alt="" width="" height="" loading="lazy">
    </picture>

    <div class="p-service-detail-cta__content">
      <p class="p-service-detail-cta__lead">
        注文建築業界の土地探し顧客案件の成約率向上のことなら、
      </p>
      <h2 class="p-service-detail-cta__title">
        業界特化のDXコンサルティングに強い<br>
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
          <picture>
            <source srcset="<?php echo $img_path; ?>service/landi/document.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/document.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/document.webp" alt="" width="" height="" loading="lazy">
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
            <img src="<?php echo $img_path; ?>service/landi/contact.webp" alt="" width="" height="" loading="lazy">
          </picture>
        </a>
      </div>
    </div>
  </section>

  <div class="c-grid-inner">
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
        $landi_case_study_query = new WP_Query(array(
          'post_type'      => 'case_study',
          'posts_per_page' => 4,
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC',
          'tax_query'      => array(
            array(
              'taxonomy' => 'casestudy_tag',
              'field'    => 'slug',
              'terms'    => 'landi',
            ),
          ),
        ));
        ?>

      <ul class="p-top-casestudy__latest--list c-col col4">
        <?php if ($landi_case_study_query->have_posts()) : ?>
        <?php while ($landi_case_study_query->have_posts()) : $landi_case_study_query->the_post(); ?>
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