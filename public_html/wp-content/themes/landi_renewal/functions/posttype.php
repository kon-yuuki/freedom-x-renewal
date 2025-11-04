<?php
/**************************************************
カスタム投稿タイプ
**************************************************/
class PostType {
	public function addPostType($type, $label, $icon, $capability, $hierarchical, $position, $rewrite, $supports, $showinrest){
		$args = array(
			'label' => $label,
			'public' => true,
			'show_ui' => true,
			'menu_icon' => $icon,
			'capability_type' => $capability,
			'hierarchical' => $hierarchical,
			'menu_position' => $position,
			'has_archive' => true,
			'rewrite' => $rewrite,
			'supports' => $supports,
			'show_in_rest' => $showinrest
		);
		register_post_type($type, $args);
	}

	public function addTaxonomy($taxonomy, $post_type, $label, $hierarchical, $rewrite, $capabilities){
		register_taxonomy(
			$taxonomy,
			$post_type,
			array(
				'label' => $label,
				'public' => true,
				'show_ui' => true,
				'hierarchical' => $hierarchical,
				'query_var' => true,
				'rewrite' => $rewrite,
				'show_in_rest' => true,
				'show_admin_column' => true,
				'capabilities' => array(
					'manage_terms' => $capabilities,
					'edit_terms' => $capabilities,
					'delete_terms' => $capabilities,
					'assign_terms' => 'edit_posts'
				)
			)
		);
	}
}

/* add_posttype */
function add_posttype(){
	$PostType = new PostType();

	//お知らせ - 詳細ページは/news/スラッグ/、アーカイブは/newslist/
	$PostType->addPostType(
		'news', 
		'お知らせ', 
		'dashicons-admin-post', 
		'post', 
		false, 
		5, 
		array(
			'slug' => 'news',    // 詳細ページのスラッグを'news'に設定
			'with_front' => true
		), 
		array('title', 'thumbnail', 'editor'), 
		true
	);
    
	$PostType->addPostType(
		'case_study', 
		'導入事例', 
		'dashicons-admin-post', 
		'post', 
		false, 
		5, 
		array(
			'slug' => 'case_study',    // 詳細ページのスラッグを'news'に設定
			'with_front' => true
		), 
		array('title', 'thumbnail', 'editor'), 
		true
	);
	
	//カテゴリー - URLを/newslist/カテゴリー名/に設定
	$PostType->addTaxonomy(
		'taxonomy_news', 
		'news', 
		'ニュースカテゴリー', 
		true, 
		array(
			'slug' => 'newslist',
			'with_front' => false,
			'hierarchical' => true
		), 
		'manage_categories'
	);
    
	$PostType->addTaxonomy(
		'taxonomy_case_study', 
		'case_study', 
		'導入事例カテゴリ', 
		true, 
		array(
			'slug' => 'case_study',
			'with_front' => false,
			'hierarchical' => true
		), 
		'manage_categories'
	);
	
	//タグ - URLを/newslist/tag/タグ名/に設定
	$PostType->addTaxonomy(
		'news_tag', 
		array('news'), 
		'ニュースタグ', 
		false, 
		array(
			'slug' => 'newslist/tag',
			'with_front' => false,
		), 
		'manage_categories'
	);
    
	$PostType->addTaxonomy(
		'casestudy_tag', 
		array('case_study'), 
		'導入事例タグ', 
		false, 
		array(
			'slug' => 'case_study/tag',
			'with_front' => false,
		), 
		'manage_categories'
	);

  //執筆者情報
	$PostType->addPostType(
		'author', 
		'執筆者', 
		'dashicons-admin-post', 
		'post', 
		false, 
		5, 
		array(
			'slug' => 'author',    // 詳細ページのスラッグを'news'に設定
			'with_front' => true
		), 
		array('title', 'thumbnail', 'editor'), 
		true
	);
}
add_action('init', 'add_posttype', 0);

/**
 * news投稿タイプのアーカイブURLを/newslist/に変更
 */
function custom_news_archive_url($url, $post_type) {
    if ($post_type === 'news') {
        // デフォルトの/news/を/newslist/に変更
        return home_url('/newslist/');
    }
    return $url;
}
add_filter('post_type_archive_link', 'custom_news_archive_url', 10, 2);

/**
 * taxonomy_newsのURL構造を/newslist/ターム名/に変更するフィルター
 */
function fix_taxonomy_news_permalink($url, $term, $taxonomy) {
    // taxonomy_newsタクソノミーの場合
    if ($taxonomy === 'taxonomy_news') {
        // 現在のURLパターン「taxonomy_news/ターム名」を「newslist/ターム名」に変更
        $url = str_replace('taxonomy_news/', 'newslist/', $url);
    }
    
    // news_tagタクソノミーの場合
    if ($taxonomy === 'news_tag') {
        // タグのURLパターンも修正
        $url = str_replace('news_tag/', 'newslist/tag/', $url);
    }
    
    return $url;
}
add_filter('term_link', 'fix_taxonomy_news_permalink', 10, 3);

function fix_taxonomy_casestudy_permalink($url, $term, $taxonomy) {
    // taxonomy_newsタクソノミーの場合
    if ($taxonomy === 'taxonomy_case_study') {
        // 現在のURLパターン「taxonomy_news/ターム名」を「case_study/ターム名」に変更
        $url = str_replace('taxonomy_case_study/', 'case_study/', $url);
    }
    
    // news_tagタクソノミーの場合
    if ($taxonomy === 'casestudy_tag') {
        // タグのURLパターンも修正
        $url = str_replace('casestudy_tag/', 'case_study/tag/', $url);
    }
    
    return $url;
}
add_filter('term_link', 'fix_taxonomy_casestudy_permalink', 10, 3);

/**
 * リライトルールの追加
 */
function custom_news_rewrite_rules() {

    // ===== NEWS関連のリライトルール =====
    
    // ニュースタグ一覧（具体的なパターンを先に）
    add_rewrite_rule(
        '^newslist/tag/([^/]+)/?$',
        'index.php?news_tag=$matches[1]',
        'top'
    );
    
    // ニュースタグ一覧のページネーション
    add_rewrite_rule(
        '^newslist/tag/([^/]+)/page/([0-9]{1,})/?$',
        'index.php?news_tag=$matches[1]&paged=$matches[2]',
        'top'
    );
    
    // ニュース投稿タイプ一覧ページ
    add_rewrite_rule(
        '^newslist/?$',
        'index.php?post_type=news',
        'top'
    );
    
    // ニュース投稿タイプ一覧のページネーション
    add_rewrite_rule(
        '^newslist/page/([0-9]{1,})/?$',
        'index.php?post_type=news&paged=$matches[1]',
        'top'
    );
    
    // ニュースカテゴリー一覧（より広いパターンを後に）
    add_rewrite_rule(
        '^newslist/([^/]+)/?$',
        'index.php?taxonomy_news=$matches[1]',
        'top'
    );
    
    // ニュースカテゴリー一覧のページネーション
    add_rewrite_rule(
        '^newslist/([^/]+)/page/([0-9]{1,})/?$',
        'index.php?taxonomy_news=$matches[1]&paged=$matches[2]',
        'top'
    );
    
    // ===== CASE_STUDY関連のリライトルール =====
    
    // 導入事例タグ一覧（具体的なパターンを先に）
    add_rewrite_rule(
        '^case_study/tag/([^/]+)/?$',
        'index.php?casestudy_tag=$matches[1]',
        'top'
    );
    
    // 導入事例タグ一覧のページネーション
    add_rewrite_rule(
        '^case_study/tag/([^/]+)/page/([0-9]{1,})/?$',
        'index.php?casestudy_tag=$matches[1]&paged=$matches[2]',
        'top'
    );

    // 導入事例詳細ページ（数字のみのパターン）
add_rewrite_rule(
    '^case_study/([0-9]+)/?$',
    'index.php?post_type=case_study&p=$matches[1]', // pパラメータで投稿IDを指定
    'top'
);
    
    // 導入事例カテゴリー一覧（より広いパターンを後に）
    add_rewrite_rule(
        '^case_study/([^/]+)/?$',
        'index.php?taxonomy_case_study=$matches[1]',
        'top'
    );
    
    // 導入事例カテゴリー一覧のページネーション
    add_rewrite_rule(
        '^case_study/([^/]+)/page/([0-9]{1,})/?$',
        'index.php?taxonomy_case_study=$matches[1]&paged=$matches[2]',
        'top'
    );
}
add_action('init', 'custom_news_rewrite_rules', 10);

/**
 * リライトルールのフラッシュを行う関数
 */
function custom_rewrite_flush() {
    add_posttype();
    custom_news_rewrite_rules();
    flush_rewrite_rules();
}

// プラグイン有効化時にリライトルールをフラッシュ
register_activation_hook(__FILE__, 'custom_rewrite_flush');

// パーマリンク設定保存時にリライトルールをフラッシュ
add_action('init', function() {
    if (isset($_GET['settings-updated'])) {
        flush_rewrite_rules();
    }
}, 20);


/**************************************************
カスタム投稿タイプごとの管理画面表記
**************************************************/

add_filter('manage_blog_posts_columns', 'add_blog_author_column');
function add_blog_author_column($columns) {
    $columns['blog_author'] = '執筆者';
    return $columns;
}

add_action('manage_blog_posts_custom_column', 'display_blog_author_value', 10, 2);
function display_blog_author_value($column_name, $post_id) {
    if ($column_name == 'blog_author') {
        $blog_author_value = get_post_meta($post_id, 'blog_author', true);
        if (!empty($blog_author_value)) {
            $blog_author_post = get_post($blog_author_value);
            if ($blog_author_post) {
                echo esc_html($blog_author_post->post_title);
            } else {
                echo '-';
            }
        } else {
            echo '-';
        }
    }
}

// デフォルトのタクソノミーカラムをソート可能にする
add_filter('manage_edit-news_sortable_columns', 'make_default_taxonomy_columns_sortable');
function make_default_taxonomy_columns_sortable($columns) {
    // デフォルトのカテゴリーカラムをソート可能に
    $columns['taxonomy-taxonomy_news'] = 'taxonomy-taxonomy_news';
    
    // デフォルトのタグカラムをソート可能に
    $columns['taxonomy-news_tag'] = 'taxonomy-news_tag';
    
    return $columns;
}


// news投稿タイプの管理画面にカテゴリーカラムを追加
add_filter('manage_news_posts_columns', 'add_news_category_column');
function add_news_category_column($columns) {
    // 新しいカラムを追加（日付の前に挿入するため）
    $new_columns = array();
    
    foreach($columns as $key => $value) {
        if($key == 'date') {
            // taxonomy_newsカラムを追加
            $new_columns['taxonomy_news_custom'] = 'カテゴリー';
        }
        $new_columns[$key] = $value;
    }
    
    return $new_columns;
}

// 追加したカテゴリーカラムに値を表示
add_action('manage_news_posts_custom_column', 'display_news_category_value', 10, 2);
function display_news_category_value($column_name, $post_id) {
    if($column_name == 'taxonomy_news_custom') {
        // カテゴリー(taxonomy_news)の表示
        $terms = get_the_terms($post_id, 'taxonomy_news');
        if(!empty($terms) && !is_wp_error($terms)) {
            $term_names = array();
            foreach($terms as $term) {
                $term_names[] = '<a href="edit.php?post_type=news&taxonomy_news=' . $term->slug . '">' . esc_html($term->name) . '</a>';
            }
            echo implode(', ', $term_names);
        } else {
            echo '-';
        }
    }
}

// カテゴリーカラムをソート可能にする
add_filter('manage_edit-news_sortable_columns', 'news_category_sortable_column');
function news_category_sortable_column($columns) {
    $columns['taxonomy_news_custom'] = 'taxonomy_news_custom';
    return $columns;
}