<ul class="c-news-nav__cat-list">
  <li
    class="c-news-nav__cat-item <?php echo ((is_post_type_archive('case_study') && !is_tax('taxonomy_case_study')) || is_front_page()) ? 'is-current' : ''; ?>">
    <a href="<?php echo get_post_type_archive_link('case_study'); ?>" class="c-news-nav__cat-link">すべて</a>
  </li>

  <?php
  // taxonomy_case_studyタクソノミーの全ターム（カテゴリー）を取得
  $terms = get_terms(array(
    'taxonomy' => 'taxonomy_case_study',
    'hide_empty' => true,
  ));

  // 現在表示中のタームのIDを取得
  $current_term_id = 0;
  if (is_tax('taxonomy_case_study')) {
    $current_term = get_queried_object();
    $current_term_id = $current_term->term_id;
  }
  // 個別記事ページの場合、その記事に関連付けられたタームを取得
  elseif (is_singular('case_study')) {
    $post_id = get_queried_object_id();
    $post_terms = get_the_terms($post_id, 'taxonomy_case_study');
    if (!empty($post_terms) && !is_wp_error($post_terms)) {
      // 最初のタームのIDを使用（複数のタームが関連付けられている場合）
      $current_term_id = $post_terms[0]->term_id;
    }
  }

  // タームを出力
  if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
      // スラッグが 'kadai' の場合はスキップ
      if ($term->slug === 'kadai') {
        continue;
      }
      
      $term_link = get_term_link($term);
      $current_class = ($term->term_id == $current_term_id) ? 'is-current' : '';
  ?>
  <li class="c-news-nav__cat-item <?php echo $current_class; ?>">
    <a href="<?php echo esc_url($term_link); ?>" class="c-news-nav__cat-link"><?php echo esc_html($term->name); ?></a>
  </li>
  <?php
    }
  }
  ?>
</ul>