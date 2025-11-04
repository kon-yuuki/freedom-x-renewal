<?php 
global $util;
$pageinfo = array(
  'page_id' => 'materials',
  'navigation' => 'materials renewal header-bg-gray',
  'title' => '建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';

// 基本情報を変数に格納
$post_id = get_the_ID();
$title = get_the_title();

// カテゴリ情報を取得
$terms = get_the_terms($post_id, 'materials_category');
$category = '';
$category_link = '';
if (!empty($terms) && !is_wp_error($terms)) {
    $category = $terms[0]->name; // 最初のカテゴリ名を取得
    $category_link = get_term_link($terms[0], 'materials_category'); // カテゴリ一覧へのリンク
}

// SCFで設定した各フィールドを取得
$pages = SCF::get('pages', $post_id);
$material_textarea = SCF::get('material_textarea', $post_id);

// まず画像IDを取得
$img_1_id = SCF::get('img_1', $post_id);
$img_2_id = SCF::get('img_2', $post_id);

// 次に画像IDからURLを取得
$img_1_url = wp_get_attachment_url($img_1_id);
$img_2_url = wp_get_attachment_url($img_2_id);

// SCFの繰り返しフィールドを変数に格納（ループ用のデータ構造として）
$loop_materials_result = SCF::get('loop_materials_result', $post_id);

// フォーム値取得用関数
function formValue($name, ...$params){
	$session = ( isset($_SESSION['form'][$name]) )? $_SESSION['form'][$name] : null;
	if( !$session ) {
		return '';
	}
	$value = $session['value'];
	if( $params ) {
		foreach( $params as $param ) {
			$value = $value[$param];
		}
	}
	if( !is_array($value) ) {
		$value = htmlentities($value, ENT_QUOTES, 'UTF-8');
	}
	return $value;
}
?>

<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item">
      <a href="/materials/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">お役立ち資料集</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link"><?php the_title()  ?>
      </span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <p class="l-fv__heading--sub"><a href="/materials" class="c-linelink "><span
          class="c-linelink__txt is-ib">お役立ち資料一覧</span></a>
    </p>
    <h1 class="l-fv__heading--main"><?php the_title()  ?></h1>
  </hgroup>
  <div class="l-fv__post">
    <a href="<?php echo $category_link ?>" class="c-cat-list__link c-card-innerLink"><?php echo $category  ?></a>
    <span class="p-material__pages">全<?php echo $pages ?>ページ</span>
  </div>
</div>

<main class="p-contact c-main c-content">
  <div class="p-contact__col">
    <div class="p-materials__thumb">
      <?php 
  // 投稿のアイキャッチ画像を取得
  if (has_post_thumbnail($post_id)) {
    // アイキャッチ画像のIDを取得
    $thumbnail_id = get_post_thumbnail_id($post_id);
    // 大きいサイズの画像URLを取得
    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'large');
    // 画像のalt属性を取得
    $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    // alt属性がない場合は投稿タイトルを使用
    if (empty($thumbnail_alt)) {
      $thumbnail_alt = get_the_title($post_id);
    }
  ?>
      <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($thumbnail_alt); ?>"
        class="p-contact__casestudy--img">
      <?php 
  } else {
    // アイキャッチ画像がない場合はデフォルト画像を表示
    echo '<img src="' . esc_url($img_path . 'materials/thumb.webp') . '" alt="' . esc_attr(get_the_title($post_id)) . '" class="p-contact__casestudy--img">';
  }
  ?>
    </div>
    <?php 
    if($img_1_url && $img_2_url):
    ?>
    <div class="c-col col2 p-materials__captcha">
      <div class="c-col__item">
        <img src="<?php echo $img_1_url ?>" alt="" class="p-contact__casestudy--img">
      </div>
      <div class="c-col__item">
        <img src="<?php echo $img_2_url ?>" alt="" class="p-contact__casestudy--img">
      </div>
    </div>
    <?php 
    endif;
    ?>
    <div class="p-material__heading sp-hidden">
      <div class="p-material__heading--aside">
        <a href="<?php echo $category_link ?>" class="c-cat-list__link c-card-innerLink"><?php echo $category  ?></a>
        <span class="p-material__pages">全<?php echo $pages ?>ページ</span>
      </div>
      <p class="p-material__name"><?php echo $title ?></p>
    </div>
    <div class="p-material__detail">
      <p class="p-material__detail--txt"><?php echo $material_textarea ?>
      </p>
      <p class="p-material__detail--ttl">資料内容</p>
      <?php
// 繰り返しフィールドの中身を改行で出力
if (!empty($loop_materials_result) && is_array($loop_materials_result)) {
    echo '<p class="p-material__detail--main">';
    
    $items = array();
    foreach ($loop_materials_result as $field) {
        if (!empty($field['materials_result'])) {
            $items[] = '・' . esc_html($field['materials_result']);
        }
    }
    
    echo implode('<br>', $items);
    echo '</p>';
} else {
    // 繰り返しフィールドがない場合は空のパラグラフを表示するか、何も表示しない
    // echo '<p class="p-material__detail--main"></p>';
}
?>
    </div>
  </div>
  <div class="p-contact__col">
    <form action="<?php echo FORM_KIND_PATH . '/confirm'; ?>" method="post" class="p-form" id="mailform"
      novalidate="novalidate">
      <!-- 法人名 -->
      <div class="form-item">
        <label for="company">
          <span class="form-ttl">法人名</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="text" id="company" name="company" value="<?php echo formValue('company'); ?>"
              aria-required="true" placeholder="例)FREEDOM X株式会社" aria-describedby="company-error">
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
        </div>
      </div>


      <!-- 所属部署名 -->
      <div class="form-item">
        <label for="department">
          <span class="form-ttl">所属部署名</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="text" id="department" name="department" value="<?php echo formValue('department'); ?>"
              aria-required="true" placeholder="例)住宅部" aria-describedby="department-error">
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
        </div>
      </div>

      <!-- 役職 -->
      <div class="form-item">
        <fieldset>
          <legend>
            <span class="form-ttl">役職</span>
          </legend>
          <div class="radio-group">
            <div class="radio-item">
              <input type="radio" id="position-executive" name="position" value="executive"
                <?php echo (formValue('position') == 'executive' || formValue('position') == '') ? 'checked' : ''; ?>
                aria-required="true">
              <label for="position-executive">会社役員</label>
            </div>
            <div class="radio-item">
              <input type="radio" id="position-manager" name="position" value="manager"
                <?php echo (formValue('position') == 'manager') ? 'checked' : ''; ?>>
              <label for="position-manager">管理職</label>
            </div>
            <div class="radio-item">
              <input type="radio" id="position-staff" name="position" value="staff"
                <?php echo (formValue('position') == 'staff') ? 'checked' : ''; ?>>
              <label for="position-staff">一般社員</label>
            </div>
          </div>
        </fieldset>
      </div>

      <!-- 担当者名 -->
      <div class="form-item">
        <label for="name">
          <span class="form-ttl">担当者名</span> <span class="required-mark" aria-hidden="true">(必須)</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="text" id="name" name="name" value="<?php echo formValue('name'); ?>" placeholder="例）鈴木 太郎"
              required aria-required="true" class="is-required" aria-describedby="name-error">
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
          <div id="name-error" class="error-text required" role="alert">※必須項目を入力して下さい</div>
        </div>
      </div>

      <!-- メールアドレス -->
      <div class="form-item">
        <label for="email">
          <span class="form-ttl">会社用メールアドレス</span> <span class="required-mark" aria-hidden="true">(必須)</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="email" id="email" name="email" value="<?php echo formValue('email'); ?>"
              placeholder="例）suzuki@freedom-x.co.jp" class="is-required" required aria-required="true"
              aria-describedby="email-error">
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
          <div id="email-error" class="error-text required" role="alert">※必須項目を入力して下さい</div>
          <div id="email-error" class="error-text validate" role="alert">※正しい形式で入力してください</div>
        </div>
      </div>

      <!-- 電話番号 -->
      <div class="form-item">
        <label for="phone">
          <span class="form-ttl">電話番号</span> <span class="required-mark" aria-hidden="true">(必須)</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="tel" id="phone" name="phone" value="<?php echo formValue('phone'); ?>"
              placeholder="例）08012345678" class="is-required" required aria-required="true"
              aria-describedby="phone-error">
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
          <div id="phone-error" class="error-text required" role="alert">※必須項目を入力して下さい</div>
          <div id="email-error" class="error-text validate" role="alert">※正しい形式で入力してください</div>
        </div>
      </div>

      <!-- お問い合わせ詳細 -->
      <div class="form-item">
        <label for="message">
          <span class="form-ttl">ご質問・ご要望など</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <textarea id="message" name="message" rows="6" aria-required="true"
              aria-describedby="message-error"><?php echo formValue('message'); ?></textarea>
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
        </div>
      </div>

      <!-- 個人情報の取り扱い -->
      <div class="form-item">
        <fieldset>
          <legend>
            <span class="form-ttl">個人情報の取り扱い</span> <span class="required-mark" aria-hidden="true">(必須)</span>
          </legend>
          <div class="form-field">
            <p>個人情報の取り扱いに関しては「<a href="#" class="c-linelink"><span
                  class="c-linelink__txt">個人情報の取扱いについて</span></a>」をお読みいただきご同意の上、資料請求してください。ご入力いただいたお客様の個人情報は、記載させていただいている利用目的以外では利用いたしません。
            </p>
            <div class="checkbox-item content-checkbox is-required">
              <input type="checkbox" id="privacy-agree" name="privacy-agree" value="agree" required aria-required="true"
                <?php echo (formValue('privacy-agree') == 'agree') ? 'checked' : ''; ?>>
              <label for="privacy-agree">同意する</label>
            </div>
            <div id="privacy-agree-error" class="error-text required" role="alert">※必須項目に同意して下さい</div>
          </div>
        </fieldset>
      </div>

      <!-- ご注意 -->
      <div class="form-item">
        <fieldset>
          <legend>
            <span class="form-ttl">ご注意</span> <span class="required-mark" aria-hidden="true">(必須)</span>
          </legend>
          <div class="form-field">
            <p>本資料は「ハウスメーカー、工務店、設計事務所」様を対象としています。当社サービスと類似するサービスの取り扱う企業様や、関係者様からの資料請求はお断りしています。
            </p>
            <div class="checkbox-item content-checkbox is-required">
              <input type="checkbox" id="notice-agree" name="notice-agree" value="agree" required aria-required="true"
                <?php echo (formValue('notice-agree') == 'agree') ? 'checked' : ''; ?>>
              <label for="notice-agree">同業他社、関係者でないことを確認した</label>
            </div>
            <div id="notice-agree-error" class="error-text required" role="alert">※必須項目に同意して下さい</div>
          </div>
        </fieldset>
      </div>

      <!-- 送信ボタン -->
      <div class="form-item">
        <button type="submit" class="c-btn bg-blue js-contactBtn is-disabled">
          <span class="c-btn__inner">
            <span class="c-btn__txt">入力内容を確認する</span>
            <span class="c-btn__icon">
              <svg class="c-btn__svg">
                <use href="#i-arw-r"></use>
              </svg>
            </span>
          </span></button>
      </div>
    </form>
  </div>
</main>



<?php get_footer(); ?>