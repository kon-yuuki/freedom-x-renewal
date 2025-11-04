<?php
global $util;
$pageinfo = array(
  'page_id' => 'casestudy',
  'navigation' => 'casestudy renewal bg-gray',
  'title' => '導入事例｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社の導入事例をご紹介します。実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
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
      <span class="c-breadNav-link">導入事例
      </span>
    </li>
  </ul>
</nav>

<section class="p-casestudy-fv js-stalker-area">
  <div class="l-fv">
    <hgroup class="l-fv__heading">
      <h1 class="l-fv__heading--main">導入事例</h1>
    </hgroup>
  </div>
  <?php 
          $pickup_case_study = get_field('pickup_case_study', 'option');
          if($pickup_case_study):
        ?>
  <div class="c-grid-outer">
    <?php 
    if(!is_paged()):
    ?>
    <?php 
     // ピックアップ導入事例の繰り返しフィールドを取得
      $pickup_case_study = get_field('pickup_casestudy', 'option');
      if($pickup_case_study):
      ?>
    <div class="p-casestudy-fv__pickup">
      <h2 class="p-casestudy-fv__pickup--ttl">Pickup</h2>
      <div class="splide js-casestudy-pickup-slider" role="group" aria-label="導入事例ピックアップ">
        <div class="splide__track">
          <?php get_template_part('./component/slider-btn-dummy')  ?>
          <div class="sp-hidden p-casestudy-slider-control">
            <div class="c-slider__control">
              <ul class="splide__pagination"></ul>
              <?php get_template_part('./component/slider-arw')  ?>
            </div>
          </div>
          <ul class="splide__list">
            <?php 
              // フィールドが存在し、空でないか確認
             
                foreach($pickup_case_study as $case_study):
                  // サブフィールドから投稿IDを取得
                  $post_id = $case_study['case_study_item'];
      
                   if($post_id):
                     // 記事の基本情報を取得
                      $title = get_the_title($post_id);
                      $post_url = get_permalink($post_id);
        
                      // 投稿日を取得
                      $client = get_field('case_company', $post_id);
        
                
                      $thumbnail_url = '';
                      if(has_post_thumbnail($post_id)) {
                        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'medium');
                      } else {
                        // ACFのcase_main_imgを取得（URLが直接入っている場合）
                      $case_main_img = get_field('case_main_img', $post_id);
                      if($case_main_img && !empty($case_main_img)) {
                         $thumbnail_url = $case_main_img; // URLが直接入っている
                      }
                    }
                 
        
                    // カテゴリー情報（taxonomy_case_study）を取得
                    $categories = get_the_terms($post_id, 'taxonomy_case_study');
                    $category_name = '';
                    $category_url = '';
        
                    if(!empty($categories) && !is_wp_error($categories)) {
                      $category = $categories[0]; // 単一選択の場合は最初のものを使用
                      $category_name = $category->name;
                      $category_url = get_term_link($category);
                    }
        
                    // タグ情報（casestudy_tag）を取得
                    $tags = get_the_terms($post_id, 'casestudy_tag');
                  ?>
            <li class="splide__slide">
              <div class="c-card c-linelink">
                <a href="<?php echo esc_url($post_url); ?>" class="c-card-mainLink"><span
                    class="u-visually-hidden"><?php echo esc_html($title); ?></span></a>
                <div class="c-card-body">
                  <div class="img-ov">
                    <img src="<?php echo $img_path ?>top/casestudy_thumb.webp" alt="<?php echo esc_attr($title); ?>">
                  </div>
                  <div class="p-casestudy-fv__pickup__detail">
                    <p class="p-casestudy-fv__pickup__client"><?php echo $client; ?></p>
                    <h3 class="p-casestudy-fv__ttl"><span
                        class="c-linelink__txt bottom-5 line2"><?php echo esc_html($title); ?></span>
                    </h3>
                    <div class="p-casestudy-fv__pickup__aside">
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
                  </div>
                </div>
              </div>
            </li>
            <?php 
                 endif; // if($post_id)
                endforeach; 
                endif; // if($pickup_case_study)
              ?>
          </ul>
        </div>
      </div>
      <div class="splide js-casestudy-pickup-slider-thumbnail">
        <div class="splide__track">
          <div class="splide__list">
            <?php 
              foreach($pickup_case_study as $case_study):
                $post_id = $case_study['pickup_case_study_item'];
                      $thumbnail_url = '';
                      if(has_post_thumbnail($post_id)) {
                        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'medium');
                      } else {
                        // ACFのcase_main_imgを取得（URLが直接入っている場合）
                      $case_main_img = get_field('case_main_img', $post_id);
                      if($case_main_img && !empty($case_main_img)) {
                         $thumbnail_url = $case_main_img; // URLが直接入っている
                      } else {
                      $thumbnail_url = $img_path . 'top/casestudy.webp'; // デフォルト画像
                      }
                    }
                    
            ?>
            <button class="splide__slide" type="button">
              <div class="img-ov">
                <img src="<?php echo $img_path ?>top/casestudy_thumb.webp" alt="<?php echo esc_attr($title); ?>">
              </div>
            </button>
            <?php 
            endforeach;
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif;  ?>
    <?php endif;  ?>
  </div>
</section>

<div class="c-content rev c-grid-outer" data-gap="5">
  <main class="c-mainGrid">
    <nav class="p-casestudy-nav pc-hidden">
      <h2 class="p-casestudy-nav__ttl">課題から探す</h2>
      <?php get_template_part("./component/casestudy-cat-list")  ?>
      <h2 class="p-casestudy-nav__ttl">ハッシュタグ一覧</h2>
      <?php get_template_part("./component/casestudy-tag-list")  ?>
    </nav>
    <section class="p-casestudy-list">
      <div class="p-casestudy-list__inner c-col col3">
        <?php
      $case_study_query = new WP_Query(
        array(
          'post_type'      => 'case_study',
          'posts_per_page' => 12,
          'paged'          => $paged,
        )
      );

      // サブループの開始
      if ($case_study_query->have_posts()) :
        while ($case_study_query->have_posts()) : $case_study_query->the_post();
          $post_id = get_the_id();
          $title = get_the_title();
          $post_link = get_permalink();
          $catName = '';
          $categories = get_the_terms(get_the_ID(), 'taxonomy_case_study');
          if (!empty($categories) && !is_wp_error($categories)) {
            $catName = $categories[0]->name;
            // カテゴリーへのリンクを変数に格納
            $catLink = get_term_link($categories[0]->term_id, 'taxonomy_case_study');
          }
          $tags = get_the_terms(get_the_ID(), 'casestudy_tag');
          $client = get_field('case_company', $post_id);
          $case_theme = get_field('case_theme', $post_id);
      ?>
        <article class="p-top-casestudy__latest--item c-col__item">
          <div class="p-top-casestudy__latest--inner c-card c-linelink">
            <a href="<?php echo $post_link ?>" class="c-card-mainLink"><span
                class="u-visually-hidden"><?php echo $title ?></span></a>
            <div class="c-card-body">
              <div class="p-top-casestudy__latest--item--inner">
                <?php if($client): ?>
                <span class="p-top-casestudy__client"><?php echo $client; ?></span>
                <?php endif; ?>

                <h3 class="p-top-casestudy__ttl"><span class="c-linelink__txt bottom-5"><?php echo $title ?></span></h3>

                <?php if ($catName !== ""): ?>
                <ul class="c-cat-list">
                  <li class="c-cat-list__item">
                    <a href="<?php echo $catLink ?>"
                      class="c-cat-list__link c-card-innerLink"><?php echo $catName ?></a>
                  </li>
                </ul>
                <?php endif; ?>

                <?php if (!empty($tags) && !is_wp_error($tags)) : ?>
                <ul class="c-tag-list">
                  <?php foreach ($tags as $tag) : ?>
                  <li class="c-tag-list__item">
                    <a href="<?php echo get_term_link($tag->term_id, 'casestudy_tag'); ?>"
                      class="c-tag-list__link c-card-innerLink c-linelink--hidden">
                      <span class="c-linelink__txt">#<?php echo $tag->name; ?></span>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div class="sp-hidden">
                  <?php if($case_theme): ?>
                  <div class="p-top-casestudy__theme">
                    <p class="p-top-casestudy__theme-label">導入前の課題</p>
                    <p class="p-top-casestudy__theme-content"><?php echo $case_theme; ?></p>
                  </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="img-ov">
                <?php 
              // アイキャッチがあれば表示、なければデフォルト画像
              if(has_post_thumbnail($post_id)) {
                the_post_thumbnail('medium', array('alt' => esc_attr($title)));
              } else {
                // ACFのcase_main_imgを確認
                $case_main_img = get_field('case_main_img', $post_id);
                if($case_main_img && !empty($case_main_img)) {
                  echo '<img src="' . esc_url($case_main_img) . '" alt="' . esc_attr($title) . '">';
                } else {
                  // デフォルト画像を表示
                  echo '<img src="' . $img_path . 'top/casestudy_thumb.webp" alt="' . esc_attr($title) . '">';
                }
              }
              ?>
              </div>
            </div>
          </div>
        </article>
        <?php 
        endwhile;
        ?>
      </div>
      <?php
        on_pagenation($case_study_query);
        wp_reset_postdata();
      endif;
      ?>
    </section>
  </main>
  <?php get_template_part('./component/casestudy-side-nav')  ?>
</div>

<?php get_footer(); ?>