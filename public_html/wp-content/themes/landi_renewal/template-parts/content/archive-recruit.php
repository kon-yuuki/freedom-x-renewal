<?php
	$template_pass = get_template_pass();
	global $max_num_pages_global;
?>

<article class="archive archive_recruit">
	
	<?php include('Breadcrumb.php'); ?>
	<div class="ttl_box corp animation">
		<h1><em>Recruit</em><span>採用情報</span></h1>
	</div>

	<div class="slider">
		<div class="img_box"><img src="<?= get_template_directory_uri(); ?>/src/img/recruit/mv1.webp" alt="freedom-xのイメージ"></div>
		<div class="img_box"><img src="<?= get_template_directory_uri(); ?>/src/img/recruit/mv2.webp" alt="freedom-xのイメージ"></div>
		<div class="img_box"><img src="<?= get_template_directory_uri(); ?>/src/img/recruit/mv3.webp" alt="freedom-xのイメージ"></div>
		<div class="img_box"><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/recruit/mv4.webp" alt="freedom-xのイメージ"></div>
		<div class="img_box"><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/recruit/mv5.webp" alt="freedom-xのイメージ"></div>
	</div>

	<section class="sections animation values_section">
		<div class="inner">
			<h2 class="unders_ttl"><em>Values</em><span>FREEDOM Xの価値観</span></h2>
			<ul class="border_box">

				<li>
					<b>顧客解像度を高く</b>
					頭の中で想像した顧客像だけでは、顧客満足はつくれない。顧客の潜在ニーズは、顧客の声の中にある。
				</li>
				<li>
					<b>複眼思考と二律背反</b>
					2分野以上のプロになることで、二律背反の視点を持ち、多角的に提案できるようになる。
				</li>
				<li>
					<b>データドリブンでファクトジャッジ</b>
					ごまかしや嘘をつかず、感覚だけに頼らず、限りなく事実に基づいて判断する。
				</li>
				<li>
					<b>時間に追われるな追い越せ</b>
					どんな仕事も答えにたどりつく早さを大切に。それが、新しいチャンスを生み出していく。
				</li>

				<li>
					<b>あなたの「できる」を、<br class="sp">みんなの「できる」に</b>
					自分だけではなく、誰がやっても同じ成果を得られる仕組みをつくろう。
				</li>
				<li>
					<b>新しい失敗をしよう</b>
					新しい成功には、新しい失敗が必要だ。新領域を失敗と共に開拓しよう。
				</li>

			</ul>
			<a href="https://www.wantedly.com/companies/freedom2/post_articles/873814" target="_blank" class="shift_button gray">会社を詳しく知る</a>
		</div>
	</section>

	<section class="sections recruitment">

		<div class="inner animation">
			<h2 class="unders_ttl"><em>Recruitment</em><span>募集職種</span></h2>
			<img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/recruit/recruit_mv.webp" alt="募集職種のイメージイラスト">
			<ul class="list_type_recruitment">
				<li><a href="#sales"><b>セールス職</b><span>営業・CSなど</span></a></li>
				<li><a href="#engineer"><b>エンジニア職</b><span>フロント・バックエンド</span></a></li>
				<li><a href="#plan"><b>企画職</b><span>広報・営業企画など</span></a></li>
				<li><a href="#business"><b>事業企画職</b><span>新規事業立案・<br>UI/UXデザイナー</span></a></li>
			</ul>
		</div>

		<section id="sales" class="gray">
			<div class="inner animation">
				<h3 class="sections_ttl"><em>セールス職</em><span>営業・CSなど</span></h3>
				<?php
					$the_query = new WP_Query(
						array(
							'posts_per_page' => -1, 	// 表示する件数
							'post_type' => 'recruit', 	// 特定のカテゴリースラッグを指定
							'paged'          => get_query_var( 'paged' ),
							'orderby' => 'date', // 更新日でソート
							'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
							'post_status' => 'publish',

							'tax_query' => [
								[
									'taxonomy' => 'taxonomy_recruit',
									'field' => 'slug',
									'terms' =>  'sales',
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
							<span class="position"><?= $position; ?></span>
							<span class="position_name"><?php the_title() ?></span>
							<p><?= nl2br($txt); ?></p>
							<a href="<?php the_permalink(); ?>" class="shift_button corp">応募条件を見る</a>
						</li>
					
					<?php endwhile; wp_reset_postdata(); else: echo '<ul class="list_type_recruitment_result nan">';?> 
						<li><span>ただいま募集はありません。</span></li>
				<?php endif; ?></ul>
			</div>
		</section>

		<section id="engineer">
			<div class="inner animation">
				<h3 class="sections_ttl"><em>エンジニア職</em><span>フロント・バックエンド</span></h3>
				<?php
					$the_query = new WP_Query(
						array(
							'posts_per_page' => -1, 	// 表示する件数
							'post_type' => 'recruit', 	// 特定のカテゴリースラッグを指定
							'paged'          => get_query_var( 'paged' ),
							'orderby' => 'date', // 更新日でソート
							'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
							'post_status' => 'publish',

							'tax_query' => [
								[
									'taxonomy' => 'taxonomy_recruit',
									'field' => 'slug',
									'terms' =>  'engineer',
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
							<span class="position"><?= $position; ?></span>
							<span class="position_name"><?php the_title() ?></span>
							<p><?= nl2br($txt); ?></p>
							<a href="<?php the_permalink(); ?>" class="shift_button corp">応募条件を見る</a>
						</li>
					
					<?php endwhile; wp_reset_postdata(); else: echo '<ul class="list_type_recruitment_result nan">';?> 
						<li><span>ただいま募集はありません。</span></li>
				<?php endif; ?></ul>
			</div>
		</section>

		<section id="plan" class="gray">
			<div class="inner animation">
				<h3 class="sections_ttl"><em>企画職</em><span>広報・営業企画など</span></h3>
				<?php
					$the_query = new WP_Query(
						array(
							'posts_per_page' => -1, 	// 表示する件数
							'post_type' => 'recruit', 	// 特定のカテゴリースラッグを指定
							'paged'          => get_query_var( 'paged' ),
							'orderby' => 'date', // 更新日でソート
							'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
							'post_status' => 'publish',

							'tax_query' => [
								[
									'taxonomy' => 'taxonomy_recruit',
									'field' => 'slug',
									'terms' =>  'plan',
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
							<span class="position"><?= $position; ?></span>
							<span class="position_name"><?php the_title() ?></span>
							<p><?= nl2br($txt); ?></p>
							<a href="<?php the_permalink(); ?>" class="shift_button corp">応募条件を見る</a>
						</li>
					
					<?php endwhile; wp_reset_postdata(); else: echo '<ul class="list_type_recruitment_result nan">';?> 
						<li><span>ただいま募集はありません。</span></li>
				<?php endif; ?></ul>
			</div>
		</section>

		<section id="business">
			<div class="inner animation">
				<h3 class="sections_ttl"><em>事業企画職</em><span>新規事業立案・UI/UXデザイナー</span></h3>
				<?php
					$the_query = new WP_Query(
						array(
							'posts_per_page' => -1, 	// 表示する件数
							'post_type' => 'recruit', 	// 特定のカテゴリースラッグを指定
							'paged'          => get_query_var( 'paged' ),
							'orderby' => 'date', // 更新日でソート
							'order' => 'ASC', 	// DESCで最新から表示、ASCで最古から表示
							'post_status' => 'publish',

							'tax_query' => [
								[
									'taxonomy' => 'taxonomy_recruit',
									'field' => 'slug',
									'terms' =>  'business',
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
							<span class="position"><?= $position; ?></span>
							<span class="position_name"><?php the_title() ?></span>
							<p><?= nl2br($txt); ?></p>
							<a href="<?php the_permalink(); ?>" class="shift_button corp">応募条件を見る</a>
						</li>
					
					<?php endwhile; wp_reset_postdata(); else: echo '<ul class="list_type_recruitment_result nan">';?> 
						<li><span>ただいま募集はありません。</span></li>
				<?php endif; ?></ul>
			</div>
		</section>

		<section id="interview">
			<div class="inner animation">
				<h2 class="unders_ttl"><em>Casual Interview</em><span>カジュアル面談</span></h2>
				<a href="casual_contact" class="shift_button corp">カジュアル面談に応募する</a>
			</div>
		</section>

	</section>


</article>