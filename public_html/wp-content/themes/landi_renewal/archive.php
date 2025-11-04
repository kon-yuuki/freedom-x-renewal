<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package landi
 */

get_header();
if (is_archive()) {
    $post_type_slug = get_query_var('post_type');

    if (is_archive() && is_post_type_archive("news")) {
        get_template_part('template-parts/content/archive-news');
    } elseif (is_archive() && is_post_type_archive("recruit")) {
        get_template_part('template-parts/content/archive-recruit');
    } else {
        get_template_part('template-parts/content/archive-'.$post_type_slug);
    }
}
get_footer();
