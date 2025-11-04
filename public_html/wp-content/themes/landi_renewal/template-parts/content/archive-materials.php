<?php
	$template_pass = get_template_pass();
	global $max_num_pages_global;
?>

	<article class="archive materials">

	<?php include(get_template_directory() . '/template-parts/content/Breadcrumb.php'); ?>

		<div class="ttl_box corp animation">
			<h1><em>Materials</em><span>お役立ち資料</span></h1>
			<p>FREEDOM Xは、建築・不動産領域のDXに特化したサービスを、ハウスメーカー、工務店、設計事務所に提供しています。主要都市に8拠点を配し、お客様の営業課題を解決すべく、導入サポートのみならず、導入後の研修や活用フォローをしています。<br>
			本ページでは、集客から契約まで様々な課題解決にお役立ちする資料をご用意しています。ぜひご覧ください。</p>
		</div>

		<section class="sections animation materials_section">
			<div class="inner">

				<ul class="list_type_materials">

					<?php
						
						$the_query = new WP_Query(
							array(
								'posts_per_page' => -1, 	// 表示する件数
								'post_type' => 'materials', 	// 特定のカテゴリースラッグを指定
								'paged'          => get_query_var( 'paged' ),
								'orderby' => 'date', // 更新日でソート
								'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
								'post_status' => 'publish',
								'post__not_in' => array(5774),  // 除外する記事のIDを指定
							)
						);
													
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : 
						
							$the_query->the_post();
						
					?>

						<li>
							<?= get_the_post_thumbnail(get_the_ID(), 'full');?>
							<span class="ttl"><?php the_title(); ?></span>
							<a href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID();?>" class="shift_button corp">ダウンロード</a>
						</li>

					<?php endwhile; endif; ?>
					
				</ul>

				<!-- <div class="pagination">
					<?php wp_pagenavi(); ?>
				</div> -->
				<?php wp_reset_postdata(); ?>

			</div>
		</section>

	</article>
