<?php
/**************************************************
管理画面
**************************************************/
/* favicon */
// add_filter('get_site_icon_url', function($url, $size, $blog_id){
// 	return get_stylesheet_directory_uri().'/assets/imgs/favicon.svg';
// }, 11, 3);


/* css, js追加 */
function on_add_js_css(){
	global $util;
	wp_enqueue_style(
		'my-admin',
		get_stylesheet_directory_uri().'/assets/css/admin.css',
		array(),
		$util->ver(),
		'all'
	);
}
// add_action('admin_enqueue_scripts', 'on_add_js_css');

/* エディタスタイル */
function on_setup_theme(){
	add_theme_support('editor-styles');
	// add_editor_style(get_stylesheet_directory_uri().'/assets/css/editor.css');
	add_editor_style('assets/css/editor.css');
}
add_action('after_setup_theme', 'on_setup_theme');


/* css, js削除 */
function on_remove_js_css(){
	wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'on_remove_js_css', 10);


/* メニュー並び替え */
function edit_admin_menu(){
	global $menu;
	foreach( $menu as $key=>$val ) {
		// 投稿、固定ページ、コメント、リンク
		if(
			$val[2] == 'edit.php'
			|| $val[2] == 'edit-comments.php'
			|| $val[2] == 'edit-tags.php?taxonomy=link_category'
		) {
			unset($menu[$key]);
		}
	}
}
add_action('admin_menu', 'edit_admin_menu');


/* WYSIWYGエディター */
add_filter('acf/fields/wysiwyg/toolbars', function($toolbars){
	$toolbars['Simple'] = array();
	$toolbars['Simple'][1] = array('bold', 'italic', 'strikethrough', 'link', 'unlink');
	return $toolbars;
});


/* アイキャッチにキャプション追加 */
// add_filter('admin_post_thumbnail_html', function($content){
// 	global $post_type;
// 	$description = '';
// 	if( $post_type == 'potlucker' ) {
// 		$description = '1800px × 945pxの画像を設定してください。';
// 	}
// 	if( $description ) {
// 		$content = '<p class="description">'.$description.'</p>'.$content;
// 	}
// 	return $content;
// });