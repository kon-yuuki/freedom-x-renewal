<?php
/*
Template Name:特徴
*/
global $util;
$pageinfo = array(
  'page_id' => 'feature',
  'navigation' => 'feature renewal blue is-lenis-active',
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
      <span class="c-breadNav-link">特徴
      </span>
    </li>
  </ul>
</nav>

<section class="p-feature-fv c-bg-blue">
  <div class="p-feature-fv__sticky">
    <div class="l-fv">
      <hgroup class="l-fv__heading">
        <h1 class="l-fv__heading--sub"><a href="#" class="c-linelink "><span class="c-linelink__txt is-ib">特徴</span></a>
        </h1>
        <p class="l-fv__heading--main big">私たちの<br>
          特徴と強み</p>
      </hgroup>
      <p class="p-feature-fv__txt sp-hidden">FREEDOM Xは注文建築業界の<br>営業課題を根本から解決します。</p>
    </div>
    <div class="p-feature-fv__bg">
      <div class="p-feature-fv__bg__flex">
        <div class="p-feature-fv__bg__flex__col">
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-1.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">

          </div>
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-1.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">

          </div>
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-2.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">

          </div>
        </div>
        <div class="p-feature-fv__bg__flex__col">
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-3.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">
          </div>
          <div class="p-feature-fv__bg__flex__img--wrapper dummy"></div>
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-5.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">
          </div>
        </div>
        <div class="p-feature-fv__bg__flex__col">
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-4.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">
          </div>
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-4.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">
          </div>
          <div class="p-feature-fv__bg__flex__img--wrapper">
            <img src="<?php echo $img_path ?>feature/fv-5.webp" alt="" width="800" height="600"
              class="p-feature-fv__bg__flex__img">
          </div>
        </div>
      </div>
      <div class="p-feature-fv__bg--clip__outer">
        <div class="p-feature-fv__bg--clip">
          <div class="p-feature-fv__bg--clip__inner">
            <img src="<?php echo $img_path ?>feature/kv.webp" alt="" width="800" height="600">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<main class="p-feature">
  <div class="c-bg-blue">
    <div class="c-grid-inner">

      <section class="p-feature-first">
        <div class="p-feature-section__inner">
          <div class="p-feature-section__main">
            <h2 class="c-ttl__h2 non-border"><span class="pc-nowrap">５つの専門領域を掛け合わせ、</span><br>注文建築事業の<br>生産性向上を実現します。
            </h2>
            <p class="p-feature-section__txt">注文建築業界の<br
                class="sp-hidden">「こまった」を解決するには、<br>複数の専門知識が必要不可欠です。<br>私たちFREEDOM
              Xは、<br class="sp-hidden">下記5つの専門領域を網羅した<br>総合ソリューションを提供しています。</p>
          </div>
          <div class="p-feature-section__aside">
            <picture>
              <source srcset="<?php echo $img_path ?>feature/feature-figure.avif" type="image/avif">
              <img src="<?php echo $img_path ?>feature/feature-figure.webp" alt="" width="800" height="600">
            </picture>
          </div>
        </div>
      </section>
    </div>
  </div>

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

    <section class="p-feature-strength c-section first" id="strength">
      <h2 class="c-ttl__h2 c-sp-section-separate">課題を解決する3つの強み</h2>
      <div class="p-feature-strength__item">
        <h3 class="c-ttl__h3">強み1</h3>
        <div class="p-feature-strength__main">
          <div class="p-feature-strength__main__copy">業界大手〜個人工務店まで<br>
            <strong class="c-blue">全国360回</strong>/月の<br class="sp-hidden">営業コンサル実績
          </div>
          <p class="p-feature-strength__main__txt p-feature-section__txt">
            北海道から沖縄まで4年間の「営業会議運営」で培った独自の「営業フローBPR」ノウハウを提供。自社プロダクト提案にとどまらないDXコンサルティングからKPIマネジメントサポート、接客フローや"クロージングのコツ"まで、現場に即した実践的な研修をご提案します。
          </p>
        </div>
        <div class="splide js-featureStrengthGallerySlider1">
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
      </div>
      <div class="p-feature-strength__item">
        <h3 class="c-ttl__h3">強み2</h3>
        <div class="p-feature-strength__main__copy">現場経験者による<br>プロダクト開発&<strong
            class="c-blue">リアル現場</strong>での<br>検証・改善サイクル</div>
        <div class="p-feature-strength__main">
          <p class="p-feature-strength__main__txt p-feature-section__txt">
            注文建築事業の営業責任者や不動産仲介営業経験者がプロダクトマネジメント・企画開発を担当。「真に現場で使える」プロダクトを生み出します。さらにグループ内に注文建築事業の実業を行う事業会社を持ち、ニーズ抽出や新プロダクトの効果をリアル現場で検証→アップデートする体制を確立しています。
          </p>
          <picture>
            <source srcset="<?php echo $img_path ?>feature/feature-strong2.avif" type="image/avif">
            <img src="<?php echo $img_path ?>feature/feature-strong2.webp" alt="" width="800" height="600">
          </picture>
        </div>
      </div>
      <div class="p-feature-strength__item">
        <h3 class="c-ttl__h3">強み3</h3>
        <div class="p-feature-strength__main">
          <div class="p-feature-strength__inner">
            <div class="p-feature-strength__main__copy"><strong class="c-blue">全国10拠点</strong>の<br>
              サポートオフィスで<br>
              充実のサポート体制</div>
            <p class="p-feature-strength__txt p-feature-section__txt">
              全国どこからでもスピーディーに対応可能なサポート体制を構築。お客様のビジネスを専門知識と実務経験を持ったスタッフが確実にバックアップします。
            </p>
          </div>
          <dl class="p-feature-strength__main__list">
            <div class="p-feature-strength__main__list__inner">
              <dt class="p-feature-strength__main__list__term">宅建士</dt>
              <dd class="p-feature-strength__main__list__detail">6名</dd>
            </div>
            <div class="p-feature-strength__main__list__inner">
              <dt class="p-feature-strength__main__list__term">ITパスポート</dt>
              <dd class="p-feature-strength__main__list__detail">6名</dd>
            </div>
            <div class="p-feature-strength__main__list__inner">
              <dt class="p-feature-strength__main__list__term">ハウスメーカー「営業責任者」経験者</dt>
              <dd class="p-feature-strength__main__list__detail">6名</dd>
            </div>
            <div class="p-feature-strength__main__list__inner">
              <dt class="p-feature-strength__main__list__term">不動産仲介業経験者</dt>
              <dd class="p-feature-strength__main__list__detail">6名</dd>
            </div>
            <div class="p-feature-strength__main__list__inner">
              <dt class="p-feature-strength__main__list__term">注文建築事業経験者</dt>
              <dd class="p-feature-strength__main__list__detail">6名</dd>
            </div>
          </dl>
        </div>
        <div class="splide js-featureStrengthGallerySlider2">
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
      </div>

    </section>

    <section class="p-feature-solution c-section" id="solution">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">圧倒的な実績が証明する<br class="pc-hidden">課題解決力</h2>
        <?php get_template_part('/component/btn', null, [
          'url'   => '/company#group',
          'label' => '詳しくはこちら',
          'class' => "sp-hidden"
        ]);  ?>
      </div>
      <p class="p-feature-section__txt">
        積水ハウス、パナソニックホームズをはじめとする業界大手から地域密着型の工務店まで、500社以上の導入実績があります。特に業界最大手企業での100%導入は、私たちのソリューションの有効性を証明しています。導入企業の平均で成約率4倍、商談時間の30%削減を実現し、確かな成果を生み出しています。
      </p>
      <?php get_template_part('/component/btn', null, [
          'url'   => '/company#group',
          'label' => '詳しくはこちら',
          'class' => "pc-hidden"
        ]);  ?>
      <ul class="p-feature-solution__list c-col col3">
        <li class="p-feature-solution__item c-col__item">
          <p class="p-feature-solution__term">導入企業数</p>
          <p class="p-feature-solution__detail"><strong class="p-feature-solution__number">500</strong>社</p>
        </li>
        <li class="p-feature-solution__item c-col__item">
          <p class="p-feature-solution__term">ユーザー数</p>
          <p class="p-feature-solution__detail"><strong class="p-feature-solution__number">300</strong>人</p>
        </li>
        <li class="p-feature-solution__item c-col__item">
          <p class="p-feature-solution__term">大手導入率</p>
          <p class="p-feature-solution__detail"><strong class="p-feature-solution__number">100</strong>%</p>
        </li>
      </ul>
    </section>

    <div class="p-feature-client">
      <div class="splide js-clientSlider1">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client1.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client2.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client3.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client4.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client5.webp" alt=""></li>
          </ul>
        </div>
      </div>
      <div class="splide js-clientSlider2">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client1.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client2.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client3.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client4.webp" alt=""></li>
            <li class="splide__slide"><img src="<?php echo $img_path ?>feature/client5.webp" alt=""></li>
          </ul>
        </div>
      </div>
    </div>

    <section class="p-feature-group c-section" id="group">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">グループの総合力で実現する<br class="pc-hidden">革新的DX</h2>
        <?php get_template_part('/component/btn', null, [
          'url'   => '/company#group',
          'label' => '詳しくはこちら',
          'class'=>'sp-hidden'
        ]);  ?>
      </div>
      <p class=" p-feature-section__txt">
        フリーダムグループ各社の強みを活かし、不動産実務経験とマーケティングノウハウを組み合わせた総合的なソリューションを提供。営業現場のDX化に留まらない、包括的な業務改善を実現します。グループ全体で蓄積された知見とノウハウにより、御社の課題に最適な解決策を提案いたします。
      </p>
      <?php get_template_part('/component/btn', null, [
          'url'   => '/company#group',
          'label' => '詳しくはこちら',
          'class'=>'pc-hidden'
        ]);  ?>
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

    <section class="p-feature-casestudy c-section" id="casestudy">
      <div class="c-ttl__wrapper">
        <h2 class="c-ttl__h2 c-sp-section-separate">解決してきた課題<span class="sp-hidden">（事例紹介）</span>
        </h2>
        <?php get_template_part('/component/btn', null, [
          'url'   => '/casestudy',
          'label' => '詳しくはこちら',
        ]);  ?>
      </div>
      <?php
      // case_study投稿タイプの最新4件を取得
      $case_study_query = new WP_Query(array(
        'post_type'      => 'case_study',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC'
      ));
      ?>
      
      <ul class="p-top-casestudy__latest--list c-col col4">
        <?php if ($case_study_query->have_posts()) : ?>
          <?php while ($case_study_query->have_posts()) : $case_study_query->the_post(); ?>
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
                      <li class="c-cat-list__item"><a href="<?php echo esc_url($category_url); ?>" class="c-cat-list__link c-card-innerLink"><?php echo esc_html($category_name); ?></a></li>
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
                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>">
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
                <p>現在、事例がありません。</p>
              </div>
            </div>
          </li>
        <?php endif; ?>
      </ul>
    </section>
  </div>

  <div class="c-bg-gray js-stalker-area">
    <div class="c-grid-inner">
      <section class="p-feature-materilas" id="material">
        <div class="c-ttl__wrapper">
          <h2 class="c-ttl__h2 non-border">お役立ち資料</h2>
          <?php get_template_part('/component/btn', null, [
            'url'   => '/materials',
            'label' => '詳しくはこちら',
            'class'=>'sp-hidden'
          ]);  ?>
        </div>
        <div class="p-feature-materials__list splide js-feature-material-slider">
          <div class="splide__track">
            <div class="splide__list">
              <?php
            // WP_Queryを使用してmaterials投稿タイプの記事を10件取得する
            $materials_args = array(
              'post_type'      => 'materials',
              'posts_per_page' => -1,
              'post_status'    => 'publish',
              'orderby'        => 'date',
              'order'          => 'DESC'
            );

            $materials_query = new WP_Query($materials_args);

            // ループ開始
            if ($materials_query->have_posts()) :
              while ($materials_query->have_posts()) : $materials_query->the_post();
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = '';
                if ($thumbnail_id) {
                  $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'medium');
                }

                // タイトルを変数に格納
                $title = get_the_title();
                $pages = SCF::get('pages');

                $terms = get_the_terms(get_the_ID(), 'materials_category');
                $category = '';
                $category_link = '';
                if (!empty($terms) && !is_wp_error($terms)) {
                  $category = $terms[0]->name; // 最初のカテゴリ名を取得
                  $category_link = get_term_link($terms[0], 'materials_category'); // カテゴリ一覧へのリンク
                }

                $permalink = get_permalink();
            ?>
              <article class="p-material-list__item splide__slide">
                <div class="c-card c-linelink p-material-list__item--link">
                  <a href="<?php echo $permalink ?>" class=" c-card-mainLink">
                    <h3 class="u-visually-hidden"><?php echo $title ?></h3>
                  </a>
                  <div class="c-card-body p-material-list__link">
                    <div class="p-material-list__visual">
                      <div class="img-ov">
                        <img class="" src="<?php echo $thumbnail_url ?>" alt=""></img>
                      </div>
                      <?php get_template_part('/component/btn', null, [
                          'url'   => '/',
                          'label' => 'ダウンロードする',
                          'tag' => 'div',
                          'class' => "bg-blue download",
                          'icon' => 'download'
                        ]);  ?>
                    </div>
                    <div class="p-material-list__detail">
                      <p class="p-material-list__ttl"><span
                          class="c-linelink__txt bottom-5"><?php echo $title;  ?></span>
                      </p>
                      <div class="p-material__heading--aside">
                        <ul class="c-cat-list">
                          <li class="c-cat-list__item"><a href="<?php echo $category_link ?>"
                              class="c-cat-list__link c-card-innerLink "><span class="p-material__tag">
                                <?php echo $category  ?>
                              </span></a></li>
                        </ul>
                        <span class="p-material__pages">全<?php echo $pages ?>ページ</span>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
              <?php
              endwhile;
              // ループ終了後、元のクエリに戻す
              wp_reset_postdata();
            else :
              // 投稿が見つからない場合のメッセージ
              echo '<p>該当する投稿が見つかりませんでした。</p>';
            endif;
            ?>
            </div>
            <?php get_template_part('./component/slider-btn-dummy')  ?>
            <?php get_template_part('./component/slider-arw')  ?>
          </div>
        </div>
        <?php get_template_part('/component/btn', null, [
            'url'   => '/materials',
            'label' => '一覧を見る',
            'class'=>'pc-hidden sp-big'
          ]);  ?>
      </section>
    </div>
  </div>

  <div class="c-grid-inner">
    <section class="c-section p-feature-service" id="service">
      <div class="p-feature-section__inner">
        <div class="p-feature-section__main">
          <h2 class="c-ttl__h2 non-border">提供しているサービス</h2>
          <p class="p-feature-section__txt">
            「建築・不動産業界の発展を支えるDXパートナー」をビジョンに掲げ、デジタル変革による業界の進化の一翼を担うべく、一貫したサービスを展開しています。</p>
          <?php get_template_part('/component/btn', null, [
          'url'   => '/service',
          'label' => 'サービス一覧を見る',
        ]);  ?>
        </div>
        <div class="p-feature-section__aside">
          <ul class="p-feature-service__list c-col col2">
            <li class="p-feature-service__item c-col__item">
              <a href="" class="p-feature-service__link c-linelink--hidden">
                <h3 class="p-feature-service__label"><span class="c-linelink__txt">ランディPRO</span></h3>
                <p class="p-feature-service__txt">土地探しから商談管理まで、不動産営業をまるごとDX</p>
                <div class="img-ov"><img src="<?php echo $img_path ?>feature/service-landi.webp" alt=""></div>
              </a>
              <div class="p-feature-service__badge">
                <img src="<?php echo $img_path ?>feature/badge.webp" alt="">
              </div>
            </li>
            <li class="p-feature-service__item c-col__item">
              <a href="" class="p-feature-service__link c-linelink--hidden">
                <h3 class="p-feature-service__label"><span class="c-linelink__txt">タテテク</span></h3>
                <p class="p-feature-service__txt">AIが即座に最適な建築プランを提案</p>
                <div class="img-ov"><img src="<?php echo $img_path ?>feature/service-tateteku.webp" alt=""></div>
              </a>
              <div class="p-feature-service__badge">
                <img src="<?php echo $img_path ?>feature/badge.webp" alt="">
              </div>
            </li>
            <li class="p-feature-service__item c-col__item">
              <a href="" class="p-feature-service__link c-linelink--hidden">
                <h3 class="p-feature-service__label"><span class="c-linelink__txt">ヨビコム</span></h3>
                <p class="p-feature-service__txt">土地探しから商談管理まで、不動産営業をまるごとDX</p>
                <div class="img-ov"><img src="<?php echo $img_path ?>feature/service-yobikomu.webp" alt=""></div>
              </a>
            </li>
            <li class="p-feature-service__item c-col__item">
              <a href="" class="p-feature-service__link c-linelink--hidden">
                <h3 class="p-feature-service__label"><span class="c-linelink__txt">フリーダムマーケティング</span></h3>
                <p class="p-feature-service__txt">土地探しから商談管理まで、不動産営業をまるごとDX</p>
                <div class="img-ov"><img src="<?php echo $img_path ?>feature/service-marketing.webp" alt=""></div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>


</main>


<?php get_footer(); ?>