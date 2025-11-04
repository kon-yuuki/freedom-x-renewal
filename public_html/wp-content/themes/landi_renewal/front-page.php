<?php
global $util;
$pageinfo = array(
  'page_id' => 'home',
  'navigation' => 'top renewal is-lenis-active',
  'title' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';
?>

<section class="p-top-fv">
  <div class="p-top-fv__copies">
    <div class="copy big en-bold">REAL</div>
    <div class="copy big en-bold">ESTATE</div>
    <div class="copy big en-bold js-circle-base"><span class="c-txt-gradation">DX</span></div>
    <p class="copy small en sp-hidden">FREEDOM X aims to revolutionize intellectual productivity in architecture and
      real
      estate<br>through technology and knowledge.</p>

    <p class="copy medium">土地探しから<br class="pc-hidden">建築プランまで<br>
      <strong class="c-blue">営業支援DX</strong>ツールで<br>
      成約率を最大<strong class="c-blue">4倍</strong>に
    </p>
  </div>
  <div class="p-top-fv__content">
    <p class="p-top-fv__content--txt sp-hidden">
      私たちは建築・不動産業界のプロの知恵を<br>
      <strong class="c-blue">データとテクノロジーの力</strong>ですべての現場へ届ける企業です<br>
      業務効率化から成約率向上まで、<strong class="c-blue">知的生産性の革命</strong>を実現します
    </p>
    <div class="p-top-fv__content--btns">
      <?php get_template_part('/component/btn', null, [
        'url'   => '/',
        'label' => '無料で資料請求<span class="sp-hidden">をする</span>',
      ]);  ?>
      <?php get_template_part('/component/btn', null, [
        'url'   => '/',
        'label' => '<span class="sp-hidden">DXについて</span>相談してみる',
        'class' => 'bg-blue'
      ]);  ?>
    </div>
  </div>
  <div class="p-top-fv__numbers">
    <div class="p-top-fv__number">
      <div class="p-top-fv__number--inner">
        <div class="p-top-fv__number--circle" aria-hidden="true"></div>
        <p class="p-top-fv__number--txt">土地データ</p>
        <p class="p-top-fv__number--num">No.1</p>
        <p class="p-top-fv__number--txt">の所持数</p>
      </div>
    </div>
    <div class="p-top-fv__number">
      <div class="p-top-fv__number--inner">
        <div class="p-top-fv__number--circle" aria-hidden="true"></div>
        <p class="p-top-fv__number--txt">導入企業</p>
        <p class="p-top-fv__number--num">500</p>
        <p class="p-top-fv__number--txt">社以上</p>
      </div>
    </div>
    <div class="p-top-fv__visual">
      <img src="/assets/images/top/fv.webp" alt="">
    </div>
  </div>
  <div class="p-fv-visual-wrapper">
    <div class="p-fv-visual js-fv-visual">
      <video autoplay muted loop playsinline fetchpriority="high" width="500" height="500">
        <source src="<?php echo $img_path ?>/video/top_fv.webm" type="video/webm" />
      </video>
    </div>

  </div>
  <span class="p-fv-line__1 js-line"></span>
  <span class="p-fv-line__2 js-line"></span>
  <span class="p-fv-line__3 js-line"></span>
</section>


<main>
  <!-- <div class="p-fv-visual js-fv-visual2 sp-hidden">
    <video autoplay muted loop playsinline fetchpriority="high" width="500" height="500">
      <source src="<?php echo $img_path ?>/video/top_fv.webm" type="video/webm" />
    </video>
  </div> -->
  <div class="service-section bg-change">
    <div class="p-fv-visual js-fv-visual2 sp-hidden">
      <video autoplay muted loop playsinline fetchpriority="high" width="500" height="500">
        <source src="<?php echo $img_path ?>/video/top_fv.webm" type="video/webm" />
      </video>
    </div>
    <section class="p-top-feature">
      <div class="p-top-feature__inner">
        <div class="p-top-feature__heading">
          <div class="p-top-feature__heading--inner">
            <hgroup class="p-top-heading">
              <p class="p-top-heading__sub">Features</p>
              <h2 class="p-top-heading__main">私たちの特徴</h2>
            </hgroup>
            <p class="p-top-feature__lead">
              建築・不動産の営業現場を、テクノロジーの力でサポート。<br>ベテラン営業マンの知識と経験をシステム化し、土地探しから建築プランまで、誰もが高い成果を出せる仕組みを提供します。</p>
            <?php get_template_part('/component/btn', null, [
              'url'   => '/contact/',
              'label' => 'フリーダムXの特徴を見る',
            ]);  ?>
          </div>
        </div>
        <div class="p-top-feature__main">
          <ul class="p-top-feature__list">
            <li class="p-top-feature__item">
              <a href="" class="p-top-feature__link c-linelink">
                <h3 class="p-top-feature__item--ttl"><strong class="c-blue">業界No.1の</strong><br>
                  土地データベース</h3>
                <p class="p-top-feature__item--txt">業界最大級の土地情報を集約。<br>AI技術で最適な土地の提案と<br>顧客管理を自動化し、業務効率を向上。</p>
                <span class="p-top-feature__btn">
                  <span class="p-top-feature__btn--txt c-linelink__txt">提供サービス「ランディ」</span><span
                    class="p-top-feature__btn--icon"><svg class="p-top-feature__btn--svg">
                      <use href="#i-arw-r__2"></use>
                    </svg></span>
                </span>
              </a>
            </li>
            <li class="p-top-feature__item">
              <a href="" class="p-top-feature__link c-linelink">
                <h3 class="p-top-feature__item--ttl">AIプラン作成<br><strong class="c-blue">提案工数50%減</strong></h3>
                <p class="p-top-feature__item--txt">顧客の要望と敷地条件から、建築可能なプランを自動生成。提案工数を大幅に削減し、商談をスピーディに。</p>
                <span class="p-top-feature__btn">
                  <span class="p-top-feature__btn--txt c-linelink__txt">提供サービス「タテテク」</span><span
                    class="p-top-feature__btn--icon"><svg class="p-top-feature__btn--svg">
                      <use href="#i-arw-r__2"></use>
                    </svg></span>
                </span>
              </a>
            </li>
            <li class="p-top-feature__item">
              <a href="" class="p-top-feature__link c-linelink">
                <h3 class="p-top-feature__item--ttl"><strong class="c-blue">12万人</strong>が選ぶ<br>
                  営業支援システム</h3>
                <p class="p-top-feature__item--txt">土地探しから建築提案まで、
                  営業活動に必要な機能を一元化。
                  契約率4倍を実現する使いやすさ。</p>
                <span class="p-top-feature__btn">
                  <span class="p-top-feature__btn--txt c-linelink__txt">サービス紹介を見る</span><span
                    class="p-top-feature__btn--icon"><svg class="p-top-feature__btn--svg">
                      <use href="#i-arw-r__2"></use>
                    </svg></span>
                </span>
              </a>
            </li>
            <li class="p-top-feature__item">
              <a href="" class="p-top-feature__link c-linelink">
                <h3 class="p-top-feature__item--ttl"><strong class="c-blue">500社が導入</strong>する<br>
                  充実サポート
                </h3>
                <p class="p-top-feature__item--txt">大手企業導入の実績に基づく、
                  業界知識豊富な専門スタッフによる支援。
                  全国8拠点できめ細かくフォロー。</p>
                <span class="p-top-feature__btn">
                  <span class="p-top-feature__btn--txt c-linelink__txt">特徴を見る</span><span
                    class="p-top-feature__btn--icon"><svg class="p-top-feature__btn--svg">
                      <use href="#i-arw-r__2"></use>
                    </svg></span>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <span class="p-top-feature-line__1 pc-hidden"></span>
    </section>

    <section class="p-top-service js-bg-to-blue-trigger" data-target="service-section" data-start="top center">
      <div class="c-grid-outer">
        <hgroup class="p-top-heading">
          <p class="p-top-heading__sub">Service</p>
          <h2 class="p-top-heading__main">サービス紹介</h2>
          <?php get_template_part('/component/btn', null, [
            'url'   => '/contact/',
            'label' => 'サービス一覧を見る',
            'class' => 'sp-hidden'
          ]);  ?>
        </hgroup>
        <p class="p-top-service__lead">
          建築・不動産領域のDXに特化したサービスを、ハウスメーカー、工務店、設計事務所に提供しています。<br
            class="sp-hidden">主要都市に8つの営業拠点を配し、お客様の営業課題を解決すべく、導入サポートのみならず、導入後の研修や活用フォローをいたします。
        </p>
        <?php get_template_part('/component/btn', null, [
            'url'   => '/contact/',
            'label' => 'サービス一覧を見る',
            'class' => 'pc-hidden'
          ]);  ?>
        <div class="p-top-service__main">
          <ul class="p-top-service__list">
            <li class="p-top-service__item">
              <div class="p-top-service__item--top">
                <div class="p-top-service__item--heading">
                  <p class="p-top-service__item--lead">土地探しから商談管理まで、不動産営業をまるごとDX</p>
                  <h3 class="p-top-service__item--ttl"><a href="" class="c-linelink"><span
                        class="c-linelink__txt">ランディPRO</span></a>
                  </h3>
                  <?php get_template_part('/component/btn', null, [
                  'url'   => '/contact/',
                  'label' => 'ランディPROサービスページへ',
                  'class' => 'pc-hidden'
                ]);  ?>
                  <div class="p-top-service__image pc-hidden">
                    <img src="<?php echo $img_path ?>top/service_landi.webp" alt="">
                  </div>
                </div>
                <div class="p-top-service__item--numbers">
                  <div class="p-top-service__item--number">
                    <div class="p-top-service__item--number--txt">土地データ</div>
                    <div class="p-top-service__item--number--num">No.1</div>
                    <div class="p-top-service__item--number--txt">の所持数</div>
                  </div>
                  <div class="p-top-service__item--number">
                    <div class="p-top-service__item--number--txt">導入企業</div>
                    <div class="p-top-service__item--number--num">500</div>
                    <div class="p-top-service__item--number--txt">社以上</div>
                  </div>
                </div>
              </div>
              <div class="p-top-service__item--bottom">
                <?php get_template_part('/component/btn', null, [
                  'url'   => '/contact/',
                  'label' => 'ランディPROサービスページへ',
                  'class' => 'sp-hidden'
                ]);  ?>
                <p class="p-top-service__item--txt">
                  ランディPROは、大手ハウスメーカーの100%が導入している「土地探し顧客の成約率を最大4倍」にする営業支援ツールです。土地探し顧客の土地探し・接客・追客を効率化し、さらに新規顧客集客、既存顧客の掘り起こしの課題までも解決！
                </p>
              </div>
            </li>
            <li class="p-top-service__item">
              <div class="p-top-service__item--top">
                <div class="p-top-service__item--heading">
                  <p class="p-top-service__item--lead">AIが即座に最適な建築プランを提案</p>
                  <h3 class="p-top-service__item--ttl"><a href="" class="c-linelink"><span
                        class="c-linelink__txt">タテテク</span></a>
                  </h3>
                  <?php get_template_part('/component/btn', null, [
                  'url'   => '/contact/',
                  'label' => 'タテテクサービスページへ',
                  'class' => 'pc-hidden'
                ]);  ?>
                  <div class="p-top-service__image pc-hidden">
                    <img src="<?php echo $img_path ?>top/service_tateteku.webp" alt="">
                  </div>
                </div>
                <div class="p-top-service__item--numbers">
                  <div class="p-top-service__item--number">
                    <div class="p-top-service__item--number--txt">土地データ</div>
                    <div class="p-top-service__item--number--num">No.1</div>
                    <div class="p-top-service__item--number--txt">の所持数</div>
                  </div>
                  <div class="p-top-service__item--number">
                    <div class="p-top-service__item--number--txt">導入企業</div>
                    <div class="p-top-service__item--number--num">500</div>
                    <div class="p-top-service__item--number--txt">社以上</div>
                  </div>
                </div>
              </div>
              <div class="p-top-service__item--bottom">
                <?php get_template_part('/component/btn', null, [
                  'url'   => '/contact/',
                  'label' => 'タテテクサービスページへ',
                  'class' => 'sp-hidden'
                ]);  ?>
                <p class="p-top-service__item--txt">
                  わずか30秒で、地型にぴったりなプランを生成！
                  プラン作成時のヒアリング精度を高めるとともに、簡易プランを何度でも描き直してブラッシュアップすることで、本プランを作成する際にお客様の価値観や好みにぴったり合ったプランを実現することができます。
                </p>
              </div>
            </li>
            <li class="p-top-service__item">
              <div class="p-top-service__item--top">
                <div class="p-top-service__item--heading">
                  <p class="p-top-service__item--lead">ダミーテキストダミーテキスト</p>
                  <h3 class="p-top-service__item--ttl"><a href="" class="c-linelink"><span
                        class="c-linelink__txt">ヨビコム</span></a>
                  </h3>
                  <?php get_template_part('/component/btn', null, [
                  'url'   => '/contact/',
                  'label' => 'ヨビコムサービスページへ',
                  'class' => 'pc-hidden'
                ]);  ?>
                  <div class="p-top-service__image pc-hidden">
                    <img src="<?php echo $img_path ?>top/service_yobikomu.webp" alt="">
                  </div>
                </div>
                <div class="p-top-service__item--numbers">
                  <div class="p-top-service__item--number">
                    <div class="p-top-service__item--number--txt">土地データ</div>
                    <div class="p-top-service__item--number--num">No.1</div>
                    <div class="p-top-service__item--number--txt">の所持数</div>
                  </div>
                  <div class="p-top-service__item--number">
                    <div class="p-top-service__item--number--txt">導入企業</div>
                    <div class="p-top-service__item--number--num">500</div>
                    <div class="p-top-service__item--number--txt">社以上</div>
                  </div>
                </div>
              </div>
              <div class="p-top-service__item--bottom">
                <?php get_template_part('/component/btn', null, [
                  'url'   => '/contact/',
                  'label' => 'ヨビコムサービスページへ',
                  'class' => 'sp-hidden'
                ]);  ?>
                <p class="p-top-service__item--txt">
                  ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキスト
                </p>
              </div>
            </li>
          </ul>
          <div class="p-top-service__visual sp-hidden">
            <div class="p-top-service__visual--inner">
              <div class="p-top-service__visual--item">
                <img src="<?php echo $img_path ?>top/service_landi.webp" alt="">
              </div>
              <div class="p-top-service__visual--item">
                <img src="<?php echo $img_path ?>top/service_tateteku.webp" alt="">
              </div>
              <div class="p-top-service__visual--item">
                <img src="<?php echo $img_path ?>top/service_yobikomu.webp" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <section class="p-top-client">
    <div class="c-grid-outer">
      <div class="p-top-heading__sub">cliant</div>
      <div class="p-top-client__content">
        <div class="p-top-client__heading">
          <h2 class="p-top-heading__main">導入企業</h2>
          <p class="p-top-client__lead">不動産業界をリードするトップ企業から、
            地域に根ざした工務店まで。
            私たちの不動産DXソリューションは、
            <strong class="c-blue">全国500社、12万人以上の現場</strong>で選ばれています。
          </p>
          <?php get_template_part('/component/btn', null, [
            'url'   => '/',
            'label' => '導入企業を詳しく知る',
          ]);  ?>
        </div>
        <div class="p-top-client__main">
          <ul class="p-top-client__list">
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
            <li class="p-top-client__item"><img src="<?php echo $img_path ?>/top/client_1.webp" alt="">
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="p-top-casestudy">
    <div class="c-grid-outer">
      <hgroup class="p-top-heading">
        <p class="p-top-heading__sub">Case Study</p>
        <h2 class="p-top-heading__main">解決してきた課題</h2>
        <?php get_template_part('/component/btn', null, [
          'url'   => '/',
          'label' => '解決してきた課題一覧',
        ]);  ?>
      </hgroup>
      <nav class="p-top-casestudy__nav">
        <div class="p-top-casestudy__nav--inner js-scrollable is-scrollStart u-scrollBar-hidden">
          <ul class="p-top-casestudy__cat-list">
            <li class="p-top-casestudy__cat-item is-current">
              <a href="<?php echo get_post_type_archive_link('case_study'); ?>"
                class="p-top-casestudy__cat-link">すべて</a>
            </li>
            <?php
    $terms = get_terms(array(
        'taxonomy' => 'taxonomy_case_study',
        'hide_empty' => true,
    ));
    
    if (!empty($terms) && !is_wp_error($terms)) :
        foreach ($terms as $term) :
    ?>
            <li class="p-top-casestudy__cat-item">
              <a href="<?php echo get_term_link($term); ?>" class="p-top-casestudy__cat-link">
                <?php echo esc_html($term->name); ?>
              </a>
            </li>
            <?php
        endforeach;
    endif;
    ?>
          </ul>
        </div>
      </nav>
      <div class="p-top-casestudy__main">
        <div class="p-top-casestudy__pickup">
          <div class="splide js-topCasestudySlider" role="group" aria-label="解決してきた課題ピックアップ">
            <div class="splide__track">
              <ul class="splide__list">
                <?php 
                  $pickup_casestudy = get_field('pickup_casestudy', 'options');
                  if ($pickup_casestudy): 
                  ?>
                <?php foreach ($pickup_casestudy as $item): ?>
                <?php 
            $case_study_item = $item['case_study_item'];
            if ($case_study_item):
              $post_id = $case_study_item->ID;
              $title = get_the_title($post_id);
              $permalink = get_permalink($post_id);
              $thumbnail = get_the_post_thumbnail($post_id, 'full');
              
              // 企業名を取得
              $case_company = get_field('case_company', $post_id);
              
              // taxonomy_case_studyタクソノミーを取得（最初の一つのみ）
              $case_categories = get_the_terms($post_id, 'taxonomy_case_study');
              $first_category = ($case_categories && !is_wp_error($case_categories)) ? $case_categories[0] : null;
              
              // casestudy_tagタクソノミーを取得（全て）
              $casestudy_tags = get_the_terms($post_id, 'casestudy_tag');
            ?>
                <li class="splide__slide c-card c-linelink">
                  <a href="<?php echo esc_url($permalink); ?>" class="c-card-mainLink">
                    <span class="u-visually-hidden"><?php echo esc_html($title); ?></span>
                  </a>
                  <div class="c-card-body">
                    <div class="img-ov">
                      <?php if ($thumbnail): ?>
                      <?php echo $thumbnail; ?>
                      <?php else: ?>
                      <img src="<?php echo $img_path ?>top/casestudy_thumb.webp" alt="">
                      <?php endif; ?>
                    </div>
                    <div class="p-top-casestudy__pickup--detail">
                      <div class="p-top-casestudy__pickup--aside">
                        <?php if ($case_company): ?>
                        <span class="p-top-casestudy__client"><?php echo esc_html($case_company); ?></span>
                        <?php endif; ?>

                        <?php if ($first_category): ?>
                        <div class="sp-hidden">
                          <ul class="c-cat-list">
                            <li class="c-cat-list__item">
                              <a href="<?php echo get_term_link($first_category); ?>"
                                class="c-cat-list__link c-card-innerLink">
                                <?php echo esc_html($first_category->name); ?>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <?php endif; ?>

                        <?php if ($casestudy_tags && !is_wp_error($casestudy_tags)): ?>
                        <div class="sp-hidden">
                          <ul class="c-tag-list white">
                            <?php foreach ($casestudy_tags as $tag): ?>
                            <li class="c-tag-list__item">
                              <a href="<?php echo get_term_link($tag); ?>"
                                class="c-tag-list__link c-card-innerLink c-linelink--hidden">
                                <span class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span>
                              </a>
                            </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                        <?php endif; ?>
                      </div>

                      <h3 class="p-top-casestudy__ttl">
                        <span class="c-linelink__txt bottom-5"><?php echo esc_html($title); ?></span>
                      </h3>

                      <?php if ($first_category): ?>
                      <div class="pc-hidden">
                        <ul class="c-cat-list">
                          <li class="c-cat-list__item">
                            <a href="<?php echo get_term_link($first_category); ?>"
                              class="c-cat-list__link c-card-innerLink">
                              <?php echo esc_html($first_category->name); ?>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <?php endif; ?>

                      <?php if ($casestudy_tags && !is_wp_error($casestudy_tags)): ?>
                      <div class="pc-hidden">
                        <ul class="c-tag-list">
                          <?php foreach ($casestudy_tags as $tag): ?>
                          <li class="c-tag-list__item">
                            <a href="<?php echo get_term_link($tag); ?>"
                              class="c-tag-list__link c-card-innerLink c-linelink--hidden">
                              <span class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span>
                            </a>
                          </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>
            <div class="c-slider__control sp-hidden">
              <?php get_template_part('./component/slider-arw'); ?>
              <ul class="splide__pagination"></ul>
            </div>
          </div>
        </div>
        <div class="p-top-casestudy__latest">
          <ul class="p-top-casestudy__latest--list c-col col2">
            <?php
    $args = array(
      'post_type' => 'case_study',
      'posts_per_page' => 6,
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $case_studies = new WP_Query($args);
    
    if ($case_studies->have_posts()):
      while ($case_studies->have_posts()): $case_studies->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();
        $permalink = get_the_permalink();
        $thumbnail = get_the_post_thumbnail($post_id, 'full');
        
        // 企業名を取得
        $case_company = get_field('case_company', $post_id);
        
        // taxonomy_case_studyタクソノミーを取得（最初の一つのみ）
        $case_categories = get_the_terms($post_id, 'taxonomy_case_study');
        $first_category = ($case_categories && !is_wp_error($case_categories)) ? $case_categories[0] : null;
        
        // casestudy_tagタクソノミーを取得（全て）
        $casestudy_tags = get_the_terms($post_id, 'casestudy_tag');
    ?>
            <li class="p-top-casestudy__latest--item c-col__item">
              <div class="p-top-casestudy__latest--inner c-card c-linelink">
                <a href="<?php echo esc_url($permalink); ?>" class="c-card-mainLink">
                  <span class="u-visually-hidden"><?php echo esc_html($title); ?></span>
                </a>
                <div class="c-card-body">
                  <div class="p-top-casestudy__latest--item--inner">
                    <?php if ($case_company): ?>
                    <span class="p-top-casestudy__client"><?php echo esc_html($case_company); ?></span>
                    <?php endif; ?>

                    <h3 class="p-top-casestudy__ttl">
                      <span class="c-linelink__txt bottom-5"><?php echo esc_html($title); ?></span>
                    </h3>

                    <?php if ($first_category): ?>
                    <ul class="c-cat-list">
                      <li class="c-cat-list__item">
                        <a href="<?php echo get_term_link($first_category); ?>"
                          class="c-cat-list__link c-card-innerLink">
                          <?php echo esc_html($first_category->name); ?>
                        </a>
                      </li>
                    </ul>
                    <?php endif; ?>

                    <?php if ($casestudy_tags && !is_wp_error($casestudy_tags)): ?>
                    <ul class="c-tag-list">
                      <?php foreach ($casestudy_tags as $tag): ?>
                      <li class="c-tag-list__item">
                        <a href="<?php echo get_term_link($tag); ?>"
                          class="c-tag-list__link c-card-innerLink c-linelink--hidden">
                          <span class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span>
                        </a>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                  </div>

                  <div class="img-ov">
                    <?php if ($thumbnail): ?>
                    <?php echo $thumbnail; ?>
                    <?php else: ?>
                    <img src="<?php echo $img_path ?>top/casestudy_thumb.webp" alt="">
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </li>
            <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
          </ul>

          <?php get_template_part('/component/btn', null, [
    'url'   => get_post_type_archive_link('case_study'),
    'label' => '一覧を見る',
    'class' => 'full-width sp-big',
  ]); ?>
        </div>
      </div>
    </div>
  </section>
  <div class="bg-change c-bg-white">
    <section class="p-top-news js-stalker-area">
      <div class="c-grid-outer">
        <hgroup class="p-top-heading">
          <p class="p-top-heading__sub">News</p>
          <h2 class="p-top-heading__main">フリーダムXからお知らせ</h2>
          <?php get_template_part('/component/btn', null, [
            'url'   => '/',
            'label' => 'お知らせ一覧を見る',
          ]);  ?>
        </hgroup>
        <?php 
          $pickup_news = get_field('pickup_news', 'option');
          if($pickup_news):
        ?>
        <div class="p-top-news__pickup">
          <div class="splide js-topnewsSlider" role="group" aria-label="お知らせピックアップ">
            <div class="splide__track">
              <ul class="splide__list">
                <?php 
  // ピックアップニュースの繰り返しフィールドを取得
  $pickup_news = get_field('pickup_news', 'option');
  
  // フィールドが存在し、空でないか確認
  if($pickup_news):
    foreach($pickup_news as $news):
      // サブフィールドから投稿IDを取得
      $post_id = $news['pickup_news_item'];
      
      if($post_id):
        // 記事の基本情報を取得
        $title = get_the_title($post_id);
        $post_url = get_permalink($post_id);
        
        // 投稿日を取得
        $post_date = get_the_date('Y.m.d', $post_id);
        
        // サムネイル画像のURLを取得
        $thumbnail_url = '';
        if(has_post_thumbnail($post_id)) {
          $thumbnail_url = get_the_post_thumbnail_url($post_id, 'medium');
        } else {
          $thumbnail_url = $img_path . 'top/news.webp'; // デフォルト画像
        }
        
        // カテゴリー情報（taxonomy_news）を取得
        $categories = get_the_terms($post_id, 'taxonomy_news');
        $is_hidden = false;
        $category_name = '';
        $category_url = '';
        
        if(!empty($categories) && !is_wp_error($categories)) {
          foreach($categories as $category) {
            if($category->name === "非表示") {
              $is_hidden = true;
              break;
            }
          }
          
          if(!$is_hidden) {
            $category = $categories[0]; // 単一選択の場合は最初のものを使用
            $category_name = $category->name;
            $category_url = get_term_link($category);
          }
        }
        
        // 非表示カテゴリーの記事はスキップ
        if($is_hidden) {
          continue;
        }
        
        // タグ情報（news_tag）を取得
        $tags = get_the_terms($post_id, 'news_tag');
  ?>
                <li class="splide__slide c-card c-linelink">
                  <a href="<?php echo esc_url($post_url); ?>" class="c-card-mainLink"><span
                      class="u-visually-hidden"><?php echo esc_html($title); ?></span></a>
                  <div class="c-card-body">
                    <div class="img-ov">
                      <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>">
                    </div>
                    <time class="c-news-list__date"><?php echo esc_html($post_date); ?></time>
                    <h3 class="p-top-news__ttl"><span
                        class="c-linelink__txt bottom-5"><?php echo esc_html($title); ?></span>
                    </h3>
                    <?php if($category_name): ?>
                    <ul class="c-cat-list">
                      <li class="c-cat-list__item"><a href="<?php echo esc_url($category_url); ?>"
                          class="c-cat-list__link c-card-innerLink"><?php echo esc_html($category_name); ?></a></li>
                    </ul>
                    <?php endif; ?>

                    <?php if(!empty($tags) && !is_wp_error($tags)): ?>
                    <ul class="c-tag-list sp-hidden">
                      <?php foreach($tags as $tag): ?>
                      <li class="c-tag-list__item"><a href="<?php echo esc_url(get_term_link($tag)); ?>"
                          class="c-tag-list__link c-card-innerLink c-linelink--hidden"><span
                            class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span></a></li>
                      <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                  </div>
                </li>
                <?php 
      endif; // if($post_id)
    endforeach; 
  endif; // if($pickup_news)
  ?>
              </ul>
              <div class="p-top-news__progress sp-hidden">
                <div class="p-top-news__progress--bar"></div>
              </div>
            </div>
            <?php get_template_part('./component/slider-btn-dummy')  ?>
            <div class="c-slider__control sp-hidden">
              <ul class="splide__pagination"></ul>
              <?php get_template_part('./component/slider-arw')  ?>
            </div>
          </div>
        </div>
        <?php 
        endif;
        ?>
        <div class="p-top-news__latest">
          <nav class="c-news-nav">
            <div class="c-news-nav__inner js-scrollable is-scrollStart u-scrollBar-hidden">
              <?php get_template_part('./component/news-cat-list')  ?>
              <div class="sp-hidden">
                <?php get_template_part('./component/news-tag-list')  ?>
              </div>
            </div>
          </nav>
          <div class="c-news-list">
            <p class="c-news-list--heading">Latest News</p>
            <?php
            // newsタイプの投稿を10件取得するためのWP_Queryを作成
            // "非表示"タクソノミーを除外するタクソノミークエリを追加
            $tax_query = array(
              array(
                'taxonomy' => 'taxonomy_news',
                'field'    => 'name',
                'terms'    => '非表示',
                'operator' => 'NOT IN',
              ),
            );
            
            $news_query = new WP_Query(
              array(
                'post_type'      => 'news',
                'posts_per_page' => 5,
                'paged'          => $paged,
                'tax_query'      => $tax_query,
              )
            );

            // サブループの開始
            if ($news_query->have_posts()) :
              while ($news_query->have_posts()) : $news_query->the_post();
                $post_id = get_the_id();
                $date = get_the_date('Y.n.d');
                $title = get_the_title();
                $post_link = get_permalink();
                $catName = '';
                $categories = get_the_terms(get_the_ID(), 'taxonomy_news');
                if (!empty($categories) && !is_wp_error($categories)) {
                  $catName = $categories[0]->name;
                  // カテゴリーへのリンクを変数に格納
                  $catLink = get_term_link($categories[0]->term_id, 'taxonomy_news');
                }
                $tags = get_the_terms($post_id, 'news_tag');
            ?>
            <article class="c-card c-news-list--item c-linelink">
              <a href="<?php echo $post_link ?>" class="c-card-mainLink"><span
                  class="u-visually-hidden"><?php echo $title ?></span></a>
              <div class="c-card-body">
                <time class="c-news-list__date"><?php echo $date ?></time>
                <ul class="c-cat-list">
                  <li class="c-cat-list__item">
                    <?php if ($catName !== ""):  ?>
                    <a href="<?php echo $catLink ?>"
                      class="c-cat-list__link c-card-innerLink"><?php echo $catName  ?></a>
                    <?php endif  ?>
                  </li>
                </ul>
                <div class="c-news-list--content">
                  <h3 class="c-news-list--ttl"><span class="c-linelink__txt bottom-5"><?php echo $title ?></span></h3>
                  <?php if(!empty($tags) && !is_wp_error($tags)): ?>
                  <ul class="c-tag-list sp-hidden">
                    <?php foreach($tags as $tag): ?>
                    <li class="c-tag-list__item"><a href="<?php echo esc_url(get_term_link($tag)); ?>"
                        class="c-tag-list__link c-card-innerLink c-linelink--hidden"><span
                          class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span></a></li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </div>
            </article>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
            <?php get_template_part('/component/btn', null, [
              'url'   => '/newslist',
              'label' => 'お知らせ一覧を見る',
              'class' => 'sp-big'
            ]);  ?>
          </div>
        </div>
      </div>
    </section>


    <section class="p-top-document">
      <div class="c-grid-outer">
        <div class="p-top-document__inner">
          <hgroup class="p-top-heading">
            <p class="p-top-heading__sub">Useful Materials</p>
            <h2 class="p-top-heading__main">お役立ち資料</h2>
            <?php get_template_part('/component/btn', null, [
              'url'   => '/materials',
              'label' => 'お役立ち資料を見る',
              'class' => 'sp-hidden'
            ]);  ?>
          </hgroup>
          <div class="p-top-document__main">
            <ul class="p-top-document__list">
              <?php
              // materialsという投稿タイプの投稿を取得
              $args = array(
                'post_type' => 'materials',
                'posts_per_page' => 7, // 表示数を制限
                'orderby' => 'date',
                'order' => 'DESC',
              );
    
              $materials_query = new WP_Query($args);
              $index = 1; // data-document-indexの初期値
    
              if ($materials_query->have_posts()) :
                while ($materials_query->have_posts()) : $materials_query->the_post();
              ?>
              <li class="p-top-document__item">
                <a href="<?php the_permalink(); ?>" class="p-top-document__link"
                  data-document-index="<?php echo $index; ?>">
                  <h3 class="p-top-document__ttl"><?php the_title(); ?></h3>
                  <span class="p-top-document__icon">
                    <svg class="p-top-document__arw">
                      <use href="#i-arw-r"></use>
                    </svg>
                  </span>
                </a>
              </li>
              <?php
                $index++;
                endwhile;
                wp_reset_postdata();
              endif;
              ?>
            </ul>

            <ul class="p-document__images">
              <li class="p-document__images--item is-current" data-document-index="0">
                <img src="<?php echo $img_path ?>/top/document-image.webp" alt="資料参考画像">
              </li>
              <?php
              // 再度クエリを実行して画像を取得
              $materials_query = new WP_Query($args);
              $index = 1;
    
              if ($materials_query->have_posts()) :
                while ($materials_query->have_posts()) : $materials_query->the_post();
                  // アイキャッチ画像のURLを取得
                  $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
              ?>
              <li class="p-document__images--item <?php echo ($index === 1) ? 'is-current' : ''; ?>"
                data-document-index="<?php echo $index; ?>">
                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
              </li>
              <?php
                $index++;
                endwhile;
                wp_reset_postdata();
              endif;
              ?>
            </ul>
          </div>
          <?php get_template_part('/component/btn', null, [
              'url'   => '/materials',
              'label' => 'お役立ち資料を見る',
              'class' => 'pc-hidden sp-big'
            ]);  ?>
        </div>
      </div>
    </section>

    <section class="p-top-philosophy js-bg-to-blue-trigger js-copy-trigger" data-copy-trigger="philosophy"
      data-target="bg-change">
      <div class="c-grid-outer">
        <hgroup class="p-top-heading">
          <p class="p-top-heading__sub">Philosophy</p>
          <h2 class="p-top-heading__main">企業理念</h2>
        </hgroup>
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
          <div class="p-top-philosophy__gallery bottom2">
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
            不動産営業の現場で、優秀な人材の育成は永遠の課題でした。<br>教育には時間がかかり、採用は不確実。<br>その課題を、私たちはテクノロジーで解決します。<br>20年の実績から生まれた私たちのソリューションは、経験の浅いスタッフでもプロ級の判断を可能にします。教育よりも早く、採用よりも確実に、一人ひとりの力を引き出します。<br>最適な土地選びから建築プランの提案まで。<br>500社12万人が選ぶ不動産DXで、知的生産性の革命が始まっています。
          </p>
          <?php get_template_part('/component/btn', null, [
            'url'   => '/',
            'label' => '企業理念を見る',
          ]);  ?>
        </div>
      </div>
      <div class="js-philosophy-copy--wrapper" data-copy-trigger="philosophy">
        <div class="js-philosophy-copy">PHILOSOPHY</div>
      </div>
    </section>
    <section class="p-top-recruit js-copy-trigger" data-copy-trigger="recruit">
      <div class=" c-grid-outer">
        <hgroup class="p-top-heading">
          <p class="p-top-heading__sub">Recruit</p>
          <h2 class="p-top-heading__main">採用情報</h2>
        </hgroup>
        <div class="p-top-recruit__content">
          <div class="p-top-recruit__content--inner">
            <div class="p-top-recruit__copy">
              FREEDOMグループでは、<br>IPO（上場）に向けた<br class="pc-hidden">更なる事業拡大において<br>一緒に働く仲間を募集しています。
            </div>
            <p class="p-top-recruit__txt">
              会社の成長を体感したい。自社サービスに携わりたい。<br>大きい裁量を持ちたい。IT業界にキャリアチェンジしたい。キャリアアップ、スキルアップしたい。<br>建築・不動産領域のDXを推進したい。<br>この様な想いをお持ちの方に向けて、活躍・成長の可能性を広げる扉を開けてお待ちしています。
            </p>
            <?php get_template_part('/component/btn', null, [
              'url'   => '/recruit',
              'label' => '採用情報を見る',
            ]);  ?>
          </div>
        </div>
      </div>
    </section>
    <div class="p-top-recruit__gallery--wrapper js-stalker-area">
      <div class="p-top-recruit__gallery splide js-topGallerySlider">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>top/gallery_1.webp" alt=""></li>
          </ul>
        </div>
        <?php get_template_part('./component/slider-btn-dummy')  ?>
        <div class="c-slider__control sp-hidden u-visually-hidden">
          <?php get_template_part('./component/slider-arw')  ?>
        </div>
      </div>
    </div>
  </div>




</main>

<?php get_footer(); ?>