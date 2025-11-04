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


// 現在の投稿IDを取得
$post_id = get_the_ID();
// ACFフィールドからダウンロードURLを取得
$download_url = get_field('materials_form_file', $post_id);

// ACFフィールドからメールヘッダーを取得
$material_mail_header = get_field('material_mail_header', $post_id);

$title = get_the_title();
$pages = SCF::get('pages', $post_id);

// カテゴリ情報を取得
$terms = get_the_terms($post_id, 'materials_category');
$category = '';
$category_link = '';
if (!empty($terms) && !is_wp_error($terms)) {
   $category = $terms[0]->name; // 最初のカテゴリ名を取得
   $category_link = get_term_link($terms[0], 'materials_category'); // カテゴリ一覧へのリンク
}

$mailBody = "\n\n-------------------------------------------------\n\n";
if( MAIL_ID ) {
   $mailBody .= "【".MAIL_ID."】\n".$_SESSION['form_token']."\n\n";
}
foreach( $formData as $key=>$val ) {
   if( isset($val['hidden']) ) continue;
   
   // 同意項目の表示内容を変更
   $output = $_SESSION['form'][$key]['output'];
   if ($key == 'privacy-agree' || $key == 'notice-agree') {
      $output = $output === 'agree' ? '同意する' : $output;
   }
   
   $mailBody .= "【".$val['label']."】\n".$output."\n\n";
}
$mailBody .= "-------------------------------------------------\n\n";

// admin
$adminMailAddress = ADMIN_MAIL;

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

// admin.txt内のプレースホルダーをカテゴリ名で置き換え
$adminMailBody = str_replace('{資料カテゴリ(サービス名)}', $category, $adminMailBody);

$adminMailBody .= $mailBody;

// 管理者宛メールの件名にカテゴリ名を挿入
$adminSubject = str_replace('{資料カテゴリ(サービス名)}', $category, ADMIN_SUBJECT);

// メール送信処理
if (!FORM_DEBUG_MODE || (FORM_DEBUG_MODE && defined('DEBUG_ADMIN_MAIL') && !empty(DEBUG_ADMIN_MAIL))) {
   // 本番モードまたはデバッグモードでDEBUG_ADMIN_MAILが設定されている場合は実際に送信
   form_debug_log('管理者メール送信: ' . implode(',', $adminMails));
   $adminMail = wp_mail($adminMails, $adminSubject, $adminMailBody);
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
       'Subject' => $adminSubject,
       'Body' => $adminMailBody
   ]);
   // デバッグモードではメール送信エラーを無視
   $adminMail = true;
}

// user
// ACFのmaterial_mail_headerがある場合はそれを使用、ない場合はhead.txtを使用
if (!empty($material_mail_header)) {
   $userMailBody = $material_mail_header;
   form_debug_log('ユーザーメールヘッダー: ACFフィールドを使用');
} else {
   $userMailBody = file_get_contents(FORM_KIND_DIR.'/mail/head.txt');
   if (!$userMailBody) {
      form_debug_log('ユーザーメールヘッダーテンプレートの読み込みに失敗しました: ' . FORM_KIND_DIR.'/mail/head.txt');
      $isError = true;
   }
   form_debug_log('ユーザーメールヘッダー: デフォルトのhead.txtを使用');
}

// 名前プレースホルダーを置き換え
$userName = $_SESSION['form']['name']['output'];
$userMailBody = str_replace('{name}', $userName, $userMailBody);

 // ダウンロードURLプレースホルダーを置き換え
  $userMailBody = str_replace('{download_url}', $download_url,
  $userMailBody);

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
     'page_id' => 'materials',
     'navigation' => 'materials renewal header-bg-gray',
     'title' => '資料ダウンロード完了｜東京のWeb制作会社・ホームページ制作｜QUOITWORKS Inc.（株式会社クオートワークス）',
   );
   $pageinfo['description'] = '「有用性」と「美しさ」を兼ね備えた課題解決を提供するデザイン会社、クオートワークスです。この頁は「' . get_the_title() . '」をご紹介しております。';
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
      <a href="/materials/" class="c-breadNav-link c-linelink--hidden"><span class="c-linelink__txt">お役立ち資料集</span></a>
    </li>
    <li class="c-breadNav-item">
      <a href="/materials/" class="c-breadNav-link c-linelink--hidden"><span
          class="c-linelink__txt"><?php the_title()  ?></span></a>
    </li>
    <li class="c-breadNav-item is-current">
      <span class="c-breadNav-link">完了
      </span>
    </li>
  </ul>
</nav>

<div class="l-fv">
  <hgroup class="l-fv__heading">
    <p class="l-fv__heading--sub"><a href="/materials" class="c-linelink "><span
          class="c-linelink__txt is-ib">お役立ち資料一覧</span></a>
    </p>
    <h1 class="l-fv__heading--main"><?php the_title()  ?>(完了)</h1>
  </hgroup>
  <div class="l-fv__post">
    <a href="<?php echo $category_link ?>" class="c-cat-list__link c-card-innerLink"><?php echo $category  ?></a>
    <span class="p-material__pages">全<?php echo $pages ?>ページ</span>
  </div>
</div>



<div class="c-main p-contact-complete c-content non-module">
  <main class="c-mainWrapper">
    <div class="p-contact-complete__lead">
      <p>資料請求ありがとうございます。<br>
        ご入力いただいたメールアドレス宛に、<br>
        ダウンロードURLをお送りいたしましたので、ご確認ください。<br>
        万が一届いていない場合は、お手数ですが以下アドレスよりご連絡頂けますと幸いです。</p>
      <p>ご不明な点がございましたら、<br>
        お気軽にお問い合わせください。</p>
    </div>
    <?php  if ($download_url): ?>
    <?php get_template_part('/component/btn', null, [
       'url'   => esc_url($download_url),
       'label' => '資料をダウンロードする',
       'icon' => 'download-blue',
       'is_blank' => true,
     ]);  ?>
    <?php endif  ?>
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