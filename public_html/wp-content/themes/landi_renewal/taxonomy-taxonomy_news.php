<?php
global $util;
$pageinfo = array(
  'page_id' => 'news',
  'navigation' => 'news renewal header-bg-gray news-category',
  'title' => 'お知らせ｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';

// 現在のタクソノミータームオブジェクトを取得
$queried_object = get_queried_object();

// 現在のタームの名前を取得
$current_term_name = $queried_object->name;
$current_term_id = $queried_object->term_id;
?>

<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item">
      <a href="/newslist" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">お知らせ</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link"><?php echo $current_term_name  ?>
      </span>
    </li>
  </ul>
</nav>

<section class="p-news-fv js-stalker-area">
  <div class="l-fv">
    <hgroup class="l-fv__heading">
      <p class="l-fv__heading--sub"><a href="/newslist" class="c-linelink "><span
            class="c-linelink__txt is-ib">お知らせ</span></a>
      </p>
      <h1 class="l-fv__heading--main"><?php echo $current_term_name ?></h1>
    </hgroup>
  </div>
</section>

<div class="c-content rev c-grid-outer" data-gap="5">
  <main class="c-mainGrid">
    <h2 class="p-news-category__ttl pc-hidden">Latest News</h2>
    <div class="c-news-list">
      <?php
      // newsタイプの投稿を10件取得するためのWP_Queryを作成
      $news_query = new WP_Query(
        array(
          'post_type'      => 'news',
          'posts_per_page' => 10,
          'paged' => $paged,
        )
      );

      // サブループの開始
      if (have_posts()) :
        while (have_posts()) :
          the_post();
          $post_id = get_the_id();
          $date = get_the_date('Y.n.d');
          $title = get_the_title();
          $post_link = get_permalink();
          $catName = '';
          $categories = get_the_terms(get_the_ID(), 'taxonomy_news');
          if (!empty($categories) && !is_wp_error($categories) && $categories[0]->name !== "非表示") {
            $catName = $categories[0]->name;
            // カテゴリーへのリンクを変数に格納
            $catLink = get_term_link($categories[0]->term_id, 'taxonomy_news');
          }

          $tags = get_the_terms(get_the_ID(), 'news_tag');
      ?>
      <article class="c-card c-news-list--item c-linelink">
        <a href="<?php echo $post_link ?>" class="c-card-mainLink"><span
            class="u-visually-hidden"><?php echo $title ?></span></a>
        <div class="c-card-body">
          <time class="c-news-list__date"><?php echo $date ?></time>
          <ul class="c-cat-list">
            <li class="c-cat-list__item">
              <?php if ($catName !== ""):  ?>
              <a href="<?php echo $catLink ?>" class="c-cat-list__link c-card-innerLink"><?php echo $catName  ?></a>
              <?php endif  ?>
            </li>
          </ul>
          <div class="c-news-list--content">
            <h3 class="c-news-list--ttl"><span class="c-linelink__txt bottom-5"><?php echo $title ?></span></h3>
            <?php if (!empty($tags) && !is_wp_error($tags)) : ?>
            <ul class="c-tag-list">
              <?php foreach ($tags as $tag) : ?>
              <li class="c-tag-list__item">
                <a href="<?php echo get_term_link($tag->term_id, 'news_tag'); ?>"
                  class="c-tag-list__link c-card-innerLink c-linelink--hidden">
                  <span class="c-linelink__txt">#<?php echo $tag->name; ?></span>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
      </article>
      <?php
        endwhile;
        on_pagenation();
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </main>
  <?php get_template_part('./component/news-side-nav')  ?>
</div>

<?php get_footer(); ?>