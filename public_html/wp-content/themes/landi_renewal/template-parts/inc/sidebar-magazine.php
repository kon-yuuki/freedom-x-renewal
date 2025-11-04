<div class="aside">

    <!-- <div class="aside_rectangle">
        <a href="/landi/" target="_balnk">
           【ロゴ準備中】ランディサービスページ（アプリDLできる）に飛ばす
            <img loading="lazy" src="<?//= get_img_dir('rectangle01.jpg');?>"alt="rectangle01" width="300" height="250">
        </a>
    </div> -->

    <div class="aside_box">
        <div class="aside_pick_up_list">
            <h3>pick up</h3>
            <?php 		
                $args = array(
                    'posts_per_page' => 5, 	// 表示する件数
                    'orderby' => 'date', // 更新日でソート
                    'order' => 'DESC', 	// DESCで最新から表示、ASCで最古から表示
                    'post_type' => 'magazine', 	// 特定のカテゴリースラッグを指定
                    'meta_key' => 'pickup',
                    'meta_value' => 'pickup',
                    'post_status' => 'publish'
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    foreach ($query->posts as $post) :
                    
                // カスタムフィールドの情報を取得
                $post_meta = get_post_custom();
                $taxonomy = get_the_terms($post->ID,'taxonomy_magazine');
                
                // サムネイル
                $thum = get_field('thum');
            ?>
            <div class="list_item">
                <figure>
                    <a href="<?= get_permalink($post) ?>">
                        <img loading="lazy" src="<?= $thum;?>">
                    </a>
                </figure>
                <div class="text">
                    <div class="category">
                        <em><?=$taxonomy[0]->name;?></em>
                        <span><?= getDisplayCategoryName($taxonomy[0]->name); ?></span>
                    </div>
                    <p><a href="<?= get_permalink($post) ?>"><?= the_title(); ?></a></p>
                </div>
            </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                <?php endif; ?>
        </div><!-- aside_pick_up_list -->
    </div><!-- aside_box -->

    <?php
        //各種表示設定編集ページで設定したカスタムフィールド値
        $key = '1124';

        $ad_10 = get_field('mag_ad_10' , $key);
        $ad_20 = get_field('mag_ad_20' , $key);
        $ad_30 = get_field('mag_ad_30' , $key);

        $ad_url_10 = get_field('mag_ad_url_10' , $key);
        $ad_url_20 = get_field('mag_ad_url_20' , $key);
        $ad_url_30 = get_field('mag_ad_url_30' , $key);

        //記事詳細ページで設定したカスタムフィールド値
        $single_ad_10 = get_field('single_mag_ad_10');
        $single_ad_20 = get_field('single_mag_ad_20');
        $single_ad_30 = get_field('single_mag_ad_30');

        $single_ad_url_10 = get_field('single_mag_ad_url_10');
        $single_ad_url_20 = get_field('single_mag_ad_url_20');
        $single_ad_url_30 = get_field('single_mag_ad_url_30');

        $defaults_ad = $ad_url_10 || $ad_url_20 || $ad_url_30;
        $singles_ad = $single_ad_url_10 || $single_ad_url_20 || $single_ad_url_30;
    ?>

    
    <ul class="adlist">


        <li class="landi_app">
            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/appTitle.png" alt="今すぐ、土地検索エンジン「ランディ」のアプリを無料ダウンロードする！" class="ttl">
            <ul>
                <li>
                    <a href="https://yappli.plus/landiapp_lp" target="_blank"><img loading="lazy" src="<?= get_template_directory_uri(); ?>/src/img/Download_App_Store_Badge.svg" alt="App Storeからダウンロード"></a>
                </li>
                <li>
                    <a href="https://yappli.plus/landiapp_lp" target="_blank"><img loading="lazy" alt='Google Play で手に入れよう' src='<?= get_template_directory_uri(); ?>/src/img/google-play-badge.png'/></a>
                </li>
            </ul>
        </li>

        <?php if( $singles_ad ) { ?>
            
            <?php if( $single_ad_url_10 ) { ?>
                <li>
                    <a href="<?= $single_ad_url_10; ?>" target="_blank">
                        <img loading="lazy" src="<?= $single_ad_10; ?>" alt="広告">
                    </a>
                </li>
            <?php } ?>

            <?php if( $single_ad_url_20 ) { ?>
                <li>
                    <a href="<?= $single_ad_url_20; ?>" target="_blank">
                        <img loading="lazy" src="<?= $single_ad_20; ?>" alt="広告">
                    </a>
                </li>
            <?php } ?>

            <?php if( $single_ad_url_30 ) { ?>
                <li>
                    <a href="<?= $single_ad_url_30; ?>" target="_blank">
                        <img loading="lazy" src="<?= $single_ad_30; ?>" alt="広告">
                    </a>
                </li>
            <?php } ?>

        <?php } ?>

        <?php if( $singles_ad ) { ?>
        <?php } else { ?>
            <?php if( $defaults_ad ) { ?>

                <?php if( $ad_url_10 ) { ?>
                    <li>
                        <a href="<?= $ad_url_10; ?>" target="_blank">
                            <img loading="lazy" src="<?= $ad_10; ?>" alt="広告">
                        </a>
                    </li>
                <?php } ?>

                <?php if( $ad_url_20 ) { ?>
                    <li>
                        <a href="<?= $ad_url_20; ?>" target="_blank">
                            <img loading="lazy" src="<?= $ad_20; ?>" alt="広告">
                        </a>
                    </li>
                <?php } ?>

                <?php if( $ad_url_30 ) { ?>
                    <li>
                        <a href="<?= $ad_url_30; ?>" target="_blank">
                            <img loading="lazy" src="<?= $ad_30; ?>" alt="広告">
                        </a>
                    </li>
                <?php } ?>

            <?php } ?>
        <?php } ?>

    </ul>


</div>