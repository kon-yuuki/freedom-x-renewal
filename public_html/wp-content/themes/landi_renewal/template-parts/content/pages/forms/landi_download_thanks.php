<style>
	.article.old_type section{
		margin-top: 20px;
	}
</style>


<div class="ttl_subpage_02 animation">
	<h1>
		<em>DOCUMENTS</em>
		<span>ランディPRO資料</span>
	</h1>
</div>

<article class="old_type bg form contact thanks">

	<?php include(get_template_directory() . '/template-parts/content/Breadcrumb.php'); ?>
    
	<section class="thanks_section">
	    <h2>資料をご請求いただきありがとうございます。</h2>
	    <p>下記資料請求ボタンよりダウンロードください。<br />また、オンラインで詳細のご説明をさせていただきます。お気軽にご予約ください。</p>
		<div class="btn_box">
			<a href="<?= get_template_directory_uri()."/src/pdf/ランディPRO_DL資料.pdf" ;?>" class="btn" download="ランディPRO_DL資料.pdf"><span><em>DOWNLOAD</em><small>資料ダウンロード</small></span></a>
		</div>
	</section>

	<section class="thanks_section">
	    <h2>オンラインで詳細のご説明も受け付けています。</h2>
	    <p>ダウンロードいただいた資料とヒアリングさせていただく内容をもとに<br class="pc" />スタッフが詳細をご説明させていただきます。</p>
	    <figure><img loading="lazy" src="<?php echo get_img_dir('form_thanks.jpg');?>" alt="オンラインで詳細のご説明も受け付けています。" width="853" height="360" ></figure>
		<div class="btn_box">
			<a href="<?php echo esc_url(home_url("/online")); ?>" class="btn"><span><em>RESERVATION</em><small>オンライン相談のご予約</small></span></a>
		</div>
	</section>

</article>
