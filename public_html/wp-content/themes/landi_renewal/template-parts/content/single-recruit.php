<?php

	$template_pass = get_template_pass();
	$post_meta = get_post_custom();

	//カスタムフィールド値
	$position = get_field('recruit_position');
	$txt = get_field('recruit_txt'); 

	// 応募資格
	$qualification = get_field('recruit_qualification');
	$requirements = $qualification['recruit_qualification_requirements'];
	$haves = $qualification['recruit_qualification_haves'];

	// 職務内容
	$details = get_field('recruit_details');
	$content = $details['recruit_details_content'];
	$mission = $details['recruit_details_missions'];

	// 勤務形態
	$style = get_field('recruit_style');
	$employ = $style['recruit_style_employ'];
	$area = $style['recruit_style_area'];
	$time = $style['recruit_style_time'];

	// 待遇／福利厚生
	$treatment = get_field('recruit_treatment');
	$salary = $treatment['recruit_treatment_salary'];
	$treatments = $treatment['recruit_treatment_treatment'];
	$holiday = $treatment['recruit_holidays'];

	// その他
	$other = get_field('recruit_other');
	$interview = $other['recruit_other_interview'];
	$select = $other['recruit_other_select'];

	// SCF
	$loop_recruit_result = SCF::get('loop_recruit_result');

	// タームの取得
	$terms = get_the_terms($post->ID, 'taxonomy_recruit');

	// /thanks/がURLに含まれているかをチェック
	if (strstr($_SERVER['REQUEST_URI'], 'thanks')) {
		$check_url = 'thanks';
	}

?>


<article class="single single_recruit <?php if($check_url === 'thanks'){ echo 'thanks'; } ?>">

	<?php include(get_template_directory() . '/template-parts/content/Breadcrumb.php'); ?>

	<?php if($check_url === 'thanks'){ ?>

		<div class="inner">
			<div class="ttl_box corp animation">
				<h1><em>Entered</em><span>エントリー完了</span></h1>
			</div>
			<div class="thanks_box">
				<p>エントリーを受け付けました。<br>数日以内に担当者よりご連絡差し上げます。</p>
				<a href="<?= home_url() ?>" target="_blank" class="shift_button corp">TOPページに戻る</a>
			</div>
		</div>

	<?php } else { ?>

		<div class="ttl_box corp animation">
			<h1><em>Recruit</em><span>採用情報</span></h1>
			<h2 class="sections_ttl">
				<span class="position"><?= $position; ?></span>
				<span class="main"><?php the_title() ?></span>
			</h2>
		</div>
		
		<div class="inner">
			<ul class="list_type_recruit_needs animation">

				<?php foreach ($loop_recruit_result as $fields) { ?>
				<li>
					<div class="txt_box">
						<?php if($fields['loop_recruit_result_head'] !== ""){ ?>
							<h3 class="list_title"><?= $fields['loop_recruit_result_head']; ?></h3>
						<?php } ?> 
						<?php if($fields['loop_recruit_result_txt'] !== ""){ ?>
							<p><?= nl2br($fields['loop_recruit_result_txt']); ?></p>
						<?php } ?> 
					</div>
					<?php if($fields['loop_recruit_result_img'] !== ""){ ?>
						<img loading="lazy" src="<?= wp_get_attachment_image_url($fields['loop_recruit_result_img'], 'full');?>" alt="<?php the_title() ?>">
					<?php } ?> 
				</li>
				<?php } ?> 

			</ul>
		</div>

		<section class="gray result_section">
			<div class="inner">

				<div class="contents animation">
					<h2 class="head_h2">応募資格</h2>
					<div class="box">
						<dl><dt>必須</dt><dd><p><?= nl2br($requirements);?></p></dd></dl>
						<dl><dt>尚可</dt><dd><p><?= nl2br($haves);?></p></dd></dl>
					</div>
				</div>

				<div class="contents animation">
					<h2 class="head_h2">職務内容</h2>
					<div class="box">
						<dl><dt>業務内容</dt><dd><p><?= nl2br($content);?></p></dd></dl>
						<dl><dt>ミッション</dt><dd><p><?= nl2br($mission);?></p></dd></dl>
					</div>
				</div>

				<div class="contents animation">
					<h2 class="head_h2">勤務形態</h2>
					<div class="box">
						<dl><dt>雇用形態</dt><dd><p><?= $employ;?></p></dd></dl>
						<dl><dt>勤務地</dt><dd><p><?= $area;?></p></dd></dl>
						<dl><dt>勤務時間</dt><dd><p><?= nl2br($time);?></p></dd></dl>
					</div>
				</div>

				<div class="contents animation">
					<h2 class="head_h2">待遇／福利厚生</h2>
					<div class="box">
						<dl><dt>給与</dt><dd><p><?= nl2br($salary);?></p></dd></dl>
						<dl><dt>待遇／福利厚生</dt><dd><p><?= nl2br($treatments);?></p></dd></dl>
						<dl><dt>休日・休暇</dt><dd><p><?= nl2br($holiday);?></p></dd></dl>
					</div>
				</div>

				<div class="contents animation">
					<h2 class="head_h2">その他</h2>
					<div class="box">
						<dl><dt>面接回数</dt><dd><p><?= $interview;?></p></dd></dl>
						<dl><dt>選考</dt><dd><p><?= nl2br($select);?></p></dd></dl>
					</div>
				</div>

				<a href="<?= home_url() ?>/recruit/recruit_contact/?post_id=<?= $post->ID; ?>" class="shift_button corp animation">エントリー</a>

			</div>	
		</section>
		
		<sction class="other animation">
			<div class="inner">
				<a href="https://www.wantedly.com/companies/freedom2/post_articles/873814" target="_blank" class="shift_button gray">会社を詳しく知る</a>
				<h2 class="head_h2">現在募集中の職種</h2>
				<?php

						$the_query = new WP_Query(
							array(
								'posts_per_page' => 2, 	// 表示する件数
								'post_type' => 'recruit', 	// 特定のカテゴリースラッグを指定
								'paged'          => get_query_var( 'paged' ),
								'orderby' => 'date', // 更新日でソート
								'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
								'post_status' => 'publish',
								'post__not_in' => array($post->ID),  // 現在の記事を除外

								'tax_query' => [
									[
										'taxonomy' => 'taxonomy_recruit',
										'field' => 'slug',
										'terms' =>  $terms[0]->slug,
									],
								],

							)
						);
													
						if ( $the_query->have_posts() ) : echo '<ul class="list_type_recruitment_result">'; while ( $the_query->have_posts() ) : 
							$the_query->the_post();
						
							//カスタムフィールド値
							$position = get_field('recruit_position');
							$txt = get_field('recruit_txt'); ?>

							<li>
								<div class="txt">
									<span class="position"><?= $position; ?></span>
									<span class="position_name"><?php the_title() ?></span>
									<p><?= nl2br($txt); ?></p>
								</div>
								<a href="<?php the_permalink(); ?>" class="shift_button corp">応募条件を見る</a>
							</li>
						
						<?php endwhile; wp_reset_postdata(); ?></ul>
					<?php endif; ?>
			</div>
		</sction>

	<?php } ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php remove_filter('the_content', 'wpautop'); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>

</article>