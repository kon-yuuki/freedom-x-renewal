
<div id="wrap">

<div class="ttl_landi_area animation"></div>


<article class="no_bottom">
<ul class="Breadcrumb">
	<li><a href="<?php echo esc_url(home_url("/")); ?>">ホーム</a></li>
	<li><a href="<?php echo esc_url(home_url("/service")); ?>">サービス</a></li>
	<li><a href="<?php echo esc_url(home_url("/counter")); ?>">ランディカウンター</a></li>
	<li>都道府県選択</li>
</ul>


	<section class="area">
		<h2>ランディカウンターを探す</h2>
		<p>お近くのランディカウンターを探せます。<br />まずは都道府県を選択してください。</p>

		<figure><img loading="lazy" src="<?php echo get_img_dir("japan_map.png");?>" alt="ランディカウンターを探す" width="379" height="266" ></figure>


		<div class="area_list">
			<dl>
					<dt>北海道/東北</dt>
					<dd>
				<ul>
					<?php if($counter_area["hokkaido"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/hokkaido")); ?>">北海道</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/hokkaido")); ?>" class="disabled">北海道</a></li>
					<?php endif; ?>
					<?php if($counter_area["aomori"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/aomori")); ?>">青森</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/aomori")); ?>" class="disabled">青森</a></li>
					<?php endif; ?>
					<?php if($counter_area["iwate"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/iwate")); ?>">岩手</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/iwate")); ?>" class="disabled">岩手</a></li>
					<?php endif; ?>
					<?php if($counter_area["miyagi"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/miyagi")); ?>">宮城</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/miyagi")); ?>" class="disabled">宮城</a></li>
					<?php endif; ?>
					<?php if($counter_area["akita"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/akita")); ?>">秋田</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/akita")); ?>" class="disabled">秋田</a></li>
					<?php endif; ?>
					<?php if($counter_area["yamagata"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/yamagata")); ?>">山形</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/yamagata")); ?>" class="disabled">山形</a></li>
					<?php endif; ?>
					<?php if($counter_area["fukushima"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/fukushima")); ?>">福島</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/fukushima")); ?>" class="disabled">福島</a></li>
					<?php endif; ?>
				</ul>

					</dd>
			</dl>

			<dl>
					<dt>関東</dt>
					<dd>
				<ul>
					<?php if($counter_area["tokyo"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tokyo")); ?>">東京</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tokyo")); ?>" class="disabled">東京</a></li>
					<?php endif; ?>
					<?php if($counter_area["kanagawa"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kanagawa")); ?>">神奈川</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kanagawa")); ?>" class="disabled">神奈川</a></li>
					<?php endif; ?>
					<?php if($counter_area["chiba"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/chiba")); ?>">千葉</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/chiba")); ?>" class="disabled">千葉</a></li>
					<?php endif; ?>
					<?php if($counter_area["saitama"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/saitama")); ?>">埼玉</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/saitama")); ?>" class="disabled">埼玉</a></li>
					<?php endif; ?>
				</ul>

					</dd>
			</dl>

			<dl>
					<dt>北関東/甲信</dt>
					<dd>
				<ul>
					<?php if($counter_area["ibaraki"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/ibaraki")); ?>">茨城</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/ibaraki")); ?>" class="disabled">茨城</a></li>
					<?php endif; ?>
					<?php if($counter_area["tochigi"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tochigi")); ?>">栃木</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tochigi")); ?>" class="disabled">栃木</a></li>
					<?php endif; ?>
					<?php if($counter_area["gunma"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/gunma")); ?>">群馬</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/gunma")); ?>" class="disabled">群馬</a></li>
					<?php endif; ?>
					<?php if($counter_area["yamanashi"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/yamanashi")); ?>">山梨</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/yamanashi")); ?>" class="disabled">山梨</a></li>
					<?php endif; ?>
					<?php if($counter_area["nagano"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/nagano")); ?>">長野</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/nagano")); ?>" class="disabled">長野</a></li>
					<?php endif; ?>
				</ul>

					</dd>
			</dl>

			<dl>
					<dt>北陸</dt>
					<dd>
				<ul>
				<?php if($counter_area["niigata"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/niigata")); ?>">新潟</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/niigata")); ?>" class="disabled">新潟</a></li>
					<?php endif; ?>
					<?php if($counter_area["toyama"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/toyama")); ?>">富山</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/toyama")); ?>" class="disabled">富山</a></li>
					<?php endif; ?>
					<?php if($counter_area["ishikawa"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/ishikawa")); ?>">石川</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/ishikawa")); ?>" class="disabled">石川</a></li>
					<?php endif; ?>
					<?php if($counter_area["fukui"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/fukui")); ?>">福井</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/fukui")); ?>" class="disabled">福井</a></li>
					<?php endif; ?>
				</ul>

					</dd>
			</dl>

			<dl>
					<dt>東海</dt>
					<dd>
				<ul>
					<?php if($counter_area["gifu"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/gifu")); ?>">岐阜</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/gifu")); ?>" class="disabled">岐阜</a></li>
					<?php endif; ?>
					<?php if($counter_area["shizuoka"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/shizuoka")); ?>">静岡</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/shizuoka")); ?>" class="disabled">静岡</a></li>
					<?php endif; ?>
					<?php if($counter_area["aichi"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/aichi")); ?>">愛知</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/aichi")); ?>" class="disabled">愛知</a></li>
					<?php endif; ?>
					<?php if($counter_area["mie"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/mie")); ?>">三重</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/mie")); ?>" class="disabled">三重</a></li>
					<?php endif; ?>
				</ul>

					</dd>
			</dl>

			<dl>
					<dt>近畿</dt>
					<dd>
				<ul>
					<?php if($counter_area["shiga"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/shiga")); ?>">滋賀</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/shiga")); ?>" class="disabled">滋賀</a></li>
					<?php endif; ?>
					<?php if($counter_area["kyoto"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kyoto")); ?>">京都</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kyoto")); ?>" class="disabled">京都</a></li>
					<?php endif; ?>
					<?php if($counter_area["osaka"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/osaka")); ?>">大阪</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/osaka")); ?>" class="disabled">大阪</a></li>
					<?php endif; ?>
					<?php if($counter_area["hyogo"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/hyogo")); ?>">兵庫</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/hyogo")); ?>" class="disabled">兵庫</a></li>
					<?php endif; ?>
					<?php if($counter_area["nara"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/nara")); ?>">奈良</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/nara")); ?>" class="disabled">奈良</a></li>
					<?php endif; ?>
					<?php if($counter_area["wakayama"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/wakayama")); ?>">和歌山</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/wakayama")); ?>" class="disabled">和歌山</a></li>
					<?php endif; ?>
				</ul>

					</dd>
			</dl>

			<dl>
					<dt>中国</dt>
					<dd>
				<ul>
				<?php if($counter_area["tottori"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tottori")); ?>">鳥取</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tottori")); ?>" class="disabled">鳥取</a></li>
					<?php endif; ?>
					<?php if($counter_area["shimane"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/shimane")); ?>">島根</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/shimane")); ?>" class="disabled">島根</a></li>
					<?php endif; ?>
					<?php if($counter_area["okayama"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/okayama")); ?>">岡山</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/okayama")); ?>" class="disabled">岡山</a></li>
					<?php endif; ?>
					<?php if($counter_area["hiroshima"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/hiroshima")); ?>">広島</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/hiroshima")); ?>" class="disabled">広島</a></li>
					<?php endif; ?>
					<?php if($counter_area["yamaguchi"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/yamaguchi")); ?>">山口</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/yamaguchi")); ?>" class="disabled">山口</a></li>
					<?php endif; ?>

				</ul>

					</dd>
			</dl>

			<dl>
					<dt>四国</dt>
					<dd>
				<ul>
				<?php if($counter_area["tokushima"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tokushima")); ?>">徳島</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/tokushima")); ?>" class="disabled">徳島</a></li>
					<?php endif; ?>
					<?php if($counter_area["kagawa"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kagawa")); ?>">香川</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kagawa")); ?>" class="disabled">香川</a></li>
					<?php endif; ?>
					<?php if($counter_area["ehime"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/ehime")); ?>">愛媛</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/ehime")); ?>" class="disabled">愛媛</a></li>
					<?php endif; ?>
					<?php if($counter_area["kochi"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kochi")); ?>">高知</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kochi")); ?>" class="disabled">高知</a></li>
					<?php endif; ?>
				</ul>

					</dd>
			</dl>

			<dl>
					<dt>九州</dt>
					<dd>
				<ul>
				<?php if($counter_area["fukuoka"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/fukuoka")); ?>">福岡</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/fukuoka")); ?>" class="disabled">福岡</a></li>
					<?php endif; ?>
					<?php if($counter_area["saga"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/saga")); ?>">佐賀</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/saga")); ?>" class="disabled">佐賀</a></li>
					<?php endif; ?>
					<?php if($counter_area["nagasaki"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/nagasaki")); ?>">長崎</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/nagasaki")); ?>" class="disabled">長崎</a></li>
					<?php endif; ?>
					<?php if($counter_area["kumamoto"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kumamoto")); ?>">熊本</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kumamoto")); ?>" class="disabled">熊本</a></li>
					<?php endif; ?>
					<?php if($counter_area["oita"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/oita")); ?>">大分</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/oita")); ?>" class="disabled">大分</a></li>
					<?php endif; ?>
					<?php if($counter_area["miyazaki"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/miyazaki")); ?>">宮崎</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/miyazaki")); ?>" class="disabled">宮崎</a></li>
					<?php endif; ?>
					<?php if($counter_area["kagoshima"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kagoshima")); ?>">鹿児島</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/kagoshima")); ?>" class="disabled">鹿児島</a></li>
					<?php endif; ?>
					<?php if($counter_area["okinawa"]["count"]):?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/okinawa")); ?>">沖縄</a></li>
					<?php else:?>
						<li><a href="<?php echo esc_url(home_url("/counter/counter_area/okinawa")); ?>" class="disabled">沖縄</a></li>
					<?php endif; ?>
				</ul>
					</dd>
			</dl>
		</div>

	</section>

</article>

</div><!-- wrap -->