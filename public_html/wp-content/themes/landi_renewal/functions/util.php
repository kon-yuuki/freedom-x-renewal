<?php
/**************************************************
Util
**************************************************/
class Util {
	public function __construct(){
		// アップデート
		add_filter('filesystem_method', function($args){
			return 'direct';
		});
		// ツールバー非表示
		add_filter('show_admin_bar', '__return_false');
		// remove_action
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'rel_canonical');
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_head', 'rest_output_link_wp_head');
		remove_action('wp_head', 'wp_oembed_add_discovery_links');
		remove_action('wp_head', 'wp_oembed_add_host_js');
		remove_action('wp_print_styles', 'print_emoji_styles');

		// srcset
		add_filter( 'wp_calculate_image_sizes', '__return_false');
		add_filter( 'wp_calculate_image_srcset', '__return_false');
		// dns prefetch
		add_filter('wp_resource_hints', function($hints, $relation_type){
			if( 'dns-prefetch' === $relation_type ) {
				return array_diff(wp_dependencies_unique_hosts(), $hints);
			}
			return $hints;
		}, 10, 2);
		// アイキャッチ
		if( function_exists('add_theme_support') ) {
			add_theme_support('post-thumbnails');
			add_image_size('ogimage', 1200, 630, true);
		}
		add_action('after_setup_theme', function(){
			if( get_option('large_size_w') != 0 ) update_option('large_size_w', 1000);
			if( get_option('large_size_h') != 0 ) update_option('large_size_h', 0);
			if( get_option('medium_large_size_w') != 0 ) update_option('medium_large_size_w', 0);
			if( get_option('medium_large_size_h') != 0 ) update_option('medium_large_size_h', 0);
			if( get_option('medium_size_w') != 0 ) update_option('medium_size_w', 400);
			if( get_option('medium_size_h') != 0 ) update_option('medium_size_h', 0);
			if( get_option('thumbnail_size_w') != 0 ) update_option('thumbnail_size_w', 0);
			if( get_option('thumbnail_size_h') != 0 ) update_option('thumbnail_size_h', 0);
			if( get_option('image_default_link_type') != 'none' ) update_option('image_default_link_type', 'none');
			if( get_option('image_default_size') != 'large' ) update_option('image_default_size', 'large');
		});
	}

	public function page_link($slug=null){
		if( $slug ) {
			$page = get_page_by_path($slug);
			return get_permalink($page->ID);
		} else {
			return home_url('/');
		}
	}

	public function share($type=null){
		if( !$type ) return;
		$output = '';
		$text = html_entity_decode($this->pageInfo()->title(), ENT_HTML5, 'UTF-8');
		$url = $this->pageInfo()->url();
		if( $type == 'facebook' ) {
			$output = 'https://www.facebook.com/share.php?u='.urlencode($url);
		} elseif( $type == 'twitter' ) {
			$output = 'https://twitter.com/share?text='.urlencode($text).'&url='.urlencode($url);
		} elseif( $type == 'line' ) {
			$output = 'https://line.me/R/msg/text/?'.urlencode($url);
		}
		return $output;
	}


	//必要ないか確認
	// public function entryThumbnail($id=null){
	// 	$thumbID = null;
	// 	$thumbObj = null;
	// 	if( get_field('entry_thumbnail', $id) ) {
	// 		$thumbID = get_field('entry_thumbnail', $id);
	// 	} elseif( has_post_thumbnail($id) ) {
	// 		$thumbID = get_post_thumbnail_id($id);
	// 	}
	// 	if( $thumbID ) {
	// 		$thumbObj = wp_get_attachment_image_src($thumbID, 'thumbnail');
	// 	}
	// 	return $thumbObj;
	// }

	//必要ないか確認
	// public function entryPermalink($id=null){
	// 	$link = get_permalink($id);
	// 	$blank = false;
	// 	if( get_field('entry_link-url', $id) ) {
	// 		$link = get_field('entry_link-url', $id);
	// 		if( get_field('entry_link-blank', $id) ) {
	// 			$blank = true;
	// 		}
	// 	}
	// 	return array(
	// 		'link' => $link,
	// 		'blank' => $blank
	// 	);
	// }

	public function pageInfo(){
		return new PageInfo();
	}

	public function ver(){
		$theme = wp_get_theme();
		return $theme->Version;
	}
}

/* PageInfo */
class PageInfo {
	public $data;
	public function __construct(){
		global $util;
		$this->data = array(
			'page_id' => '',
			'page_cat' => '',
			'page_color' => '',
			'page_header' => '',
			'title' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
			'sitename' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
			'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。',
			'keywords' => '',
			'image' => array(
				'src' => get_stylesheet_directory_uri().'/assets/images/ogp.png?'.$util->ver(),
				'width' => 1200,
				'height' => 630
			),
			'url' => '',
			'body_class' => array(),
			'navigation' => ''
		);
		if( get_query_var('pageinfo') ) {
			foreach( get_query_var('pageinfo') as $key=>$val ) {
				if( $val ) {
					$this->data[$key] = $val;
				}
			}
		}
	}

	public function page_id(){
		return $this->data['page_id'];
	}

	public function page_cat(){
		return $this->data['page_cat'];
	}

	public function page_color(){
		return $this->data['page_color'];
	}

	public function page_header(){
		return $this->data['page_header'];
	}

	public function title(){
		return $this->data['title'];
	}

	public function description(){
		return $this->data['description'];
	}

	public function keywords(){
		return $this->data['keywords'];
	}

	public function type(){
		return ( is_front_page() )? 'website' : 'article';
	}

	public function sitename(){
		return $this->data['sitename'];
	}

	public function url(){
		if( $this->data['url'] ) {
			$output = $this->data['url'];
		} else {
			// $protocol = ( is_ssl() )? 'https' : 'http';
			// $output = $protocol.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			if( is_single() || is_page() ) {
				$output = get_the_permalink();
			} elseif( is_post_type_archive(get_query_var('post_type')) ) {
				$output = get_post_type_archive_link(get_query_var('post_type'));
			} else {
				$output = home_url('/');
			}
		}
		return $output;
	}

	public function image(){
		return $this->data['image'];
	}

	//必要ないか確認
	public function bodyClass(){
		$classes = array();
		if( $this->data['page_id'] ) {
			array_push($classes, 'page-'.$this->data['page_id']);
		}
		if( $this->data['body_class'] ) {
			$classes = array_merge($classes, $this->data['body_class']);
		}
		if( $classes ) {
			return implode(' ', $classes);
		} else {
			return '';
		}
	}

	public function navigation(){
		return $this->data['navigation'];
	}
}



$util = new Util();