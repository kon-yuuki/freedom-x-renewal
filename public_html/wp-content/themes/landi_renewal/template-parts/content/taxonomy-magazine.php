
<?php
// タクソノミーの情報を取得
$queried_object = get_queried_object();

// IDを取得
$term_id = $queried_object->term_id;

// スラッグを取得
$slug = $queried_object->slug;

// 名前を取得
$term_name = $queried_object->name;

?>


<div id="wrap">

<div class="sub_page_Title">
	<div class="text">
		<h1><em><?php echo $term_name; ?></em>
		<small><?php echo getDisplayCategoryName($term_name); ?></small></h1>
	</div>
	<figure><img loading="lazy" src="<?php echo get_img_dir('interview.jpg');?>" alt="<?php echo $term_name; ?>"></figure>
</div>

<article class="old_type">
	<ul class="Breadcrumb">
	    <li><a href="<?php echo esc_url(home_url("/")); ?>">ホーム</a></li>
	    <li><a href="<?php echo esc_url(home_url("/magazine")); ?>">ランディマガジン</a></li>
	    <li><?php echo $term_name; ?></li>
	</ul>

	<section>

	    <div class="List_articles">

			<div id="<?= $queried_object->slug; ?>_wrap" class="item_wrap">
				<?php
					$offset = 10;
					$args = array(
						'posts_per_page' => $offset, 	// 表示する件数
						'orderby' => 'date', // 更新日でソート
						'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
						'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
						'post_status' => 'publish',
						'tax_query' => [ // 特定のカテゴリースラッグを指定
							[
								'taxonomy' => 'taxonomy_magazine',
								'field' => 'slug',
								'terms' => $queried_object->slug,
							],
						]
				);

			$query = new WP_Query($args);
			if ($query->have_posts()) :
					foreach ($query->posts as $post) :

					// カスタムフィールドの情報を取得
					$post_meta = get_post_custom();

					$taxonomy = get_the_terms($post->ID,'taxonomy_magazine');

					// サムネイル
					$thum = get_field('thum');

				?>

				<div class="item">
				    <a href="<?= get_permalink($post) ?>"></a>
					    <figure><img loading="lazy" src="<?= $thum;?>" alt="<?= the_title(); ?>"></figure>
						<div class="item_text">
							<div class="category">
								<em><?=$taxonomy[0]->name;?></em>
								<span><?php echo getDisplayCategoryName($taxonomy[0]->name); ?></span>
							</div>
						<p><?= the_title(); ?></p>
						</div>
			  	</div>
				<?php endforeach; wp_reset_postdata(); ?>
				<?php endif; ?>
				</div><!-- item_wrap -->
				<?php if($query->found_posts > $offset):?>
				<span id="<?= $queried_object->slug; ?>" class="offset" style="display: none"><?= $offset; ?></span>
				<a href="javascript:void(0)" id="<?= $queried_object->slug; ?>" class="magazine_more"><i class="icon-load"></i><span>さらに見る</span></a>
			<?php endif; ?>
	    </div><!-- List-articles -->

    </section>

</article>

</div><!-- wrap -->
