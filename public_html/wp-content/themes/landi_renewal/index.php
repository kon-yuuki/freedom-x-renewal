<?php
get_header();
$template_pass = get_template_pass();

$slug = $post->post_name;
$parentSlug = is_parent_slug();


echo "ページスラッグ".$slug;
echo "親スラッグ".$parentSlug;

get_footer();?>