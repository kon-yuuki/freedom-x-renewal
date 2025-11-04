<?php
get_header();

  global $post;

  //スラッグを取得
  $post_type_slug = get_query_var('post_type');
  $post_type_tax = get_query_var('taxonomy');

  // var_dump($post_type_tax);
  // var_dump($post_type_slug);

  if($post_type_tax == "taxonomy_landi_area"){
    get_template_part('template-parts/content/taxonomy-landi_area');
  }

  if($post_type_tax == "taxonomy_magazine"){
    get_template_part('template-parts/content/taxonomy-magazine');
  }

  if($post_type_tax == "taxonomy_news"){
    get_template_part('template-parts/content/taxonomy-news');
  }

  if($post_type_tax == "taxonomy_case_study"){
    get_template_part('template-parts/content/taxonomy_case_study');
  }

get_footer();
