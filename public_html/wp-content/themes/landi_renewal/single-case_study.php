<?php
global $util;
$pageinfo = array(
  'page_id' => 'casestudy',
  'navigation' => 'casestudy renewal single-case_study header-bg-gray',
  'title' => '導入事例｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';
the_post();

$post_id = get_the_id();
$date = get_the_date('Y.m.d');
$categories = get_the_terms($post_id, 'taxonomy_case_study');
$tags = get_the_terms($post_id, 'casestudy_tag');

$catName = '';
$catLink = '';
$category_slug = '';

if (!empty($categories) && !is_wp_error($categories)) {
  $category = $categories[0];
  $catName = $category->name;
  $category_slug = $category->slug;
  $catLink = get_term_link($category, 'taxonomy_case_study');
}

$thumbnail_url = '';
if (has_post_thumbnail($post_id)) {
  $thumbnail_id = get_post_thumbnail_id($post_id);
  $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
} else {
  // アイキャッチ画像がない場合、ACFのcase_main_imgを取得
  $thumbnail_url = get_field('case_main_img', $post_id);
}
$client = get_field('case_company',$post_id);
$staff_num = get_field('case_employees',$post_id);
$case_theme = get_field('case_theme',$post_id);
$case_effect = get_field('case_effect',$post_id);
$staffs = get_field('staff');
$slider = get_field('slider',$post_id);
?>

<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item">
      <a href="/case_study" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">導入事例</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link"><?php the_title() ?>
      </span>
    </li>
  </ul>
</nav>

<section class="p-case_study-single-fv js-stalker-area">
  <div class="l-fv">
    <hgroup class="l-fv__heading">
      <p class="l-fv__heading--sub"><a href="/case_study" class="c-linelink "><span
            class="c-linelink__txt is-ib">導入事例</span></a>
      </p>
      <h1 class="l-fv__heading--main"><?php the_title() ?></h1>
    </hgroup>
    <div class="l-fv__post">
      <?php if ($catName !== ""):  ?>
      <a href="<?php echo $catLink ?>" class="c-cat-list__link c-card-innerLink"><?php echo $catName  ?></a>
      <?php endif  ?>
      <ul class="c-tag-list">
        <?php if (!empty($tags) && !is_wp_error($tags)): ?>
        <?php foreach ($tags as $tag): ?>
        <li class="c-tag-list__item">
          <a href="<?php echo get_tag_link($tag->term_id); ?>"
            class="c-tag-list__link c-card-innerLink c-linelink--hidden">
            <span class="c-linelink__txt">#<?php echo esc_html($tag->name); ?></span>
          </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <p class="p-casestudy-single__fv__client"><?php echo $client  ?></p>
    </div>
  </div>
</section>

<?php 
if($slider):
?>
<div class="p-casestudy-fv__slider splide js-casestudy-fv-slider">
  <div class="splide__track">
    <ul class="splide__list">
      <?php 
      foreach($slider as $slide):
      ?>
      <li class="splide__slide"><img src="<?php echo $slide['slider_img'] ?>" alt=""></li>
      <?php endforeach  ?>
    </ul>
  </div>
</div>
<?php endif;  ?>

<div class="c-content rev c-grid-outer">
  <main class="c-mainGrid innerGrid">
    <div class="c-main">
      <section class="p-casestudy-single-intro">
        <div class="p-casestudy-single-intro__item">
          <div class="p-casestudy-single-intro__heading">
            <h2 class="p-casestudy-single-intro__ttl non-module">導入前の課題</h2>
          </div>
          <div class="p-casestudy-single-intro__detail"><?php echo $case_theme  ?></div>
        </div>
        <div class="p-casestudy-single-intro__item">
          <div class="p-casestudy-single-intro__heading">
            <h2 class="p-casestudy-single-intro__ttl non-module">導入後の効果</h2>
          </div>
          <div class="p-casestudy-single-intro__detail"><?php echo $case_effect  ?></div>
        </div>
        <div class="p-casestudy-single-intro__item">
          <div class="p-casestudy-single-intro__heading">
            <p class="p-casestudy-single-intro__ttl"><?php echo $client  ?></p>
            <p class="p-casestudy-single-intro__staff">従業員数約<?php echo $staff_num  ?>名</p>
          </div>
          <?php 
          if($staffs):
          ?>
          <div class="p-casestudy-single-intro__detail">

            <?php 
            foreach($staffs as $staff):
            ?>
            <div class="p-casestudy-single-intro__staff">
              <?php 
              if($staff['image']):
              ?>
              <div class="p-casestudy-single-intro__staff__img">
                <img src="<?php echo $staff['image'] ?>" alt="" width="70" height="70">
              </div>
              <?php endif  ?>
              <div class="p-casestudy-single-intro__staff__detail">
                <p class="p-casestudy-single-intro__staff__post"><?php echo $staff['post']  ?></p>
                <p class="p-casestudy-single-intro__staff__name"><?php echo $staff['name']  ?></p>
              </div>
            </div>
            <?php endforeach  ?>
          </div>
          <?php 
          else:
          ?>
          <div class="p-casestudy-single-intro__detail">
            <div class="p-casestudy-single-intro__staff">
              <?php echo get_field('case_position');  ?>
            </div>
          </div>
          <?php 
          endif;
          ?>
        </div>
      </section>
      <div class="c-anchor-blog is-open">
        <button class="js-toggleBtn" type="button">
          <span class="c-anchor-arw">
            <svg>
              <use href="#i-arw-toc"></use>
            </svg>
          </span>
          <span class="c-anchor-ttl">目次</span>
        </button>
        <nav>
          <ul class="c-anchor-list">
          </ul>
        </nav>
        <button class="js-allShow" type="button">すべて表示</button>
      </div>
      <div class="p-casestudy-single__main">
        <?php 
        $case_contents_loop = SCF::get('case_contents_loop');
        // 実際にデータが入っているかチェック
$has_content = false;
if (is_array($case_contents_loop)) {
    foreach ($case_contents_loop as $item) {
        // 各アイテムの値をチェック（空文字や空白を除外）
        $filtered_item = array_filter($item, function($value) {
            return !empty(trim($value));
        });
        
        if (!empty($filtered_item)) {
            $has_content = true;
            break;
        }
    }
}
        if($has_content):
          //古い入力項目用の出力
        ?>
        <?php 
         foreach ($case_contents_loop as $item) :
        ?>
        <?php if (!empty($item['case_head_h2'])) : ?>
        <h2 class="wp-block-heading"><?php echo esc_html(strip_tags($item['case_head_h2'])); ?></h2>
        <?php endif; ?>

        <?php if (!empty($item['case_question'])) : ?>
        <h3><?php echo esc_html(strip_tags($item['case_question'])); ?></h3>
        <?php endif; ?>

        <?php if (!empty($item['case_txt'])) : ?>
        <p><?php echo esc_html(strip_tags($item['case_txt'])); ?></p>
        <?php endif; ?>

        <?php 
// どちらかの画像がある場合のみdivで囲む
if (!empty($item['case_content_img_10']) || !empty($item['case_content_img_20'])) : ?>
        <div class="c-col col2">
          <?php if (!empty($item['case_content_img_10'])) : ?>
          <img src="<?php echo wp_get_attachment_url($item['case_content_img_10']); ?>" alt=""
            class="c-col__item c-radius-20">
          <?php endif; ?>

          <?php if (!empty($item['case_content_img_20'])) : ?>
          <img src="<?php echo wp_get_attachment_url($item['case_content_img_20']); ?>" alt=""
            class="c-col__item c-radius-20">
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endforeach  ?>

        <h2 class="wp-block-heading"><?php echo esc_html(strip_tags(get_field('case_msg_head'))); ?></h2>
        <p><?php echo get_field('case_msg')  ?></p>
        <?php else:
          //リニューアル後の表示形式          
          ?>
        <?php the_content();  ?>
        <?php endif;  ?>
        <section class="c-cta">
          <h2 class="c-cta__ttl non-module">
            〇〇のことなら、〇〇に強い<br>私たちにご相談ください。
          </h2>
          <p class="c-cta__txt">サービスに関するご相談・お見積もりなど、<br class="pc-hidden">随時受け付けております。<br>まずはお気軽にお問い合わせください。</p>
          <div class="c-cta__btns">
            <?php get_template_part('/component/btn', null, [
          'url'   => '/case_study',
          'label' => '事例紹介',
          'class' => 'white sp-big',
        ]);  ?>
            <?php get_template_part('/component/btn', null, [
              'url'   => '/contact',
              'label' => 'お問い合せ',
              'class' => 'white sp-big',
            ]);  ?>
          </div>
          <div class="c-cta__gallery">
            <div class="c-cta__gallery__item is-before">
              <img src="<?php echo $img_path ?>common/gallery_1.webp" alt="">
            </div>
            <div class="c-cta__gallery__item is-current">
              <img src="<?php echo $img_path ?>common/gallery_2.webp" alt="">
            </div>
            <div class="c-cta__gallery__item is-next">
              <img src="<?php echo $img_path ?>common/gallery_1.webp" alt="">
            </div>
            <div class="c-cta__gallery__item">
              <img src="<?php echo $img_path ?>common/gallery_2.webp" alt="">
            </div>
          </div>
        </section>
        <div class="c-sns-shareList">
          <p class="c-sns-shareList-txt">記事をシェアする</p>
          <?php 
          $share_url = urlencode(get_permalink());
          $share_text = urlencode(html_entity_decode(get_title_replace_br(get_the_title()), ENT_QUOTES, 'UTF-8'));
          ?>
          <ul class="c-sns-shareList-inner">
            <li class="c-sns-shareList-item">
              <a href="http://twitter.com/share?text=<?php echo $share_text; ?>&amp;url=<?php echo $share_url; ?>"
                class="x c-sns-shareList-link" target="_blank">
                <svg>
                  <use href="#i-x"></use>
                </svg>
              </a>
            </li>

            <li class="c-sns-shareList-item">
              <a href="http://www.facebook.com/share.php?u=<?php echo $share_url; ?>" class="fb c-sns-shareList-link"
                target="_blank">
                <svg>
                  <use href="#i-fb"></use>
                </svg>
              </a>
            </li>
            <li class="c-sns-shareList-item">
              <a href="http://getpocket.com/edit?url=<?php echo $share_url; ?>&title=<?php echo $share_text; ?>"
                class="pocket c-sns-shareList-link" target="_blank">
                <svg>
                  <use href="#i-pocket"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>
        <?php 
        $author_obj = get_field('author',$post_id);
        if($author_obj):
        ?>
        <div class="c-author">
          <h2 class="non-module c-author__ttl">この記事を書いた人</h2>
          <?php 
          
          $name = $author_obj->post_title;
          $author_id = $author_obj->ID;
          $profile = get_field("profile",$author_id);
          $post = get_field("post",$author_id);
          $sns_x = get_field("sns_x",$author_id);
          $sns_instagram = get_field("sns_instagram",$author_id);
          ?>
          <div class="c-author__inner">
            <div class="c-author__img">
              <?php if (has_post_thumbnail( $author_id )) : ?>
              <?php echo get_the_post_thumbnail( $author_id, 'thumbnail', array( 'alt' => get_the_title( $author_id ) ) ); ?>
              <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumbnail.jpg"
                alt="<?php echo get_the_title( $author_id ); ?>">
              <?php endif; ?>
            </div>
            <div class="c-author__profile">
              <span class="c-author__name"><?php echo $name  ?></span>
              <span class="c-author__post"><?php echo $post  ?></span>
              <p class="c-author__txt"><?php echo $profile  ?></p>
              <div class="c-author__sns">
                <?php 
                if($sns_x !== ""):
                ?>
                <a href="<?php echo $sns_x ?>" target="_blank" class="c-author__sns__link x">
                  <svg>
                    <use href="#i-x"></use>
                  </svg>
                </a>
                <?php endif;  ?>
                <?php 
                if($sns_instagram !== ""):
                ?>
                <a href="<?php echo $sns_instagram ?>" target="_blank" class="c-author__sns__link instagram"><svg>
                    <use href="#i-instagram"></use>
                  </svg></a>
                <?php endif;  ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif;  ?>
      </div>
    </div>
    <nav class="p-casestudy-nav pc-hidden">
      <h2 class="p-casestudy-nav__ttl">課題から探す</h2>
      <?php get_template_part("./component/casestudy-cat-list")  ?>
      <h2 class="p-casestudy-nav__ttl">ハッシュタグ一覧</h2>
      <?php get_template_part("./component/casestudy-tag-list")  ?>
    </nav>
  </main>
  <?php get_template_part('./component/casestudy-side-nav')  ?>
</div>

<section class="p-news-related js-stalker-area">
  <div class="c-grid-inner">
    <hgroup class="p-news-related__heading">
      <h2 class="p-news-related__ttl sp-hidden">こちらの記事もよく読まれています。</h2>
      <h2 class=" p-news-related__ttl pc-hidden">関連記事</h2>
      <?php get_template_part('/component/btn', null, [
        'url'   => '/case_study',
        'label' => '導入事例一覧を見る',
      ]);  ?>
    </hgroup>
    <div class="c-case_study-list splide js-casestudy-related-slider">
      <div class="splide__track">
        <div class="splide__list">
          <?php
      // 現在の投稿IDを取得
      $current_post_id = get_the_ID();

      // 現在の記事のカテゴリーを取得（$category_slugに格納されている前提）
      // もし$category_slugが未定義の場合は、現在の記事から直接取得
      if (!isset($category_slug)) {
        $terms = get_the_terms($current_post_id, 'taxonomy_case_study');
        if (!empty($terms) && !is_wp_error($terms)) {
          $category_slug = $terms[0]->slug;
        }
      }

      // カテゴリーが設定されていない場合
      if (empty($category_slug)) {
        echo '<p class="c-case_study-empty">関連事例はありません。</p>';
      } else {
        // 同じカテゴリーの記事を取得（現在の記事を除く）- 4記事に制限
        $case_study_query = new WP_Query(
          array(
            'post_type'      => 'case_study',
            'posts_per_page' => 4,
            'post__not_in'   => array($current_post_id), // 現在の記事を除外
            'tax_query'      => array(
              array(
                'taxonomy' => 'taxonomy_case_study',
                'field'    => 'slug',
                'terms'    => $category_slug,
              ),
            ),
          )
        );

        // サブループの開始
        if ($case_study_query->have_posts()) :
          while ($case_study_query->have_posts()) :
            $case_study_query->the_post();
            $post_id = get_the_id();
            $client = get_field("case_company",$post_id);
            $title = get_the_title();
            $post_link = get_permalink();
            $catName = '';
            $categories = get_the_terms(get_the_ID(), 'taxonomy_case_study');
            if (!empty($categories) && !is_wp_error($categories) && $categories[0]->name !== "非表示") {
              $catName = $categories[0]->name;
              // カテゴリーへのリンクを変数に格納
              $catLink = get_term_link($categories[0]->term_id, 'taxonomy_case_study');
            }
            $tags = get_the_terms(get_the_ID(), 'casestudy_tag');

                      $thumbnail_url = '';
                      if(has_post_thumbnail($post_id)) {
                        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'medium');
                      } else {
                        // ACFのcase_main_imgを取得（URLが直接入っている場合）
                      $case_main_img = get_field('case_main_img', $post_id);
                      if($case_main_img && !empty($case_main_img)) {
                         $thumbnail_url = $case_main_img; // URLが直接入っている
                      } else {
                      $thumbnail_url = $img_path . 'top/casestudy.webp'; // デフォルト画像
                      }
                    }
                    
      ?>
          <article class="c-card c-case_study-list--item c-linelink splide__slide">
            <a href="<?php echo $post_link ?>" class="c-card-mainLink"><span
                class="u-visually-hidden"><?php echo $title ?></span></a>
            <div class="c-card-body">
              <div class="img-ov">
                <img src="<?php echo $img_path ?>top/casestudy_thumb.webp" alt="<?php echo esc_attr($title); ?>">
              </div>

              <div class="c-case_study-list--content">
                <span class="c-case_study-list__client"><?php echo $client ?></span>
                <h3 class="c-case_study-list--ttl"><span class="c-linelink__txt bottom-5"><?php echo $title ?></span>
                </h3>
                <div class="c-case_study-list__detail">
                  <ul class="c-cat-list">
                    <li class="c-cat-list__item">
                      <?php if ($catName !== ""):  ?>
                      <a href="<?php echo $catLink ?>"
                        class="c-cat-list__link c-card-innerLink"><?php echo $catName  ?></a>
                      <?php endif  ?>
                    </li>
                  </ul>
                  <?php if (!empty($tags) && !is_wp_error($tags)) : ?>
                  <ul class="c-tag-list">
                    <?php foreach ($tags as $tag) : ?>
                    <li class="c-tag-list__item">
                      <a href="<?php echo get_term_link($tag->term_id, 'casestudy_tag'); ?>"
                        class="c-tag-list__link c-card-innerLink c-linelink--hidden">
                        <span class="c-linelink__txt">#<?php echo $tag->name; ?></span>
                      </a>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </article>
          <?php
          endwhile;
          wp_reset_postdata();
        else:
          // 同じカテゴリーの記事がない場合の表示
          echo '<p class="c-case_study-empty">関連事例はありません。</p>';
        endif;
      }
      ?>
        </div>
        <?php get_template_part('./component/slider-btn-dummy')  ?>
        <?php get_template_part('./component/slider-arw')  ?>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>