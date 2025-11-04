<?php
// デバッグ設定ファイルが読み込まれていない場合は読み込む
if (!defined('FORM_DEBUG_MODE')) {
    require_once(TEMPLATEPATH.'/form/debug-config.php');
}

form_debug_log('confirm.php実行開始', null, 'confirm');
form_debug_log('セッションID: ' . session_id(), null, 'confirm');
form_debug_log('POSTデータ: ' . print_r($_POST, true), null, 'confirm');
form_debug_log('セッションデータ: ' . print_r($_SESSION, true), null, 'confirm');

global $util;
$pageinfo = array(
  'page_id' => 'contact',
  'navigation' => 'contact renewal header-bg-gray',
  'title' => 'お問い合わせ確認｜建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
  'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
);

set_query_var('pageinfo', $pageinfo);
get_header();
$img_path = get_template_directory_uri() . '/src/renewal/images/';

// 基本情報を変数に格納
$post_id = get_the_ID();
$title = get_the_title();

$isError = false;
$messages = array();
$data = array();

function output($value, $setting=null){
    $output = '';
    $prefix = ( isset($setting) && isset($setting['prefix']) )? $setting['prefix'] : '';
    $suffix = ( isset($setting) && isset($setting['suffix']) )? $setting['suffix'] : '';
    if( is_array($value) ) {
        $output = array();
        $group = ( isset($setting) && isset($setting['group']) )? $setting['group'] : null;
        $separate = ( isset($setting) && isset($setting['separator']) )? $setting['separator'] : '';
        $join = ( isset($setting) && isset($setting['join']) )? $setting['join'] : '';
        if( $join ) {
            $joinName = $join['name'];
            $joinValue = $value[$joinName];
            $joinPrefix = ( isset($join['prefix']) )? $join['prefix'] : '';
            $joinTarget = $join['value'];
            unset($value[$joinName]);
        }
        foreach( $value as $key=>$val ) {
            if( $group && isset($group[$key]) ) {
                array_push($output, output($val, $group[$key]));
            } else {
                if( $join && $val == $joinTarget ) {
                    $val .= $joinPrefix.$joinValue;
                }
                array_push($output, $val);
            }
        }
        $output = implode($separate, $output);
    } else {
        $output = $value;
    }
    if( $prefix && $output ) {
        $output = $prefix.$output;
    }
    if( $suffix && $output ) {
        $output .= $suffix;
    }
    return $output;
}

// 問い合わせ種別を日本語に変換する関数
function translateInquiryType($value) {
    $types = [
        'service' => 'サービスに関する問い合わせ',
        'partner' => '協業等に関する問い合わせ',
        'media' => '取材等に関する問い合わせ',
        'other' => 'その他'
    ];
    
    return isset($types[$value]) ? $types[$value] : $value;
}

// サービス名を日本語に変換する関数
function translateServiceName($value) {
    $types = [
        'landi-pro' => 'ランディPRO',
        'tateteku' => 'タテテク',
        'yobikomu' => 'ヨビコム'
    ];
    
    return isset($types[$value]) ? $types[$value] : $value;
}

// サービスカテゴリを日本語に変換する関数
function translateServiceCategory($value) {
    $types = [
        'operation' => '操作方法に関して',
        'account' => 'アカウントに関して',
        'introduction' => '新規導入に関して',
        'contract' => '契約内容の確認・変更に関して',
        'billing' => '請求関連に関して'
    ];
    
    return isset($types[$value]) ? $types[$value] : $value;
}

function translateSource($value) {
    $types = [
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
    
    return isset($types[$value]) ? $types[$value] : $value;
}

foreach( $formData as $name=>$setting ) {
    $item = array(
        'label' => '',
        'value' => '',
        'output' => ''
    );
    $item['label'] = $setting['label'];
    $value = ( isset($_POST[$name]) )? $_POST[$name] : '';
    $item['value'] = $value;
    
    // 弊社を知ったきっかけの場合は配列の各要素を事前に日本語に変換する
    if ($name == 'source' && is_array($value)) {
        $translated_values = [];
        foreach ($value as $source_value) {
            $translated_values[] = translateSource($source_value);
        }
        $output = output($translated_values, $setting);
    } else {
        $output = output($value, $setting);
        
        // 問い合わせ種別の場合は日本語に変換する
        if ($name == 'inquiry-type') {
            $output = translateInquiryType($output);
        }
        
        // サービス名の場合は日本語に変換する
        if ($name == 'service-name') {
            $output = translateServiceName($output);
        }
        
        // サービスカテゴリの場合は日本語に変換する
        if ($name == 'service-category') {
            $output = translateServiceCategory($output);
        }
        
        if ($name == 'privacy-agree') {
            $output = $output === 'agree' ? '同意する' : $output;
        }
    }
    
    if( isset($setting['validate']) ) {
        $validate = new Validate($output, $setting['validate']);
        $invalid = $validate->check();
        if( $invalid ) {
            array_push($messages, '【'.$item['label'].'】'.$invalid);
            $isError = true;
        }
    }
    if( $name == 'email' ) {
        $output = explode(',', $output)[0];
    }
    $item['output'] = $output;
    $data[$name] = $item;
}

$_SESSION['form'] = $data;

if( $isError ) :
    require(FORM_KIND_DIR.'/view/error.php');
else :
    $_SESSION['form_token'] = session_id();
?>

<nav class="c-breadNav">
  <ul class="c-breadNav-list">
    <li class="c-breadNav-item">
      <a href="/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">ホーム</span></a>
    </li>
    <li class="c-breadNav-item">
      <a href="/contact/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">お問い合わせ</span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">確認
      </span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <h1 class="l-fv__heading--main">お問い合わせ(確認)</h1>
  </hgroup>
</div>

<div class="c-main p-contact-confirm c-content non-module">
  <main class="c-mainWrapper">
    <p class="p-contact-confirm__lead">ご入力内容にお間違えがなければ、送信ボタンを押してください。</p>
    <div class="p-contact-form">
      <?php
foreach( $formData as $key=>$val ) :
if( isset($val['hidden']) ) continue;

// サービス以外が選択されている場合、サービス詳細項目をスキップ
if (($_SESSION['form']['inquiry-type']['value'] != 'service') && 
    ($key == 'service-name' || $key == 'service-category')) {
    continue;
}
?>
      <div class="form-item">
        <p><span class="form-ttl"><?php echo $val['label']; ?></span>
        </p>
        <div class="form-content">
          <p><?php 
            $output = $_SESSION['form'][$key]['output'];
            
            // 出力が空の場合は「入力なし」と表示
            echo(nl2br(htmlentities(!empty($output) ? $output : '入力なし', ENT_QUOTES, 'UTF-8'), false)); 
          ?></p>
        </div>
      </div>
      <?php endforeach; ?>
      <div class="p-contact-bottom">
        <!-- 修正ボタン - リファラーがあれば使用、なければ基本パス -->
        <?php 
        $back_url = $_SERVER['HTTP_REFERER'] ?? $form_kind_path;
        ?>
        <form action="<?php echo $form_kind_path; ?>" method="post" class="fix-form">
          <!-- 全ての入力値をhiddenフィールドで保持 -->
          <?php foreach($_POST as $key => $value): ?>
          <?php if(is_array($value)): ?>
          <?php foreach($value as $k => $v): ?>
          <input type="hidden"
            name="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>[<?php echo htmlspecialchars($k, ENT_QUOTES, 'UTF-8'); ?>]"
            value="<?php echo htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); ?>">
          <?php endforeach; ?>
          <?php else: ?>
          <input type="hidden" name="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>"
            value="<?php echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?>">
          <?php endif; ?>
          <?php endforeach; ?>
          <!-- 修正ボタン -->
          <a href="<?php echo FORM_KIND_PATH; ?>" class="c-btn fix">
            <span class="c-btn__inner">
              <span class="c-btn__icon">
                <svg class="c-btn__svg">
                  <use href="#i-arw-r"></use>
                </svg>
              </span>
              <span class="c-btn__txt">修正する</span>
            </span>
          </a>
        </form>

        <!-- 送信ボタン -->
        <a class="c-btn bg-blue js-contactBtn" href="<?php echo FORM_KIND_PATH . '/complete'; ?>">
          <span class="c-btn__inner">
            <span class="c-btn__txt">この内容で送信する</span>
            <span class="c-btn__icon">
              <svg class="c-btn__svg">
                <use href="#i-arw-r"></use>
              </svg>
            </span>
          </span>
        </a>
      </div>
    </div>
  </main>
</div>

<?php
get_footer();
endif;
?>