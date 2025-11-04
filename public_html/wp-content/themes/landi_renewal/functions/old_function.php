<?php

/**
 * landi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package landi
 */

if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (! function_exists('landi_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function landi_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on landi, use a find and replace
         * to change 'landi' to the name of your theme in all the template files.
         */
        load_theme_textdomain('landi', get_template_directory() . '/languages');
    }
endif;
add_action('after_setup_theme', 'landi_setup');


/**
 * Enqueue scripts.
 *
 * Jsの読み込み
 */
function landi_init_scripts()
{
    if (!is_admin() && !is_login_page()) {
        //デフォルトのjqueryを解除
        wp_deregister_script('jquery');
        wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", array(), _S_VERSION);
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'landi_init_scripts'); // Add Custom Scripts to wp_footer

/**
 * Enqueue scripts and styles.
 *
 * CSSの読み込み
 */
function landi_styles()
{

    wp_register_style('layout-css', get_template_directory_uri() . '/src/css/layout.css', array(), _S_VERSION);
    wp_enqueue_style('layout-css');

    wp_register_style('main-css', get_template_directory_uri() . '/src/renewal/css/main.css?v=20251008', array(), _S_VERSION);
    wp_enqueue_style('main-css');

    wp_register_script('desvg-js', get_template_directory_uri() . '/src/js/desvg.js', array('jquery'), _S_VERSION);
    wp_enqueue_script('desvg-js');

    wp_register_script('common-js', get_template_directory_uri() . '/src/js/common.js?240115', array('jquery'), _S_VERSION);
    wp_enqueue_script('common-js');

    wp_register_script('ajaxzip3-js', 'https://ajaxzip3.github.io/ajaxzip3.js', array('jquery'), _S_VERSION);
    wp_enqueue_script('ajaxzip3-js');

    wp_register_style('style-css', get_template_directory_uri() . '/src/css/style.css', array('layout-css'), _S_VERSION);
    wp_enqueue_style('style-css');
}
add_action('wp_enqueue_scripts', 'landi_styles');


/**
 * 画像フォルダのパスを返す
 */
function get_img_dir(string $url = null)
{
    if (isset($url) && !empty($url)) {
        return get_template_directory_uri() . "/src/img/" . $url;
    }
    return get_template_directory_uri() . "/src/img/";
}

// テンプレートファイル読み込み
function get_template_pass()
{
    $pass = "/template-parts/inc/";
    return $pass;
}

//　親ページのスラッグを取得
function is_parent_slug()
{
    global $post;

    if (isset($post->post_parent) && $post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}

// 単一の投稿に登録されている子タクソノミーを親タクソノミーに紐づけて取得
function get_post_terms_list($post_id, $post_term)
{
    // 単一の投稿に登録されているタクソノミー一覧を取得
    $terms = get_the_terms($post_id, $post_term);

    //　親タクソノミー取得
    foreach ($terms as $term) {
        $parent = $term->parent;
    }

    $args = array('fields' => 'all');
    $terms = wp_get_post_terms($post_id, $post_term, $args);

    foreach ($terms as $field => $value) {

        // 子ターム名を取得
        $name = $value->name;
        $slug = $value->slug;

        // 親タームIDから親タームを取得
        if ($value->parent) {
            $parent_term_id = $value->parent;
            $parent_term = get_term($parent_term_id);
            $parent_slug = $parent_term->slug;

            $post_terms[$parent_slug] = [
                'name' => $name,
                'slug' => $slug
            ];
        }
    }
    return $post_terms;
}

// 管理バーを非表示にする
add_filter('show_admin_bar', '__return_false');

// 自動挿入のPタグBRタグ削除
remove_filter('the_content', 'wpautop');

// タイトルタグの自動出力
function mytheme_set()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_set');

// function change_title_tag($title)
// {
//     if (is_category()) { /* カテゴリーアーカイブの場合 */
//         $title = single_cat_title('', false);
//     } elseif (is_tag()) { /* タグアーカイブの場合 */
//         $title = single_tag_title('', false);
//     } elseif (is_post_type_archive('works')) { /* parts投稿タイプのアーカイブの場合 */
//         $title = '施工例集';
//     }
//     return $title;
// }
// add_filter('pre_get_document_title', 'change_title_tag');

// ログイン画面を判定
function is_login_page()
{
    if (in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {
        return true;
    } else {
        return false;
    }
}

//独自ページネーション
function pagination($pages, $paged, $range = 2, $show_only = false)
{
    $pages = (int) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;

    for ($i = 1; $i <= $pages; $i++) {
        if ($i <= $paged + $range && $i >= $paged - $range) {
            // $paged +- $range 以内であればページ番号を出力
            if ($paged === $i) {
                echo "<a class=\"current\">" . $i . "</a>";
            } else {
                echo "<a class='num' href='" . get_pagenum_link($i) . "'>" . $i . "</a>";
            }
        }
    }
}

//　曜日を返す関数
function formatDaysOfWeek(): array
{
    $week = array("日", "月", "火", "水", "木", "金", "土");
    return $week;
}

function dateDiffer($date1, $date2): bool
{
    $date = ($date1 - $date2) / 86400;

    if (floor($date) <= 7) {
        return true;
    } else {
        return false;
    }
}

// フォームを判定
function is_form()
{
    if (!is_tax() && !is_archive()) {
        global $post;

        $post->post_name;

        if (
            $post->post_name == "contact" ||
            $post->post_name == "reservation" ||
            $post->post_name == "INTERVIEW"
        ) {
            return true;
        } else {
            return false;
        }
    }
}

// 文字列を丸める
function mb_strimlen($str, $start, $length, $trimmarker = '', $encoding = false): string
{
    $encoding = $encoding ? $encoding : mb_internal_encoding();
    $str = mb_substr($str, $start, mb_strlen($str), $encoding);
    if (mb_strlen($str, $encoding) > $length) {
        $markerlen = mb_strlen($trimmarker, $encoding);
        $str = mb_substr($str, 0, $length - $markerlen, $encoding) . $trimmarker;
    }
    return $str;
}
// 投稿スラッグ書き換え
function auto_post_slug($override_slug, $slug, $post_ID, $post_status, $post_type, $post_parent)
{
    if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
        $override_slug = utf8_uri_encode($post_type) . '-' . $post_ID;
    }
    return $override_slug;
}
add_filter('pre_wp_unique_post_slug', 'auto_post_slug', 10, 6);

// リライトルール追加
add_action('init', function () {

    add_rewrite_rule('^landi/landi_area/([^0-9]+)', 'index.php?posttype=landi_area&taxonomy_landi_area=$matches[1]', 'top');
    // add_rewrite_rule('^landi/magazine/([^0-9]+)?$', 'index.php?posttype=magazine&taxonomy_magazine=$matches[1]', 'top');
    // add_rewrite_rule('landi/magazine/([^0-9]+)/page/?([0-9]{1,})/?$', 'index.php?posttype=news&taxonomy_magazine=$matches[1]&paged=$matches[2]', 'top');

    add_rewrite_rule('landi/magazine/([^0-9]+)/?$', 'index.php?taxonomy_magazine=$matches[1]&taxonomy=taxonomy_magazine', 'top');
    add_rewrite_rule('landi/magazine/([^0-9]+)/page/([^/]+)/?$', 'index.php?taxonomy_magazine=$matches[1]&taxonomy=taxonomy_magazine&paged=$matches[2]', 'top');

    //add_rewrite_rule('^column/all/page/?([0-9]{1,})/?$', 'index.php?pagename=columnall&paged=$matches[1]', 'top');
    // add_rewrite_rule('^news/page/([0-9]{1,})$', 'index.php?posttype=news&paged=$matches[1]', 'top');
    // add_rewrite_rule('^news/([^0-9]+)/page/([0-9]{1,})$', 'index.php?posttype=news&taxonomy_news=$matches[1]&paged=$matches[2]', 'top');
    // add_rewrite_rule('^news/([^0-9]+)$', 'index.php?posttype=news&taxonomy_news=$matches[1]', 'top');

    add_rewrite_rule('news/page/([0-9]{1,})/?$', 'index.php?posttype=news&paged=$matches[1]', 'top');
    add_rewrite_rule('news/([^0-9]+)/?$', 'index.php?posttype=news&taxonomy_news=$matches[1]', 'top');
    add_rewrite_rule('news/([^0-9]+)/page/?([0-9]{1,})/?$', 'index.php?posttype=news&taxonomy_news=$matches[1]&paged=$matches[2]', 'top');

}, 0);

// ショートコード：PHPファイルを読み込む
function my_php_Include($params = array())
{
    extract(shortcode_atts(array('file' => 'default'), $params));
    ob_start();
    include(STYLESHEETPATH . "/template-parts/inc/shortcodes/$file.php");
    return ob_get_clean();
}
add_shortcode('call_php', 'my_php_Include');

// ショートコード：ルートディレクトリを起点としたパスを取得
function custom_shortcode_return_home_url($param = array())
{
    // ショートコードの引数を変換
    extract(shortcode_atts(array('param' => '/'), $param));

    return esc_url(home_url($param));
}
add_shortcode('csc_get_home_url', 'custom_shortcode_return_home_url');

// ショートコード：画像ディレクトリのパスを取得
function custom_shortcode_get_img_dir($atts = array())
{
    // ショートコードの引数を変換
    extract(shortcode_atts(array('param' => null), $atts));

    return get_img_dir($param);
}
add_shortcode('csc_get_img_dir', 'custom_shortcode_get_img_dir');


// ショートコード：投稿のタイトルを取得
function custom_shortcode_get_post_title($atts = array())
{
    // ショートコードの引数を変換
    extract(shortcode_atts(array('param' => null), $atts));

    return get_the_title($param);
}
add_shortcode('csc_get_post_title', 'custom_shortcode_get_post_title');

// 最新の個別記事を日付降順で返す（pickup）
function getPickupArticles($per = 5, $offset = 0, $cat_id = '', $exclude = '')
{
    return get_posts([
        // 2019.10.15 suzuki 取得するタクソノミーカテゴリーを投稿に変更
        'post_type' => 'magazine',
        'posts_per_page' => $per,
        'order' => 'DESC',
        'orderBy' => 'date',
        'meta_key' => 'pickup',
        'meta_value' => 'pickup',
        'offset' => $offset,
        'category' => $cat_id,
        'exclude' => $exclude,
    ]);
}

function getDisplayCategoryName($category_name)
{
    $array = [
        'ノウハウ' => 'KNOW-HOW',
        '体験談' => 'INTERVIEW',
        'エリア選び' => 'AREA',
        'お金について' => 'MONEY',
        '未分類' => 'UNCATEGORIZED',
    ];
    return $array[$category_name];
}

/**
 * APIの登録
 * 
 * @param [type] $data
 * @return void
 */
function get_magazines_api($data)
{
    $version = '2';
    $namespace = 'wp/v' . $version;

    //　ランディマガジン(ターム別)の取得
    register_rest_route($namespace, '/get_magazine', array(
        'methods' => 'GET',
        'callback' => 'get_magazines'
    ));

    // ランディマガジンの取得
    register_rest_route($namespace, '/get_magazine_all', array(
        'methods' => 'GET',
        'callback' => 'get_magazines_all'
    ));
}

/**
 * API ランディマガジン(カスタム投稿)のタ―ム別取得
 *
 * @return void
 */
function get_magazines()
{
    global $post;
    $return = array();
    $args = array();
    $thum = "";

    $DisplayCategoryName = [
        'know-how' => [
            'name' => 'ノウハウ',
            'slug' => 'KNOW-HOW'
        ],
        'interview' => [
            'name' => '体験談',
            'slug' => 'INTERVIEW'
        ],
        'area' => [
            'name' => 'エリア選び',
            'slug' => 'AREA'
        ],
        'money' => [
            'name' => 'お金について',
            'slug' => 'MONEY'
        ],
        'uncategorized' => [
            'name' => '未分類',
            'slug' => 'UNCATEGORIZED'
        ]
    ];

    $args = array(
        'posts_per_page' => 6,
        'orderby' => 'date', // 更新日でソート
        'order' => 'DESC',
        'post_type' => 'magazine',     // DESCで最新から表示、ASCで最古から表示
        'tax_query' => [ // 特定のカテゴリースラッグを指定
            [
                'taxonomy' => 'taxonomy_magazine',
                'field' => 'slug',
                'terms' => $_GET['term'],
            ],
        ],
        'offset' => $_GET['offset'],
        'public' => true,
        '_builtin' => false,
    );

    $query = new WP_Query($args);

    // 総投稿数を取得
    $all_posts = $query->found_posts;

    // カテゴリ名とスラッグを併せて取得
    $termName = $DisplayCategoryName[$_GET['term']];

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            // サムネイル画像のURLを取得
            $thum = get_field('thum');
            $post->thum = $thum;
            // カテゴリ名とスラッグを併せて取得
            $post->termName = $termName;
            $post->link = get_permalink($post->ID);
            // 総投稿数を取得
            $post->all = $all_posts;
            $return[] = $post;
        }
        wp_reset_postdata();
    }
    return new WP_REST_Response($return, 200);
}

/**
 * API ランディマガジン(カスタム投稿)の取得
 *
 * @return void
 */
function get_magazines_all()
{
    global $post;
    $return = array();
    $args = array();
    $thum = "";
    $query = "";

    $DisplayCategoryName = [
        'know-how' => [
            'name' => 'ノウハウ',
            'slug' => 'KNOW-HOW'
        ],
        'interview' => [
            'name' => '体験談',
            'slug' => 'INTERVIEW'
        ],
        'area' => [
            'name' => 'エリア選び',
            'slug' => 'AREA'
        ],
        'money' => [
            'name' => 'お金について',
            'slug' => 'MONEY'
        ],
        'uncategorized' => [
            'name' => '未分類',
            'slug' => 'UNCATEGORIZED'
        ]
    ];

    $args = array(
        'posts_per_page' => 6,
        'orderby' => 'date', // 更新日でソート
        'order' => 'DESC',     // DESCで最新から表示、ASCで最古から表示
        'offset' => $_GET['offset'],
        'post_type' => 'magazine',
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);

    // 総投稿数を取得
    $all_posts = $query->found_posts;

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {

            // カテゴリ名とスラッグを併せて取得
            $taxonomy = get_the_terms($post->ID, 'taxonomy_magazine');
            $termName = $DisplayCategoryName[$taxonomy[0]->slug];
            $post->termName = $termName;

            // サムネイル画像のURLを取得
            $thum = get_field('thum');
            $post->thum = $thum;
            $post->link = get_permalink($post->ID);

            // 総投稿数を取得
            $post->all = $all_posts;
            $return[] = $post;
        }
        wp_reset_postdata();
    }
    return new WP_REST_Response($return, 200);
}

add_action('rest_api_init', 'get_magazines_api');
add_filter('rest_pre_serve_request', 'get_magazines_api', 11, 4);

/*----------------------------------
2022-07-20 バリデーションの追加
----------------------------------*/
if (class_exists('MW_WP_Form_Abstract_Validation_Rule')) {
    class MW_WP_Form_Validation_Rule_Freemail extends MW_WP_Form_Abstract_Validation_Rule
    {
        protected $name = 'freemail';

        public function rule($key, array $options = array())
        {
            $value = $this->Data->get($key);
            $freemails = array(
                'sute.jp',
                'docomo.ne.jp',
                'taro.yamada202202@gmail.com',
                'fanclub.pm',
            );

            if (!empty($value)) {
                foreach ($freemails as $freemail) {
                    if (preg_match("/@" . preg_quote($freemail) . "$/ui", $value)) {
                        $defaults = array(
                            'message' => 'こちらのメールアドレスではご利用頂けません。'
                        );
                        $options = array_merge($defaults, $options);
                        return $options['message'];
                    } elseif ($freemail === $value) {
                        $defaults = array(
                            'message' => 'こちらのメールアドレスではご利用頂けません。'
                        );
                        $options = array_merge($defaults, $options);
                        return $options['message'];
                    }
                }
            }
        }

        public function admin($key, $value)
        {
?>
<label><input type="checkbox" <?php checked($value[$this->get_name()], 1); ?>
    name="<?php echo MWF_Config::NAME; ?>[validation][<?php echo $key; ?>][<?php echo esc_attr($this->get_name()); ?>]"
    value="1" />フリーメールを除外する</label>
<?php }
    }

    function mwform_validation_rule_freemail($validation_rules)
    {
        $instance = new MW_WP_Form_Validation_Rule_Freemail();
        $validation_rules[$instance->get_name()] = $instance;
        return $validation_rules;
    }

    add_filter('mwform_validation_rules', 'mwform_validation_rule_freemail');
}

//20230613　投稿一覧の表示件数を変更

function change_posts_per_page($query)
{
    if (is_admin() || ! $query->is_main_query())
        return;

    if ($query->is_post_type_archive('news')) { //表示させる投稿ページの種類
        $query->set('posts_per_page', '10'); //最大投稿表示数を10件に変更
    }
    if ($query->is_tax('taxonomy_news')) { //表示させる投稿ページの種類
        $query->set('posts_per_page', '10'); //最大投稿表示数を10件に変更
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

function add_version_to_style($src)
{
    if (strpos($src, 'style.css') !== false) {
        $src = remove_query_arg('ver', $src); // クエリ文字列から既存のバージョン番号を削除します
        $src = add_query_arg('ver', filemtime(get_stylesheet_directory() . '/src/css/style.css'), $src); // ファイルの更新日付をバージョン番号として追加します
    }
    return $src;
}

add_filter('style_loader_src', 'add_version_to_style', 10, 2);


/*----------------------------------
2023-12-27 親記事の判別
----------------------------------*/
function page_is_ancestor_of($slug)
{
    global $post;

    // 親か判別したい固定ページスラッグからページ情報を取得
    $page = get_page_by_path($slug);
    $result = false;
    if (isset($page)) {
        foreach ($post->ancestors as $ancestor) {
            if ($ancestor == $page->ID) {
                $result = true;
            }
        }
    }
    return $result;
}

function materials_validation_rule($Validation, $data, $Data)
{
    $Validation->set_rule('company', 'noEmpty', array('message' => '※法人名を入力してください。'));
    $Validation->set_rule('department', 'noEmpty', array('message' => '※所属部署名を入力してください。'));
    $Validation->set_rule('position', 'required', array('message' => '※選択して下さい。')); //ラジオボタン、チェックボックスの場合
    $Validation->set_rule('person', 'noEmpty', array('message' => '※担当者名を入力してください。'));
    $Validation->set_rule('tel', 'noEmpty', array('message' => '※電話番号を入力してください。'));
    $Validation->set_rule('email', 'noEmpty', array('message' => '※メールアドレスを入力してください。'));
    $Validation->set_rule('privacy', 'required', array('message' => '※同意するを選択してください。')); //ラジオボタン、チェックボックスの場合
    $Validation->set_rule('attention', 'required', array('message' => '※確認したを選択してください。')); //ラジオボタン、チェックボックスの場合
    return $Validation;
}
add_filter('mwform_validation_mw-wp-form-7907', 'materials_validation_rule', 10, 3);

function recruit_validation_rule($Validation, $data, $Data)
{
    $Validation->set_rule('person', 'noEmpty', array('message' => '※お名前を入力してください。'));
    $Validation->set_rule('tel', 'noEmpty', array('message' => '※電話番号を入力してください。'));
    $Validation->set_rule('email', 'noEmpty', array('message' => '※メールアドレスを入力してください。'));
    $Validation->set_rule('zip_number', 'noEmpty', array('message' => '※郵便番号を入力してください。'));
    $Validation->set_rule('prefectures', 'required', array('message' => '※都道府県を入力してください。')); //ラジオボタン、チェックボックスの場合
    $Validation->set_rule('address1', 'noEmpty', array('message' => '※住所を入力してください。'));
    // $Validation->set_rule( 'town', 'noEmpty', array( 'message' => '※住所を入力してください。' ) );
    $Validation->set_rule('msg', 'noEmpty', array('message' => '※入力してください。'));
    $Validation->set_rule('privacy', 'required', array('message' => '※同意するを選択してください。')); //ラジオボタン、チェックボックスの場合
    return $Validation;
}
add_filter('mwform_validation_mw-wp-form-7890', 'recruit_validation_rule', 10, 3);

function casual_validation_rule($Validation, $data, $Data)
{
    $Validation->set_rule('check', 'required', array('message' => '※募集職種名を選択してください。')); //ラジオボタン、チェックボックスの場合
    $Validation->set_rule('person', 'noEmpty', array('message' => '※お名前を入力してください。'));
    $Validation->set_rule('tel', 'noEmpty', array('message' => '※電話番号を入力してください。'));
    $Validation->set_rule('email', 'noEmpty', array('message' => '※メールアドレスを入力してください。'));
    $Validation->set_rule('zip_number', 'noEmpty', array('message' => '※郵便番号を入力してください。'));
    $Validation->set_rule('prefectures', 'required', array('message' => '※都道府県を入力してください。')); //ラジオボタン、チェックボックスの場合
    $Validation->set_rule('address1', 'noEmpty', array('message' => '※住所を入力してください。'));
    // $Validation->set_rule( 'town', 'noEmpty', array( 'message' => '※住所を入力してください。' ) );
    $Validation->set_rule('msg', 'noEmpty', array('message' => '※入力してください。'));
    $Validation->set_rule('privacy', 'required', array('message' => '※同意するを選択してください。')); //ラジオボタン、チェックボックスの場合
    return $Validation;
}
add_filter('mwform_validation_mw-wp-form-7965', 'casual_validation_rule', 10, 3);

function my_mwform_after_send($Data)
{
    $form_key = $Data->get_form_key();
    if ($form_key === 'mw-wp-form-7907') {
        //フォームの完了画面のURL
        wp_redirect('/material/thanks');
        exit;
    }
}
add_action('mwform_after_send_mw-wp-form-7907', 'my_mwform_after_send');