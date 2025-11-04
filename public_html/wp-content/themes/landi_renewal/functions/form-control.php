<?php 
/* フォーム用カスタマイズ */
add_filter('rewrite_rules_array', function($rules){
    $add_rules = array();
    // 資料詳細ページ用のルール
    $add_rules['materials/([^/]+)/(confirm|complete)/?$'] = 'index.php?materials=$matches[1]&form_mode=$matches[2]';
    // お問い合わせフォーム用の新しいルール
    $add_rules['contact/(confirm|complete)/?$'] = 'index.php?pagename=contact&form_mode=$matches[1]';
    
    // リライトルール適用後のログ出力
    error_log('追加したリライトルール: ' . print_r($add_rules, true));
    
    // ルールをマージして返す
    return $add_rules + $rules;
});

//$modeを管理
add_filter('query_vars', function($query_vars){
    array_push($query_vars, 'form_mode');
    return $query_vars;
});

// リダイレクト抑制を強化
add_filter('redirect_canonical', function($redirect_url, $requested_url) {
    // POSTリクエストまたは特定のURLパターンでリダイレクトを抑制
    if (
        (preg_match('#/materials/.*/(confirm|complete)#', $_SERVER['REQUEST_URI'])) || 
        (preg_match('#/contact/(confirm|complete)#', $_SERVER['REQUEST_URI'])) || 
        (!empty($_POST))
    ) {
        error_log('リダイレクト抑制: ' . $_SERVER['REQUEST_URI'] . ' POST: ' . !empty($_POST));
        return false; // リダイレクトをキャンセル
    }
    return $redirect_url;
}, 10, 2);

// リダイレクト発生時のトレース取得
add_filter('wp_redirect', function($location, $status) {
    // トレース情報を取得
    $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10);
    $trace_info = [];
    foreach ($trace as $item) {
        $trace_info[] = (isset($item['class']) ? $item['class'] . '::' : '') . $item['function'];
    }
    
    // エラーログに記録
    error_log('リダイレクト検出: ' . $location . ' (ステータス: ' . $status . ')');
    error_log('リダイレクト呼び出し元: ' . implode(' <- ', $trace_info));
    
    // 元のリダイレクト処理を続行
    return $location;
}, 10, 2);

// POSTリクエスト時のリダイレクトを確実に防止
add_action('template_redirect', function() {
    if (!empty($_POST) && strpos($_SERVER['REQUEST_URI'], '/confirm') !== false) {
        error_log('template_redirect: POSTリクエストのリダイレクトを防止');
        // リダイレクトを中断する最後の手段
        remove_all_actions('wp_redirect');
        remove_all_filters('wp_redirect');
    }
}, 1); // 優先度1で早期に実行

// 以下は既存のコード
add_action('init', function() {
    global $wp_rewrite;
    $debug_log_path = ABSPATH . 'wp-content/debug-logs/';
    if (!file_exists($debug_log_path)) {
        mkdir($debug_log_path, 0755, true);
    }
    $log_file = $debug_log_path . 'wp-rewrite-rules-' . date('Y-m-d') . '.log';
    
    // リライトルールのデバッグ出力
    $rules_output = "======== WordPressリライトルール ========\n";
    $rules_output .= print_r($wp_rewrite->rules, true);
    $rules_output .= "\n======== WordPressリライトルール（終了） ========\n";
    file_put_contents($log_file, $rules_output, FILE_APPEND);
    
    // form_modeがクエリ変数に登録されているか確認
    global $wp;
    $log_file2 = $debug_log_path . 'wp-query-vars-' . date('Y-m-d') . '.log';
    $query_vars_output = "======== WordPressクエリ変数 ========\n";
    $query_vars_output .= "登録済みクエリ変数: " . print_r($wp->public_query_vars, true);
    $query_vars_output .= "\n======== WordPressクエリ変数（終了） ========\n";
    file_put_contents($log_file2, $query_vars_output, FILE_APPEND);
}, 999); // 優先度を高くして最後に実行されるようにする

// URLマッチングの診断を追加
add_action('parse_request', function($wp) {
    $debug_log_path = ABSPATH . 'wp-content/debug-logs/';
    if (!file_exists($debug_log_path)) {
        mkdir($debug_log_path, 0755, true);
    }
    $log_file = $debug_log_path . 'url-parsing-' . date('Y-m-d') . '.log';
    
    $request_path = $_SERVER['REQUEST_URI'];
    $matched_rule = '';
    $matched_query = '';
    
    // リクエストパスがルールにマッチするか試行
    foreach ($wp->rewrite->rules as $rule => $query) {
        if (preg_match("#^$rule#", $wp->request)) {
            $matched_rule = $rule;
            $matched_query = $query;
            break;
        }
    }
    
    // 結果をログに出力
    $output = "======== URLパース診断 ========\n";
    $output .= "時刻: " . date('Y-m-d H:i:s') . "\n";
    $output .= "リクエストURI: " . $request_path . "\n";
    $output .= "WP Request: " . $wp->request . "\n";
    $output .= "マッチしたルール: " . ($matched_rule ?: "なし") . "\n";
    $output .= "変換クエリ: " . ($matched_query ?: "なし") . "\n";
    $output .= "クエリ変数: " . print_r($wp->query_vars, true) . "\n";
    $output .= "============================\n\n";
    file_put_contents($log_file, $output, FILE_APPEND);
});
// リダイレクト処理を監視
// カスタムログ関数
function redirect_debug_log($message) {
    $log_dir = ABSPATH . 'wp-content/debug-logs/';
    
    // ディレクトリが存在しない場合は作成
    if (!file_exists($log_dir)) {
        mkdir($log_dir, 0755, true);
    }
    
    $log_file = $log_dir . 'redirect-debug-' . date('Y-m-d') . '.log';
    $time = date('Y-m-d H:i:s');
    $session_id = session_id() ?: 'no-session';
    
    // ログメッセージ作成
    $log_message = "[{$time}] [{$session_id}] {$message}\n";
    
    // ファイルに書き込み
    file_put_contents($log_file, $log_message, FILE_APPEND);
}







// 最も早い段階でリクエスト情報をログに残す
add_action('plugins_loaded', function() {
    // セッション開始を試みる
    if (session_status() === PHP_SESSION_NONE) {
        @session_start();
    }
    
    redirect_debug_log('=== リクエスト開始 ===');
    redirect_debug_log('REQUEST_URI: ' . $_SERVER['REQUEST_URI']);
    redirect_debug_log('REQUEST_METHOD: ' . $_SERVER['REQUEST_METHOD']);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        redirect_debug_log('POST データあり: ' . print_r($_POST, true));
    }
    
    // お問い合わせフォーム関連のリクエストを特別に監視
    if (strpos($_SERVER['REQUEST_URI'], '/contact') !== false) {
        redirect_debug_log('お問い合わせページへのリクエスト検出');
    }
}, 1);

// テンプレート選択時にもログを残す
add_filter('template_include', function($template) {
    redirect_debug_log('選択されたテンプレート: ' . $template);
    return $template;
}, 999);

// フォーム送信時のデータを詳細にログ
add_action('init', function() {
    // POSTリクエストの詳細ログ
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        redirect_debug_log('=== POST リクエスト詳細 ===');
        redirect_debug_log('SERVER変数:');
        redirect_debug_log('REQUEST_URI: ' . $_SERVER['REQUEST_URI']);
        redirect_debug_log('HTTP_REFERER: ' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'なし'));
        redirect_debug_log('CONTENT_TYPE: ' . (isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : 'なし'));
        redirect_debug_log('CONTENT_LENGTH: ' . (isset($_SERVER['CONTENT_LENGTH']) ? $_SERVER['CONTENT_LENGTH'] : 'なし'));
        
        // POSTデータの詳細ログ
        foreach ($_POST as $key => $value) {
            if (is_array($value)) {
                redirect_debug_log('POST[' . $key . ']: ' . print_r($value, true));
            } else {
                redirect_debug_log('POST[' . $key . ']: ' . $value);
            }
        }
    }
}, 2); // plugins_loaded よりも後、でも他よりも早く

// フォームのクエリ変数処理をログ
add_action('parse_query', function($query) {
    if (isset($query->query_vars['form_mode'])) {
        redirect_debug_log('form_modeクエリ変数: ' . $query->query_vars['form_mode']);
    }
    
    if (strpos($_SERVER['REQUEST_URI'], '/contact') !== false) {
        redirect_debug_log('お問い合わせページのクエリ変数:');
        redirect_debug_log(print_r($query->query_vars, true));
    }
}, 10);

// 404判定時のログ
add_action('template_redirect', function() {
    if (is_404()) {
        redirect_debug_log('404エラー検出: ' . $_SERVER['REQUEST_URI']);
    }
}, 10);

// リダイレクト直前の状態確認
add_action('template_redirect', function() {
    // contactページのリダイレクト前チェック
    if (strpos($_SERVER['REQUEST_URI'], '/contact') !== false) {
        global $wp_query;
        
        redirect_debug_log('テンプレートリダイレクト直前の状態:');
        redirect_debug_log('is_404: ' . (is_404() ? 'true' : 'false'));
        redirect_debug_log('is_page: ' . (is_page() ? 'true' : 'false'));
        redirect_debug_log('is_single: ' . (is_single() ? 'true' : 'false'));
        
        // 現在のページ情報
        if (isset($wp_query->post)) {
            redirect_debug_log('現在のページID: ' . $wp_query->post->ID);
            redirect_debug_log('現在のページタイプ: ' . $wp_query->post->post_type);
            redirect_debug_log('現在のページスラグ: ' . $wp_query->post->post_name);
        } else {
            redirect_debug_log('現在のページ情報: なし');
        }
        
        // クエリ変数
        redirect_debug_log('クエリ変数: ' . print_r($wp_query->query_vars, true));
        
        // 現在のテンプレート
        $template = get_page_template();
        redirect_debug_log('現在のテンプレート: ' . ($template ? $template : 'デフォルト'));
    }
}, 9); // リダイレクト処理の直前

// フォーム送信直後の処理を追加
add_action('send_headers', function() {
    if (strpos($_SERVER['REQUEST_URI'], '/contact') !== false && $_SERVER['REQUEST_METHOD'] === 'POST') {
        redirect_debug_log('ヘッダー送信前のお問い合わせフォーム処理');
        
        // POSTデータのセッション保存
        if (!empty($_POST) && session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION['contact_post_data'] = $_POST;
            redirect_debug_log('POSTデータをセッションに保存');
        }
    }
}, 10);

// リダイレクト防止の最終手段
add_filter('status_header', function($status_header, $code, $description) {
    if ($code == 302 && strpos($_SERVER['REQUEST_URI'], '/contact') !== false && $_SERVER['REQUEST_METHOD'] === 'POST') {
        redirect_debug_log('ステータスヘッダー変更検出: ' . $status_header);
        redirect_debug_log('元のステータスコード: ' . $code);
        redirect_debug_log('変更後のステータスコード: 200 OK');
        
        // 302リダイレクトを200 OKに変更
        return 'HTTP/1.1 200 OK';
    }
    return $status_header;
}, 1, 3);
?>