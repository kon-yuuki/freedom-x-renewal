<ul class="c-tag-list">
  <?php 
// taxonomy_newsタクソノミーの全ターム（カテゴリー）を取得
  $terms = get_terms(array(
    'taxonomy' => 'news_tag',
    'hide_empty' => true,
  ));
   // タームを出力
   if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
      // 「非表示」という名前のタームはスキップ
      if ($term->name === '非表示') {
        continue;
      }

      $term_link = get_term_link($term);
  ?>
  <li class="c-tag-list__item"><a href="<?php echo esc_url($term_link); ?>"
      class="c-tag-list__link c-card-innerLink c-linelink--hidden"><span
        class="c-linelink__txt">#<?php echo esc_html($term->name); ?></span></a>
  </li>
  <?php
    }
}
?>
</ul>