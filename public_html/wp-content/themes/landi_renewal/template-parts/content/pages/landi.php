<?php ?>

<div id="wrap" class="page_landi">

  <div class="company">
    <div class="slideshow-wrap">
      <div class="slideshow">
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
        <?php if(isset($area_img)) :?><img loading="lazy" height="80" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
        <?php endforeach; wp_reset_postdata(); endif;?>
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
        <?php if(isset($area_img)) :?><img loading="lazy" height="80" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
        <?php endforeach; wp_reset_postdata(); endif;?>
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
        <?php if(isset($area_img)) :?><img loading="lazy" height="80" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
        <?php endforeach; wp_reset_postdata(); endif;?>
      </div>
    </div>
  </div>

  <div class="ttl_landi animation">

    <div class="flex">
      <div class="box">
        <h1>
          <img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/landi_logo.svg" alt="ランディPRO"
            width="354.92" height="71.4">
          <p>住宅業専門・営業支援ツール</p>
          <p class="bold">成約率を最大4倍にする</p>
          <p>「土地探し顧客案件」の成約率を改善</p>
        </h1>
      </div>
      <picture>
        <source srcset="<?= get_template_directory_uri(); ?>/src/img/landi/mv_sp.png?231026"
          media="screen and (max-width:740px)" />
        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/mv.png?231026"
          alt="成約率を最大4倍にする 毎日2時間早く帰れる 大手ハウスメーカーの87.5%が導入">
      </picture>
    </div>

  </div>

  <div class="cta_area">
    <a href="https://freedom-x.co.jp/landi/landi_download" class="red_btn"><span>今すぐ資料ダウンロード</span></a>
  </div>

  <article>
    <section class="animation store">

      <p>ランディPROは、大手ハウスメーカーに選ばれている“土地探し顧客の接客・追客支援システム” です。</p>
      <p class="introduction">
        <b>
          大手ハウスメーカーの<br>
          <span class="num">100</span><span class="p">%<sup>※</sup></span><span class="middle">が導入中</span>
        </b>
      </p>
      <div class="explanation">
        <p>大手ハウスメーカー10社中10社に選ばれています。</p>
      </div>

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
        <?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
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
        <?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
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
        <?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
        <?php endforeach; wp_reset_postdata(); endif;?>
      </div>

    </section>

    <section class="animation triangle_bg worries">

      <p>こんなお悩みは<br class="sp">ありませんか？</p>
      <ul>
        <li>集客難かつ、成約率が改善できず<br class="sp">受注棟数が減少している</li>
        <li>土地探し顧客案件の成約率が低い</li>
        <li>営業担当者の業務効率が<br class="sp">改善されない</li>
        <li>他のDXツールを導入してるが<br class="sp">改善されているかわからない</li>
        <li>来場した全ての土地探し顧客への<br class="sp">対応ができていない</li>
      </ul>

      <p class="red">集客強化よりも先に<br class="sp">「成約率改善」</p>

      <div class="contents animation">
        <div class="flex">
          <img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/landi_logo.png"
            alt="ランディPRO"><b>で</b>
        </div>
        <b><span class="middle">成約率が</span><span class="large">最大4倍</span><span class="middle">になる理由</span></b>

        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/illust_PC.png" alt="成約率が最大4倍になる理由">

        <b>
          顧客と営業、双方が<span class="red">「ウェブ上の全土地」</span>情報から探せる！<br><br class="sp">だからこそ受注確度が高い土地がすぐ見つかり、契約に繋がる。
        </b>
      </div>

    </section>

    <section class="animation features">

      <h2 class="sect_ttl_02">
        <em>ランディPROの主な機能・特徴</em>
      </h2>

      <h3 class="sect_ttl_03">初回接客でグリップを掴む</h3>
      <p>事前準備しなくてもツール上で、確度の高い土地を即提案できる。</p>

      <div class="animation point_list border">

        <div class="wrapDiv">
          <div class="item">
            <em>1</em>
            <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_10.svg"
                alt="1"></figure>
            <p>情報収集を自動化</p>
          </div>
        </div>

        <div class="wrapDiv">
          <div class="item">
            <em>2</em>
            <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_20.svg"
                alt="2"></figure>
            <p>重複物件の統合・<br>名寄せの自動化</p>
            <span class="stamp">特許<br />取得済</span>
          </div>
          <p>※特許第6083054号</p>
        </div>

        <div class="wrapDiv">
          <div class="item">
            <em>3</em>
            <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_30.svg"
                alt="3"></figure>
            <p>Googleマップ上に<br>物件情報を表示</p>
          </div>
        </div>

        <div class="wrapDiv">
          <div class="item">
            <em>4</em>
            <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_40.svg"
                alt="3"></figure>
            <p>建築可能な<br>床面積で探せる</p>
            <span class="stamp">特許<br />取得済</span>
          </div>
          <p>※特許第6083054号</p>
        </div>

      </div>

      <h3 class="sect_ttl_03">追客を効率化して成約率UP</h3>
      <p>顧客もスマホで探せることで、検討期間が短縮できる。</p>

      <div class="animation point_list border">

        <div class="item">
          <em>5</em>
          <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_50.svg" alt="1">
          </figure>
          <p>検索動向の可視化で<br>効果的な打ち手</p>
        </div>

        <div class="item">
          <em>6</em>
          <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_60.svg" alt="2">
          </figure>
          <p>各顧客の希望に沿った<br>土地情報を自動送付</p>
        </div>

        <div class="item">
          <em>7</em>
          <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_70.svg" alt="3">
          </figure>
          <p>確度の高い<br>顧客が再来場</p>
        </div>

        <div class="item">
          <em>8</em>
          <figure><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/features_80.svg" alt="3">
          </figure>
          <p>顧客の土地相場<br>理解が早い</p>
        </div>

      </div>

      <div class="flex_cta">
        <div class="cta_area">
          <a href="https://freedom-x.co.jp/landi/landi_download" class="btn"><span class="red">資料ダウンロード</span></a>
        </div>
        <div class="cta_area">
          <a href="https://freedom-x.co.jp/landi/landi_contact" class="btn"><span class="white">まずは相談する</span></a>
        </div>
      </div>

    </section>

    <section class="animation store">

      <p class="line">導入実績</p>

      <p class="introduction">
        <b>
          大手ハウスメーカーの<br>
          <span class="num">100</span><span class="p">%<sup>※</sup></span><span class="middle">が導入中</span>
        </b>
      </p>
      <div class="explanation">
        <p>大手ハウスメーカー20社中18社に選ばれています。</p>
      </div>


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
        <?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
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
        <?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
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
        <?php if(isset($area_img)) :?><img loading="lazy" src="<?= $area_img;?>"
          alt="<?php the_title(); ?>"><?php endif; ?>
        <?php endforeach; wp_reset_postdata(); endif;?>
      </div>

      <h2 class="sect_ttl_02 sub animation">
        <em>最新の導入事例</em>
      </h2>
      <p class="animation">人手不足でも契約棟数を保ったまま、毎日平均2時間分の残業代が削減できる状態になります。<br>営業現場が抱える課題を解決する効果をご紹介します。</p>

      <div class="flex animation">

        <?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args   = array(
						'posts_per_page' => 3, 	// 表示する件数
						'orderby' => 'date', // 更新日でソート
						'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
						'post_type' => 'case_study', 	// 特定のカテゴリースラッグを指定
						'meta_key' => 'cade_pickup', 
						'meta_value' => 'on',
						'post_status' => 'publish',
						'paged' => $paged 	// ページ設定
					);

					$query = new WP_Query($args);
					// max_num_pagesを取得
					$max_num_pages_global = $query->max_num_pages;

					if ($query->have_posts()) : 
						foreach ($query->posts as $post) :

							//カスタムフィールド値
							$position = get_field('case_position');
							$img = get_field('case_image');
							$company = get_field('case_company');
							$employees = get_field('case_employees');
							
							?>

        <?php //PC用 ?>
        <a href="<?php the_permalink(); ?>" class="item pc">
          <?php if($company){ ?><span class="name"><?= $company; ?></span><?php } ?>
          <img loading="lazy" src="<?php if($img){ echo $img; } ?>" width="166" height="166"
            alt="<?php if($company){ echo $company; } ?><?php if($position){ echo $position; } ?>">
          <?php if($employees){ ?>
          <span class="date">
            従業員数　約<?= number_format($employees); ?>名<br>
            <?php $case_contents_loop = SCF::get('case_contents_loop');
											foreach ($case_contents_loop as $fields) { 
												if( $fields['case_head_h2'] !== "" ){?>
            <span class="msg"><?= $fields['case_head_h2']; ?></span><?php 
												} break;
											} 
										?>
          </span>
          <?php } ?>


        </a>

        <?php //SP用 ?>
        <a href="<?php the_permalink(); ?>" class="item sp">
          <img loading="lazy" src="<?php if($img){ echo $img; } ?>" width="166" height="166"
            alt="<?php if($company){ echo $company; } ?><?php if($position){ echo $position; } ?>">
          <div class="txt">
            <?php if($company){ ?><span class="name"><?= $company; ?></span><?php } ?>
            <span class="date">
              従業員数　約<?= number_format($employees); ?>名<br>
              <?php $case_contents_loop = SCF::get('case_contents_loop');
											foreach ($case_contents_loop as $fields) { 
												if( $fields['case_head_h2'] !== "" ){?>
              <span class="msg"><?= $fields['case_head_h2']; ?></span><?php 
												} break;
											} 
										?>
            </span>
          </div>
        </a>

        <?php 
					endforeach; wp_reset_postdata();
					endif; 
				?>

      </div>

      <a href="<?= home_url() ?>/case_study/" class="red_btn"><span>導入事例一覧を見る</span></a>


    </section>

    <section class="animation">

      <h2 class="sect_ttl_02">
        <em>住宅業界の営業生産性を改善するには<br>ランディPRO</em>
      </h2>
      <p>ランディPROを導入することで<br class="pc">土地探し顧客の成約率を最大4倍にすることができます。<br>
        質問や相談はお気軽にお問い合わせください。
      </p>

      <div class="flex">
        <div class="item">
          <div class="icon">
            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/mail.svg" width="52.95"
              height="34.11" alt="お問い合わせ">
            <span>お問い合わせ</span>
          </div>
          <a href="<?= home_url() ?>/landi/landi_contact" class="red_btn"><span>今すぐWEBで問い合わせ</span></a>
        </div>
        <div class="item">
          <div class="icon">
            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/landi/landipro.svg" width="56.9"
              height="41.4" alt="ランディPRO">
            <span>ランディPRO</span>
          </div>
          <a href="<?= home_url() ?>/landi/landi_download" class="red_btn"><span>今すぐ資料ダウンロード</span></a>
        </div>
      </div>
      <div class="annotation">
        <p>
          <em>100%<sup>※</sup></em>：大手ハウスメーカー10社中10社が導入しています。（自社調べ）
        </p>
        <p class="marginbottom">
          大手ハウスメーカー10社の選定方法:「’23住宅メーカーの競争力分析(2023年8月25日発刊)」(住宅産業研究所)に掲載された企業の販売実績の総販売戸数(2022年度分の注文住宅数)を比較し上位から10社を大手ハウスメーカー10社として表記しています。
        </p>
        <p>大手ハウスメーカー10社は、以下の通りです。</p>
        <p class="company">
          積水ハウス株式会社、パナソニックホームズ株式会社、株式会社アイ工務店、住友林業株式会社、株式会社一条工務店、タマホーム株式会社、積水化学工業株式会社、旭化成ホームズ株式会社、ミサワホーム株式会社、大和ハウス工業株式会社<br><br>
          導入率の算出方法:2024年11月1日時点でランディPROを1ID以上ご利用いただいている支店を対象として算出しています。</p>
      </div>
    </section>


  </article>

</div><!-- wrap -->