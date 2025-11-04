<?php 
global $util;
$pageinfo = array(
  'page_id' => 'contact',
  'navigation' => 'contact renewal header-bg-gray',
  'title' => 'お問い合わせ｜建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';

// 基本情報を変数に格納
$post_id = get_the_ID();
$title = get_the_title();


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
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">お問い合わせ
      </span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <h1 class="l-fv__heading--main">お問い合わせ</h1>
  </hgroup>
</div>

<main class="p-contact c-main non-module c-content">
  <div class="p-contact__col">
    <p class="p-contact__lead">必要事項を入力の上お問い合わせください。<br>2~3営業日以内に担当よりメールにて返信させていただきます。<br>※資料請求につきましては、
      <a href="/materials" class="c-linelink"><span class="c-linelink__txt bottom-3">資料ダウンロードページ</span></a>をご覧ください。
    </p>

    <p class="p-contact__ttl">過去の支援実績</p>
    <div class="p-contact__casestudy">
      <img src="<?php echo $img_path ?>contact/casestudy.webp" alt="" class="p-contact__casestudy--img">
    </div>
    <p class="p-contact__ttl">経験豊富なコンサルタントが徹底サポートします</p>
    <div class="c-col col4 p-contact__consultant">
      <div class="c-col__item">
        <img src="<?php echo $img_path ?>contact/consultant__1.webp" alt="">
      </div>
      <div class="c-col__item">
        <img src="<?php echo $img_path ?>contact/consultant__2.webp" alt="">
      </div>
      <div class="c-col__item">
        <img src="<?php echo $img_path ?>contact/consultant__3.webp" alt="">
      </div>
      <div class="c-col__item">
        <img src="<?php echo $img_path ?>contact/consultant__4.webp" alt="">
      </div>
    </div>
  </div>
  <div class="p-contact__col">
    <form action="<?php echo FORM_KIND_PATH . '/confirm'; ?>" method="post" class="p-form" id="mailform"
      novalidate="novalidate">
      <input type="hidden" name="form_action" value="confirm">


      <!-- 問い合わせ種別 -->
      <div class="form-item">
        <fieldset>
          <legend>
            <span class="form-ttl">問い合わせ種別</span> <span class="required-mark" aria-hidden="true">(必須)</span>
          </legend>
          <div class="radio-group content-radio is-required">
            <div class="radio-item">
              <input type="radio" id="inquiry-service" name="inquiry-type" value="service"
                <?php echo (formValue('inquiry-type') == 'service' || formValue('inquiry-type') == '') ? 'checked' : ''; ?>
                required aria-required="true">
              <label for="inquiry-service">サービスに関する問い合わせ
              </label>
            </div>
            <div class="radio-item">
              <input type="radio" id="inquiry-partner" name="inquiry-type" value="partner"
                <?php echo (formValue('inquiry-type') == 'partner') ? 'checked' : ''; ?>>
              <label for="inquiry-partner">協業等に関する問い合わせ</label>
            </div>
            <div class="radio-item">
              <input type="radio" id="inquiry-media" name="inquiry-type" value="media"
                <?php echo (formValue('inquiry-type') == 'media') ? 'checked' : ''; ?>>
              <label for="inquiry-media">取材等に関する問い合わせ</label>
            </div>
            <div class="radio-item">
              <input type="radio" id="inquiry-other" name="inquiry-type" value="other"
                <?php echo (formValue('inquiry-type') == 'other') ? 'checked' : ''; ?>>
              <label for="inquiry-other">その他</label>
            </div>
          </div>
          <div id="inquiry-type-error" class="error-text required" role="alert">※必須項目を選択して下さい</div>
        </fieldset>
      </div>

      <!-- サービス詳細（サービスが選択された場合のみ表示） -->
      <div class="form-item" id="service-details" style="display: none;">
        <!-- サービス名 -->
        <div class="form-item">
          <fieldset>
            <legend>
              <span class="form-ttl">サービス名</span> <span class="required-mark" aria-hidden="true">(必須)</span>
            </legend>
            <div class="radio-group content-radio is-required" data-name="service-name">
              <div class="radio-item">
                <input type="radio" id="service-landi-pro" name="service-name" value="landi-pro"
                  <?php echo (formValue('service-name') == 'landi-pro' || formValue('inquiry-type') == '') ? 'checked' : ''; ?>>
                <label for="service-landi-pro">ランディPRO</label>
              </div>
              <div class="radio-item">
                <input type="radio" id="service-tateteku" name="service-name" value="tateteku"
                  <?php echo (formValue('service-name') == 'tateteku') ? 'checked' : ''; ?>>
                <label for="service-tateteku">タテテク</label>
              </div>
              <div class="radio-item">
                <input type="radio" id="service-yobikomu" name="service-name" value="yobikomu"
                  <?php echo (formValue('service-name') == 'yobikomu') ? 'checked' : ''; ?>>
                <label for="service-yobikomu">ヨビコム</label>
              </div>
            </div>
            <div id="service-name-error" class="error-text required" role="alert">※必須項目を選択して下さい</div>
          </fieldset>
        </div>

        <!-- 聞きたいカテゴリ -->
        <div class="form-item">
          <fieldset>
            <legend>
              <span class="form-ttl">聞きたいカテゴリ</span> <span class="required-mark" aria-hidden="true">(必須)</span>
            </legend>
            <div class="radio-group content-radio is-required" data-name="service-category">
              <div class="radio-item">
                <input type="radio" id="category-operation" name="service-category" value="operation"
                  <?php echo (formValue('service-category') == 'operation' || formValue('inquiry-type') == '') ? 'checked' : ''; ?>>
                <label for="category-operation">操作方法に関して</label>
              </div>
              <div class="radio-item">
                <input type="radio" id="category-account" name="service-category" value="account"
                  <?php echo (formValue('service-category') == 'account') ? 'checked' : ''; ?>>
                <label for="category-account">アカウントに関して</label>
              </div>
              <div class="radio-item">
                <input type="radio" id="category-introduction" name="service-category" value="introduction"
                  <?php echo (formValue('service-category') == 'introduction') ? 'checked' : ''; ?>>
                <label for="category-introduction">新規導入に関して</label>
              </div>
              <div class="radio-item">
                <input type="radio" id="category-contract" name="service-category" value="contract"
                  <?php echo (formValue('service-category') == 'contract') ? 'checked' : ''; ?>>
                <label for="category-contract">契約内容の確認・変更に関して</label>
              </div>
              <div class="radio-item">
                <input type="radio" id="category-billing" name="service-category" value="billing"
                  <?php echo (formValue('service-category') == 'billing') ? 'checked' : ''; ?>>
                <label for="category-billing">請求関連に関して</label>
              </div>
            </div>
            <div id="service-category-error" class="error-text required" role="alert">※必須項目を選択して下さい</div>
          </fieldset>
        </div>
      </div>

      <!-- 法人名 -->
      <div class="form-item">
        <label for="company">
          <span class="form-ttl">法人名</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="text" id="company" name="company" value="<?php echo formValue('company'); ?>"
              placeholder="例)FREEDOM X株式会社" aria-describedby="company-error">
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
          <div id="company-error" class="error-text required" role="alert">※必須項目を入力して下さい</div>
        </div>
      </div>



      <!-- お名前 -->
      <div class="form-item">
        <label for="contact_name">
          <span class="form-ttl">お名前</span> <span class="required-mark" aria-hidden="true">(必須)</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="text" id="contact_name" name="contact_name" value="<?php echo formValue('contact_name'); ?>"
              placeholder="例）鈴木 太郎" required aria-required="true" class="is-required"
              aria-describedby="contact_name-error">
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
          <div id="contact_name-error" class="error-text required" role="alert">※必須項目を入力して下さい</div>
        </div>
      </div>

      <!-- メールアドレス -->
      <div class="form-item">
        <label for="email">
          <span class="form-ttl">メールアドレス</span> <span class="required-mark" aria-hidden="true">(必須)</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <input type="email" id="email" name="email" value="<?php echo formValue('email'); ?>"
              placeholder="例）〇〇〇〇〇〇〇〇" class="is-required" required aria-required="true" aria-describedby="email-error">
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
            <input type="tel" id="phone" name="phone" value="<?php echo formValue('phone'); ?>" placeholder="例）〇〇〇〇〇〇〇〇"
              class="is-required" required aria-required="true" aria-describedby="phone-error">
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

      <!-- 最初に弊社を知ったきっかけ -->
      <div class="form-item">
        <fieldset>
          <legend>
            <span class="form-ttl">最初に弊社を知ったきっかけ</span> <span class="required-mark" aria-hidden="true">(必須)</span>
          </legend>
          <div class="checkbox-group content-checkbox is-required">
            <?php
            $sources = [
                'newspaper' => '新聞',
                'magazine' => '雑誌',
                'web-article' => 'WEB記事',
                'web-ad' => 'WEB広告',
                'press' => 'プレリリース',
                'referral' => '知人紹介',
                'event' => 'イベントセミナー',
                'search' => 'サイト検索エンジンからの検索',
                'sns' => 'SNS',
                'dm' => 'DM',
                'other' => 'その他'
            ];
            
            $selected_sources = [];
            if (formValue('source')) {
                $selected_sources = is_array(formValue('source')) ? formValue('source') : [formValue('source')];
            }
            
            foreach ($sources as $value => $label) :
            ?>
            <div class="checkbox-item">
              <input type="checkbox" id="source-<?php echo $value; ?>" name="source[]" value="<?php echo $value; ?>"
                <?php echo in_array($value, $selected_sources) ? 'checked' : ''; ?>>
              <label for="source-<?php echo $value; ?>"><?php echo $label; ?></label>
            </div>
            <?php endforeach; ?>
          </div>
          <div id="source-error" class="error-text required" role="alert">※必須項目を選択して下さい</div>
        </fieldset>
      </div>

      <!-- お問い合わせ詳細 -->
      <div class="form-item">
        <label for="message">
          <span class="form-ttl">お問い合わせ詳細</span> <span class="required-mark" aria-hidden="true">(必須)</span>
        </label>
        <div class="form-field">
          <div class="form-content">
            <textarea id="message" name="message" rows="6" placeholder="例）ダミーテキスト" class="is-required" required
              aria-required="true" aria-describedby="message-error"><?php echo formValue('message'); ?></textarea>
            <span class="status-icon"><svg class="check">
                <use href="#check">
                </use>
              </svg><svg class="error">
                <use href="#error">
                </use>
              </svg></span>
          </div>
          <div id="message-error" class="error-text required" role="alert">※必須項目を入力して下さい</div>
        </div>
      </div>

      <!-- 個人情報の取り扱い -->
      <div class="form-item">
        <fieldset>
          <legend>
            <span class="form-ttl">個人情報の取り扱い</span> <span class="required-mark" aria-hidden="true">(必須)</span>
          </legend>
          <div class="form-field">
            <p>個人情報の取り扱いに関しては「<a href="#" class="c-linelink" aria-label="個人情報の取扱いについてのページを開く"><span
                  class="c-linelink__txt bottom-4">個人情報の取扱いについて</span></a>」をお読みいただきご同意の上、資料請求してください。ご入力いただいたお客様の個人情報は、記載させていただいている利用目的以外では利用いたしません。
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
          </span>
        </button>
      </div>
    </form>
  </div>
</main>

<?php get_footer(); ?>