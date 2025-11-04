<?php
global $util;
$pageinfo = array(
  'page_id' => 'news',
  'navigation' => 'news renewal single-news header-bg-gray',
  'title' => 'お知らせ｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';
the_post();

$post_id = get_the_id();
$date = get_the_date('Y.m.d');
$categories = get_the_terms($post_id, 'taxonomy_news');
$tags = get_the_terms($post_id, 'news_tag');

$catName = '';
$catLink = '';
$category_slug = '';

if (!empty($categories) && !is_wp_error($categories)) {
  $category = $categories[0];
  $catName = $category->name;
  $category_slug = $category->slug;
  $catLink = get_term_link($category, 'taxonomy_news');
}

$thumbnail_url = '';
if (has_post_thumbnail($post_id)) {
  $thumbnail_id = get_post_thumbnail_id($post_id);
  $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
}
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
      <span class="c-breadNav-link"><?php the_title() ?>
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
      <h1 class="l-fv__heading--main"><?php the_title() ?></h1>
    </hgroup>
    <div class="l-fv__post">
      <span class="l-fv__post--date"><?php echo $date  ?></span>
      <?php if ($catName !== ""):  ?>
      <a href="<?php echo $catLink ?>" class="c-cat-list__link c-card-innerLink"><?php echo $catName  ?></a>
      <?php endif  ?>
      <ul class="c-tag-list">
        <?php if (!empty($tags) && !is_wp_error($tags)): ?>
        <?php foreach ($tags as $tag): ?>
        <li class="c-tag-list__item">
          <a href="<?php echo get_tag_link($tag->term_id); ?>"
            class="c-tag-list__link c-card-innerLink c-linelink--hidden">
            <span class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span>
          </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</section>

<div class="c-content rev c-grid-outer">
  <main class="c-mainGrid innerGrid">
    <div class="c-post-inner c-main">
      <?php if(has_post_thumbnail($post_id)): ?>
      <div class="p-news-kv">
        <img src="<?php echo $thumbnail_url ?>" alt="">
      </div>
      <?php endif ?>
      <?php the_content();  ?>
      <div class="c-cva">
        <img src="<?php echo $img_path ?>common/cv.webp" alt="">
      </div>
    </div>
  </main>
  <?php get_template_part('./component/news-side-nav')  ?>
</div>

<section class="p-news-related">
  <div class="c-grid-inner">
    <hgroup class="p-news-related__heading">
      <h2 class="p-news-related__ttl">関連ニュース</h2>
      <?php get_template_part('/component/btn', null, [
        'url'   => '/newslist',
        'label' => 'お知らせ一覧を見る',
      ]);  ?>
    </hgroup>
    <div class="c-news-list">
      <?php
      // 現在の投稿IDを取得
      $current_post_id = get_the_ID();

      // 現在の記事のカテゴリーを取得（$category_slugに格納されている前提）
      // もし$category_slugが未定義の場合は、現在の記事から直接取得
      if (!isset($category_slug)) {
        $terms = get_the_terms($current_post_id, 'taxonomy_news');
        if (!empty($terms) && !is_wp_error($terms)) {
          $category_slug = $terms[0]->slug;
        }
      }

      // カテゴリーが設定されていない場合
      if (empty($category_slug)) {
        echo '<p class="c-news-empty">関連記事はありません。</p>';
      } else {
        // 同じカテゴリーの記事を取得（現在の記事を除く）- 4記事に制限
        $news_query = new WP_Query(
          array(
            'post_type'      => 'news',
            'posts_per_page' => 4,
            'post__not_in'   => array($current_post_id), // 現在の記事を除外
            'tax_query'      => array(
              array(
                'taxonomy' => 'taxonomy_news',
                'field'    => 'slug',
                'terms'    => $category_slug,
              ),
            ),
          )
        );

        // サブループの開始
        if ($news_query->have_posts()) :
          while ($news_query->have_posts()) :
            $news_query->the_post();
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
        </div>
      </article>
      <?php
          endwhile;
          wp_reset_postdata();
        else:
          // 同じカテゴリーの記事がない場合の表示
          echo '<p class="c-news-empty">関連記事はありません。</p>';
        endif;
      }
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>