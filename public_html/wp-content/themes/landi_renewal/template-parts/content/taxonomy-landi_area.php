<?php
// タクソノミーの情報を取得
$queried_object = get_queried_object();
// IDを取得
$term_id = $queried_object->term_id;
// 名前を取得
$term_name = $queried_object->name;
?>

	<div id="wrap">

		<div class="ttl_subpage_01 animation" style="background-image: url('<?= get_img_dir('title_store.jpg');?>');"></div>

		<article>

			<ul class="Breadcrumb">
			<li><a href="<?= esc_url(home_url("/")); ?>">ホーム</a></li>
			<li><a href="<?= esc_url(home_url("/service")); ?>">サービス</a></li>
			<li><a href="<?= esc_url(home_url("/landi")); ?>">ランディ</a></li>
			<li><a href="<?= esc_url(home_url("/landi/landi_area")); ?>">ランディPRO導入店を探す</a></li>
			<li><?= $term_name; ?></li>
			</ul>

			<section class="animation">
				<h2 class="sect_ttl_03">
					<em>ランディPRO導入店一覧</em>
				</h2>
				<p>
					ランディを導入しているハウスメーカー・工務店をご紹介します。<br />
					希望のハウスメーカー・工務店のホームぺージよりご予約のうえ、各社にご来店ください。
				</p>

				<div class="stores">
					<div class="stores_inner">
					<?php

					$args = array(
							'posts_per_page' => 2000, 	// 表示する件数
							'tax_query' => [
								[
									'taxonomy' => 'taxonomy_landi_area',
									'field' => 'slug',
									'terms' =>  $queried_object->slug,
								],
							],
						'post_type' => 'landi_area', // 取得する投稿タイプのスラッグ
						'orderby' => 'date', //日付で並び替え
						'order' => 'DESC', // 降順 or 昇順
					);

					$query = new WP_Query($args);

					if ($query->have_posts()) :
						foreach ($query->posts as $post) :

						// カスタムフィールドの情報を取得
						$post_meta = get_post_custom();

						if ($post_meta["landi_area_img"][0]) {
						// ロゴ画像
							$meta_landi_area_img = wp_get_attachment_image_src($post_meta["landi_area_img"][0], 'full');
							$landi_area_img = $meta_landi_area_img[0];
						}
						// 会社名
						$landi_area_company_name = $post_meta["landi_area_company_name"][0];

						// 展示場名
						$landi_area_space_name = $post_meta["landi_area_space_name"][0];

						// ホームページURL
						$landi_area_url = $post_meta["landi_area_url"][0];

						// ご来場予約URL
						$landi_area_reserve = get_field('landi_area_reserve');

						// 資料請求URL
						$landi_area_request = get_field('landi_area_request');

						// タームの取得
						$terms = get_the_terms($post->ID, 'taxonomy_landi_area');
						?>
						<div class="item">

							<figure>
								<?php if(isset($landi_area_img)) :?>
									<img loading="lazy" src="<?= $landi_area_img;?>" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</figure>

							<h3><?= $landi_area_company_name; ?></h3>

							<?php if($landi_area_space_name) :?>
								<p><?= $landi_area_space_name; ?></p>
							<?php endif; ?>

							<?php if( 
								$landi_area_reserve && $landi_area_request || 
								$landi_area_reserve && $landi_area_url || 
								$landi_area_request && $landi_area_url)
							:?>
								<div class="flex">
							<?php endif; ?>

								<?php if($landi_area_reserve) : ?>
									<a href="<?= $landi_area_reserve; ?>" class="btn" target="_blank">ご来場予約</a>
								<?php endif; ?>

								<?php if($landi_area_request) : ?>
									<a href="<?= $landi_area_request; ?>" class="btn" target="_blank">資料請求</a>
								<?php endif; ?>
								
								<?php if( $landi_area_reserve && $landi_area_request ) : ?>
								<?php elseif( $landi_area_url ):  ?>
									<a href="<?= $landi_area_url; ?>" class="btn landi_area_url" target="_blank">お問い合わせはこちら</a>
								<?php endif; ?>

							<?php if( 
								$landi_area_reserve && $landi_area_request || 
								$landi_area_reserve && $landi_area_url || 
								$landi_area_request && $landi_area_url)
							:?>
								</div>
							<?php endif; ?>

						</div>
						<?php endforeach; wp_reset_postdata(); ?>
					<?php endif; ?>
					</div>
					<a href="<?= esc_url(home_url("/landi/landi_area")); ?>" class="red_btn_large long"><span>都道府県を選び直す</span></a>
				</div>

			</section>

		</article>

	</div><!-- wrap -->