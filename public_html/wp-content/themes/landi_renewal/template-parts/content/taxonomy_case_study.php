<?php
	$template_pass = get_template_pass();
	global $max_num_pages_global;

	// タクソノミーの情報を取得
	$queried_object = get_queried_object();

	// スラッグを取得
	$slug = $queried_object->slug;
	$termname = $queried_object->name;

	// /landi/がURLに含まれているかをチェック
	if (strstr($_SERVER['REQUEST_URI'], 'landi')) {
		$check_url_landi = 'landi';
	} else {
		$check_url_landi = 'corp';
	}

?>

	<?php //landiデザイン
		if( $check_url_landi === 'landi' ) { ?>
		<div class="ttl_subpage_02 animation">
			<h1>
				<em>CASE STUDY</em>
				<span>ランディPRO導入店の活用事例をご紹介します。</span>
			</h1>
		</div>
	<?php } ?>

	<article class="archive taxonomy case_study <?= $check_url_landi; ?>">
		
		<?php include('Breadcrumb.php'); ?>

		<?php //corpデザイン
			if( $check_url_landi !== 'landi' ) { ?>
			<div class="ttl_box corp animation">
				<h1><em>Case Study</em><span>導入事例</span></h1>
			</div>
		<?php } ?>

		<section class="sections animation case_study_section">
			<?php //corpデザイン
				if( $check_url_landi !== 'landi' ) { ?>

				<div class="inner">

					<h2 class="secttions_ttl"><?= $queried_object->name; ?></h2>

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

									'tax_query' => [
										[
											'taxonomy' => $queried_object->taxonomy,
											'field' => 'slug',
											'terms' =>  $queried_object->slug,
										],
									],

								)
							);
														
							if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : 
							
								$the_query->the_post();
								setup_postdata( $post );

								//カスタムフィールド値
								$position = get_field('case_position');
								$img = get_field('case_image');
								$company = get_field('case_company');
								$case_msg_head = get_field('case_msg_head');
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

					<?php include('case_study_search_box.php'); ?>

					<a href="<?= home_url() ?>/case_study/" class="shift_button corp">一覧に戻る</a>
				</div>

			<?php } else { ?>

				<div class="flex">

					<?php
						
						$the_query = new WP_Query(
							array(
								'posts_per_page' => 6, 	// 表示する件数
								'post_type' => 'case_study', 	// 特定のカテゴリースラッグを指定
								'paged'          => get_query_var( 'paged' ),
								'orderby' => 'date', // 更新日でソート
								'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
								'post_status' => 'publish',

								'tax_query' => [
									[
										'taxonomy' => $queried_object->taxonomy,
										'field' => 'slug',
										'terms' =>  $queried_object->slug,
									],
								],
							)
						);
													
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : 
						
							$the_query->the_post();
							
							//カスタムフィールド値
							$position = get_field('case_position');
							$img = get_field('case_image');
							$company = get_field('case_company');
							$case_num = get_field('case_number');

						
					?>

					<a href="<?php the_permalink(); ?>" class="item">
						<div class="inner">
							<div class="txt">
								<p class="content_ttl">導入事例</p>
								<p class="num"><?php echo $case_num ?></p>
							</div>
							<img loading="lazy" width="165" height="165" src="<?php if($position){ echo $img; } ?>" alt="<?php if($company){ echo $company; } ?><?php if($position){ echo $position; } ?>">
						</div>
						<?php if($company){ ?>
							<p><?= $company; ?></p>
						<?php } ?>
					</a>

					<?php endwhile; endif; ?>
					
					<?php } ?>
						
				</div>
				
				<div class="pagination <?php if( $check_url_landi === 'landi' ) { echo 'landi'; }?>">
					<?php 
						if(function_exists('wp_pagenavi')):
						wp_pagenavi(array('query'=>$the_query));   ////wp_pagenavi()の呼び出し(ただし、引数の指定が必要！)
						endif;
						wp_reset_postdata();
					?>
				</div>

		</section>

	</article>