<?php
/*
Template Name:サービス紹介
*/
global $util;
$pageinfo = array(
  'page_id' => 'service',
  'navigation' => 'service renewal bg-gray',
  'title' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';
?>

<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">サービス紹介
      </span>
    </li>
  </ul>
</nav>

<section class="p-service-fv">
  <div class="l-fv flex">
    <hgroup class="l-fv__heading">
      <h1 class="l-fv__heading--sub"><a href="#" class="c-linelink "><span
            class="c-linelink__txt is-ib">サービストップ</span></a>
      </h1>
      <p class="l-fv__heading--main big">建築・不動産のDXで
        <br><strong class="c-blue">営業課題</strong>を解決
      </p>
    </hgroup>
    <p class="l-fv__txt sp-hidden">FREEDOM Xは注文建築業界の<br>営業課題を根本から解決します。</p>
  </div>
  <div class="p-service-fv__visual js-parallax-wrapper" data-parallax-sp="false">
    <img src="<?php echo $img_path ?>service/fv.webp" alt="" class="js-parallax-target" data-parallax-trigger="body">
  </div>
  <div class="p-service-fv__content c-grid-inner">
    <div class="p-service-fv__figure">
      <picture>
        <source media="(max-width: 1023px)" srcset="<?php echo $img_path ?>service/figure_sp.webp">
        <source media="(min-width: 1024px)" srcset="<?php echo $img_path ?>service/figure.webp">
        <img src="<?php echo $img_path ?>service/figure.webp" alt="">
      </picture>
    </div>
    <div class="p-service-fv__detail">
      <p class="p-service-fv__txt">マーケティング領域では集客改善とアポイント獲得を、セールス領域では土地探し顧客の営業支援と初回プラン提案をデジタル化。</p>
      <p class="p-service-fv__txt">これにより建築・不動産業界の営業プロセス全体を効率化し、
        具体的な成果につなげていきます。</p>
    </div>
  </div>
</section>


<div class="c-content rev c-grid-outer" data-gap="5">
  <main class="p-service c-mainGrid">
    <section class="p-service-list c-section pt-none">
      <h2 class="c-ttl__h2 c-sp-section-separate">サービス一覧</h2>
      <ul class="p-service-list__main c-col col2">
        <li class="p-service-list__item c-col__item">
          <a href="/service/landi/" class="p-service-list__link c-linelink">
            <div class="p-service-list__img">
              <div class="img-ov">
                <img src="<?php echo $img_path ?>service/service_1.webp" alt="">
              </div>
              <div class="p-service-list__badge-list">
                <div class="p-service-list__badge">
                  <p class="p-service-list__badge--term">会員数</p>
                  <p class="p-service-list__badge--number">No.1</p>
                  <p class="p-service-list__badge--unit">人</p>
                </div>
                <div class="p-service-list__badge">
                  <p class="p-service-list__badge--term">満足度</p>
                  <p class="p-service-list__badge--number">500</p>
                  <p class="p-service-list__badge--unit">%</p>
                </div>
              </div>
            </div>
            <div class="p-service-list__heading">
              <h3 class="p-service-list__ttl"><span class="c-linelink__txt line2">ランディPRO</span></h3>
              <p class="p-service-list__lead">土地探しから商談管理まで、不動産営業をまるごとDX</p>
            </div>
            <p class="p-service-list__txt">ランディPROは、大手ハウスメーカーの100%が導入している「土地探し顧客の成約率を最大4倍」にする営業支援ツールです。
              土地探し顧客の土地探し・接客・追客を効率化し、さらに新規顧客集客、既存顧客の掘り起こしの課題までも解決！</p>
          </a>
          <ul class="p-service-list__child c-col col2">
            <li class="p-service-list__child--item c-col__item">
              <a href="/service/landi/use" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_1.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">主な機能と効果</span></h4>
              </a>
            </li>
            <li class="p-service-list__child--item c-col__item">
              <a href="/materials" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_2.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">資料ダウンロード</span></h4>
              </a>
            </li>
          </ul>
        </li>
        <li class="p-service-list__item c-col__item">
          <a href="" class="p-service-list__link c-linelink">
            <div class="p-service-list__img">
              <div class="img-ov">
                <img src="<?php echo $img_path ?>service/service_2.webp" alt="">
              </div>
            </div>
            <div class="p-service-list__heading">
              <h3 class="p-service-list__ttl"><span class="c-linelink__txt line2">タテテク</span></h3>
              <p class="p-service-list__lead">土地探しから商談管理まで、不動産営業をまるごとDX</p>
            </div>
            <p class="p-service-list__txt">ランディPROは、大手ハウスメーカーの100%が導入している「土地探し顧客の成約率を最大4倍」にする営業支援ツールです。
              土地探し顧客の土地探し・接客・追客を効率化し、さらに新規顧客集客、既存顧客の掘り起こしの課題までも解決！</p>
          </a>
          <ul class="p-service-list__child c-col col2">
            <li class="p-service-list__child--item c-col__item">
              <a href="" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_1.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">主な機能と効果</span></h4>
              </a>
            </li>
            <li class="p-service-list__child--item c-col__item">
              <a href="/materials" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_2.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">資料ダウンロード</span></h4>
              </a>
            </li>
          </ul>
        </li>
        <li class="p-service-list__item c-col__item">
          <a href="/service/yobikomu" class="p-service-list__link c-linelink">
            <div class="p-service-list__img">
              <div class="img-ov">
                <img src="<?php echo $img_path ?>service/service_3.webp" alt="">
              </div>
            </div>
            <div class="p-service-list__heading">
              <h3 class="p-service-list__ttl"><span class="c-linelink__txt line2">ヨビコム</span></h3>
              <p class="p-service-list__lead">土地探しから商談管理まで、不動産営業をまるごとDX</p>
            </div>
            <p class="p-service-list__txt">ランディPROは、大手ハウスメーカーの100%が導入している「土地探し顧客の成約率を最大4倍」にする営業支援ツールです。
              土地探し顧客の土地探し・接客・追客を効率化し、さらに新規顧客集客、既存顧客の掘り起こしの課題までも解決！</p>
          </a>
          <ul class="p-service-list__child c-col col2">
            <li class="p-service-list__child--item c-col__item">
              <a href="" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_1.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">主な機能と効果</span></h4>
              </a>
            </li>
            <li class="p-service-list__child--item c-col__item">
              <a href="/materials" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_2.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">資料ダウンロード</span></h4>
              </a>
            </li>
          </ul>
        </li>
        <li class="p-service-list__item c-col__item">
          <a href="" class="p-service-list__link c-linelink">
            <div class="p-service-list__img">
              <div class="img-ov">
                <img src="<?php echo $img_path ?>service/service_4.webp" alt="">
              </div>
            </div>
            <div class="p-service-list__heading">
              <h3 class="p-service-list__ttl"><span class="c-linelink__txt line2">フリーダムマーケティング</span></h3>
              <p class="p-service-list__lead">土地探しから商談管理まで、不動産営業をまるごとDX</p>
            </div>
            <p class="p-service-list__txt">ランディPROは、大手ハウスメーカーの100%が導入している「土地探し顧客の成約率を最大4倍」にする営業支援ツールです。
              土地探し顧客の土地探し・接客・追客を効率化し、さらに新規顧客集客、既存顧客の掘り起こしの課題までも解決！</p>
          </a>
          <ul class="p-service-list__child c-col col2">
            <li class="p-service-list__child--item c-col__item">
              <a href="" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_1.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">主な機能と効果</span></h4>
              </a>
            </li>
            <li class="p-service-list__child--item c-col__item">
              <a href="/materials" class="p-service-list__child--link c-linelink">
                <div class="img-ov">
                  <img src="<?php echo $img_path ?>service/service-child_2.webp" alt="">
                </div>
                <h4 class="p-service-list__child--ttl"><span class="c-linelink__txt">資料ダウンロード</span></h4>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </section>

    <section class="p-service-solution c-section">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">解決できる課題</h2>
        <?php get_template_part('/component/btn', null, [
            'url'   => '/casestudy',
            'label' => '解決できる課題一覧',
          ]);  ?>
      </div>
      <ul class="p-service-solution__list c-col col4">
        <li class="p-service-solution__item c-col__item">
          <h3 class="p-service-solution__ttl">土地探し顧客への<br>
            対応を効率化したい</h3>
          <img src="<?php echo $img_path ?>service/solution_icon_1.webp" alt="" class="p-service-solution__icon">
          <ul class="p-service-solution__detail">
            <li class="p-service-solution__detail--item">- 土地情報の収集・管理に時間がかかる</li>
            <li class="p-service-solution__detail--item">- 顧客の希望条件に合う土地が見つけづらい</li>
            <li class="p-service-solution__detail--item">- 土地なし客からの成約率が低い</li>
          </ul>
        </li>
        <li class="p-service-solution__item c-col__item">
          <h3 class="p-service-solution__ttl">プラン作成の<br>
            工数を削減したい</h3>
          <img src="<?php echo $img_path ?>service/solution_icon_1.webp" alt="" class="p-service-solution__icon">
          <ul class="p-service-solution__detail">
            <li class="p-service-solution__detail--item">- 土地情報の収集・管理に時間がかかる</li>
            <li class="p-service-solution__detail--item">- 顧客の希望条件に合う土地が見つけづらい</li>
            <li class="p-service-solution__detail--item">- 土地なし客からの成約率が低い</li>
          </ul>
        </li>
        <li class="p-service-solution__item c-col__item">
          <h3 class="p-service-solution__ttl">集客力を<br>
            高めたい</h3>
          <img src="<?php echo $img_path ?>service/solution_icon_1.webp" alt="" class="p-service-solution__icon">
          <ul class="p-service-solution__detail">
            <li class="p-service-solution__detail--item">- 土地情報の収集・管理に時間がかかる</li>
            <li class="p-service-solution__detail--item">- 顧客の希望条件に合う土地が見つけづらい</li>
            <li class="p-service-solution__detail--item">- 土地なし客からの成約率が低い</li>
          </ul>
        </li>
        <li class="p-service-solution__item c-col__item">
          <h3 class="p-service-solution__ttl">土地探し顧客への<br>
            対応を効率化したい</h3>
          <img src="<?php echo $img_path ?>service/solution_icon_1.webp" alt="" class="p-service-solution__icon">
          <ul class="p-service-solution__detail">
            <li class="p-service-solution__detail--item">- 土地情報の収集・管理に時間がかかる</li>
            <li class="p-service-solution__detail--item">- 顧客の希望条件に合う土地が見つけづらい</li>
            <li class="p-service-solution__detail--item">- 土地なし客からの成約率が低い</li>
          </ul>
        </li>
      </ul>
    </section>

    <section class="c-section p-service-feature">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 sp-hidden">なぜFREEDOM Xが選ばれるのか</h2>
        <h2 class="pc-hidden c-ttl__h2 c-sp-section-separate">選ばれる理由</h2>
        <?php get_template_part('/component/btn', null, [
            'url'   => '/feature',
            'label' => 'フリーダムXの特徴を見る',
          ]);  ?>
      </div>
      <ul class="p-service-feature__list">
        <li class="p-service-feature__item">
          <div class="p-service-feature__detail">
            <h3 class="p-service-feature__ttl">業界最大級の導入実績</h3>
            <p class="p-service-feature__txt">全国500社、12万人以上が利用する実績。
              大手ハウスメーカーから地域密着の工務店まで、幅広い企業でご活用いただいています。</p>
          </div>
          <div class="p-service-feature__visual">
            <img src="<?php echo $img_path ?>service/feature_1.webp" alt="" class="p-service-feature__img">
          </div>
        </li>
        <li class="p-service-feature__item">
          <div class="p-service-feature__detail">
            <h3 class="p-service-feature__ttl">専門性の高いサポート</h3>
            <p class="p-service-feature__txt">建築・不動産業界での実務経験を持つスタッフが、導入前の課題整理から、導入後の活用支援まで一貫してフォロー。</p>
          </div>
          <div class="p-service-feature__visual">
            <img src="<?php echo $img_path ?>service/feature_2.webp" alt="" class="p-service-feature__img">
          </div>
        </li>
        <li class="p-service-feature__item">
          <div class="p-service-feature__detail">
            <h3 class="p-service-feature__ttl">全国8拠点のサポート体制</h3>
            <p class="p-service-feature__txt">全国500社、12万人以上が利用する実績。
              大手ハウスメーカーから地域密着の工務店まで、幅広い企業でご活用いただいています。</p>
          </div>
          <div class="p-service-feature__visual">
            <img src="<?php echo $img_path ?>service/feature_3.webp" alt="" class="p-service-feature__img">
          </div>
        </li>
      </ul>
    </section>

  </main>
  <?php get_template_part('./component/service-side-nav')  ?>
</div>


<?php get_footer(); ?>