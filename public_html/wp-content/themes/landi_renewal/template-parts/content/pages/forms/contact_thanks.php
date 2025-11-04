<?php

	// /landi_contact/がURLに含まれているかをチェック
	if (strstr($_SERVER['REQUEST_URI'], 'landi_contact') || $terms_case_study[0]->slug === 'landi_contact') {
		$check_url = 'landi_contact';
	} else {
		$check_url = 'corp';
	}

?>

<?php if( $check_url === 'landi_contact' ) { ?>

	<?php include(get_template_directory() . '/template-parts/content/pages/forms/landi_contact_thanks.php'); ?>
	
<?php } else { ?>
		
	<article class="old_type form contact thanks">
	
		<?php include(get_template_directory() . '/template-parts/content/Breadcrumb.php'); ?>
		
		<div class="inner">
			<div class="ttl_box corp animation">
				<h1><em>Contact</em><span>お問い合わせ</span></h1>
			</div>
		</div>
	
		<section class="narrow_section">
			<div class="text_box">
				<h2 class="line">お問い合わせありがとうございます。</h2>
				<p>
					お問い合わせいただきありがとうございます。<br>
					メール送信が完了しました。<br>
					担当者より2～3営業日以内に連絡いたします。<br>
					1週間以上連絡がない場合は、お手数ですが再度お問い合わせください。
				</p>
				<a href="<?php echo esc_url(home_url("/")); ?>" class="button"><span>&#9656;&#32;ホームに戻る</span></a>
				<?php the_content();?>
			</div>
		</section>
	
	</article>

<?php } ?>