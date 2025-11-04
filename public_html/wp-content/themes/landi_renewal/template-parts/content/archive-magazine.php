<?php
$template_pass = get_template_pass();
?>
<div id="wrap">

<div class="swiper-container">

        <div class="swiper-wrapper">
				<?php
					$args = array(
					'posts_per_page' => 6, 	// 表示する件数
					'orderby' => 'date', // 更新日でソート
					'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
					'post_type' => 'magazine',
					'post_status' => 'publish'
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
            <div class="swiper-slide">
	            <a href="<?= get_permalink($post) ?>"></a>
	            <div class="swiper_text">
								<div class="category">
									<em><?=$taxonomy[0]->name;?></em>
									<span><?php echo getDisplayCategoryName($taxonomy[0]->name); ?></span>
								</div>
		            <p><?= the_title(); ?></p>
	            </div>
	            <figure><img loading="lazy" src="<?= $thum;?>" alt="<?= the_title(); ?>" width="600" height="450" ></figure>
            </div>

						<?php endforeach; wp_reset_postdata(); ?>
				<?php endif; ?>
        </div>


</div><!-- swiper-container -->


<article class="old_type">

		<ul class="Breadcrumb">
		    <li><a href="<?php echo esc_url(home_url("/")); ?>">ホーム</a></li>
		    <li>ランディマガジン</li>
		</ul>


	<section>

	    <div class="List_articles">
			<div id="all_wrap" class="item_wrap">
				<?php
					$offset = 6;
					$args = array(
					'posts_per_page' => $offset, 	// 表示する件数
					'orderby' => 'date', // 更新日でソート
					'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
					'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
					'post_status' => 'publish'
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
				<span id="all" class="offset" style="display: none"><?= $offset; ?></span>
				<a href="javascript:void(0)" id="all" class="magazine_more"><i class="icon-load"></i><span>さらに見る</span></a>
			<?php endif; ?>
	  </div><!-- List-articles -->

	   <!-- search_Box -->

	</section>

	<section class="wide">

	   <div class="pick_up">
		   <div class="pick_up_inner">

			   <h3><i class="icon-light"></i><em>ノウハウ</em><small>KNOW-HOW</small></h3>

			   <div class="pick_up_articles">
				 <?php
					$args = array(
					'posts_per_page' => 2, 	// 表示する件数
					'orderby' => 'date', // 更新日でソート
					'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
					'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
									'meta_key' => 'pickup',
									'meta_value' => 'pickup',
									'post_status' => 'publish',
					'tax_query' => [ // 特定のカテゴリースラッグを指定
						[
							'taxonomy' => 'taxonomy_magazine',
							'field' => 'slug',
							'terms' =>  'know-how',
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

			   </div><!-- pick_up_articles -->

		   </div><!-- pick_up_inner -->
	   </div><!-- pick_up -->

    </section>


    <section>

	    <div class="List_articles">

			<div id="know-how_wrap" class="item_wrap">
			<?php
					$offset = 6;
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
							'terms' =>  'know-how',
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
				<span id="know-how" class="offset" style="display: none"><?= $offset; ?></span>
				<a href="javascript:void(0)" id="know-how" class="magazine_more"><i class="icon-load"></i><span>さらに見る</span></a>
			<?php endif; ?>
	    </div><!-- List-articles -->



    </section>

	<section class="wide">

	   <div class="pick_up">
		   <div class="pick_up_inner">

			   <h3><i class="icon-interview"></i><em>体験談</em><small>INTERVIEW</small></h3>

			   <div class="pick_up_articles">
				 <?php
					$args = array(
					'posts_per_page' => 2, 	// 表示する件数
					'orderby' => 'date', // 更新日でソート
					'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
					'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
					'meta_key' => 'pickup',
					'meta_value' => 'pickup',
					'post_status' => 'publish',
					'tax_query' => [ // 特定のカテゴリースラッグを指定
						[
							'taxonomy' => 'taxonomy_magazine',
							'field' => 'slug',
							'terms' =>  'interview',
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

			   </div><!-- pick_up_articles -->

		   </div><!-- pick_up_inner -->
	   </div><!-- pick_up -->

    </section>



    <section>

	    <div class="List_articles">

			<div id="interview_wrap" class="item_wrap">

			<?php
						$offset = 6;
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
								'terms' =>  'interview',
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
				<span id="interview" class="offset" style="display: none"><?= $offset; ?></span>
				<a href="javascript:void(0)" id="interview" class="magazine_more"><i class="icon-load"></i><span>さらに見る</span></a>
			<?php endif; ?>
	    </div><!-- List-articles -->



    </section>


    <section class="wide">

	   <div class="pick_up">
		   <div class="pick_up_inner">

			   <h3><i class="icon-pin"></i><em>エリア選び</em><small>AREA</small></h3>

			   <div class="pick_up_articles">
				 <?php
					$args = array(
					'posts_per_page' => 2, 	// 表示する件数
					'orderby' => 'date', // 更新日でソート
					'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
					'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
									'meta_key' => 'pickup',
									'meta_value' => 'pickup',
									'post_status' => 'publish',
					'tax_query' => [ // 特定のカテゴリースラッグを指定
						[
							'taxonomy' => 'taxonomy_magazine',
							'field' => 'slug',
							'terms' =>  'area',
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

			   </div><!-- pick_up_articles -->

		   </div><!-- pick_up_inner -->
	   </div><!-- pick_up -->

    </section>


    <section>

	    <div class="List_articles">

			<div id="area_wrap" class="item_wrap">
			<?php
					$offset = 6;
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
								'terms' =>  'area',
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
				<span class="offset" id="area" style="display: none"><?= $offset; ?></span>
				<a href="javascript:void(0)" id="area" class="magazine_more">
					<i class="icon-load"></i>
					<span>さらに見る</span>
				</a>
			<?php endif; ?>
	    </div><!-- List-articles -->



    </section>


    <section class="wide">

	   <div class="pick_up">
		   <div class="pick_up_inner">

			   <h3><i class="icon-money"></i><em>お金について</em><small>MONEY</small></h3>

			   <div class="pick_up_articles">
				 <?php
					$args = array(
					'posts_per_page' => 2, 	// 表示する件数
					'orderby' => 'date', // 更新日でソート
					'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
					'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
									'meta_key' => 'pickup',
									'meta_value' => 'pickup',
									'post_status' => 'publish',
					'tax_query' => [ // 特定のカテゴリースラッグを指定
						[
							'taxonomy' => 'taxonomy_magazine',
							'field' => 'slug',
							'terms' =>  'money',
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

			   </div><!-- pick_up_articles -->

		   </div><!-- pick_up_inner -->
	   </div><!-- pick_up -->

    </section>


    <section>

	    <div class="List_articles">

			<div id="money_wrap" class="item_wrap">
			<?php
					$offset = 6;
					$args = array(
					'posts_per_page' => $offset,  	// 表示する件数
						'orderby' => 'date', // 更新日でソート
						'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
						'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
						'post_status' => 'publish',
						'tax_query' => [ // 特定のカテゴリースラッグを指定
							[
								'taxonomy' => 'taxonomy_magazine',
								'field' => 'slug',
								'terms' =>  'money',
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
				<span id="money" class="offset" style="display: none"><?= $offset; ?></span>
				<a href="javascript:void(0)" id="money" class="magazine_more"><i class="icon-load"></i><span>さらに見る</span></a>
			<?php endif; ?>
	    </div><!-- List-articles -->

    </section>

</article>

</div><!-- wrap -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script>


var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    centeredSlides: true,
    spaceBetween: 0,
    loop: true,
    speed: 400,
    autoplay: 5000
});
</script>