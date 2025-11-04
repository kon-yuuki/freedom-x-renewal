<?php $pageinfo = get_query_var('pageinfo'); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="description" content="<?php echo $pageinfo['description']; ?>">
  <meta property="og:title" content="<?php echo $pageinfo['title']; ?>">
  <meta property="og:type" content="<?php echo ( $pageinfo['page_id'] == 'top' )? 'website' : 'article'; ?>">
  <meta property="og:site_name" content="<?php echo $pageinfo['sitename']; ?>">
  <meta property="og:description" content="<?php echo $pageinfo['description']; ?>">
  <meta property="og:url" content="<?php echo $pageinfo['url']; ?>">
  <meta property="og:image" content="<?php echo $pageinfo['image']; ?>">
  <meta name="twitter:title" content="<?php echo $pageinfo['title']; ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <link rel="shortcut icon" href="/assets/imgs/common/favicon.ico">
  <!-- title -->
  <title><?php echo $pageinfo['title']; ?></title>
  <!-- css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@3.4.1/dist/css/yakuhanjp.min.css" />
  <link rel="stylesheet" media="all" href="/assets/css/main.css?=v1.0" defer>
</head>
<body<?php if( $pageinfo['navigation']) echo ' class="'.$pageinfo['navigation'].'"'; ?><?php if( $pageinfo['page_id']) echo ' id="'.$pageinfo['page_id'].'"'; ?>>
  <div id="wrapper" class="preload">
    <svg display="none">
      <defs>
        <symbol id="i-logo" viewBox="0 0 144 69">
          <path
            d="M144 49.3039C143.984 44.9516 142.479 40.7351 139.735 37.3514C136.99 33.9677 133.17 31.6193 128.906 30.6945C124.641 29.7696 120.188 30.3236 116.283 32.2649C112.377 34.2063 109.252 37.4187 107.426 41.3712C105.599 45.3237 105.179 49.7797 106.235 54.0024C107.292 58.2252 109.762 61.9619 113.236 64.595C116.711 67.228 120.983 68.5998 125.345 68.4835C129.707 68.3672 133.899 66.7697 137.228 63.9551V58.7476C135.003 61.6701 131.81 63.7097 128.217 64.5027C124.625 65.2956 120.867 64.7905 117.613 63.0773C114.36 61.3642 111.822 58.5543 110.452 55.1486C109.082 51.7429 108.97 47.9628 110.135 44.4821C111.299 41.0014 113.666 38.0463 116.812 36.1436C119.958 34.241 123.679 33.5144 127.312 34.0934C130.945 34.6725 134.254 36.5196 136.649 39.3053C139.044 42.0911 140.369 45.6345 140.388 49.3039V68.3114H144V49.3039Z" />
          <path d="M10.3225 30.2969H6.46313V68.312H10.3225V30.2969Z" />
          <path d="M8.24537 20.7461L5.22144 23.7619L8.25674 26.7891L11.2807 23.7733L8.24537 20.7461Z" />
          <path d="M3.73221 16.2451L0 19.9674L3.74585 23.7033L7.47806 19.981L3.73221 16.2451Z" />
          <path d="M12.6314 16.3721L9.02856 19.9653L12.645 23.5721L16.2479 19.9788L12.6314 16.3721Z" />
          <path d="M8.24527 10.5576L3.91821 14.8731L8.26114 19.2044L12.5882 14.8889L8.24527 10.5576Z" />
          <path
            d="M81.4963 64.8967C79.3197 64.8948 77.1677 64.4371 75.1797 63.5532C73.1917 62.6693 71.412 61.3789 69.9558 59.7656C68.4995 58.1523 67.3991 56.252 66.7258 54.1877C66.0526 52.1233 65.8214 49.941 66.0474 47.7819H100.573C100.135 42.887 97.8197 38.3495 94.1105 35.1143C90.4013 31.8791 85.5837 30.1956 80.661 30.4145C75.7383 30.6333 71.0901 32.7376 67.6842 36.2892C64.2784 39.8407 62.3774 44.5656 62.3774 49.48C62.3774 54.3944 64.2784 59.1194 67.6842 62.671C71.0901 66.2225 75.7383 68.3268 80.661 68.5457C85.5837 68.7645 90.4013 67.081 94.1105 63.8458C97.8197 60.6106 100.135 56.0731 100.573 51.1782H96.9406C96.4994 54.9551 94.6826 58.4389 91.8355 60.9679C88.9883 63.497 85.309 64.8951 81.4963 64.8967ZM81.4963 33.9095C84.6644 33.9125 87.7561 34.8801 90.3579 36.6831C92.9596 38.4861 94.9474 41.0383 96.0552 43.9985H66.9306C68.0384 41.0384 70.0256 38.4859 72.6268 36.6823C75.2279 34.8786 78.3191 33.9097 81.4872 33.9049L81.4963 33.9095Z" />
          <path
            d="M57.2912 0H53.6838V49.0483H53.6702V49.397C53.6757 53.0623 52.3801 56.6113 50.0131 59.4152C47.6461 62.219 44.3603 64.0968 40.7379 64.7158C37.1156 65.3348 33.3904 64.6552 30.2224 62.7972C27.0545 60.9391 24.6482 58.0227 23.4298 54.5647C22.2115 51.1066 22.2598 47.33 23.5662 43.904C24.8726 40.4781 27.3526 37.6239 30.5671 35.847C33.7816 34.0702 37.5229 33.4855 41.1283 34.1965C44.7336 34.9074 47.9703 36.8681 50.2649 39.7313V34.6347C46.9006 31.8894 42.6996 30.3679 38.353 30.3206C34.0064 30.2733 29.7731 31.703 26.3496 34.3745C22.9261 37.0459 20.5164 40.8 19.5168 45.0191C18.5173 49.2382 18.9875 53.6709 20.8501 57.588C22.7127 61.5051 25.8567 64.6732 29.7649 66.5711C33.6731 68.469 38.1126 68.9837 42.3531 68.0304C46.5936 67.0771 50.3824 64.7125 53.0961 61.3259C55.8099 57.9393 57.287 53.7323 57.2844 49.397V49.234L57.2912 0Z" />
        </symbol>
        <symbol id="arw-r" viewBox="0 0 8 7">
          <g>
            <path d="M0.5 3.5H6.5" fill="none" />
            <path d="M4.5 1L7 3.5L4.5 6" fill="none" />
          </g>
        </symbol>
        <symbol id="arw-r_2" viewBox="0 0 11 10" fill="none">
          <path d="M1 5H9" stroke-linecap="round" />
          <path d="M6 1L10 5L6 9" stroke-linecap="round" />
        </symbol>
        <symbol id="arw-b2" viewBox="0 0 10 11" fill="none">
          <path d="M5 1L5 9" stroke-linecap="round" />
          <path d="M9 6L5 10L1 6" stroke-linecap="round" />
        </symbol>
        <symbol id="arw-b" viewBox="0 0 7 4" width="8" height="7">
          <path d="M6 0.75L3.5 3.25L1 0.75" stroke="white" stroke-linecap="round" />
        </symbol>
        <symbol id="i-arw-b" viewBox="0 0 10 7">
          <path d="M9 1L5 5L1 1" stroke-width="2" stroke-linecap="round" />
        </symbol>
        <symbol id="i-facebook" viewBox="0 0 140 140">
          <g transform="matrix(10,0,0,10,0,0)">
            <path d="M9.482,0.588L8.82,0.575C8.523,0.57,8.265,0.564,8.118,0.564c-1.854,0-3.055,1.295-3.055,3.299v0.93
					c0,0.127-0.103,0.23-0.23,0.23H4.534c-0.527,0-0.954,0.426-0.957,0.953v0.903c0.001,0.528,0.429,0.957,0.957,0.957h0.299
					c0.127,0,0.23,0.103,0.23,0.23l0,0v4.661c0.001,0.391,0.318,0.708,0.709,0.709h1.736c0.391-0.001,0.708-0.318,0.709-0.709V8.066
					c0-0.127,0.103-0.23,0.23-0.23h0.38c0.528-0.001,0.957-0.429,0.957-0.957V5.976C9.783,5.447,9.354,5.019,8.826,5.019h-0.38
					c-0.127,0-0.23-0.103-0.23-0.23V4.145c0-0.762,0.223-0.762,0.669-0.762h0.578c0.529,0,0.958-0.429,0.959-0.958V1.544
					C10.421,1.023,10.003,0.599,9.482,0.588z" />
          </g>
        </symbol>
        <symbol id="i-twitter" viewBox="0 0 13 13">
          <g clip-path="url(#clip0_761_1709)">
            <path
              d="M10.238 0.624512H12.2314L7.87638 5.60243L13 12.3749H8.98842L5.84675 8.26689L2.25117 12.3749H0.25675L4.91508 7.0503L0 0.625053H4.11342L6.95337 4.37989L10.238 0.624512ZM9.53875 11.1821H10.6432L3.51325 1.75497H2.32808L9.53875 11.1821Z"
              fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_761_1709">
              <rect width="13" height="13" fill="white" />
            </clipPath>
          </defs>
        </symbol>
        <symbol id="i-hatena" viewBox="0 0 36 36">
          <g clip-path="url(#clip0_87_3198)">
            <path
              d="M19.7801 18.7481C19.2075 18.108 18.4115 17.7486 17.39 17.6709C18.2985 17.4234 18.9583 17.0612 19.3757 16.5769C19.7908 16.0993 19.9972 15.4513 19.9972 14.6351C19.9972 13.9894 19.856 13.4179 19.5827 12.9246C19.302 12.4341 18.8992 12.0414 18.3693 11.7473C17.9058 11.4924 17.3552 11.3124 16.7133 11.2067C16.0682 11.1038 14.9392 11.052 13.3187 11.052H9.37891V25.4199H13.4379C15.0686 25.4199 16.2442 25.3626 16.9637 25.2534C17.682 25.1404 18.285 24.9503 18.7727 24.6898C19.3762 24.3714 19.8363 23.9181 20.1581 23.3359C20.4815 22.752 20.6418 22.0781 20.6418 21.3081C20.6418 20.2427 20.355 19.386 19.7801 18.7481ZM13.0166 14.2374H13.8575C14.8295 14.2374 15.482 14.3471 15.8195 14.5654C16.152 14.7848 16.3213 15.1639 16.3213 15.7033C16.3213 16.2225 16.1407 16.5887 15.7841 16.803C15.4224 17.0134 14.7632 17.1203 13.7985 17.1203H13.0166V14.2374ZM16.3522 22.4764C15.9697 22.7115 15.3105 22.8268 14.3852 22.8268H13.0166V19.6875H14.4442C15.3943 19.6875 16.0507 19.8068 16.4 20.0458C16.755 20.2849 16.9293 20.7062 16.9293 21.312C16.9293 21.8537 16.7387 22.2429 16.3522 22.4764Z"
              fill="white" />
            <path
              d="M24.8007 21.7794C23.795 21.7794 22.9805 22.5934 22.9805 23.5991C22.9805 24.6049 23.795 25.4194 24.8007 25.4194C25.8065 25.4194 26.6204 24.6049 26.6204 23.5991C26.6204 22.5934 25.8053 21.7794 24.8007 21.7794Z"
              fill="white" />
            <path d="M26.3814 11.052H23.2207V20.6303H26.3814V11.052Z" fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_87_3198">
              <rect width="36" height="36" fill="white" />
            </clipPath>
          </defs>
        </symbol>
        <symbol id="i-pocket" viewBox="0 0 32 32">
          <g clip-path="url(#clip0_87_3208)">
            <path
              d="M23.2805 8.99304H8.78805C7.84255 8.99304 7.06055 9.72354 7.06055 10.6605V16.024C7.06055 20.889 11.0835 24.929 16.0345 24.929C20.9515 24.929 24.9395 20.889 24.9395 16.024V10.6605C24.9395 9.71504 24.1915 8.99304 23.2805 8.99304ZM21.106 15.646L16.8425 19.66C16.619 19.9095 16.284 20.0125 16.026 20.0125C15.708 20.0125 15.3985 19.918 15.149 19.66L10.9545 15.646C10.5075 15.182 10.456 14.391 10.9545 13.8925C11.4185 13.4455 12.2095 13.394 12.682 13.8925L16.0345 17.116L19.4555 13.8925C19.9025 13.394 20.6845 13.4455 21.1145 13.8925C21.553 14.3825 21.553 15.1735 21.106 15.646Z"
              fill="white" />
            <path
              d="M21.1059 15.646L16.8424 19.66C16.6189 19.9095 16.2839 20.0125 16.0259 20.0125C15.7079 20.0125 15.3984 19.918 15.1489 19.66L10.9544 15.646C10.5074 15.182 10.4559 14.391 10.9544 13.8925C11.4184 13.4455 12.2094 13.394 12.6819 13.8925L16.0344 17.116L19.4554 13.8925C19.9024 13.394 20.6844 13.4455 21.1144 13.8925C21.5529 14.3825 21.5529 15.1735 21.1059 15.646Z"
              fill="#EF4154" />
          </g>
          <defs>
            <clipPath id="clip0_87_3208">
              <rect width="32" height="32" fill="white" />
            </clipPath>
          </defs>
        </symbol>
        <symbol id="check" viewBox="0 0 10 8" fill="none">
          <path d="M0.5 3L4.5 6.5L9.5 0.5" stroke="white" />
        </symbol>
        <symbol id="error" viewBox="0 0 8 8" fill="none">
          <path d="M1 7L7 1" stroke="white" />
          <path d="M1 1.2168L7.18307 7.02796" stroke="white" />
        </symbol>
        <symbol id="num-primary" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 1H63V63H1V1Z" fill="white" />
          <path
            d="M63 32C63 49.1208 49.1208 63 32 63C14.8792 63 1 49.1208 1 32C1 14.8792 14.8792 1 32 1C49.1208 1 63 14.8792 63 32Z"
            fill="white" />
          <path
            d="M1 1H63M1 1V63M1 1L63 63M63 1V63M63 1L1 63M63 63H1M63 32C63 49.1208 49.1208 63 32 63C14.8792 63 1 49.1208 1 32C1 14.8792 14.8792 1 32 1C49.1208 1 63 14.8792 63 32Z"
            stroke="#E8ECED" stroke-linejoin="round" />
          <path
            d="M10.0797 53.9203C15.6896 59.5302 23.4396 63 32 63C40.5604 63 48.3104 59.5302 53.9203 53.9203L32 32L10.0797 53.9203Z"
            fill="#8C9CA4" />
          <path
            d="M32 32L53.9203 53.9203C59.5302 48.3104 63 40.5604 63 32C63 23.4396 59.5302 15.6896 53.9203 10.0797L32 32Z"
            fill="#8C9CA4" />
          <path
            d="M32 32L53.9203 10.0797C48.3104 4.46979 40.5604 1 32 1C23.4396 1 15.6896 4.46979 10.0797 10.0797L32 32Z"
            fill="#8C9CA4" />
          <path
            d="M10.0797 53.9203L32 32L10.0797 10.0797C4.46979 15.6896 1 23.4396 1 32C1 40.5604 4.46979 48.3104 10.0797 53.9203Z"
            fill="#8C9CA4" />
          <path
            d="M10.0797 53.9203C15.6896 59.5302 23.4396 63 32 63C40.5604 63 48.3104 59.5302 53.9203 53.9203M10.0797 53.9203L32 32M10.0797 53.9203C4.46979 48.3104 1 40.5604 1 32C1 23.4396 4.46979 15.6896 10.0797 10.0797M32 32L53.9203 53.9203M32 32L53.9203 10.0797M32 32L10.0797 10.0797M53.9203 53.9203C59.5302 48.3104 63 40.5604 63 32C63 23.4396 59.5302 15.6896 53.9203 10.0797M53.9203 10.0797C48.3104 4.46979 40.5604 1 32 1C23.4396 1 15.6896 4.46979 10.0797 10.0797"
            stroke="#E8ECED" stroke-linejoin="round" />
          <circle cx="32" cy="32" r="21.5" fill="white" stroke="#E8ECED" />
          <circle cx="32" cy="32" r="21.5" fill="white" stroke="#E8ECED" />
        </symbol>
        <symbol id="num-secondary" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 1H63V63H1V1Z" fill="white" />
          <path
            d="M63 32C63 49.1208 49.1208 63 32 63C14.8792 63 1 49.1208 1 32C1 14.8792 14.8792 1 32 1C49.1208 1 63 14.8792 63 32Z"
            fill="white" />
          <path
            d="M1 1H63M1 1V63M1 1L63 63M63 1V63M63 1L1 63M63 63H1M63 32C63 49.1208 49.1208 63 32 63C14.8792 63 1 49.1208 1 32C1 14.8792 14.8792 1 32 1C49.1208 1 63 14.8792 63 32Z"
            stroke="#E8ECED" stroke-linejoin="round" />
          <path
            d="M10.0797 53.9203C15.6896 59.5302 23.4396 63 32 63C40.5604 63 48.3104 59.5302 53.9203 53.9203L32 32L10.0797 53.9203Z"
            fill="#F9F9F9" />
          <path
            d="M32 32L53.9203 53.9203C59.5302 48.3104 63 40.5604 63 32C63 23.4396 59.5302 15.6896 53.9203 10.0797L32 32Z"
            fill="#F9F9F9" />
          <path
            d="M32 32L53.9203 10.0797C48.3104 4.46979 40.5604 1 32 1C23.4396 1 15.6896 4.46979 10.0797 10.0797L32 32Z"
            fill="#F9F9F9" />
          <path
            d="M10.0797 53.9203L32 32L10.0797 10.0797C4.46979 15.6896 1 23.4396 1 32C1 40.5604 4.46979 48.3104 10.0797 53.9203Z"
            fill="#F9F9F9" />
          <path
            d="M10.0797 53.9203C15.6896 59.5302 23.4396 63 32 63C40.5604 63 48.3104 59.5302 53.9203 53.9203M10.0797 53.9203L32 32M10.0797 53.9203C4.46979 48.3104 1 40.5604 1 32C1 23.4396 4.46979 15.6896 10.0797 10.0797M32 32L53.9203 53.9203M32 32L53.9203 10.0797M32 32L10.0797 10.0797M53.9203 53.9203C59.5302 48.3104 63 40.5604 63 32C63 23.4396 59.5302 15.6896 53.9203 10.0797M53.9203 10.0797C48.3104 4.46979 40.5604 1 32 1C23.4396 1 15.6896 4.46979 10.0797 10.0797"
            stroke="#E8ECED" stroke-linejoin="round" />
          <circle cx="32" cy="32" r="21.5" fill="white" stroke="#E8ECED" />
        </symbol>
        <symbol id="progress-circle" viewBox="0 0 24 24">
          <path
            d="M12 6C12 9.31371 9.31371 12 6 12C2.68629 12 0 9.31371 0 6C0 2.68629 2.68629 0 6 0C9.31371 0 12 2.68629 12 6ZM0.6 6C0.6 8.98234 3.01766 11.4 6 11.4C8.98234 11.4 11.4 8.98234 11.4 6C11.4 3.01766 8.98234 0.6 6 0.6C3.01766 0.6 0.6 3.01766 0.6 6Z"
            fill="#8C9CA4" />
        </symbol>
        <symbol id="progress-circle2" viewBox="-1 -1 14 14">
          <circle cx="6" cy="6" r="6" />
        </symbol>


        <!-- 未設定 -->
        <symbol id=" i-blank" viewBox="0 0 10 10">
          <g>
            <path
              d="M1.25 1.25V8.75H8.75V5H7.91667V7.91667H2.08333V2.08333H5V1.25H1.25ZM5.83333 1.25V2.08333H7.32747L3.4554 5.9554L4.0446 6.5446L7.91667 2.67253V4.16667H8.75V1.25H5.83333Z" />
          </g>
        </symbol>

      </defs>
    </svg>
    <!-- /////////////////////////////////////////////////////////////////// -->
    <?php if($pageinfo['navigation'] != 'top'): ?>
    <div class="liquid-wrapper">
      <?php endif;  ?>
      <header id="header" class="">
        <div
          class="header <?php if( strpos($pageinfo['navigation'], 'service_under') !== false ){ echo 'is-white';} ?> <?php if( $pageinfo['navigation'] == 'contact' ){ echo 'is-contact';} ?>">
          <?php if( $pageinfo['navigation'] == 'top' ): ?>
          <h1 class="header__logo logo">
            <a href="/" aria-label="idea株式会社">
              <svg>
                <use href="#i-logo">
              </svg>
            </a>
          </h1>
          <?php else:  ?>
          <div class="header__logo logo">
            <a href="/">
              <svg>
                <use href="#i-logo">
              </svg>
            </a>
          </div>
          <?php endif  ?>
          <div class="header__lead c-tb-transparent c-sp-none">
            <p class="">私たちは映像撮影と写真撮影を基軸とした<br>
              ブランディングカンパニーです。</p>
          </div>

          <nav class="header__nav">
            <ul class="nav">
              <li
                class="top c-sp-none<?php if( $pageinfo['navigation'] == 'top' ) echo ' is-current c-borderRadius-none'; ?>"
                data-nav="top">
                <a href="/" class="label">
                  <span class="line">
                    <span class="titleeffect">トップ</span>
                  </span>
                </a>
              </li>
              <li
                class="about<?php if( strpos($pageinfo['navigation'], 'corp') !== false ) echo ' is-current'; ?><?php if( $pageinfo['navigation'] == 'top' ) echo ' c-borderRadius-none'; ?>"
                data-nav="corp">
                <a href="/corp/" class="label">
                  <span class="line">
                    <span class="titleeffect">会社概要</span>
                  </span>
                </a>
              </li>
              <li class="company<?php if( strpos($pageinfo['navigation'], 'service') !== false) echo ' is-current'; ?>"
                data-nav="service">
                <a href="/service/" class="label">
                  <span class="line">
                    <span class="titleeffect">サービス</span>
                  </span>
                </a>
              </li>
              <li class="has-dropdown service<?php if( $pageinfo['navigation'] == 'works' ) echo ' is-current'; ?>"
                data-nav="works">
                <a href="/works/" class="label">
                  <span class="line">
                    <span class="titleeffect"><span class="c-sp-none">制作</span>実績</span>
                  </span>
                </a>
                <!-- <div class="dropdownBg"></div>
              <div class="dropdown">
                <div class="container">
                  <div class="dropdown__ttl">
                    <a href="#" class="c-linelink">
                      <span class="c-linelink__txt">事業紹介</span>
                      <div class="l-arwbtn small">
                        <span class="bg"></span>
                        <span class="arw"></span>
                      </div>
                    </a>
                  </div>
                  <div class="dropdown__body is-bnr">
                    <ul class="dropdown__nav">
                      <li><a href="#" class="c-linelink c-linelink--hidden"><span
                            class="c-linelink__txt">レンタルイベント事業</span></a></li>
                      <li><a href="#" class="c-linelink c-linelink--hidden"><span
                            class="c-linelink__txt">ICT事業</span></a></li>
                      <li><a href="#" class="c-linelink c-linelink--hidden"><span
                            class="c-linelink__txt">システム販売事業</span></a></li>
                      <li><a href="#" class="c-linelink c-linelink--hidden"><span
                            class="c-linelink__txt">特徴・初めてご依頼されるかたへ</span></a></li>
                      <li><a href="#" class="c-linelink c-linelink--hidden"><span
                            class="c-linelink__txt">数字で知るAZA</span></a></li>
                    </ul>
                    <div class="dropdown__rentalBnr">
                      <a href="#" class="c-linelink">
                        <div class="rentalBnr__img">
                          <picture class="img">
                            <source type="image/avif" srcset="/assets/imgs/common/dropdown_rental_bnr.avif">
                            <img loading="lazy" src="/assets/imgs/common/dropdown_rental_bnr.webp" width="300"
                              height="300" alt="レンタル機器カタログサイト">
                          </picture>
                        </div>
                        <div class="rentalBnr__txt">
                          <p class="ttl jp-ttl"><span class="c-linelink__txt white">映像機器・音響製品<br>検索サイト</span></p>
                          <div class="rentalBnr__arw">
                            <div class="l-arwbtn small ghost">
                              <span class="bg"></span>
                              <span class="arw"></span>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div> -->
              </li>
              <li class="works c-sp-none<?php if( $pageinfo['navigation'] == 'recruit' ) echo ' is-current'; ?>"
                data-nav="recruit">
                <a href="/recruit/" class="label">
                  <span class="line">
                    <span class="titleeffect">採用情報</span>
                  </span>
                </a>
              </li>
              <li class="news c-sp-none<?php if( $pageinfo['navigation'] == 'news' ) echo ' is-current'; ?>"
                data-nav="news">
                <a href="/topics/" class="label">
                  <span class="line">
                    <span class="titleeffect">ニュース</span>
                  </span>
                </a>
              </li>
              <li class="blog c-sp-none<?php if( $pageinfo['navigation'] == 'blog' ) echo ' is-current'; ?>"
                data-nav="blog">
                <a href="/blog/" class="label">
                  <span class="line">
                    <span class="titleeffect">ブログ</span>
                  </span>
                </a>
              </li>
              <li class="contact<?php if( $pageinfo['navigation'] == 'contact' ) echo ' is-current'; ?>"
                data-nav="contact">
                <a href="/contact/" class="label">
                  <span class="line">
                    <span class="titleeffect">問い合わせ</span>
                  </span>
                </a>
              </li>
            </ul>
          </nav>

        </div>
        <!-- <div class="header__drawerMenu">
        <div class="header__drawerMenuWrap">
          <nav class="drawerMenu">
            <div class="drawerMenu__inner">
              <div class="drawerMenu__nav">
                <div class="item top pc-hidden">
                  <div class="item__ttl">
                    <a href="/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">TOP
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">トップ</span>
                    </a>
                  </div>
                </div>
                <div class="item about">
                  <div class="item__ttl">
                    <a href="/about/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">WHO WE ARE
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">私たちについて</span>
                    </a>
                  </div>
                </div>
                <div class="item company">
                  <div class="item__ttl">
                    <a href="/company/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">COMPANY
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">会社情報</span>
                    </a>
                  </div>
                </div>
                <div class="item service sp-accordion">
                  <div class="item__ttl has-children">
                    <a href="/service/" class="sp-accordion__label item__label c-linelink c-linelink--hidden">
                      <div class="en">SERVICE
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">事業紹介</span>
                      <span class="icon gray"></span>
                    </a>
                  </div>
                  <div class="item__children sp-accordion__body">
                    <ul>
                      <li>
                        <a href="#" class="c-linelink c-linelink--hidden">
                          <span class="c-linelink__txt white">レンタルイベント事業</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="c-linelink c-linelink--hidden">
                          <span class="c-linelink__txt white">ICT事業</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="c-linelink c-linelink--hidden">
                          <span class="c-linelink__txt white">システム販売事業</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="c-linelink c-linelink--hidden">
                          <span class="c-linelink__txt white">特徴・初めてご依頼されるかたへ</span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="c-linelink c-linelink--hidden">
                          <span class="c-linelink__txt white">数字で知るAZA</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="item works">
                  <div class="item__ttl">
                    <a href="/works/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">WORKS
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">実績紹介</span>
                    </a>
                  </div>
                </div>
                <div class="item news">
                  <div class="item__ttl">
                    <a href="/news/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">NEWS
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">ニュース</span>
                    </a>
                  </div>
                </div>
                <div class="item column">
                  <div class="item__ttl">
                    <a href="/column/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">COLUMN
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">ブログ・ナレッジ</span>
                    </a>
                  </div>
                </div>
                <div class="item recruit">
                  <div class="item__ttl">
                    <a href="/recruit/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">RECRUIT
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">採用情報</span>
                    </a>
                  </div>
                </div>
                <div class="item contact">
                  <div class="item__ttl">
                    <a href="/contact/" class="item__label c-linelink c-linelink--hidden">
                      <div class="en">CONTACT
                        <div class="l-arwbtn ghost">
                          <span class="bg"></span>
                          <span class="arw"></span>
                        </div>
                      </div>
                      <span class="c-linelink__txt white jp jp-ttl">問い合わせ</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="drawerMenu__info">
              <ul class="sns">
                <li>
                  <a href="#" class="twitter" target="_blank">
                    <div class="icon">
                      <svg>
                        <use href="#i-twitter"></use>
                      </svg>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#" class="facebook" target="_blank">
                    <div class="icon">
                      <svg>
                        <use href="#i-facebook"></use>
                      </svg>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="logo"><a href="/">○○○○○○○○</a></div>
              <div class="copy">Copyright(C)AZA Corporation<br class="sp-hidden">All rights reserved.</div>
            </div>
            <div class="drawerMenu__foot">
              <div class="address">〒175-0081 東京都板橋区新河岸1-15-5<br>営業時間 9:30〜18:00（土日曜祝日休業）</div>
              <div class="tel"><a href="tel:05036462333" class="en">050-3646-2333</a></div>
              <div class="bnr">
                <a href="#" class="c-linelink">
                  <div class="bnr__img">
                    <picture class="img">
                      <source type="image/avif" media="(max-width:1023px)"
                        srcset="/assets/imgs/common/drawer_rental_bnr_sp.avif">
                      <source media="(max-width:1023px)" srcset="/assets/imgs/common/drawer_rental_bnr_sp.webp"
                        width="1200" height="320">
                      <source type="image/avif" srcset="/assets/imgs/common/drawer_rental_bnr.avif">
                      <img loading="lazy" src="/assets/imgs/common/drawer_rental_bnr.webp" width="560" height="160"
                        alt="映像機器・音響製品検索サイト">
                    </picture>
                  </div>
                  <div class="bnr__txt">
                    <p class="ttl jp-ttl">
                      <span class="pc-hidden jp-ttl">レンタル機器カタログサイト</span>
                      <span class="c-linelink__txt white jpb sp-hidden">映像機器・音響製品検索サイト</span>
                    </p>
                    <div class="l-btn small" href="#">
                      <span class="l-btn__icon hover-wrapper">
                        <span class="arw">
                        </span>
                      </span>
                      <span class="l-btn__label">
                        <span class="bg"></span>
                        <span class="txt">もっと見る</span>
                      </span>
                      <span class="l-btn__icon wrapper">
                        <span class="arw">
                        </span>
                      </span>
                    </div>
                  </div>
                </a>

              </div>
            </div>
          </nav>
          <div class="drawerMenu__video">
            <video class="drawer-video" muted playsinline>
              <source src="/assets/imgs/top/about_bg.webm" type="video/webm" />
              <source src="/assets/imgs/top/about_bg.mp4" type="video/mp4" />
            </video>
          </div>
        </div>
      </div> -->
        <button class="header__menu <?php if( $pageinfo['navigation'] == 'contact' ){ echo 'is-contact';} ?>"
          type="button">
          <div class="dots">
            <span class="dot-1"></span><span class="dot-2"></span><span class="dot-3"></span></span><span
              class="dot-4"></span>
          </div><span class="txt en ">Menu</span>
        </button>
        <!-- <ul class="header__menuList">
        <li<?php if( $pageinfo['navigation'] == 'top' ) echo ' class="is-current"'; ?>>
          <a href="/" class="label"><span>トップ</span></a>
          </li>
          <li<?php if( $pageinfo['navigation'] == 'philosophy' ) echo ' class="is-current"'; ?>>
            <a href="/philosophy/" class="label"><span>企業理念</span></a>
            </li>
            <li<?php if( $pageinfo['navigation'] == 'company' ) echo ' class="is-current"'; ?>>
              <a href="/company/" class="label"><span>会社情報</span></a>
              </li>
              <li<?php if( $pageinfo['navigation'] == 'service' ) echo ' class="is-current"'; ?>>
                <a href="/service/" class="label"><span>事業紹介</span></a>
                </li>
                <li<?php if( $pageinfo['navigation'] == 'works' ) echo ' class="is-current"'; ?>>
                  <a href="/works/" class="label"><span>実績紹介</span></a>
                  </li>
                  <li class="menu"></li>
      </ul> -->
        <div class="drawerMenu__bg"></div>
        <div class="header__bg"></div>







        <?php if($pageinfo['navigation'] != 'top'):  ?>
    </div><!-- /.liquid-wrapper -->
    <?php endif;  ?>
    </header><!-- /#header -->