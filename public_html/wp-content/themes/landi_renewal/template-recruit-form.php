<?php
/*
Template Name: 採用フォーム用
Template Post Type: recruit
*/

get_header();

	// /thanks/がURLに含まれているかをチェック
	if (strstr($_SERVER['REQUEST_URI'], 'thanks')) {
		$check_url = 'thanks';
	}
?>

<article class="single single_recruit form <?php if($check_url === 'thanks'){ echo 'thanks'; } ?>">

    <?php include(get_template_directory() . '/template-parts/content/Breadcrumb.php'); ?>
	<div class="ttl_box corp animation">
		<h1><em>Entry</em><span>採用応募フォーム</span></h1>
        <p>下記のフォームに必要事項をご入力のうえ、<br>「内容の確認」ボタンを押してください。</p>
	</div>

	<div class="inner">

		<?php if($check_url === 'thanks'){ ?>

			<div class="thanks_box">
				<p>ご入力いただきありがとうございます。<br class="pc">
				下記の「ダウンロード」ボタンを押して、<br class="pc">
				資料をダウンロードください。</p>
				<a href="<?= $downloaadUrl; ?>" download="<?= $downloaadUrl; ?>" target="_blank" class="shift_button corp">資料ダウンロード</a>
			</div>
			
		<?php } else { ?>
	
	</div>
		
    <section class="form_section">
        <div class="inner">
            <div class="form_area">
                <?php 
                    $form_id = do_shortcode('[mwform_formkey key="7890"]');
                    echo $form_id; 
                ?>
            </div>
        </div>
    </section>

		<?php } ?>

</article>

<?php
get_footer();