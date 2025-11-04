<?php

global $util;
$pageinfo = array(
  'page_id' => 'materials',
  'navigation' => 'materials renewal bg-gray',
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
      <span class="c-breadNav-link">お役立ち資料一覧
      </span>
    </li>
  </ul>
</nav>

<section class="p-company-fv p-materials-fv">
  <div class="l-fv flex">
    <hgroup class="l-fv__heading">
      <h1 class="l-fv__heading--sub"><a href="#" class="c-linelink "><span
            class="c-linelink__txt is-ib">お役立ち資料一覧</span></a>
      </h1>
      <p class="l-fv__heading--main big">今すぐ使える<br>
        営業効率化の<strong class="c-green"><br class="pc-hidden">お役立ち資料集</strong></p>
    </hgroup>
    <p class="l-fv__txt sp-hidden">お名前や会社名などの<br>必要事項を入力いただくと<br>ご自由にダウンロードができますのでお役立てください</p>
  </div>
</section>

<main class="p-materials c-main non-module c-content">
  <div class="c-grid-outer">
    <?php
    // 現在のカテゴリを取得（アーカイブページの場合）
    $current_term_id = 0;
    if (is_tax('materials_category')) {
      $current_term = get_queried_object();
      $current_term_id = $current_term->term_id;
    }

    // すべてのmaterials_categoryタームを取得
    $terms = get_terms(array(
      'taxonomy' => 'materials_category',
      'hide_empty' => true,
    ));

    // アーカイブページへのリンク（すべての投稿を表示するページ）
    $archive_url = get_post_type_archive_link('materials');
    ?>
    <nav class="p-top-casestudy__nav">
      <ul class="p-top-casestudy__cat-list">
        <li class="p-top-casestudy__cat-item<?php echo (!is_tax('materials_category')) ? ' is-current' : ''; ?>">
          <a href="<?php echo esc_url($archive_url); ?>" class="p-top-casestudy__cat-link">すべて</a>
        </li>

        <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <?php foreach ($terms as $term) : ?>
        <li class="p-top-casestudy__cat-item<?php echo ($current_term_id === $term->term_id) ? ' is-current' : ''; ?>">
          <a href="<?php echo esc_url(get_term_link($term)); ?>" class="p-top-casestudy__cat-link">
            <?php echo esc_html($term->name); ?>
          </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </nav>
    <div class="p-materials-list c-col col3">
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
      <article class="p-material-list__item c-col__item ">
        <div class="c-card c-linelink p-material-list__item--link">
          <a href="<?php echo $permalink ?>" class=" c-card-mainLink">
            <h3 class="u-visually-hidden"><?php echo $title ?></h3>
          </a>
          <div class="c-card-body p-material-list__link">
            <div class="p-material-list__detail">
              <p class="p-material-list__ttl"><span class="c-linelink__txt bottom-5"><?php echo $title;  ?></span>
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
  </div>

</main>


<?php get_footer(); ?>