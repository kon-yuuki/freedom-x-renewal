<?php

get_header();

	if(is_single()){
		$post_type_slug = get_query_var('post_type'); 
		get_template_part( 'template-parts/content/single-'.$post_type_slug);
	}	

get_footer();
