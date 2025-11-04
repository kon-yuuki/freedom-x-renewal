<?php remove_filter('the_content', 'wpautop'); ?>
<?php the_content(); ?>

<?php

	// タクソノミーの情報を取得
	$terms = get_terms(array('taxonomy'=>'taxonomy_landi_area', 'get'=>'all'));

	//導入店情報
	$landi_area = array();

	foreach($terms as $term){
		// 件数を取得
		$landi_area[$term->slug] = ["count" => $term->count];
	}
?>

<div id="wrap">

	<div class="ttl_subpage_01 animation" style="background-image: url('<?= get_img_dir('title_store.jpg');?>')"></div>

	<article id="landi_area">

		<ul class="Breadcrumb">
			<li><a href="<?= esc_url(home_url("/")); ?>">ホーム</a></li>
			<li><a href="<?= esc_url(home_url("/service")); ?>">サービス</a></li>
			<li><a href="<?= esc_url(home_url("/landi")); ?>">ランディ</a></li>
			<li>ランディ加盟店を探す</li>
		</ul>

		<section id="sec_10">
			<div class="inner">
				<p>
					ランディPRO導入店にご来場いただくと、<br class="pc">お客様のアカウントの機能制限が開放され、<br class="pc">アプリ内で自由に「非公開物件情報、レア物件情報」を<br class="pc">探すことができるようになります。
				</p>
				<div class="flex">
					<div class="item">
						<div class="txt">
							<p><span class="num">1</span><span class="ttl">ランディPRO導入店に<br>ご来場</span></p>
						</div>
						<div class="img_box">
							<img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi_area/sec_10_10.svg" width="172.62" alt="ランディ加盟店に家族でご来場するイラスト">
						</div>
					</div>
					<div class="item">
						<div class="txt">
							<p><span class="num">2</span><span class="ttl">アカウントを紐づけ</span></p>
						</div>
						<div class="img_box">
							<img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi_area/sec_10_20.svg" width="162.35" alt="アカウントを紐づけるイラスト">
						</div>
					</div>
					<div class="item">
						<div class="txt">
							<p><span class="num">3</span><span class="ttl">ご自由に非公開物件・<br>レア物件が探せる</span></p>
						</div>
						<div class="img_box">
							<img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi_area/sec_10_30.svg" width="81.24" alt="非公開物件・レア物件が探せるイメージイラスト">
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="area">
			<div class="inner">

				<h1 class="head_h1">ランディPRO導入店を探す</h1>
				<p>お近くのランディPRO導入店を探せます。</p>
				
				<h2 class="head_h2">都道府県から探す</h2>
				<div class="map">
					<figure><img loading="lazy" src="<?= get_img_dir("japan_map.png");?>" alt="ランディ導入店を探す" width="379" height="266" ></figure>
					<div class="area_list">
	
						<dl class="area_10">
							<dt>北海道</dt>
							<dd>
								<ul>
									<?php if($landi_area["hokkaido"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/hokkaido")); ?>">北海道</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/hokkaido")); ?>" class="disabled">北海道</a></li>
									<?php endif; ?>
								</ul>
						</dl>
	
						<dl class="area_20">
							<dt>東北</dt>
							<dd>
								<ul>
									<?php if($landi_area["aomori"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/aomori")); ?>">青森</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/aomori")); ?>" class="disabled">青森</a></li>
									<?php endif; ?>
									<?php if($landi_area["iwate"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/iwate")); ?>">岩手</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/iwate")); ?>" class="disabled">岩手</a></li>
									<?php endif; ?>
									<?php if($landi_area["akita"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/akita")); ?>">秋田</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/akita")); ?>" class="disabled">秋田</a></li>
									<?php endif; ?>
									<?php if($landi_area["miyagi"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/miyagi")); ?>">宮城</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/miyagi")); ?>" class="disabled">宮城</a></li>
									<?php endif; ?>
									<?php if($landi_area["yamagata"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/yamagata")); ?>">山形</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/yamagata")); ?>" class="disabled">山形</a></li>
									<?php endif; ?>
									<?php if($landi_area["fukushima"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/fukushima")); ?>">福島</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/fukushima")); ?>" class="disabled">福島</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>
	
						<dl class="area_30">
							<dt>関東</dt>
							<dd>
								<ul>
									<?php if($landi_area["tokyo"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tokyo")); ?>">東京</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tokyo")); ?>" class="disabled">東京</a></li>
									<?php endif; ?>
									<?php if($landi_area["kanagawa"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kanagawa")); ?>">神奈川</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kanagawa")); ?>" class="disabled">神奈川</a></li>
									<?php endif; ?>
									<?php if($landi_area["saitama"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/saitama")); ?>">埼玉</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/saitama")); ?>" class="disabled">埼玉</a></li>
									<?php endif; ?>
									<?php if($landi_area["chiba"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/chiba")); ?>">千葉</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/chiba")); ?>" class="disabled">千葉</a></li>
									<?php endif; ?>
									<?php if($landi_area["ibaraki"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/ibaraki")); ?>">茨城</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/ibaraki")); ?>" class="disabled">茨城</a></li>
									<?php endif; ?>
									<?php if($landi_area["gunma"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/gunma")); ?>">群馬</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/gunma")); ?>" class="disabled">群馬</a></li>
									<?php endif; ?>
									<?php if($landi_area["tochigi"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tochigi")); ?>">栃木</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tochigi")); ?>" class="disabled">栃木</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>
	
						<dl class="area_40">
							<dt>甲信越・北陸</dt>
							<dd>
								<ul>
									<?php if($landi_area["niigata"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/niigata")); ?>">新潟</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/niigata")); ?>" class="disabled">新潟</a></li>
									<?php endif; ?>
									<?php if($landi_area["nagano"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/nagano")); ?>">長野</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/nagano")); ?>" class="disabled">長野</a></li>
									<?php endif; ?>
									<?php if($landi_area["yamanashi"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/yamanashi")); ?>">山梨</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/yamanashi")); ?>" class="disabled">山梨</a></li>
									<?php endif; ?>
									<?php if($landi_area["toyama"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/toyama")); ?>">富山</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/toyama")); ?>" class="disabled">富山</a></li>
									<?php endif; ?>
									<?php if($landi_area["ishikawa"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/ishikawa")); ?>">石川</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/ishikawa")); ?>" class="disabled">石川</a></li>
									<?php endif; ?>
									<?php if($landi_area["fukui"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/fukui")); ?>">福井</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/fukui")); ?>" class="disabled">福井</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>
	
						<dl class="area_50">
							<dt>東海</dt>
							<dd>
								<ul>
									<?php if($landi_area["aichi"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/aichi")); ?>">愛知</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/aichi")); ?>" class="disabled">愛知</a></li>
									<?php endif; ?>
									<?php if($landi_area["shizuoka"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/shizuoka")); ?>">静岡</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/shizuoka")); ?>" class="disabled">静岡</a></li>
									<?php endif; ?>
									<?php if($landi_area["gifu"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/gifu")); ?>">岐阜</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/gifu")); ?>" class="disabled">岐阜</a></li>
									<?php endif; ?>
									<?php if($landi_area["mie"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/mie")); ?>">三重</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/mie")); ?>" class="disabled">三重</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>
	
						<dl class="area_60">
							<dt>関西</dt>
							<dd>
								<ul>
									<?php if($landi_area["osaka"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/osaka")); ?>">大阪</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/osaka")); ?>" class="disabled">大阪</a></li>
									<?php endif; ?>
									<?php if($landi_area["kyoto"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kyoto")); ?>">京都</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kyoto")); ?>" class="disabled">京都</a></li>
									<?php endif; ?>
									<?php if($landi_area["hyogo"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/hyogo")); ?>">兵庫</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/hyogo")); ?>" class="disabled">兵庫</a></li>
									<?php endif; ?>
									<?php if($landi_area["shiga"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/shiga")); ?>">滋賀</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/shiga")); ?>" class="disabled">滋賀</a></li>
									<?php endif; ?>
									<?php if($landi_area["nara"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/nara")); ?>">奈良</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/nara")); ?>" class="disabled">奈良</a></li>
									<?php endif; ?>
									<?php if($landi_area["wakayama"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/wakayama")); ?>">和歌山</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/wakayama")); ?>" class="disabled">和歌山</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>
	
						<dl class="area_70">
							<dt>中国</dt>
							<dd>
								<ul>
									<?php if($landi_area["tottori"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tottori")); ?>">鳥取</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tottori")); ?>" class="disabled">鳥取</a></li>
									<?php endif; ?>
									<?php if($landi_area["okayama"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/okayama")); ?>">岡山</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/okayama")); ?>" class="disabled">岡山</a></li>
									<?php endif; ?>
									<?php if($landi_area["shimane"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/shimane")); ?>">島根</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/shimane")); ?>" class="disabled">島根</a></li>
									<?php endif; ?>
									<?php if($landi_area["hiroshima"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/hiroshima")); ?>">広島</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/hiroshima")); ?>" class="disabled">広島</a></li>
									<?php endif; ?>
									<?php if($landi_area["yamaguchi"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/yamaguchi")); ?>">山口</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/yamaguchi")); ?>" class="disabled">山口</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>
	
						<dl class="area_80">
							<dt>四国</dt>
							<dd>
								<ul>
									<?php if($landi_area["tokushima"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tokushima")); ?>">徳島</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/tokushima")); ?>" class="disabled">徳島</a></li>
									<?php endif; ?>
									<?php if($landi_area["kagawa"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kagawa")); ?>">香川</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kagawa")); ?>" class="disabled">香川</a></li>
									<?php endif; ?>
									<?php if($landi_area["ehime"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/ehime")); ?>">愛媛</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/ehime")); ?>" class="disabled">愛媛</a></li>
									<?php endif; ?>
									<?php if($landi_area["kochi"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kochi")); ?>">高知</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kochi")); ?>" class="disabled">高知</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>
	
						<dl class="area_90">
							<dt>九州・沖縄</dt>
							<dd>
								<ul>
									<?php if($landi_area["fukuoka"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/fukuoka")); ?>">福岡</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/fukuoka")); ?>" class="disabled">福岡</a></li>
									<?php endif; ?>
									<?php if($landi_area["saga"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/saga")); ?>">佐賀</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/saga")); ?>" class="disabled">佐賀</a></li>
									<?php endif; ?>
									<?php if($landi_area["nagasaki"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/nagasaki")); ?>">長崎</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/nagasaki")); ?>" class="disabled">長崎</a></li>
									<?php endif; ?>
									<?php if($landi_area["kumamoto"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kumamoto")); ?>">熊本</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kumamoto")); ?>" class="disabled">熊本</a></li>
									<?php endif; ?>
									<?php if($landi_area["oita"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/oita")); ?>">大分</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/oita")); ?>" class="disabled">大分</a></li>
									<?php endif; ?>
									<?php if($landi_area["miyazaki"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/miyazaki")); ?>">宮崎</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/miyazaki")); ?>" class="disabled">宮崎</a></li>
									<?php endif; ?>
									<?php if($landi_area["kagoshima"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kagoshima")); ?>">鹿児島</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/kagoshima")); ?>" class="disabled">鹿児島</a></li>
									<?php endif; ?>
									<?php if($landi_area["okinawa"]["count"]):?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/okinawa")); ?>">沖縄</a></li>
									<?php else:?>
										<li><a href="<?= esc_url(home_url("/landi/landi_area/okinawa")); ?>" class="disabled">沖縄</a></li>
									<?php endif; ?>
								</ul>
							</dd>
						</dl>

					</div>
					<div class="sp back">戻る</div>
				</div>

			</div>
		</section>

		<section id="sec_20">
			<div class="inner">
				<h2 class="head_h2">ランディPRO導入店企業</h2>

					<div class="slider top">
						<?php

							$args = array(
								'posts_per_page' => -1, 	// 表示する件数
								'post_type' => 'area_experience', // 取得する投稿タイプのスラッグ
								'meta_key' => 'area_position',
								'meta_value' => 'top'
							);
							$query = new WP_Query($args);

							if ($query->have_posts()) : foreach ($query->posts as $post) :

							// カスタムフィールドの情報を取得
							$post_meta = get_post_custom();

							if ($post_meta["area_img"][0]) {
							// ロゴ画像
								$meta_area_img = wp_get_attachment_image_src($post_meta["area_img"][0], 'full');
								$area_img = $meta_area_img[0];
							} ?>
								<?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>" alt="<?php the_title(); ?>"><?php endif; ?>
						<?php endforeach; wp_reset_postdata(); endif;?>
					</div>

					<div class="slider middle">
						<?php

							$args = array(
								'posts_per_page' => -1, 	// 表示する件数
								'post_type' => 'area_experience', // 取得する投稿タイプのスラッグ
								'meta_key' => 'area_position',
								'meta_value' => 'middle'
							);
							$query = new WP_Query($args);

							if ($query->have_posts()) : foreach ($query->posts as $post) :

								// カスタムフィールドの情報を取得
								$post_meta = get_post_custom();

								if ($post_meta["area_img"][0]) {
								// ロゴ画像
									$meta_area_img = wp_get_attachment_image_src($post_meta["area_img"][0], 'full');
									$area_img = $meta_area_img[0];
								} ?>
									<?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>" alt="<?php the_title(); ?>"><?php endif; ?>
						<?php endforeach; wp_reset_postdata(); endif;?>
					</div>

					<div class="slider bottom">
						<?php

							$args = array(
								'posts_per_page' => -1, 	// 表示する件数
								'post_type' => 'area_experience', // 取得する投稿タイプのスラッグ
								'meta_key' => 'area_position',
								'meta_value' => 'bottom'
							);
							$query = new WP_Query($args);

							if ($query->have_posts()) : foreach ($query->posts as $post) :

								// カスタムフィールドの情報を取得
								$post_meta = get_post_custom();

								if ($post_meta["area_img"][0]) {
								// ロゴ画像
									$meta_area_img = wp_get_attachment_image_src($post_meta["area_img"][0], 'full');
									$area_img = $meta_area_img[0];
								} ?>
									<?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>" alt="<?php the_title(); ?>"><?php endif; ?>
						<?php endforeach; wp_reset_postdata(); endif;?>
					</div>

			</div>
		</section>

		<section id="sec_30">
			<div class="inner">
				<h2 class="head_h2">ランディを多くのエリアで<br class="sp">体験できる導入店</h2>
				<div class="flex">

					<?php

						$args = array(
							'posts_per_page' => -1, 	// 表示する件数
							'post_type' => 'area_experience', // 取得する投稿タイプのスラッグ
							'meta_key' => 'area_list',
							'meta_value' => 'yes'
						);
						$query = new WP_Query($args);

						if ($query->have_posts()) : foreach ($query->posts as $post) :

							// カスタムフィールドの情報を取得
							$post_meta = get_post_custom();

							// 任意のテキスト
							$area_txt = $post_meta["area_txt"][0];

							// URL
							$area_url = $post_meta["area_url"][0];

							if ($post_meta["area_img"][0]) {
							// ロゴ画像
								$meta_area_img = wp_get_attachment_image_src($post_meta["area_img"][0], 'full');
								$area_img = $meta_area_img[0];
							} ?>

							<?php if($area_url) { ?>
							<a href="<?= $area_url; ?>" class="item">
								<?php if(isset($area_img)) { ?><img loading="lazy" src="<?= $area_img;?>" alt="<?php the_title(); ?>"><?php } ?>
								<?php if( $area_url && $area_txt ) { ?><span class="txt"><?= $area_txt;?></span><?php } ?>
							</a>
							<?php } ?>

					<?php endforeach; wp_reset_postdata(); endif;?>

				</div>
			</div>
		</section>

	</article>

	<script>
		$('.area_list dl').on('click',function(){
			$(this).find('dd').addClass('show');
			$(this).addClass('show');
			$('.map .back').addClass('show');
		});
		$('.map .back').on('click',function(){
			$('.area_list dl').find('dd').removeClass('show');
			$('.area_list dl').removeClass('show');
			$(this).removeClass('show');
		});
	</script>