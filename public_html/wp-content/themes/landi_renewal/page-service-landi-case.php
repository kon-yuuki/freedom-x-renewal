<?php
/*
Template Name:ランディ活用方法と効果
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

<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">特徴
      </span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <h1 class="l-fv__heading--main">ランディＰＲＯの機能と効果</h1>
  </hgroup>
  <p class="l-fv__lead tint">ランディPROは、注文住宅営業の接客・追客を支援する営業DXツールです。<br>
    土地探し・追客・資金シミュレーション・顧客ID発行など、成約率を高める機能を多数搭載。土地探し顧客を土地探しからサポートが可能で成約率を最大4倍に実現できます。
  </p>
  <div class="l-fv__kv">
    <picture class="l-fv__image">
      <source srcset="<?php echo $img_path; ?>service/landi/kv.avif" type="image/avif">
      <source srcset="<?php echo $img_path; ?>service/landi/kv.webp" type="image/webp">
      <img src="<?php echo $img_path; ?>service/landi/kv.webp" alt="" width="" height="">
    </picture>
  </div>
</div>

<main class="p-case">
  <div class="c-grid-inner">
    <nav class="c-anchor">
      <ul class="c-anchor__list">
        <li class="c-anchor__item">
          <a href="#strength" class="c-linelink c-anchor__link">
            <span class="c-linelink__txt">3つの強み</span>
            <span class="c-anchor__icon">
              <svg class="c-anchor__arw">
                <use href="#i-arw-down"></use>
              </svg>
            </span>
          </a>
        </li>
        <li class="c-anchor__item">
          <a href="#solution" class="c-linelink c-anchor__link">
            <span class="c-linelink__txt">課題解決力</span>
            <span class="c-anchor__icon">
              <svg class="c-anchor__arw">
                <use href="#i-arw-down"></use>
              </svg>
            </span>
          </a>
        </li>
        <li class="c-anchor__item">
          <a href="#group" class="c-linelink c-anchor__link">
            <span class="c-linelink__txt">グループについて</span>
            <span class="c-anchor__icon">
              <svg class="c-anchor__arw">
                <use href="#i-arw-down"></use>
              </svg>
            </span>
          </a>
        </li>
        <li class="c-anchor__item">
          <a href="#casestudy" class="c-linelink c-anchor__link">
            <span class="c-linelink__txt">事例紹介</span>
            <span class="c-anchor__icon">
              <svg class="c-anchor__arw">
                <use href="#i-arw-down"></use>
              </svg>
            </span>
          </a>
        </li>
        <li class="c-anchor__item">
          <a href="#material" class="c-linelink c-anchor__link">
            <span class="c-linelink__txt">お役立ち資料</span>
            <span class="c-anchor__icon">
              <svg class="c-anchor__arw">
                <use href="#i-arw-down"></use>
              </svg>
            </span>
          </a>
        </li>
        <li class="c-anchor__item">
          <a href="#service" class="c-linelink c-anchor__link">
            <span class="c-linelink__txt">サービス紹介</span>
            <span class="c-anchor__icon">
              <svg class="c-anchor__arw">
                <use href="#i-arw-down"></use>
              </svg>
            </span>
          </a>
        </li>
      </ul>
    </nav>

    <section class="c-section p-case__function">
      <h2 class="c-ttl__h2">5つの土地探し機能</h2>
      <div class="c-col col2 p-case__function--col">
        <div class="c-col__item">
          <picture class="p-case__function-image">
            <source srcset="<?php echo $img_path; ?>service/landi/find01-kv.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/find01-kv.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/find01-kv.webp" alt="" width="" height="" loading="lazy">
          </picture>
        </div>
        <div class="c-col__item">
          <ul class="p-case__function-list">
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_01.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_01.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find01_01.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">重複物件の統合、名寄せを自動化し、
                  土地探しの煩わしさを排除。</p>
                <div class="p-case__function-badge">特許<br>取得済</div>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_02.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_02.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find01_02.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
                <div class="p-case__function-badge">特許<br>取得済</div>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_03.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_03.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find01_03.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_04.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_04.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find01_04.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_05.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find01_05.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find01_05.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="c-section p-case__function">
      <h2 class="c-ttl__h2">5つの土地探し機能</h2>
      <div class="c-col col2 rev p-case__function--col">
        <div class="c-col__item">
          <picture class="p-case__function-image">
            <source srcset="<?php echo $img_path; ?>service/landi/find02-kv.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/find02-kv.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/find02-kv.webp" alt="" width="" height="" loading="lazy">
          </picture>
        </div>
        <div class="c-col__item">
          <ul class="p-case__function-list">
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text"><strong>非公開物件も含めた全土地情報を集約</strong>し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_01.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_01.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find02_01.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_02.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_02.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find02_02.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_03.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_03.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find02_03.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_04.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_04.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find02_04.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
            <li class="p-case__function-item">
              <div class="p-case__function-content">
                <p class="p-case__function-text">非公開物件も含めた全土地情報を集約し、
                  営業と顧客の双方で土地探しツールの一元化が可能。</p>
              </div>
              <picture class="p-case__function-icon">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_05.avif" type="image/avif">
                <source srcset="<?php echo $img_path; ?>service/landi/find02_05.webp" type="image/webp">
                <img src="<?php echo $img_path; ?>service/landi/find02_05.webp" alt="" width="" height=""
                  loading="lazy">
              </picture>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="c-section p-case__id">
      <h2 class="c-ttl__h2">顧客専用アカウント「顧客ID」</h2>
      <p class="c-txt">来場されたお客さまに専用の顧客IDとランディアカウントを発行。
        パーソナライズされた土地探し環境を提供することで、お客さまの満足度と信頼関係が向上し、成約率の大幅アップを実現します。</p>
      <picture class="p-case__id-hero  c-image border">
        <source srcset="<?php echo $img_path; ?>service/landi/id.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/landi/id.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/landi/id.webp" alt="" width="" height="" loading="lazy">
      </picture>
      <h3 class="p-case__id-heading">顧客IDのメリット01</h3>
      <p class="p-case__id-copy"><strong>顧客自身が自宅でも土地探しができる</strong>から<br>顧客流出を防ぎ、候補地確定スピード、成約率が上がる</p>
      <picture class="p-case__id-image">
        <source srcset="<?php echo $img_path; ?>service/landi/merit01.avif" type="image/avif">
        <source srcset="<?php echo $img_path; ?>service/landi/merit01.webp" type="image/webp">
        <img src="<?php echo $img_path; ?>service/landi/merit01.webp" alt="" width="" height="" loading="lazy">
      </picture>
      <p class="p-case__id-strong">顧客が自宅でも簡単に土地探しできるから候補地がすぐ見つかり、成約率が上がる
      </p>
      <h3 class="p-case__id-heading">顧客IDのメリット02</h3>
      <p class="p-case__id-copy"><strong>顧客の検索動向が可視化</strong>され、<br>最適な追客アプローチが可能になる</p>
      <p class="c-txt u-align-center">ランディPROの追客機能を利用して、お客様の土地探しの動向を確認しつつ、<br>適切なタイミングで電話やメールのアプローチができます。</p>
      <div class="c-col c-col--2">
        <div class="c-col__item">
          <picture class="p-case__id-merit">
            <source srcset="<?php echo $img_path; ?>service/landi/merit2_01.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/merit2_01.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/merit2_01.webp" alt="" width="" height="" loading="lazy">
          </picture>
          <p class="p-case__id-text">気になる土地を見つけたお客様から連絡が届く！</p>
        </div>
        <div class="c-col__item">
          <picture class="p-case__id-merit">
            <source srcset="<?php echo $img_path; ?>service/landi/merit2_02.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/merit2_02.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/merit2_02.webp" alt="" width="" height="" loading="lazy">
          </picture>
          <p class="p-case__id-text">追客機能で要望をより詳しく知ることが可能！</p>
        </div>
      </div>
    </section>

    <section class="c-section p-case__simulation">
      <h2 class="c-ttl__h2">資金シュミレーション機能</h2>
      <p class="c-txt">
        資金シミュレーション機能により、建物予算を確保した上で「土地に使える予算」を明確に算出・表示します。総予算が明確になることで、お客さまは予算範囲内の物件に絞って効率的に検討を進められるため、候補地選定のスピードが大幅に向上。無駄な時間を削減しながら、現実的で満足度の高い土地探しを実現できます。<br>接客中に資金計画シミュレーションを活用しながら、土地探しを進めていきます。
      </p>
      <div class="c-col col3">
        <div class="c-col__item">
          <picture class="p-case__simulation-image">
            <source srcset="<?php echo $img_path; ?>service/landi/simulation_01.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/simulation_01.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/simulation_01.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
          <p class="p-case__simulation-text">建物と土地の予算バランスを算定できる</p>
        </div>
        <div class="c-col__item">
          <picture class="p-case__simulation-image">
            <source srcset="<?php echo $img_path; ?>service/landi/simulation_02.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/simulation_02.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/simulation_02.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
          <p class="p-case__simulation-text">条件に合う土地を瞬時に表示できる</p>
        </div>
        <div class="c-col__item">
          <picture class="p-case__simulation-image">
            <source srcset="<?php echo $img_path; ?>service/landi/simulation_03.avif" type="image/avif">
            <source srcset="<?php echo $img_path; ?>service/landi/simulation_03.webp" type="image/webp">
            <img src="<?php echo $img_path; ?>service/landi/simulation_03.webp" alt="" width="" height=""
              loading="lazy">
          </picture>
          <p class="p-case__simulation-text">概算費用も一目瞭然で確認できる</p>
        </div>
      </div>
    </section>


  </div>



</main>


<?php get_footer(); ?>