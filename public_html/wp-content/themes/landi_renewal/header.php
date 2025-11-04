<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package landi
 */

global $util;
$pageinfo = $util->pageInfo();
$assetsPath = get_stylesheet_directory_uri();


$template_pass = get_template_pass();

//投稿タイプ
$archive_post_type = get_query_var('post_type');
$taxonomy = get_query_var('taxonomy');

?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
  <!-- GTM1 -->
  <?php get_template_part($template_pass."/gtm1"); ?>
  <meta charset="UTF-8">
  <meta name="description" content="<?php echo $pageinfo->description(); ?>">
  <meta property="og:title" content="<?php echo $pageinfo->title(); ?>">
  <meta property="og:type" content="<?php echo $pageinfo->type(); ?>">
  <meta property="og:site_name" content="<?php echo $pageinfo->sitename(); ?>">
  <meta property="og:description" content="<?php echo $pageinfo->description(); ?>">
  <meta property="og:url" content="<?php echo $pageinfo->url(); ?>">

  <?php
  function get_og_image_url_with_cache_buster($image_url)
  {
    $cache_buster = wp_hash(date('Ymd')); // 日単位でハッシュを生成
    $separator = strpos($image_url, '?') !== false ? '&' : '?';
    return $image_url . $separator . 'v=' . substr($cache_buster, 0, 8); // ハッシュの最初の8文字を使用
  }
  ?>
  <meta property="og:image" content="<?php echo get_og_image_url_with_cache_buster($pageinfo->image()['src']); ?>">
  <meta property="og:image:width" content="<?php echo $pageinfo->image()['width']; ?>">
  <meta property="og:image:height" content="<?php echo $pageinfo->image()['height']; ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=no">
  <title><?php echo $pageinfo->title(); ?></title>

  <?php if(is_page_template('template-news-hidden.php')) { ?>
  <meta name="robots" content="noindex">
  <?php } ?>

  <script type="text/javascript">
  var ua = navigator.userAgent;
  </script>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@700&family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.icomoon.io/58435/landi/style-cf.css">

  <?php if(is_post_type_archive(["magazine"])||
    is_tax(["taxonomy_magazine"])): ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
  <?php endif; ?>

  <?php if(is_post_type_archive(["landi_area"]) || is_page('landi') || is_page('alliance') || is_post_type_archive(["recruit"]) ): ?>
  <!-- slick -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
  <?php endif; ?>

  <?php wp_head(); ?>

  <?php if( is_page('landi_contact') ): ?>
  <!-- Meta Pixel Code [landi_contact] -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1484677531737315');
  fbq('track', 'PageView');
  fbq('track', 'Contact');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1484677531737315&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  <?php elseif( is_page('contact_thanks') ): ?>
  <!-- Meta Pixel Code [contact_thanks] -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1484677531737315');
  fbq('track', 'PageView');
  fbq('track', 'CompleteRegistration');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1484677531737315&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  <?php elseif( is_page('landi_download') ): ?>
  <!-- Meta Pixel Code [landi_download] -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1484677531737315');
  fbq('track', 'PageView');
  fbq('track', 'AddToCart');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1484677531737315&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  <?php elseif( is_page('landi_download_thanks') ): ?>
  <!-- Meta Pixel Code [landi_download_thanks] -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1484677531737315');
  fbq('track', 'PageView');
  fbq('track', 'AddPaymentInfo');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1484677531737315&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  <?php elseif( is_page('landi_wp_download') ): ?>
  <!-- Meta Pixel Code [landi_wp_download] -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1484677531737315');
  fbq('track', 'PageView');
  fbq('track', 'AddToWishlist');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1484677531737315&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  <?php elseif( is_page('landi_wp_download_thanks') ): ?>
  <!-- Meta Pixel Code [landi_wp_download_thanks] -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1484677531737315');
  fbq('track', 'PageView');
  fbq('track', 'CustomizeProduct');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1484677531737315&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  <?php endif; ?>
  <script src="<?php echo get_template_directory_uri() ?>/src/renewal/js/main.js?v=2025100901" type="module"></script>
  <meta name="google-site-verification" content="hC-hAjyfXMcB475bwEBbo0bDLgBQlOAfl4-E8k6R7oU" />
</head>



<body<?php if ($util->pageInfo()->navigation()) echo ' class="' . $util->pageInfo()->navigation() . ' is-blend-mode"'; ?><?php if ($util->pageInfo()->page_id()) echo ' id="' . $util->pageInfo()->page_id() . '"'; ?>>

  <!-- GTM2 -->
  <?php get_template_part($template_pass."/gtm2"); ?>
  <?php get_template_part($template_pass."/header"); ?>

  <svg display="none">
    <defs>
      <symbol id="i-logo" data-name="レイヤー 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 241.52 49.48">
        <defs>
          <style>
          .cls-1 {
            fill: #005260;
          }

          .cls-1,
          .cls-2 {
            stroke-width: 0px;
          }

          .cls-2 {
            fill: #231815;
          }
          </style>
        </defs>
        <g id="FREEEDOMX_logo" data-name="FREEEDOMX logo">
          <g id="_1" data-name="1">
            <g>
              <polygon class="cls-2" points="17.79 49.48 0 40.4 0 9.08 17.79 18.16 17.79 49.48" />
              <polygon class="cls-1" points="17.79 0 0 9.08 17.79 18.16 35.58 9.08 17.79 0" />
              <polygon class="cls-1" points="25.11 21.88 25.11 32.53 35.58 27.23 25.11 21.88" />
            </g>
            <g>
              <polygon class="cls-2"
                points="59.69 16.57 59.69 25.04 68.15 25.04 68.15 29.42 59.74 29.42 59.74 42.34 54.54 42.34 54.54 11.93 68.15 11.93 68.15 16.57 59.69 16.57" />
              <path class="cls-2"
                d="M86.86,42.34l-4.72-12.97h-2.88v12.97h-4.98V11.93h8.68c1.26,0,2.42.17,3.48.49,1.06.33,1.97.85,2.73,1.57.76.72,1.35,1.62,1.78,2.71.43,1.09.64,2.39.64,3.91,0,1.17-.15,2.21-.45,3.11-.3.9-.68,1.67-1.14,2.3-.46.63-.97,1.14-1.52,1.52-.56.39-1.11.65-1.65.79l5.45,14h-5.41ZM86.52,20.87c0-.92-.13-1.67-.39-2.28-.26-.6-.59-1.07-1.01-1.42-.42-.34-.88-.59-1.4-.73-.51-.14-1.03-.21-1.54-.21h-2.92v9.36h2.92c1.26,0,2.3-.39,3.11-1.18.82-.79,1.22-1.97,1.22-3.54" />
              <polygon class="cls-2"
                points="97.41 42.34 97.41 11.93 111.45 11.93 111.45 16.49 102.34 16.49 102.34 25.04 111.45 25.04 111.45 29.24 102.34 29.24 102.34 37.74 111.45 37.74 111.45 42.34 97.41 42.34" />
              <polygon class="cls-2"
                points="117.68 42.34 117.68 11.93 131.72 11.93 131.72 16.49 122.62 16.49 122.62 25.04 131.72 25.04 131.72 29.24 122.62 29.24 122.62 37.74 131.72 37.74 131.72 42.34 117.68 42.34" />
              <path class="cls-2"
                d="M157.41,27.18c0,4.81-1.01,8.54-3.03,11.19-2.02,2.65-4.99,3.97-8.91,3.97h-7.6V11.93h7.64c3.89,0,6.85,1.34,8.87,4.02,2.02,2.68,3.03,6.42,3.03,11.23M152.26,27.18c0-1.8-.17-3.38-.49-4.72-.33-1.35-.79-2.46-1.4-3.35-.6-.89-1.32-1.55-2.15-2-.83-.44-1.73-.67-2.71-.67h-2.45v21.39h2.45c.97,0,1.88-.22,2.71-.67.83-.44,1.55-1.11,2.15-2,.6-.89,1.07-2,1.4-3.33.33-1.33.49-2.88.49-4.66" />
              <path class="cls-2"
                d="M183.33,27.09c0,2.4-.25,4.59-.75,6.55-.5,1.96-1.22,3.64-2.17,5.05-.95,1.4-2.1,2.49-3.46,3.26-1.36.77-2.88,1.16-4.57,1.16s-3.25-.39-4.59-1.16c-1.35-.77-2.49-1.86-3.44-3.26-.94-1.4-1.67-3.08-2.17-5.05-.5-1.96-.75-4.14-.75-6.55s.24-4.58.73-6.53c.49-1.95,1.2-3.62,2.15-5.02.94-1.4,2.1-2.48,3.46-3.24,1.36-.76,2.9-1.14,4.62-1.14s3.21.38,4.57,1.14c1.36.76,2.51,1.84,3.46,3.24.94,1.4,1.67,3.08,2.17,5.02.5,1.95.75,4.12.75,6.53M178.01,27.09c0-1.55-.12-3-.37-4.36-.24-1.36-.6-2.53-1.07-3.52-.47-.99-1.06-1.77-1.76-2.34-.7-.57-1.51-.86-2.43-.86s-1.77.29-2.47.86c-.7.57-1.29,1.35-1.76,2.34-.47.99-.82,2.16-1.05,3.52-.23,1.36-.34,2.81-.34,4.36s.11,3,.34,4.36c.23,1.36.58,2.54,1.05,3.54.47,1,1.06,1.79,1.76,2.36.7.57,1.52.86,2.47.86s1.77-.29,2.47-.86c.7-.57,1.29-1.36,1.76-2.36.47-1,.82-2.18,1.05-3.54.23-1.36.34-2.81.34-4.36" />
              <path class="cls-2"
                d="M188.38,42.28V11.74h4.6l4.96,9.5,4.84-9.5h4.64v30.54h-4.75v-21.66l-4.73,9.33-4.81-9.33v21.66h-4.75Z" />
            </g>
            <polygon class="cls-2"
              points="241.52 11.65 235.59 11.65 231.05 20.93 226.52 11.65 220.59 11.65 228.09 27.01 220.59 42.36 226.52 42.36 231.05 33.09 235.59 42.36 241.52 42.36 234.02 27.01 241.52 11.65" />
          </g>
        </g>
      </symbol>
      <symbol id="i-logo-white" data-name="レイヤー 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 241.52 49.48">
        <defs>
          <style>
          .cls-1-white {
            fill: white;
          }

          .cls-1-white,
          .cls-2-white {
            stroke-width: 0px;
          }

          .cls-2-white {
            fill: white;
          }
          </style>
        </defs>
        <g id="FREEEDOMX_logo" data-name="FREEEDOMX logo">
          <g id="_1" data-name="1">
            <g>
              <polygon class="cls-2-white" points="17.79 49.48 0 40.4 0 9.08 17.79 18.16 17.79 49.48" />
              <polygon class="cls-1-white" points="17.79 0 0 9.08 17.79 18.16 35.58 9.08 17.79 0" />
              <polygon class="cls-1-white" points="25.11 21.88 25.11 32.53 35.58 27.23 25.11 21.88" />
            </g>
            <g>
              <polygon class="cls-2-white"
                points="59.69 16.57 59.69 25.04 68.15 25.04 68.15 29.42 59.74 29.42 59.74 42.34 54.54 42.34 54.54 11.93 68.15 11.93 68.15 16.57 59.69 16.57" />
              <path class="cls-2-white"
                d="M86.86,42.34l-4.72-12.97h-2.88v12.97h-4.98V11.93h8.68c1.26,0,2.42.17,3.48.49,1.06.33,1.97.85,2.73,1.57.76.72,1.35,1.62,1.78,2.71.43,1.09.64,2.39.64,3.91,0,1.17-.15,2.21-.45,3.11-.3.9-.68,1.67-1.14,2.3-.46.63-.97,1.14-1.52,1.52-.56.39-1.11.65-1.65.79l5.45,14h-5.41ZM86.52,20.87c0-.92-.13-1.67-.39-2.28-.26-.6-.59-1.07-1.01-1.42-.42-.34-.88-.59-1.4-.73-.51-.14-1.03-.21-1.54-.21h-2.92v9.36h2.92c1.26,0,2.3-.39,3.11-1.18.82-.79,1.22-1.97,1.22-3.54" />
              <polygon class="cls-2-white"
                points="97.41 42.34 97.41 11.93 111.45 11.93 111.45 16.49 102.34 16.49 102.34 25.04 111.45 25.04 111.45 29.24 102.34 29.24 102.34 37.74 111.45 37.74 111.45 42.34 97.41 42.34" />
              <polygon class="cls-2-white"
                points="117.68 42.34 117.68 11.93 131.72 11.93 131.72 16.49 122.62 16.49 122.62 25.04 131.72 25.04 131.72 29.24 122.62 29.24 122.62 37.74 131.72 37.74 131.72 42.34 117.68 42.34" />
              <path class="cls-2-white"
                d="M157.41,27.18c0,4.81-1.01,8.54-3.03,11.19-2.02,2.65-4.99,3.97-8.91,3.97h-7.6V11.93h7.64c3.89,0,6.85,1.34,8.87,4.02,2.02,2.68,3.03,6.42,3.03,11.23M152.26,27.18c0-1.8-.17-3.38-.49-4.72-.33-1.35-.79-2.46-1.4-3.35-.6-.89-1.32-1.55-2.15-2-.83-.44-1.73-.67-2.71-.67h-2.45v21.39h2.45c.97,0,1.88-.22,2.71-.67.83-.44,1.55-1.11,2.15-2,.6-.89,1.07-2,1.4-3.33.33-1.33.49-2.88.49-4.66" />
              <path class="cls-2-white"
                d="M183.33,27.09c0,2.4-.25,4.59-.75,6.55-.5,1.96-1.22,3.64-2.17,5.05-.95,1.4-2.1,2.49-3.46,3.26-1.36.77-2.88,1.16-4.57,1.16s-3.25-.39-4.59-1.16c-1.35-.77-2.49-1.86-3.44-3.26-.94-1.4-1.67-3.08-2.17-5.05-.5-1.96-.75-4.14-.75-6.55s.24-4.58.73-6.53c.49-1.95,1.2-3.62,2.15-5.02.94-1.4,2.1-2.48,3.46-3.24,1.36-.76,2.9-1.14,4.62-1.14s3.21.38,4.57,1.14c1.36.76,2.51,1.84,3.46,3.24.94,1.4,1.67,3.08,2.17,5.02.5,1.95.75,4.12.75,6.53M178.01,27.09c0-1.55-.12-3-.37-4.36-.24-1.36-.6-2.53-1.07-3.52-.47-.99-1.06-1.77-1.76-2.34-.7-.57-1.51-.86-2.43-.86s-1.77.29-2.47.86c-.7.57-1.29,1.35-1.76,2.34-.47.99-.82,2.16-1.05,3.52-.23,1.36-.34,2.81-.34,4.36s.11,3,.34,4.36c.23,1.36.58,2.54,1.05,3.54.47,1,1.06,1.79,1.76,2.36.7.57,1.52.86,2.47.86s1.77-.29,2.47-.86c.7-.57,1.29-1.36,1.76-2.36.47-1,.82-2.18,1.05-3.54.23-1.36.34-2.81.34-4.36" />
              <path class="cls-2-white"
                d="M188.38,42.28V11.74h4.6l4.96,9.5,4.84-9.5h4.64v30.54h-4.75v-21.66l-4.73,9.33-4.81-9.33v21.66h-4.75Z" />
            </g>
            <polygon class="cls-2-white"
              points="241.52 11.65 235.59 11.65 231.05 20.93 226.52 11.65 220.59 11.65 228.09 27.01 220.59 42.36 226.52 42.36 231.05 33.09 235.59 42.36 241.52 42.36 234.02 27.01 241.52 11.65" />
          </g>
        </g>
      </symbol>

      <symbol id="i-arw-down" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="m.808 2.669 2 2 2-2m-2-2v4" stroke="currentColor" stroke-linecap="round" />
      </symbol>
      <symbol id="i-pdf" viewBox="0 0 24 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="24" height="12" rx="2" fill="#3A3635" />
        <path
          d="M3.84 8.80078V3.20078H6.024C6.51467 3.20078 6.93333 3.27811 7.28 3.43278C7.62667 3.58745 7.89333 3.81145 8.08 4.10478C8.26667 4.39811 8.36 4.74745 8.36 5.15278C8.36 5.55811 8.26667 5.90745 8.08 6.20078C7.89333 6.48878 7.62667 6.71278 7.28 6.87278C6.93333 7.02745 6.51467 7.10478 6.024 7.10478H4.28L4.64 6.72878V8.80078H3.84ZM4.64 6.80878L4.28 6.40878H6C6.512 6.40878 6.89867 6.29945 7.16 6.08078C7.42667 5.86211 7.56 5.55278 7.56 5.15278C7.56 4.75278 7.42667 4.44345 7.16 4.22478C6.89867 4.00611 6.512 3.89678 6 3.89678H4.28L4.64 3.49678V6.80878ZM9.53531 8.80078V3.20078H11.8953C12.4926 3.20078 13.018 3.31811 13.4713 3.55278C13.93 3.78745 14.2846 4.11545 14.5353 4.53678C14.7913 4.95811 14.9193 5.44611 14.9193 6.00078C14.9193 6.55545 14.7913 7.04345 14.5353 7.46478C14.2846 7.88611 13.93 8.21411 13.4713 8.44878C13.018 8.68345 12.4926 8.80078 11.8953 8.80078H9.53531ZM10.3353 8.10478H11.8473C12.3113 8.10478 12.7113 8.01678 13.0473 7.84078C13.3886 7.66478 13.6526 7.41945 13.8393 7.10478C14.026 6.78478 14.1193 6.41678 14.1193 6.00078C14.1193 5.57945 14.026 5.21145 13.8393 4.89678C13.6526 4.58211 13.3886 4.33678 13.0473 4.16078C12.7113 3.98478 12.3113 3.89678 11.8473 3.89678H10.3353V8.10478ZM16.8647 5.84878H19.7527V6.53678H16.8647V5.84878ZM16.9447 8.80078H16.1447V3.20078H20.0967V3.89678H16.9447V8.80078Z"
          fill="white" />
      </symbol>

      <symbol id="i-arw-r" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.5 0.5L9 4L5.5 7.5" stroke="currentColor" stroke-linecap="round" />
        <path d="M1 3.5C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5V3.5ZM1 4.5H9V3.5H1V4.5Z"
          fill="currentColor" />
      </symbol>

      <symbol id="i-arw-r__2" viewBox="0 0 6 5" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.41113 0.625L5.28616 2.50003L3.41113 4.37506" stroke="currentColor" stroke-linecap="round" />
        <path d="M1 2C0.723858 2 0.5 2.22386 0.5 2.5C0.5 2.77614 0.723858 3 1 3V2ZM1 3H5.28578V2H1V3Z"
          fill="currentColor" />
      </symbol>




      <symbol id="i-check" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="9" cy="9" r="9" fill="#F2EBEC" />
        <path d="M5 9L7.5 11.5L12 7" stroke="black" stroke-linecap="round" />
      </symbol>

      <symbol id="i-x" viewBox="0 0 22 20" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M16.9768 0.101562H20.1631L13.2025 8.48906L21.3911 19.9016H14.979L9.95809 12.9793L4.21199 19.9016H1.0226L8.46832 10.9311L0.613281 0.101562H7.18737L11.7273 6.42876L16.9768 0.101562ZM15.859 17.8908H17.6251L6.22744 2.00676H4.3325L15.859 17.8908Z"
          fill="white" />
      </symbol>

      <symbol id="i-instagram" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M9.7657 1.00391H4.23493C2.45032 1.00391 1.00391 2.45057 1.00391 4.23493V9.7657C1.00391 11.5503 2.45057 12.9967 4.23519 12.9967H9.76544C11.5501 12.9967 12.9967 11.5501 12.9967 9.76544V4.23493C12.9967 2.45032 11.5503 1.00391 9.7657 1.00391Z"
          stroke="white" stroke-width="0.7" stroke-miterlimit="10" />
        <path
          d="M7.00034 9.89521C8.59913 9.89521 9.89521 8.59913 9.89521 7.00034C9.89521 5.40155 8.59913 4.10547 7.00034 4.10547C5.40155 4.10547 4.10547 5.40155 4.10547 7.00034C4.10547 8.59913 5.40155 9.89521 7.00034 9.89521Z"
          stroke="white" stroke-width="0.7" stroke-miterlimit="10" />
        <path
          d="M10.4113 3.89283C10.6945 3.89283 10.9241 3.66323 10.9241 3.38001C10.9241 3.09679 10.6945 2.86719 10.4113 2.86719C10.128 2.86719 9.89844 3.09679 9.89844 3.38001C9.89844 3.66323 10.128 3.89283 10.4113 3.89283Z"
          fill="white" fill-opacity="0.952941" />
      </symbol>

      <symbol id="i-arw-toc" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M5.22929 5.22267C4.83426 5.64372 4.16574 5.64372 3.77072 5.22267L0.45095 1.68421C-0.148156 1.04563 0.30462 -9.3502e-07 1.18024 -8.58471e-07L7.81977 -2.78025e-07C8.69538 -2.01476e-07 9.14815 1.04564 8.54905 1.68421L5.22929 5.22267Z"
          fill="#2B2325" />
      </symbol>



      <symbol id="i-play" viewBox="0 0 6 8" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M5.25 3.56699C5.58333 3.75944 5.58333 4.24056 5.25 4.43301L0.75 7.03109C0.416667 7.22354 5.60108e-07 6.98298 5.55518e-07 6.59808L4.93555e-07 1.40192C4.88965e-07 1.01702 0.416667 0.776461 0.750001 0.968911L5.25 3.56699Z" />
      </symbol>

      <symbol id="i-stop" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line x1="1.08301" y1="6.70215" x2="1.08301" y2="1.29712" stroke-linecap="round" />
        <line x1="4.76562" y1="6.70215" x2="4.76562" y2="1.29712" stroke-linecap="round" />
      </symbol>

      <symbol id="i-pocket" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M14.8003 7.60627L10.4101 11.9437C10.1712 12.1786 9.85342 12.3097 9.52289 12.3097C9.19235 12.3097 8.87455 12.1786 8.63564 11.9437L4.24255 7.60627C3.73214 7.10647 3.71697 6.27187 4.2058 5.74687C4.69464 5.22187 5.50314 5.20327 6.01355 5.70607L9.52289 9.16207L13.0351 5.70607C13.1564 5.58653 13.2993 5.49275 13.4558 5.43009C13.6123 5.36743 13.7793 5.33713 13.9472 5.34092C14.1151 5.34471 14.2807 5.38251 14.4344 5.45217C14.588 5.52183 14.7269 5.62198 14.8429 5.74687C14.9602 5.87075 15.0525 6.01734 15.1144 6.17814C15.1763 6.33895 15.2066 6.51079 15.2035 6.68371C15.2004 6.85664 15.164 7.02721 15.0964 7.18557C15.0288 7.34393 14.9313 7.48692 14.8096 7.60627H14.8003ZM18.753 1.57207C18.522 0.884475 17.878 0.421875 17.1669 0.421875H1.86372C1.16197 0.421875 0.526719 0.871875 0.277636 1.54688C0.20501 1.74456 0.167853 1.95415 0.167969 2.16547V7.95907L0.235052 9.11227C0.505719 11.7343 1.82697 14.0281 3.87505 15.6247C3.9118 15.6529 3.94797 15.6811 3.98764 15.7093L4.00864 15.7279C5.09506 16.5451 6.34095 17.1101 7.6603 17.3839C8.27105 17.5123 8.89697 17.5777 9.51997 17.5777C10.094 17.5777 10.6715 17.5213 11.2367 17.4121C11.3067 17.3905 11.3732 17.3779 11.4432 17.3653C11.4613 17.3653 11.48 17.3527 11.501 17.3437C12.7659 17.0579 13.9596 16.5057 15.0068 15.7219L15.0278 15.6967L15.134 15.6121C17.1756 14.0185 18.4975 11.7247 18.7769 9.09307L18.8346 7.94287V2.15527C18.8346 1.95547 18.8101 1.75507 18.7407 1.56127L18.753 1.57207Z" />
      </symbol>

      <symbol id="i-note" viewBox=" 0 0 17 18" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M0.0390625 0.526288C3.2975 0.526288 7.75996 0.356715 10.9638 0.441907C15.2625 0.554686 16.8779 2.47517 16.9325 7.21919C16.9871 9.90154 16.9325 17.5827 16.9325 17.5827H12.2817C12.2817 10.8622 12.3094 9.75306 12.2817 7.63542C12.2272 5.77172 11.7082 4.88329 10.312 4.71371C8.83344 4.54414 4.68979 4.68532 4.68979 4.68532V17.5827H0.0390625V0.526288Z" />
      </symbol>

      <symbol id="i-download" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_798_263)">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M12.4004 5.77459C12.2665 4.56267 11.6959 3.44097 10.7953 2.61908C9.89461 1.79719 8.72552 1.33135 7.50643 1.30859C6.57508 1.31879 5.66568 1.59266 4.88358 2.09848C4.10149 2.6043 3.47872 3.32136 3.08743 4.16659C2.10186 4.46648 1.25439 5.10582 0.695399 5.97117C0.136409 6.83651 -0.0979536 7.8719 0.0338964 8.89362C0.165746 9.91534 0.655283 10.8573 1.41564 11.5524C2.176 12.2475 3.15801 12.6507 4.18743 12.6906H10.3124C10.8055 12.6827 11.2921 12.5775 11.7444 12.3812C12.1968 12.185 12.6059 11.9014 12.9485 11.5467C13.2911 11.1921 13.5604 10.7733 13.7409 10.3144C13.9214 9.85557 14.0096 9.3656 14.0004 8.87259C13.9985 8.26633 13.8524 7.66923 13.5742 7.13056C13.296 6.5919 12.8937 6.12712 12.4004 5.77459ZM9.67443 7.99959L7.30043 10.3766C7.22077 10.456 7.11289 10.5006 7.00043 10.5006C6.88797 10.5006 6.78009 10.456 6.70043 10.3766L4.32643 7.99959C4.26686 7.94021 4.22625 7.86449 4.20974 7.78202C4.19323 7.69954 4.20156 7.61402 4.23369 7.53629C4.26581 7.45855 4.32028 7.39209 4.39019 7.34533C4.4601 7.29857 4.54232 7.2736 4.62643 7.27359H6.15043V5.25959C6.15043 5.03416 6.23999 4.81796 6.39939 4.65855C6.5588 4.49915 6.775 4.40959 7.00043 4.40959C7.22587 4.40959 7.44207 4.49915 7.60147 4.65855C7.76088 4.81796 7.85043 5.03416 7.85043 5.25959V7.27559H9.37343C9.45701 7.27626 9.53854 7.3015 9.60788 7.34817C9.67722 7.39483 9.7313 7.46087 9.76338 7.53804C9.79547 7.61522 9.80414 7.70013 9.78833 7.7822C9.77251 7.86427 9.7329 7.93987 9.67443 7.99959Z"
            fill="white" />
        </g>
        <defs>
          <clipPath id="clip0_798_263">
            <rect width="14" height="14" fill="white" />
          </clipPath>
        </defs>
      </symbol>
      <symbol id="i-download-blue" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_798_263)">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M12.4004 5.77459C12.2665 4.56267 11.6959 3.44097 10.7953 2.61908C9.89461 1.79719 8.72552 1.33135 7.50643 1.30859C6.57508 1.31879 5.66568 1.59266 4.88358 2.09848C4.10149 2.6043 3.47872 3.32136 3.08743 4.16659C2.10186 4.46648 1.25439 5.10582 0.695399 5.97117C0.136409 6.83651 -0.0979536 7.8719 0.0338964 8.89362C0.165746 9.91534 0.655283 10.8573 1.41564 11.5524C2.176 12.2475 3.15801 12.6507 4.18743 12.6906H10.3124C10.8055 12.6827 11.2921 12.5775 11.7444 12.3812C12.1968 12.185 12.6059 11.9014 12.9485 11.5467C13.2911 11.1921 13.5604 10.7733 13.7409 10.3144C13.9214 9.85557 14.0096 9.3656 14.0004 8.87259C13.9985 8.26633 13.8524 7.66923 13.5742 7.13056C13.296 6.5919 12.8937 6.12712 12.4004 5.77459ZM9.67443 7.99959L7.30043 10.3766C7.22077 10.456 7.11289 10.5006 7.00043 10.5006C6.88797 10.5006 6.78009 10.456 6.70043 10.3766L4.32643 7.99959C4.26686 7.94021 4.22625 7.86449 4.20974 7.78202C4.19323 7.69954 4.20156 7.61402 4.23369 7.53629C4.26581 7.45855 4.32028 7.39209 4.39019 7.34533C4.4601 7.29857 4.54232 7.2736 4.62643 7.27359H6.15043V5.25959C6.15043 5.03416 6.23999 4.81796 6.39939 4.65855C6.5588 4.49915 6.775 4.40959 7.00043 4.40959C7.22587 4.40959 7.44207 4.49915 7.60147 4.65855C7.76088 4.81796 7.85043 5.03416 7.85043 5.25959V7.27559H9.37343C9.45701 7.27626 9.53854 7.3015 9.60788 7.34817C9.67722 7.39483 9.7313 7.46087 9.76338 7.53804C9.79547 7.61522 9.80414 7.70013 9.78833 7.7822C9.77251 7.86427 9.7329 7.93987 9.67443 7.99959Z"
            fill="#004E5D" />
        </g>
        <defs>
          <clipPath id="clip0_798_263">
            <rect width="14" height="14" fill="white" />
          </clipPath>
        </defs>
      </symbol>


      <symbol id="i-fb" viewBox="0 0 16 28" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M3.9051 27.4295H9.518V15.9909H14.5752L15.1309 10.3074H9.518V7.43703C9.518 7.05829 9.66584 6.69506 9.929 6.42726C10.1922 6.15945 10.5491 6.009 10.9212 6.009H15.1309V0.296875H10.9212C9.06043 0.296875 7.27585 1.04914 5.96007 2.38818C4.64429 3.72722 3.9051 5.54334 3.9051 7.43703V10.3074H1.09865L0.542969 15.9909H3.9051V27.4295Z" />
      </symbol>

      <symbol id="check" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="10" cy="10" r="10" fill="#07A007" />
        <path d="M5.5 10L9.5 13.5L14.5 7.5" stroke="white" />
      </symbol>

      <symbol id="error" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="10" cy="10" r="10" fill="#CE161E" />
        <path d="M7 13L13 7" stroke="white" />
        <path d="M7 7.21875L13.1831 13.0299" stroke="white" />
      </symbol>


    </defs>
  </svg>