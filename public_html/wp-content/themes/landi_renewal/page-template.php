<?php 
/*
Template Name:テンプレート名
*/ 
global $util;
$pageinfo = array(
  'page_id' => 'company',
  'navigation' => 'company renewal',
  'title' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';
?>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <a href="" class="c-linelink l-fv__heading--sub"><span class="c-linelink__txt"></span></a>
    <h1 class="l-fv__heading--main"></h1>
  </hgroup>
</div>

<main>

</main>

<?php get_footer(); ?>