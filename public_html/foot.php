<?php $pageinfo = get_query_var('pageinfo'); ?>
<?php if($pageinfo['navigation'] != 'contact' && $pageinfo['navigation'] != 'document'):  ?>
<section class="c-cta">
  <!-- <div class="c-effect-text-wrapper c-loopText-wrapper">
    <div class="wrapper">
      <div class="mask-inner">
        <div class="text js-scrollTextEffectTarget scroll" data-splitting>
          <span class="inner en-light loop1 en-light">ContactContact</span>
          <span class="inner en-light loop2 en-light">ContactContact</span>
        </div>
      </div>
    </div>
  </div> -->
  <div class="c-effect-text-wrapper js-scrollTextEffectTarget contact">
    <span class="en-light" data-splitting>ContactUs</span>
  </div>
  <div class="section__body c-cta-wrapper">
    <a class="c-cta-area" href="/contact/">
      <span class="c-dashedBorder"></span>
      <span class="c-dashedCorner-rt"></span>
      <span class="c-dashedCorner-rb"></span>
      <span class="c-dashedCorner-lt"></span>
      <span class="c-dashedCorner-lb"></span>
      <h2 class="c-cta-ttl jp-ttl_m">お問い合わせ & 採用応募</h2>
      <p>採用やパートナー応募<br>
        お見積もり依頼や詳しいご相談をされたい場合には<br>
        お問い合わせフォームをご活用ください。</p>
      <div class="p-joinus-btn">
        <div class="c-btn" data-splitting  href="/recruit/"><span class="c-btn-txt">お問い合わせはこちら</span>
          <span class="c-btn-arw">
            <svg>
              <use href="#arw-r">
            </svg>
          </span>
        </div>
      </div>
    </a>
    <a class="c-cta-area" href="/document/">
      <span class="c-dashedBorder"></span>
      <span class="c-dashedCorner-rt"></span>
      <span class="c-dashedCorner-rb"></span>
      <span class="c-dashedCorner-lt"></span>
      <span class="c-dashedCorner-lb"></span>
      <h2 class="c-cta-ttl jp-ttl_m">資料請求</h2>
      <p>社内で検討されたい方のために<br>
        実績などをまとめた会社案内を<br>
        PDFでご用意しています。ご自由にダウンロードください。</p>
      <div class="p-joinus-btn">
        <div class="c-btn" data-splitting  href="/recruit/"><span class="c-btn-txt">資料をダウンロードする</span>
          <span class="c-btn-arw">
            <svg>
              <use href="#arw-r">
            </svg>
          </span>
        </div>
      </div>
    </a>

  </div>
</section>
<?php endif;  ?>
<footer id="footer" class="l-footer">
  <div class="liquid-wrapper">
    <div class="l-footer-inner">
      <div class="l-footer-container">
        <div class="l-footer-left">
          <div class="l-footer-logo">
            <svg>
              <use href="#i-logo">
            </svg>
          </div>
          <div class="l-footer-outline">
            <p>idea株式会社</p>
            <p>〒331-0047<br class="c-sp-none"><a href="https://maps.app.goo.gl/zuN2PGXzpQa9HbcS8"
                class="c-linelink--hidden" target="_blank">
                <span class="c-linelink__txt">埼玉県さいたま市西区指扇1884-37</span>
              </a>
            </p>
            <p><a href="tel:0486228528">048-622-8528</a></p>
          </div>
          <div class="l-footer-ideanimal c-sp-none">
            <a href="https://ideanimal.jp/" target="_blank" class="l-footer-banner">
              <div class="img-ov">
                <picture>
                  <source loading="lazy" type="image/avif" srcset="/assets/imgs/top/ideanimal.avif">
                  <img loading="lazy" src="/assets/imgs/top/ideanimal.webp" width="480" height="300" alt="">
                </picture>
              </div>
            </a>
            <a href="" class="c-linelink"><span class="c-linelink__txt txt c-blank">Ideanimal</span><span
                class="c-blankIcon"><svg>
                  <use href="#i-blank">
                </svg>
              </span></a>
          </div>
        </div>
        <div class="l-footer-right">
          <nav class="l-footer-navWrap">
            <ul class="l-footer-nav">
              <li class="home">
                <a href="/" class="parent c-linelink"><span class="c-linelink__txt">トップ</span></a>
              </li>
              <li class="service">
                <a href="/service/" class="parent c-linelink"><span class="c-linelink__txt">サービス紹介</span></a>
                <div class="children">
                  <ul class="children-list">
                    <li><a href="" class="c-linelink--hidden"><span class="c-linelink__txt txt">私たちの特徴</span></a></li>
                    <li><a href="/service/guide/" class="c-linelink--hidden"><span
                          class="c-linelink__txt txt">初めてご依頼いただく方へ</span></a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="works">
                <a href="/works/" class="parent c-linelink"><span class="c-linelink__txt">実績紹介</span></a>
              </li>
              <li class="company">
                <a href="" class="parent c-linelink"><span class="c-linelink__txt">会社情報</span></a>
                <div class="children">
                  <ul class="children-list">
                    <li><a href="/company/business/" class="c-linelink--hidden"><span
                          class="c-linelink__txt txt">事業概要</span></a></li>
                    <li><a href="/company/message/" class="c-linelink--hidden"><span
                          class="c-linelink__txt txt">社長メッセージ</span></a></li>
                    <li><a href="/company/philosophy/" class="c-linelink--hidden"><span
                          class="c-linelink__txt txt">企業理念</span></a></li>
                    <li><a href="/company/member/" class="c-linelink--hidden"><span
                          class="c-linelink__txt txt">メンバー紹介</span></a></li>
                  </ul>
                </div>
              </li>
              <li class="news">
                <a href="/topics/" class="parent c-linelin"><span class="c-linelink__txt">ニュース</span></a>
              </li>
              <li class="blog">
                <a href="/blog/" class="parent c-linelink"><span class="c-linelink__txt">ブログ</span></a>
              </li>
              <li class="recruit">
                <a href="/recruit/" class="parent c-linelink"><span class="c-linelink__txt">採用情報</span></a>
              </li>
              <li class="contact">
                <a href="/contact/" class="parent c-linelink"><span class="c-linelink__txt">お問い合わせ</span></a>
              </li>
              <li class="document">
                <a href="/document/" class="parent c-linelink"><span class=" c-linelink__txt">資料ダウンロード</span></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="l-footer-ideanimal c-pc-none">
        <a href="https://ideanimal.jp/" target="_blank" class="l-footer-banner">
          <div class="img-ov">
            <picture>
              <source loading="lazy" type="image/avif" srcset="/assets/imgs/top/ideanimal.avif">
              <img loading="lazy" src="/assets/imgs/top/ideanimal.webp" width="480" height="300" alt="">
            </picture>
          </div>
        </a>
        <a href="" class="c-linelink"><span class="c-linelink__txt txt c-blank">Ideanimal</span><span
            class="c-blankIcon"><svg>
              <use href="#i-blank">
            </svg>
          </span></a>
      </div>
      <div class=" l-footer-bottom">
        <div class="l-footer-subLink">
          <a href="/privacy/" class="c-linelink"><span class="c-linelink__txt txt">個人情報保護方針</span></a><br
            class="c-pc-none">
          <a href="" class="c-linelink"><span class="c-linelink__txt txt c-blank">X(Twitter)</span></a>
        </div>
        <div class="l-footer-copyright">
          <p class="en-light">©All Rights Reserved.idea Co.,Ltd</p>
        </div>
      </div>
      <div class="c-bg-video mask-top">
        <video loop="" muted="" autoplay="" playsinline="">
          <source src="/assets/imgs/common/bg_video.mp4" type="video/mp4">
        </video>
      </div>
    </div>
  </div>
</footer>
</div><!-- /#wrapper -->
<div class="pointer">
  <div class="pointer__next">
    <span>NEXT</span>
  </div>
  <div class="pointer__prev">
    <span>PREV</span>
  </div>
  <div class="pointer__clip"></div>
  <div class="pointer__cursor"></div>
  <div class="pointer__lorder">
    <svg class="pointer" viewBox="0 0 22 22">
      <circle class="bg" cx="11" cy="11" r="10"></circle>
      <circle class="circle" cx="11" cy="11" r="10"></circle>
    </svg>
  </div>
</div>
<!-- js -->

<script src="/assets/js/main.js?v=1.0"></script>
</body>

</html>