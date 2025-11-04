<?php
/**
 * デバッグ設定ファイル
 * フォームのデバッグ設定を一元管理するファイル
 */

// グローバルデバッグモード設定
// falseに設定するとデバッグログが出力されません
// また、メール送信機能なども実際に実行されるようになります
define('FORM_DEBUG_MODE', true);

// デバッグモード時のメール送信先オーバーライド設定
// デバッグモードで実際にメール送信をテストしたい場合は以下のアドレスに送信されます
// 空文字列の場合はメール送信されません（ログ出力のみ）
define('DEBUG_ADMIN_MAIL', 'kon@quoitworks.com');

// デバッグログディレクトリ
define('DEBUG_LOG_DIR', ABSPATH . 'wp-content/debug-logs/');

// ディレクトリが存在しない場合は作成
if (!file_exists(DEBUG_LOG_DIR)) {
    mkdir(DEBUG_LOG_DIR, 0755, true);
}

/**
 * デバッグログ出力関数
 * @param string $message ログメッセージ
 * @param mixed $data 追加データ（オプション）
 * @param string $file_prefix ログファイル接頭辞（オプション）
 */
function form_debug_log($message, $data = null, $file_prefix = 'form') {
    // デバッグモードがオフの場合は何もしない
    if (!FORM_DEBUG_MODE) {
        return;
    }
    
    $log_file = DEBUG_LOG_DIR . $file_prefix . '-debug-' . date('Y-m-d') . '.log';
    $timestamp = date('Y-m-d H:i:s');
    $session_id = session_id() ?: 'no-session';
    $log_entry = "[{$timestamp}] [{$session_id}] {$message}";
    
    if ($data !== null) {
        if (is_array($data) || is_object($data)) {
            $log_entry .= "\n" . print_r($data, true);
        } else {
            $log_entry .= " - " . $data;
        }
    }
    
    file_put_contents($log_file, $log_entry . "\n", FILE_APPEND);
}