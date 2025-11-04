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

    // 遷移元の記事を取得
    $referrer = wp_get_referer();

    // 遷移元の記事が存在するか確認
    if ($referrer) {
        // 遷移元の記事から遷移元記事IDを抽出
        $referrer_post_id = url_to_postid($referrer);
    } else {
        echo '遷移元の記事が存在しません。';
    }

    // カスタムフィールドに保存された値を取得
    $downloaadUrl = get_field('materials_form_file', $referrer_post_id); ?>

<article class="single materials thanks">

    <?php include(get_template_directory() . '/template-parts/content/Breadcrumb.php'); ?>
	<div class="ttl_box corp animation">
		<h1><em>Download</em><span>ダウンロード</span></h1>
	</div>

    <div class="inner">

        <div class="thanks_box">
            <p>ご入力いただきありがとうございます。<br class="pc">
            下記の「ダウンロード」ボタンを押して、<br class="pc">
            資料をダウンロードください。</p>
            <a href="<?= $downloaadUrl; ?>" download="<?= $downloaadUrl; ?>" target="_blank" class="shift_button corp">資料ダウンロード</a>
        </div>

    </div>

</article>


<?php

get_footer();
