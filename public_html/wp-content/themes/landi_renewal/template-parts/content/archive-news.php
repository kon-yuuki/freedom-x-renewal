<?php
$template_pass = get_template_pass();
global $max_num_pages_global;
?>

<article class="archive archive_news">

	<?php include('Breadcrumb.php'); ?>

	<div class="ttl_box corp animation">
		<h1><em>News</em><span>ニュース</span></h1>
	</div>

	<section class="animation">

		<div class="inner">

			<div class="news_category">
				<ul class="category_list">
					<li><a href="<?= esc_url(home_url("/newslist")); ?>" class="current">ALL</a></li>
					<li><a href="<?= esc_url(home_url("/news/event")); ?>">EVENT</a></li>
					<!-- <li><a href="<?= esc_url(home_url("/news/news")); ?>">NEWS</a></li> -->
					<li><a href="<?= esc_url(home_url("/news/pressrelease")); ?>">RELEASE</a></li>
					<li><a href="<?= esc_url(home_url("/news/media")); ?>">MEDIA</a></li>
					<li><a href="<?= esc_url(home_url("/news/information")); ?>">INFO</a></li>
				</ul>
			</div>

			<div class="sp_toggle sp accordion js-accordion">
				<div class="trigger">
					<p class="ttl accordion__title">CATEGORY</p>
					<ul class="content">
						<li><a href="<?= esc_url(home_url("/newslist")); ?>" class="current">ALL</a></li>
						<li><a href="<?= esc_url(home_url("/news/event")); ?>">EVENT</a></li>
						<!-- <li><a href="<?= esc_url(home_url("/news/news")); ?>">NEWS</a></li> -->
						<li><a href="<?= esc_url(home_url("/news/pressrelease")); ?>">RELEASE</a></li>
						<li><a href="<?= esc_url(home_url("/news/media")); ?>">MEDIA</a></li>
						<li><a href="<?= esc_url(home_url("/news/information")); ?>">INFO</a></li>
					</ul>
				</div>
			</div>

			<ul class="list_type_news">
				<?php

				$paged = get_query_var('paged') ? get_query_var('paged') : 1;    //pagedに渡す変数
				$the_query = new WP_Query(
					array(
						'posts_per_page' => 10, 	// 表示する件数
						'post_type' => 'news', 	// 特定のカテゴリースラッグを指定
						'paged'          => get_query_var('paged'),
						'orderby' => 'date', // 更新日でソート
						'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
						'post_status' => 'publish',
						'tax_query' => array(
							array(
								'taxonomy' => 'taxonomy_news', // カスタム分類名
								'field'    => 'slug',
								'terms'    => 'hidden',        // 除外するタームのスラッグ
								'operator' => 'NOT IN',        // 除外のための演算子
							),
						),
					)
				);

				if ($the_query->have_posts()) : while ($the_query->have_posts()) :

						$the_query->the_post();
						setup_postdata($post);

						// タームの取得
						$terms = get_the_terms($post->ID, 'taxonomy_news');

						//タイトルの文字数制限
						$title = get_the_title();
						// PCの場合は35文字で省略、スマートフォンの場合は20文字で省略
						$max_length_pc = 35;
						$max_length_mobile = 20;

						$max_length = wp_is_mobile() ? $max_length_mobile : $max_length_pc;
						if (mb_strlen($title) > $max_length) {
							$title = mb_substr($title, 0, $max_length) . '...';
						}

				?>

						<li>
							<span class="category">
								<?php
								if ($terms[0]->slug === 'information') {
									echo 'INFO';
								} elseif ($terms[0]->slug === 'pressrelease') {
									echo 'RELEASE';
								} else {
									echo $terms[0]->name;
								}
								?>
							</span>
							<span class="date"><?= the_time('Y.m.d'); ?></span>
							<h2 class="ttl"><a href="<?php the_permalink(); ?>"><?= esc_html($title); ?></a></h2>
							<!-- <h3 class="ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> -->
						</li>

				<?php endwhile;
				endif; ?>
			</ul>

			<div class="pagination">
				<?php
				if (function_exists('wp_pagenavi')):
					wp_pagenavi(array('query' => $the_query));   ////wp_pagenavi()の呼び出し(ただし、引数の指定が必要！)
				endif;
				wp_reset_postdata();
				?>
			</div>
		</div>

	</section>

</article>