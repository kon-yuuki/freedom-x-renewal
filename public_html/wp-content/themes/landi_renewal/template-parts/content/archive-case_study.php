<?php
	$template_pass = get_template_pass();
	global $max_num_pages_global;
?>

	<article class="archive case_study">

		<?php include('Breadcrumb.php'); ?>

		<div class="ttl_box corp animation">
			<h1><em>Case Study</em><span>導入事例</span></h1>
			<p>当社サービスは、多くのハウスメーカー、工務店、設計事務所にご利用いただいています。導入前の課題を解決し、成果に結びつけられた活用事例を紹介します。</p>
		</div>

		<section class="sections animation case_study_section">
			<div class="inner">

				<?php include('case_study_search_box.php'); ?>

				<ul class="list_type_case_study">

					<?php
						
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;    //pagedに渡す変数
						$the_query = new WP_Query(
							array(
								'posts_per_page' => 6, 	// 表示する件数
								'post_type' => 'case_study', 	// 特定のカテゴリースラッグを指定
								'paged'          => get_query_var( 'paged' ),
								'orderby' => 'date', // 更新日でソート
								'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
								'post_status' => 'publish',
							)
						);
													
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : 
							
							$the_query->the_post();
							setup_postdata( $post );
						
							//カスタムフィールド値
							$position = get_field('case_position');
							$case_msg_head = get_field('case_msg_head');
							$img = get_field('case_image');
							$company = get_field('case_company');
						
					?>

						<li>
							<a href="<?php the_permalink(); ?>">
								<img loading="lazy" src="<?php if($position){ echo $img; } ?>" alt="<?php if($company){ echo $company; } ?><?php if($position){ echo $position; } ?>">
								<span class="article_ttl"><?php if($case_msg_head){ echo $case_msg_head; } ?></span>
								<span class="company"><?php if($company){ echo $company; } ?></span>
							</a>
						</li>

					<?php endwhile; endif; ?>
				</ul>

				<div class="pagination">
					<?php 
					  if(function_exists('wp_pagenavi')):
						wp_pagenavi(array('query'=>$the_query));   ////wp_pagenavi()の呼び出し(ただし、引数の指定が必要！)
					  endif;
					   wp_reset_postdata();
					?>
				</div>

			</div>
		</section>

	</article>
