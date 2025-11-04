<?php
/*
Template Name: カジュアル面談フォーム用
Template Post Type: recruit
*/

get_header();

	// /thanks/がURLに含まれているかをチェック
	if (strstr($_SERVER['REQUEST_URI'], 'thanks')) {
		$check_url = 'thanks';
	}
?>

<article class="single single_recruit form <?php if($check_url === 'thanks'){ echo 'thanks'; } ?>">

    <?php include(get_template_directory() . '/template-parts/content/Breadcrumb.php'); ?>
	<div class="ttl_box corp animation">
		<h1><em>Entry</em><span>カジュアル面談応募フォーム</span></h1>

		<div class="entry-accordion">
			<div class="trigger">
				<div class="accordion__title">
					<h2 class="trigger">カジュアル面談とは？<div class="toggle"></div></h2>
				</div>
				<div class="content">
					
					<p>
						カジュアル面談は選考ではなく、FREEDOM Xへの理解を深めていただき、当社でご自身の経験を活かして実現したいことができるかを、ざっくばらんに情報交換させていただく場です。<br>
						少しでも当社にご興味をお持ちの方は、お気軽に応募してください!<br>
						※カジュアル面談後の選考エントリーは必須ではありません
					</p>
					
					<h3>概要</h3>
					<p>
						選考ではなく、当社と触れ合う場としています。<br>
						この様な方は、ぜひカジュアル面談にお越しください。<br>
						・転職において情報収集段階の方<br>
						・スキルマッチする職種でのキャリアップを相談したい方<br>
						・創業者や実際に働いている人の話を聞いてみたい方<br>
						・事業内容や組織文化について聞いてみたい方
					</p>

					<h3>実施方法</h3>
					<p>オンライン面談(Zoom)もしくは対面</p>
					
					<h3>時間</h3>
					<p>30分~1時間程度</p>
					
					<h3>カジュアル面談担当者</h3>
					<p>キャリア採用担当</p>
					
					<h3>服装</h3>
					<p>平服にてご参加ください。</p>

					<h3>注意事項</h3>
					<p>
						転職をお考えの方を対象としています。<br>
						撮影や、録音は禁止とさせていただいております。<br>
						平日のみの実施となり、土日の面談は行っていません。
					</p>

					<h3>申し込みについて</h3>
					<p>
						下部フォームからお申込みください。<br>
						採用担当者より、フォームにご登録いただいたメールアドレス宛に、日程調整の連絡をいたします。
					</p>

				</div>
			</div>
		</div>

        <p>下記のフォームに必要事項をご入力のうえ、<br>「内容の確認」ボタンを押してください。</p>
	</div>

	<section class="form_section">
        <div class="inner">
            <div class="form_area">
                <?php 
                    //$form_id = do_shortcode('[mwform_formkey key="8074"]'); //ローカル
                    // $form_id = do_shortcode('[mwform_formkey key="7986"]'); //3号機
                    //echo $form_id; 

										if ( have_posts() ) : while ( have_posts() ) : the_post();
										the_content();
										endwhile; endif;
                ?>
            </div>
        </div>
    </section>

</article>

<script>
	//ハンバーガー内のアコーディオン
		const slideUp_entry = (el, duration = 500) => {
		el.style.height = el.offsetHeight + "px";
		el.offsetHeight;
		el.style.transitionProperty = "height, margin, padding";
		el.style.transitionDuration = duration + "ms";
		el.style.transitionTimingFunction = "ease";
		el.style.overflow = "hidden";
		el.style.height = 0;
		el.style.paddingTop = 0;
		el.style.paddingBottom = 0;
		el.style.marginTop = 0;
		el.style.marginBottom = 0;
		setTimeout(() => {
			el.style.display = "none";
			el.style.removeProperty("height");
			el.style.removeProperty("padding-top");
			el.style.removeProperty("padding-bottom");
			el.style.removeProperty("margin-top");
			el.style.removeProperty("margin-bottom");
			el.style.removeProperty("overflow");
			el.style.removeProperty("transition-duration");
			el.style.removeProperty("transition-property");
			el.style.removeProperty("transition-timing-function");
			el.classList.remove("is-open");
		}, duration);
		};
	
		// 要素をスライドしながら表示する関数(jQueryのslideDownと同じ)
		const slideDown_entry = (el, duration = 500) => {
		el.classList.add("is-open");
		el.style.removeProperty("display");
		let display = window.getComputedStyle(el).display;
		if (display === "none") {
			display = "block";
		}
		el.style.display = display;
		let height = el.offsetHeight;
		el.style.overflow = "hidden";
		el.style.height = 0;
		el.style.paddingTop = 0;
		el.style.paddingBottom = 0;
		el.style.marginTop = 0;
		el.style.marginBottom = 0;
		el.offsetHeight;
		el.style.transitionProperty = "height, margin, padding";
		el.style.transitionDuration = duration + "ms";
		el.style.transitionTimingFunction = "ease";
		el.style.height = height + "px";
		el.style.removeProperty("padding-top");
		el.style.removeProperty("padding-bottom");
		el.style.removeProperty("margin-top");
		el.style.removeProperty("margin-bottom");
		setTimeout(() => {
			el.style.removeProperty("height");
			el.style.removeProperty("overflow");
			el.style.removeProperty("transition-duration");
			el.style.removeProperty("transition-property");
			el.style.removeProperty("transition-timing-function");
		}, duration);
		};
	
		var content_boxes = document.getElementsByClassName("content");
		var content_box = content_boxes[0]; 
		const slideToggle_entry = (content_box, duration = 500) => {        
			if (content_box && window.getComputedStyle(content_box).display === "none") {
				return slideDown_entry(content_box, duration);
			} else if (content_box) {
				return slideUp_entry(content_box, duration);
			}
		};
	
		const accordions_entry = document.querySelectorAll(".entry-accordion");
		const accordionsArr_entry = Array.prototype.slice.call(accordions_entry);
	
		accordionsArr_entry.forEach((accordion) => {
			const accordionTriggers_entry = accordion.querySelectorAll(".trigger");
			const accordionTriggersArr_entry = Array.prototype.slice.call(accordionTriggers_entry);
			accordionTriggersArr_entry.forEach((trigger) => {
				trigger.addEventListener("click", () => {
					trigger.classList.toggle("is-active");
					const content_entry = trigger.querySelector(".content");
					slideToggle_entry(content_entry);
				});
			});
		});
</script>

<?php
get_footer();
?>