<?php
	$template_pass = get_template_pass();
	$post_meta = get_post_custom();

	//カスタムフィールド値
	$company = get_field('case_company');
	$employees = get_field('case_employees');
	$position = get_field('case_position');
	$image = get_field('case_image');
	$main_img = get_field('case_main_img');
	$theme = get_field('case_theme');
	$effect = get_field('case_effect');

	$pick_txt_10 = get_field('case_pick_txt_10');
	$pick_txt_20 = get_field('case_pick_txt_20');

	$message_head = get_field('case_message_head');
	$message = get_field('case_message');

	// 現在の記事に関連するカテゴリを取得
	$terms_case_study = get_the_terms($post->ID, 'taxonomy_case_study');

?>

	<article id="case_study" class="corp">

		<section class="contents_head animation">
			<?php include('Breadcrumb.php'); ?>
			<div class="inner">
				<div class="main_txt animation">
					<p class="case_num_ttl">導入事例</p>
					<h1 class="head_h1"><?php echo get_the_title(); ?></h1>
					<p class="company_underh1"><?php if($company){ echo $company; } ?></p>
					<p>
						<?php if($employees){ ?><span>従業員数 約<?= number_format($employees);?>名</span><?php } ?>
						<span><?php if($position){ echo $position; } ?></span>
					</p>
				</div>
				<div class="flex animation">
					<img src="<?php if($position){ echo $image; } ?>" alt="<?php if($company){ echo $company; } ?><?php if($position){ echo $position; } ?>">
					<div class="txt">
						<h2 class="head_h2">導入前の課題</h2>
						<p><?php if($theme){ echo $theme; } ?></p>
						<h2 class="head_h2">導入後の効果</h2>
						<p><?php if($effect){ echo $effect; } ?></p>
					</div>
				</div>

				<a href="<?= home_url() ?>/landi/landi_download/" class="shift_button corp">ランディPRO資料ダウンロード</a>
			</div>
		</section>

		<section class="main_article animation">

			<div class="toc">
				<div class="inner">

					<?php if($main_img ): ?>
						<img loading="lazy" src="<?= $main_img; ?>" alt="<?php if($company){ echo $company; } ?>" width="800" class="main">
					<?php endif; ?>

					<p class="ttl">Index</p>

					<?php 
						$case_contents_loop = SCF::get('case_contents_loop');
						$count = 1;
						foreach ($case_contents_loop as $fields) { 

						$status = $fields['case_toc_pick']; 
						$count = sprintf("%02d",$count); //連番用の数字
						?>

						<?php if($status === 'yes'): ?>
							<a href="#content_<?= $count; ?>" class="pickup">
								<div class="inner flex">
									<div class="txt">
						<?php else: ?>
							<a href="#content_<?= $count; ?>">
								<div class="inner">
						<?php endif; ?>
									<p class="num"><?= $count; ?></p>
									<?php if($status === 'yes'): ?>
										<p class="toc_ttl"><?= nl2br($fields['case_head_h2']);?></p>
									<?php else: ?>
										<p class="toc_ttl"><?= $fields['case_head_h2'];?></p>
									<?php endif; ?>
									<?php if ($fields['case_toc_sub']) { ?>
										<p><?= nl2br($fields['case_toc_sub']);?></p>
									<?php } ?>
						<?php if($status === 'yes'): ?>
								</div>
								<?php if ($fields['case_toc_img']) { ?>
									<img loading="lazy" src="<?= wp_get_attachment_image_url($fields['case_toc_img'], 'full');?>" alt="<?= strip_tags($fields['case_head_h2']);?>">
								<?php } ?>
						<?php else: ?>
						<?php endif; ?>
								</div>
							</a>

						<?php $count++; ?>
					<?php } //END foreach?>

				</div>
			</div>

			<section class="contents">

				<?php 
					$case_contents_loop = SCF::get('case_contents_loop');
					$count_contents = 1;
					foreach ($case_contents_loop as $fields) { ?>

					<?php 
						$status = $fields['case_toc_pick']; 
						$count_contents = sprintf("%02d",$count_contents);

						$img_10 = $fields['case_content_img_10'];
						$img_20 = $fields['case_content_img_20'];
					?>

					<div id="content_<?= $count_contents; ?>" class="content<?php if( $count_contents % 2 == 0 ){} else { ?> gray<?php } ?>">
						<div class="inner">
							<p class="num"><?= $count_contents; ?></p>
							<h2 class="head_h2"><?= nl2br(($fields['case_head_h2']));?></h2>

							<div class="txt_Area">
								<?php if($fields['case_question']){ ?>
									<p class="question"><?= nl2br(($fields['case_question']));?></p>
								<?php } ?>
								<p class="txt"><?= nl2br(($fields['case_txt']));?></p>
							</div>

							<?php if ($img_10 && $img_20) { ?>
								<div class="flex">
							<?php } ?>
								<?php if ($img_10) { ?>
									<img loading="lazy" src="<?= wp_get_attachment_image_url($img_10, 'full');?>" alt="<?= strip_tags($fields['case_head_h2']);?>">
								<?php } ?>
								<?php if ($img_20) { ?>
									<img loading="lazy" src="<?= wp_get_attachment_image_url($img_20, 'full');?>" alt="<?= strip_tags($fields['case_head_h2']);?>">
								<?php } ?>
							<?php if ($img_10 && $img_20) { ?>
								</div>
							<?php } ?>

						</div>
					</div>

					<?php $count_contents++; ?>
				<?php } //END foreach?>

				<div class="content message">
					<div class="inner">
						<h2 class="head_h2"><?php nl2br(the_field('case_msg_head')); ?></h2>
						<p class="txt"><?php nl2br(the_field('case_msg')); ?></p>
					</div>
				</div>

			</section>

		</section>

		<section class="contents_footer">
			<div class="inner">
				<div class="flex animation">
					
					<a href="<?= home_url() ?>/landi/landi_contact/" class="item">
						<h3 class="head_h3">Download</h3>
						<div class="img_box">
							<img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/icon/document_corp.svg" alt="お問い合わせメールのイメージ">
						</div><span>成約率を最大4倍にする<br>ランディPRO</span>
							<p class="shift_button corp">資料ダウンロード</p>
						</a>
						
						<a href="<?= home_url() ?>/landi/landi_contact/" class="item">
							<h3 class="head_h3">Contact</h3>
							<div class="img_box">
							<img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/icon/mail_corp.svg" alt="お資料ダウンロードのイメージ">
						</div>
						<span>メールで<br>お問い合わせ</span>
						<p class="shift_button corp">フォームはこちら</p>
					</a>

				</div>
			</div>
		</section>

			<div class="more_Area animation">
				<p class="ttl">導入事例をもっと見る</p>
				<section class="sections animation case_study_section">
					<div class="inner">

					<ul class="list_type_case_study">

						<?php
							
							$paged = get_query_var('paged') ? get_query_var('paged') : 1;    //pagedに渡す変数
							$the_query = new WP_Query(
								array(
									'posts_per_page' => 3, 	// 表示する件数
									'post_type' => 'case_study', 	// 特定のカテゴリースラッグを指定
									'paged'          => get_query_var( 'paged' ),
									'orderby' => 'date', // 更新日でソート
									'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
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
						<?php wp_reset_postdata(); ?>

					</div>
				</section>

			</div>
			<a href="<?= home_url() ?>/case_study/" class="animation shift_button corp">一覧に戻る</a>

	</article>
