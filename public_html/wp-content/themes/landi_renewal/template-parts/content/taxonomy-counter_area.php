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

	<div class="ttl_landi_area animation"></div>

<article class="no_bottom">
	<ul class="Breadcrumb">
		<li><a href="<?php echo esc_url(home_url("/")); ?>">ホーム</a></li>
		<li><a href="<?php echo esc_url(home_url("/service")); ?>">サービス</a></li>
		<li><a href="<?php echo esc_url(home_url("/counter")); ?>">ランディカウンター</a></li>
		<li><a href="<?php echo esc_url(home_url("/counter/counter_area")); ?>">都道府県選択</a></li>
		<li>ランディカウンター一覧</li>
	</ul>


    <section class="area">
	    <h2>ランディカウンターを探す</h2>
	    <p>お近くのランディカウンターをご紹介します。<br />希望のハウスメーカー・工務店のホームぺージよりご予約のうえ、各社にご来店ください。</p>

    </section>

	<section class="animation">

	    <div class="service">
				<div class="Benefits">
					<em>ご予約特典</em>
					<h2>プロ以上の情報量をスマホで探せる<br />ランディアカウントを無料プレゼント！</h2>
					<p>ランディカウンターにご相談いただいた方には、帰宅後にスマホやPCでもご利用いただけるランディアカウントを無料で発行いたします。ランディがあれば、もう、複数の不動産ポータルサイトで検索する必要も、不動産業者へ行く必要もなくご自身で理想の土地探しが実現できます。</p>
				</div>

	    </div>

    </section>

    <section class="animation">

		<div class="exhibition_box">

			<div class="counter_exhibition">
				<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3245.6698596503356!2d139.5655391518351!3d35.56185488012521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f7ad3c601c03%3A0x67cf03492daf74fd!2z44OP44Km44K544Kv44Ko44Ki5qiq5rWc!5e0!3m2!1sja!2sjp!4v1611638832982!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
				<div class="text">
					<figure><img loading="lazy" src="img/yokohama.png" alt="ハウスクエア横浜" width="275" height="73" ></figure>
					<p>住所：〒224-0001　神奈川県横浜市都筑区中川1-4-1<br />
						営業時間：10時～18時<br />
						休館日：毎週水曜日（祝日は除く）
						<small>※ランディカウンターの定休日とは異なる場合があります。ランディカウンターへのご相談は事前にご予約頂きます様お願い致します。</small></p>


				</div>
			</div>

			<div class="exhibition_reserve">
				<h4 class="reserve_ttl">ご予約はこちらから</h4>
				<div class="reserve">
				    <div class="item">
					    <a href="tel:0120107354" class="tel"><img loading="lazy" src="img/tel.png" alt="0120-107-354" width="274" height="48" ></a>
					    <p>電話予約受付時間：9時〜19時<br />専用コールセンターにてご予約を承っております。</p>
				    </div>

				    <div class="item">
					    <a href="" class="rsv_btn">WEBで予約する</a>
					    <p>ホームページでもご予約を受け付けております。<br />お気軽にご予約ください。</p>
				    </div>

			    </div>
		    </div>

		</div><!-- exhibition_box -->


		<div class="exhibition_box">

			<div class="counter_exhibition">
				<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3245.6698596503356!2d139.5655391518351!3d35.56185488012521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f7ad3c601c03%3A0x67cf03492daf74fd!2z44OP44Km44K544Kv44Ko44Ki5qiq5rWc!5e0!3m2!1sja!2sjp!4v1611638832982!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
				<div class="text">
					<figure><img loading="lazy" src="img/yokohama.png" alt="ハウスクエア横浜" width="275" height="73" ></figure>
					<p>住所：〒224-0001　神奈川県横浜市都筑区中川1-4-1<br />
						営業時間：10時～18時<br />
						休館日：毎週水曜日（祝日は除く）
						<small>※ランディカウンターの定休日とは異なる場合があります。ランディカウンターへのご相談は事前にご予約頂きます様お願い致します。</small></p>


				</div>
			</div>

			<div class="exhibition_reserve">
				<h4 class="reserve_ttl">ご予約はこちらから</h4>
				<div class="reserve">
				    <div class="item">
					    <a href="tel:0120107354" class="tel"><img loading="lazy" src="img/tel.png" alt="0120-107-354" width="274" height="48" ></a>
					    <p>電話予約受付時間：9時〜19時<br />専用コールセンターにてご予約を承っております。</p>
				    </div>

				    <div class="item">
					    <a href="" class="rsv_btn">WEBで予約する</a>
					    <p>ホームページでもご予約を受け付けております。<br />お気軽にご予約ください。</p>
				    </div>

			    </div>
		    </div>

		    <a href="" class="red_btn_large"><span>都道府県を選び直す</span></a>

		</div><!-- exhibition_box -->

    </section>

</article>

</div><!-- wrap -->