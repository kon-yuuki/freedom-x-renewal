<?php

	$template_pass = get_template_pass();
	$post_meta = get_post_custom();

	// /thanks/がURLに含まれているかをチェック
	if (strstr($_SERVER['REQUEST_URI'], 'thanks')) {
		$check_url = 'thanks';
	}

?>

<article class="single materials <?php if($check_url === 'thanks'){ echo 'thanks'; } ?>">

	<?php include('Breadcrumb.php'); ?>
	<div class="ttl_box corp animation">
		<h1><em>Download</em><span>ダウンロード</span></h1>
	</div>

	<div class="inner">


		<div class="material_box">
			<h2 class="head_h2"><?php the_title(); ?></h2>
			<div class="flex">
			<?= get_the_post_thumbnail(get_the_ID(), 'full');?>
				<div class="txt_area">
					<?php
						echo SCF::get('material_textarea');
					?>
	
					<?php
						// if ( have_posts() ) : while ( have_posts() ) : the_post();
						// remove_filter('the_content', 'wpautop');
						// the_content();
						// endwhile; endif;
					?>
	
					<p class="result">資料内容</p>
					<ul>
	
						<?php 
							$loop_materials_result = SCF::get('loop_materials_result');
							foreach ($loop_materials_result as $fields) { ?>
								<li><?= $fields['materials_result']; ?></li><?php 
							} 
						?> 
	
					</ul>
				</div>
			</div>
		</div>
	
	</div>
		
	<section class="form_section">
		<div class="inner">
			<h2 class="head_h2">下記フォームに必要事項をご入力の上、<br>「ダウンロード」ボタンを押してください。</h2>
			<p>※本資料は「ハウスメーカー、工務店、設計事務所」様を対象としています。当社サービスと類似するサービスの取扱っている企業様や、関係者様からの資料請求はお断りしています。</p>
			<div class="form_area">
				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post();
					the_content();
					endwhile; endif;
				?>
				<?php 
					//$materials_form_id = do_shortcode('[mwform_formkey key="7907"]');
					//echo $materials_form_id; 
				?>
			</div>
		</div>
	</section>

</article>
