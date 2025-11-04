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
// 現在のタクソノミータームを取得
$current_term = get_queried_object();
$catName = $current_term->name;
$catLink = get_term_link($current_term->term_id, 'taxonomy_case_study');
?>

<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item">
      <a href="/case_study" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">導入事例</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">導入事例一覧(<?php echo $catName  ?>)
      </span>
    </li>

  </ul>
</nav>

<section class="p-casestudy-fv js-stalker-area">
  <div class="l-fv">
    <p class="l-fv__heading--sub"><a href="/case_study" class="c-linelink"><span
          class="c-linelink__txt is-ib">導入事例</span></a>
    </p>
    <div class="l-fv__heading">
      <h1 class="l-fv__heading--main">導入事例一覧(<?php echo $catName  ?>)</h1>
    </div>
    <p class="l-fv__lead sp-hidden">土地探し顧客の成約率4倍、プラン作成時間の50%削減など、 具体的な成果と共に、お客様の成功事例をご紹介します。</p>
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
      // case_studyタイプの投稿を10件取得するためのWP_Queryを作成
      // 現在のタクソノミータームを取得
      $case_study_query = new WP_Query(
        array(
          'post_type'      => 'case_study',
          'posts_per_page' => 12,
          'paged'          => $paged,
          'tax_query'      => array(
              array(
                'taxonomy'  => 'taxonomy_case_study',
                'field'     => 'term_id',
                'terms'     => $current_term->term_id,
              ),
            ),
          )
      );

      // サブループの開始
      if ($case_study_query->have_posts()) :
        while ($case_study_query->have_posts()) : $case_study_query->the_post();
          $post_id = get_the_id();
          $title = get_the_title();
          $post_link = get_permalink();
          
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
                <ul class="c-cat-list">
                  <li class="c-cat-list__item">
                    <a href="<?php echo $catLink ?>"
                      class="c-cat-list__link c-card-innerLink"><?php echo $catName ?></a>
                  </li>
                </ul>
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