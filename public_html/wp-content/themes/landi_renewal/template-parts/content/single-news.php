<?php
// カスタムフィールドの情報を取得
$post_meta = get_post_custom();

// 本文
$news_text = $post_meta["news_text"][0] ?? null;

// リンクURL１
$news_url1 = $post_meta["news_url1"][0] ?? null;
// リンクテキスト１
$news_url1_text = $post_meta["news_url1_text"][0] ?? null;
// リンク先の開き方1
$news_url1_open = $post_meta["news_url1_open"][0] ?? null;

// リンクURL2
$news_url2 = $post_meta["news_url2"][0] ?? null;
// リンクテキスト2
$news_url2_text = $post_meta["news_url2_text"][0] ?? null;
// リンク先の開き方2
$news_url2_open = $post_meta["news_url2_open"][0] ?? null;

// リンクURL3
$news_url3 = $post_meta["news_url3"][0] ?? null;
// リンクテキスト3
$news_url3_text = $post_meta["news_url3_text"][0] ?? null;
// リンク先の開き方3
$news_url3_open = $post_meta["news_url3_open"][0] ?? null;

// 画像1
$meta_news_img1 = wp_get_attachment_image_src($post_meta["news_img1"][0], 'full') ?? null;
if ($meta_news_img1) {
	$news_img1 = $meta_news_img1[0];
}

// 画像2
$meta_news_img2 = wp_get_attachment_image_src($post_meta["news_img2"][0], 'full') ?? null;
if ($meta_news_img2) {
	$news_img2 = $meta_news_img2[0];
}

// Youtube URL
$news_youtube_url = $post_meta["news_youtube_url"][0] ?? null;

// タームの取得
$terms = get_the_terms($post->ID, 'taxonomy_news');

?>

<article class="single single_news">

	<?php include('Breadcrumb.php'); ?>

	<div class="inner">
		<section class="animation main_section">
			<div class="inner">
				<div class="detail">

					<div class="date_area">
						<div class="flex">
							<em class="date"><?php the_time('Y.m.d') ?></em>
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
						</div>
						<h1 class="sect_title"><?php the_title(); ?></h1>
					</div>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php remove_filter('the_content', 'wpautop'); ?>
							<?php the_content(); ?>
					<?php endwhile;
					endif; ?>

					<!-- <div class="news_detail_inner">
							<p><?php echo nl2br($news_text); ?></p>
	
							<?php if ($news_url1): ?>
								<?php if (isset($news_url1_open) && $news_url1_open === "new"): ?>
									<p><a href="<?php echo $news_url1; ?>" target="_blank"><?php echo $news_url1_text; ?></a></p>
								<?php else: ?>
									<p><a href="<?php echo $news_url1; ?>"><?php echo $news_url1_text; ?></a></p>
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($news_url2): ?>
								<?php if (isset($news_url2_open) && $news_url2_open === "new"): ?>
									<p><a href="<?php echo $news_url2; ?>" target="_blank"><?php echo $news_url2_text; ?></a></p>
								<?php else: ?>
									<p><a href="<?php echo $news_url2; ?>"><?php echo $news_url2_text; ?></a></p>
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($news_url3): ?>
								<?php if (isset($news_url3_open) && $news_url3_open === "new"): ?>
									<p><a href="<?php echo $news_url3; ?>" target="_blank"><?php echo $news_url3_text; ?></a></p>
								<?php else: ?>
									<p><a href="<?php echo $news_url3; ?>"><?php echo $news_url3_text; ?></a></p>
								<?php endif; ?>
							<?php endif; ?>
	
							<?php if (isset($news_img1) && $news_img1): ?>
								<figure><img loading="lazy" src="<?php echo $news_img1; ?>" alt="news01" ></figure>
							<?php endif; ?>
							<?php if (isset($news_img2) && $news_img2): ?>
								<figure><img loading="lazy" src="<?php echo $news_img2; ?>" alt="news02" ></figure>
							<?php endif; ?>
	
							<?php if (isset($news_youtube_url) && $news_youtube_url): ?>
							<figure>	<?php echo $news_youtube_url; ?></figure>
							<?php endif; ?>
	
						</div> -->

				</div>
			</div>
		</section>
		<a href="<?= home_url() ?>/news/" class="shift_button corp">一覧に戻る</a>
	</div>

</article>