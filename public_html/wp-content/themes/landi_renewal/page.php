<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package landi
 */

get_header();

        while (have_posts()) :
            the_post();
            
            //スラッグを取得
            $slug = $post->post_name;
            $parentSlug = is_parent_slug();

            if ($slug === "contact" && !is_parent_slug("contact")||
                $slug === "landi_contact" && !is_parent_slug("landi_contact") ||
                $slug === "online" && !is_parent_slug("online") || 
                $slug === "landi_download" && !is_parent_slug("landi_download") || 
                $slug === "counter_download" && !is_parent_slug("counter_download")
            ) {
                //テンプレート読み出し
                get_template_part('template-parts/content/pages/forms/'.$slug);
            } elseif (is_parent_slug("contact")|| is_parent_slug("landi_contact")||
            is_parent_slug("eventform")|| is_parent_slug("experience") ||
            is_parent_slug("online") || is_parent_slug("landi_download") || 
            is_parent_slug("counter_download") 
            ) {
                //テンプレート読み出し
                get_template_part('template-parts/content/pages/forms/'.$slug);
            } else {	//テンプレート読み出し
                get_template_part('template-parts/content/pages/'.$slug);
            }

            if($slug === "counter_area" && is_parent_slug("counter")){
                get_template_part('template-parts/content/pages/counter_area');
            }

            if($slug === "partner"){
                get_template_part('template-parts/content/pages/partner');
            }

            if($slug === "app"){
                get_template_part('template-parts/content/pages/app');
            }

        endwhile; // End of the loop.

get_footer();
