<?php
//-----------------------------------------------------
// 投稿メニューを非表示
//-----------------------------------------------------
function remove_menus()
{
  remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_menus');

//-----------------------------------------------------
// ヘッダーの不要な通知を削除
//-----------------------------------------------------
function remove_admin_bar($wp_admin_bar)
{
  $wp_admin_bar->remove_menu('updates');
  $wp_admin_bar->remove_menu('comments');
}
add_action('admin_bar_menu', 'remove_admin_bar');


//-----------------------------------------------------
// 「メディア」の表記を修正
//-----------------------------------------------------
function change_menu_label()
{
  global $menu, $submenu;
  $menu[2][0] = 'ホーム';
  $menu[10][0] = '画像・ファイル';
  $submenu['upload.php'][5][0] = '画像・ファイル一覧';
  $submenu['upload.php'][10][0] = '画像・ファイルを追加';
}
add_action('admin_menu', 'change_menu_label');

//SVG対応させる
function add_file_types_to_uploads($file_types)
{
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

//-----------------------------------------------------
// 不要なウィジェットを削除
//----------------------------------------------

function remove_dashboard_widget()
{
  remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // サイトヘルスステータス
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // 概要
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // アクティビティ
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // クイックドラフト
  remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress イベントとニュース
  remove_action('welcome_panel', 'wp_welcome_panel'); // ウェルカムパネル
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');


/**
 * カスタムオプションページを作成する
 */
function my_custom_options_page() {
    // 1. 管理メニューに追加
    add_menu_page(
        'カスタム設定', // ページタイトル
        'カスタム設定', // メニュータイトル
        'manage_options', // 必要な権限
        'my-custom-settings', // メニュースラッグ
        'my_custom_settings_page', // コールバック関数
        'dashicons-admin-generic', // アイコン
        20 // 位置
    );

    // サブメニューを追加する場合
    add_submenu_page(
        'my-custom-settings', // 親メニューのスラッグ
        'サブページ', // ページタイトル
        'サブページ', // メニュータイトル
        'manage_options', // 必要な権限
        'my-custom-sub-settings', // メニュースラッグ
        'my_custom_sub_settings_page' // コールバック関数
    );
}
add_action('admin_menu', 'my_custom_options_page');

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' => 'トップページ編集', // ページタイトル
    'menu_title' => 'トップページ編集', // メニュータイトル
    'menu_slug' => 'theme-general-settings', // メニュースラッグ
    'capability' => 'edit_posts',
    'redirect' => false,
    'position' => 6
  ));
}