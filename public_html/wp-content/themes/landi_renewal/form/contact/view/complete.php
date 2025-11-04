<?php
// デバッグ設定ファイルが読み込まれていない場合は読み込む
if (!defined('FORM_DEBUG_MODE')) {
   require_once(TEMPLATEPATH.'/form/debug-config.php');
}

$isError = false;

if( !isset($_SESSION['form_token']) || $_SESSION['form_token'] != session_id() ) {
   form_debug_log('フォームトークンが無効: ' . ($_SESSION['form_token'] ?? 'なし') . ' != ' . session_id());
   require(FORM_KIND_DIR.'/view/error.php');
   return;
}

form_debug_log('メール送信処理を開始');

$mailBody = "\n\n-------------------------------------------------\n\n";
if( MAIL_ID ) {
   $mailBody .= "【".MAIL_ID."】\n".$_SESSION['form_token']."\n\n";
}
foreach( $formData as $key=>$val ) {
     if( isset($val['hidden']) ) continue;
     
     // サービス以外が選択されている場合、サービス詳細項目をスキップ
     if (($_SESSION['form']['inquiry-type']['value'] != 'service') && 
         ($key == 'service-name' || $key == 'service-category')) {
         continue;
     }
     
     $output = $_SESSION['form'][$key]['output'];
     $mailBody .= "【".$val['label']."】\n".(!empty($output) ? $output :
  '入力なし')."\n\n";
  }
$mailBody .= "-------------------------------------------------\n\n";

// admin - 問い合わせ種別に応じてメールアドレスを決定
$inquiryType = $_SESSION['form']['inquiry-type']['value']; // 元の英語値を取得
$adminMailAddress = ADMIN_MAIL; // デフォルト

switch($inquiryType) {
    case 'service':
        // サービス問い合わせの場合、サブカテゴリに応じて決定
        $serviceCategory = $_SESSION['form']['service-category']['value'] ?? '';
        switch($serviceCategory) {
            case 'operation':    // 操作方法に関して
            case 'account':      // アカウントに関して
            case 'introduction': // 新規導入に関して
            case 'contract':     // 契約内容の確認・変更に関して
                $adminMailAddress = 'supportcenter@freedom.co.jp';
                break;
            case 'billing':      // 請求関連に関して
                $adminMailAddress = 'keiri_fx@freedom.co.jp';
                break;
            default:
                $adminMailAddress = 'supportcenter@freedom.co.jp';
                break;
        }
        break;
    case 'partner':
        $adminMailAddress = 'business@freedom.co.jp';
        break;
    case 'media':
        $adminMailAddress = 'business@freedom.co.jp';
        break;
    case 'other':
        $adminMailAddress = 'info@freedom.co.jp';
        break;
    default:
        $adminMailAddress = ADMIN_MAIL; // デフォルト
        break;
}

// デバッグモードで実際にメール送信をテストする場合のアドレスオーバーライド
if (FORM_DEBUG_MODE && defined('DEBUG_ADMIN_MAIL') && !empty(DEBUG_ADMIN_MAIL)) {
    form_debug_log('デバッグモード: 管理者メール送信先をオーバーライド', [
        'original' => $adminMailAddress,
        'override' => DEBUG_ADMIN_MAIL
    ]);
    $adminMailAddress = DEBUG_ADMIN_MAIL;
}

$adminMails = explode(',', $adminMailAddress);
$adminMailBody = file_get_contents(FORM_KIND_DIR.'/mail/admin.txt');
if (!$adminMailBody) {
   form_debug_log('管理者メールテンプレートの読み込みに失敗しました: ' . FORM_KIND_DIR.'/mail/admin.txt');
   $isError = true;
}

$adminMailBody .= $mailBody;

// メール送信処理
if (!FORM_DEBUG_MODE || (FORM_DEBUG_MODE && defined('DEBUG_ADMIN_MAIL') && !empty(DEBUG_ADMIN_MAIL))) {
   // 本番モードまたはデバッグモードでDEBUG_ADMIN_MAILが設定されている場合は実際に送信
   form_debug_log('管理者メール送信: ' . implode(',', $adminMails));
   $adminMail = wp_mail($adminMails, ADMIN_SUBJECT, $adminMailBody);
   if(!$adminMail) {
       form_debug_log('管理者メールの送信に失敗しました');
       $isError = true;
   } else {
       form_debug_log('管理者メール送信成功');
   }
} else {
   // デバッグモードでDEBUG_ADMIN_MAILが未設定の場合はログ出力のみ
   form_debug_log('デバッグモード: 管理者メール送信をスキップ', [
       'To' => $adminMails,
       'Subject' => ADMIN_SUBJECT,
       'Body' => $adminMailBody
   ]);
   // デバッグモードではメール送信エラーを無視
   $adminMail = true;
}

// user
$userMailBody = file_get_contents(FORM_KIND_DIR.'/mail/head.txt');
  // 名前と法人名のプレースホルダーを置き換え
  $userName = $_SESSION['form']['contact_name']['output'];
  $companyName = $_SESSION['form']['company']['output'];

  // 法人名がある場合は「法人名 名前様」、ない場合は「名前様」
  if (!empty($companyName)) {
      $fullName = $companyName . ' ' . $userName . '様';
  } else {
      $fullName = $userName . '様';
  }
if (!$userMailBody) {
   form_debug_log('ユーザーメールヘッダーテンプレートの読み込みに失敗しました: ' . FORM_KIND_DIR.'/mail/head.txt');
   $isError = true;
}
// プレースホルダーを実際の値に置き換え
  $userMailBody = str_replace('{name}', $fullName, $userMailBody);
if( USER_MAIL_BODY ) {
   $userMailBody.= $mailBody;
}
$footerTemplate = file_get_contents(FORM_KIND_DIR.'/mail/foot.txt');
if (!$footerTemplate) {
   form_debug_log('ユーザーメールフッターテンプレートの読み込みに失敗しました: ' . FORM_KIND_DIR.'/mail/foot.txt');
   $isError = true;
}
$userMailBody.= $footerTemplate;
$userAddress = $_SESSION['form']['email']['output'];

// デバッグモードがオフの場合のみメール送信を実行
if (!FORM_DEBUG_MODE) {
   form_debug_log('ユーザーメール送信: ' . $userAddress);
   $userMail = wp_mail($userAddress, USER_SUBJECT, $userMailBody);
   if(!$userMail) {
       form_debug_log('ユーザーメールの送信に失敗しました');
       $isError = true;
   } else {
       form_debug_log('ユーザーメール送信成功');
   }
} else {
   form_debug_log('デバッグモード: ユーザーメール送信をスキップ', [
       'To' => $userAddress,
       'Subject' => USER_SUBJECT,
       'Body' => $userMailBody
   ]);
   // デバッグモードではメール送信エラーを無視
   $userMail = true;
}

if($isError && !FORM_DEBUG_MODE) :
   form_debug_log('メール送信エラーのためエラー画面を表示');
   require(FORM_KIND_DIR.'/view/error.php');
else :
   form_debug_log('メール送信成功または、デバッグモードのためスキップ。完了画面を表示');
   $pageinfo = array(
     'page_id' => 'contact',
     'navigation' => 'contact renewal header-bg-gray',
     'title' => 'お問い合わせ完了｜建築・不動産領域におけるDXコンサルティング｜FREEDOM X株式会社',
     'description' => 'FreedomXは、建築・不動産領域の知的生産性に革命をもたらします。当社は、実績に裏付けされた知見とテクノロジーの力で人材の能力を底上げし、経験が浅い人でも無駄なく最短で正解に辿り着ける未来を目指します。'
   );
   set_query_var('pageinfo', $pageinfo);
   $assetsPath = get_template_directory_uri();
   get_header();
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
      <span class="c-breadNav-link">完了
      </span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <h1 class="l-fv__heading--main">お問い合わせ(完了)</h1>
  </hgroup>
</div>

<div class="c-main p-contact-complete c-content non-module">
  <main class="c-mainWrapper">
    <div class="p-contact-complete__lead">
      <p>お問い合わせありがとうございます。<br>
        送信完了いたしました。<br>
        通常2〜3営業日以内に、担当者よりご連絡いたします。</p>
      <p>万が一、ご連絡がない場合は、<br>
        お手数ですが、下記までご連絡ください。</p>
      <p><a href="mailto:info@quoitworks.com" class="c-linelink"><span
            class="c-linelink__txt">info@quoitworks.com</span></a></p>
    </div>
    <?php get_template_part('/component/btn', null, [
       'url'   => '/',
       'label' => 'トップページへ戻る',
     ]);  ?>
  </main>
</div>

<?php
get_footer();
session_destroy();
endif;
?>