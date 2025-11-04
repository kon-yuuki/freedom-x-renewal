# WordPress カスタムフォームシステム

このフォームシステムは、WordPress環境で動作する高機能なカスタムフォームライブラリです。動的バリデーション、条件付きフィールド、グループ管理、メール送信機能を備えた再利用可能なシステムです。

## 主な機能

- **リアルタイムバリデーション**: 入力と同時に検証を実行
- **条件付きフィールド**: 選択内容に応じた項目の動的表示/非表示
- **グループバリデーション**: ラジオボタン・チェックボックスのグループ単位管理
- **自動メール送信**: 管理者・ユーザー向けカスタマイズ可能なメール配信
- **多言語対応**: 選択肢の自動翻訳機能
- **デバッグ機能**: 開発・運用時のトラブルシューティング支援
- **レスポンシブ対応**: モバイル・デスクトップ両対応

## システム構成

```
form/
├── {form_name}/                # フォーム名ディレクトリ
│   ├── config.php             # フォーム設定・項目定義
│   ├── mail/                  # メールテンプレート
│   │   ├── admin.txt          # 管理者向けメール本文
│   │   ├── head.txt           # ユーザー向けメールヘッダー
│   │   └── foot.txt           # ユーザー向けメールフッター
│   └── view/                  # 画面ファイル
│       ├── form.php           # 入力画面
│       ├── confirm.php        # 確認画面
│       ├── complete.php       # 完了画面
│       └── error.php          # エラー画面
├── debug-config.php           # 共通デバッグ設定
├── debug-logs/                # ログ出力ディレクトリ
└── classes/                   # 共通クラス
    ├── Validate.php           # サーバーサイドバリデーション
    └── PostType.php           # 投稿タイプ管理（オプション）
```

## クイックスタート

### 1. 新しいフォームの作成

```bash
# フォームディレクトリの作成
mkdir -p form/contact/{mail,view}
mkdir -p form/debug-logs
```

### 2. 基本設定ファイルの作成

**form/contact/config.php**
```php
<?php
// メール設定
const ADMIN_MAIL = 'admin@example.com';
const ADMIN_SUBJECT = '【お問い合わせ】ウェブサイトからのお問い合わせ';
const USER_SUBJECT = 'お問い合わせを受け付けました';
const USER_MAIL_BODY = true;
const MAIL_ID = false;

// フォーム項目定義
$formData = array(
    'name' => array(
        'label' => 'お名前',
        'validate' => array(
            'require' => true
        )
    ),
    'email' => array(
        'label' => 'メールアドレス',
        'validate' => array(
            'require' => true,
            'email' => true
        )
    ),
    'message' => array(
        'label' => 'お問い合わせ内容',
        'validate' => array(
            'require' => true
        )
    )
);
?>
```

### 3. フォーム画面の作成

**form/contact/view/form.php**
```php
<?php
// フォーム値取得関数
function formValue($name, ...$params) {
    $session = (isset($_SESSION['form'][$name])) ? $_SESSION['form'][$name] : null;
    if (!$session) return '';
    
    $value = $session['value'];
    if ($params) {
        foreach ($params as $param) {
            $value = $value[$param];
        }
    }
    
    if (!is_array($value)) {
        $value = htmlentities($value, ENT_QUOTES, 'UTF-8');
    }
    return $value;
}
?>

<form action="<?php echo FORM_KIND_PATH . '/confirm'; ?>" method="post" id="contact-form">
    <input type="hidden" name="form_action" value="confirm">
    
    <!-- お名前 -->
    <div class="form-item">
        <label for="name">
            <span class="form-ttl">お名前</span>
            <span class="required-mark">(必須)</span>
        </label>
        <div class="form-field">
            <input type="text" id="name" name="name" 
                   value="<?php echo formValue('name'); ?>" 
                   class="is-required" required>
        </div>
    </div>
    
    <!-- メールアドレス -->
    <div class="form-item">
        <label for="email">
            <span class="form-ttl">メールアドレス</span>
            <span class="required-mark">(必須)</span>
        </label>
        <div class="form-field">
            <input type="email" id="email" name="email" 
                   value="<?php echo formValue('email'); ?>" 
                   class="is-required" required>
        </div>
    </div>
    
    <!-- お問い合わせ内容 -->
    <div class="form-item">
        <label for="message">
            <span class="form-ttl">お問い合わせ内容</span>
            <span class="required-mark">(必須)</span>
        </label>
        <div class="form-field">
            <textarea id="message" name="message" 
                      class="is-required" required><?php echo formValue('message'); ?></textarea>
        </div>
    </div>
    
    <!-- 送信ボタン -->
    <button type="submit" class="submit-btn js-contactBtn is-disabled">
        送信する
    </button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    new Contact({
        formSelector: '#contact-form',
        debug: false
    });
});
</script>
```

## 詳細設定

### フォーム項目の種類

#### 1. 基本入力項目
```php
'field_name' => array(
    'label' => '項目名',
    'validate' => array(
        'require' => true,          // 必須項目
        'email' => true,            // メール形式検証
        'equal' => 'target_field'   // 同値検証
    ),
    'prefix' => '〒',              // 接頭語
    'suffix' => '円',              // 接尾語
)
```

#### 2. 配列項目（チェックボックス等）
```php
'categories' => array(
    'label' => 'カテゴリ',
    'validate' => array(
        'require' => true
    ),
    'separator' => '、',           // 区切り文字
    'join' => array(              // その他入力の結合
        'name' => 'other_value',
        'value' => 'その他',
        'prefix' => '：'
    )
)
```

#### 3. ラジオボタングループ
```html
<div class="radio-group content-radio is-required">
    <div class="radio-item">
        <input type="radio" id="option1" name="field_name" value="value1">
        <label for="option1">選択肢1</label>
    </div>
    <div class="radio-item">
        <input type="radio" id="option2" name="field_name" value="value2">
        <label for="option2">選択肢2</label>
    </div>
</div>
```

#### 4. チェックボックスグループ
```html
<div class="checkbox-group content-checkbox is-required">
    <div class="checkbox-item">
        <input type="checkbox" id="check1" name="field_name[]" value="value1">
        <label for="check1">選択肢1</label>
    </div>
    <div class="checkbox-item">
        <input type="checkbox" id="check2" name="field_name[]" value="value2">
        <label for="check2">選択肢2</label>
    </div>
</div>
```

### 条件付きフィールド

#### HTML構造
```html
<!-- トリガー項目 -->
<div class="radio-group content-radio is-required">
    <input type="radio" name="inquiry_type" value="service" id="service">
    <label for="service">サービスについて</label>
    <input type="radio" name="inquiry_type" value="other" id="other">
    <label for="other">その他</label>
</div>

<!-- 条件付き表示項目 -->
<div id="service-details" style="display: none;">
    <div class="radio-group content-radio is-required" data-name="service_name">
        <div class="radio-item">
            <input type="radio" name="service_name" value="service1" id="service1">
            <label for="service1">サービス1</label>
        </div>
    </div>
</div>
```

#### JavaScript制御
```javascript
class Contact {
    setupConditionalValidation() {
        const inquiryInputs = document.querySelectorAll('input[name="inquiry_type"]');
        const serviceDetails = document.getElementById('service-details');
        
        inquiryInputs.forEach(input => {
            input.addEventListener('change', () => {
                const isService = document.querySelector('input[name="inquiry_type"]:checked')?.value === 'service';
                
                if (isService) {
                    serviceDetails.style.display = 'block';
                    // 必須項目として設定
                    serviceDetails.querySelectorAll('.content-radio').forEach(group => {
                        group.classList.add('is-required');
                    });
                } else {
                    serviceDetails.style.display = 'none';
                    // 必須項目から除外
                    serviceDetails.querySelectorAll('.content-radio').forEach(group => {
                        group.classList.remove('is-required', 'is-entered', 'is-error');
                    });
                }
                
                this.updateFormElements();
            });
        });
    }
}
```

### 確認画面での値の変換

**form/contact/view/confirm.php**
```php
// 翻訳関数の定義
function translateInquiryType($value) {
    $translations = [
        'service' => 'サービスについて',
        'support' => 'サポートについて',
        'other' => 'その他'
    ];
    return isset($translations[$value]) ? $translations[$value] : $value;
}

// 配列の翻訳（事前変換）
if ($name == 'categories' && is_array($value)) {
    $translated_values = [];
    foreach ($value as $item) {
        $translated_values[] = translateCategory($item);
    }
    $output = output($translated_values, $setting);
} else {
    $output = output($value, $setting);
    
    // 単一値の翻訳（事後変換）
    if ($name == 'inquiry_type') {
        $output = translateInquiryType($output);
    }
}

// 条件付き項目の表示制御
if (($_SESSION['form']['inquiry_type']['value'] != 'service') && 
    ($key == 'service_name' || $key == 'service_category')) {
    continue; // サービス以外の場合はスキップ
}
```

### メール設定

#### 管理者向けメールテンプレート
**form/contact/mail/admin.txt**
```
お疲れ様です。

ウェブサイトからお問い合わせがありました。
以下の内容をご確認ください。

```

#### ユーザー向けメールテンプレート
**form/contact/mail/head.txt**
```
{name}

この度は、お問い合わせいただきありがとうございます。
以下の内容で受け付けいたしました。

```

**form/contact/mail/foot.txt**
```

ご不明な点がございましたら、お気軽にお問い合わせください。

株式会社サンプル
〒000-0000 東京都渋谷区xxx-x-x
TEL: 03-0000-0000
EMAIL: info@example.com
```

#### プレースホルダー
- `{name}`: 送信者名（法人名 + 個人名の組み合わせ対応）

### 問い合わせ種別によるメール送信先分岐

**complete.php での設定**
```php
// 問い合わせ種別に応じてメールアドレスを決定
$inquiryType = $_SESSION['form']['inquiry-type']['value']; // 元の英語値を取得
$adminMailAddress = ADMIN_MAIL; // デフォルト

switch($inquiryType) {
    case 'service':
        $adminMailAddress = 'service@example.com';    // サービス担当
        break;
    case 'partner':
        $adminMailAddress = 'partner@example.com';    // 協業担当
        break;
    case 'media':
        $adminMailAddress = 'media@example.com';      // 取材担当
        break;
    case 'other':
        $adminMailAddress = 'other@example.com';      // その他担当
        break;
    default:
        $adminMailAddress = ADMIN_MAIL;               // デフォルト
        break;
}

$adminMails = explode(',', $adminMailAddress);
```

### JavaScript バリデーション設定

```javascript
// 基本設定
const contact = new Contact({
    formSelector: '#contact-form',          // フォームセレクター
    countRequiredItems: true,              // 必須項目数カウント
    debug: false,                          // デバッグモード
    scrollOffset: 100,                     // エラー時のスクロールオフセット
    regexPatterns: {                       // バリデーションパターン
        email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        tel: /^0\d{9,10}$/,
        url: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/i
    }
});

// 詳細設定
const advancedContact = new Contact({
    formSelector: '#advanced-form',
    requiredInputSelector: 'input.is-required:not([type="radio"]):not([type="checkbox"]), textarea.is-required, select.is-required',
    requiredCheckboxSelector: '.content-checkbox.is-required, .content-radio.is-required',
    submitButtonSelector: '.js-submitBtn',
    // CSSクラス設定
    loadingClass: 'is-loading',
    disabledClass: 'is-disabled',
    enteredClass: 'is-entered',
    errorClass: 'is-error',
    validateClass: 'is-validate'
});
```

## デバッグ機能

### デバッグモードの有効化

**form/debug-config.php**
```php
<?php
// デバッグ設定
const FORM_DEBUG_MODE = true;  // 本番環境では false に設定

/**
 * デバッグログ出力関数
 */
function form_debug_log($message, $data = null, $type = 'form') {
    if (!FORM_DEBUG_MODE) return;
    
    $log_dir = TEMPLATEPATH . '/form/debug-logs';
    if (!is_dir($log_dir)) {
        mkdir($log_dir, 0755, true);
    }
    
    $log_file = $log_dir . "/{$type}-debug-" . date('Y-m-d') . ".log";
    $timestamp = date('Y-m-d H:i:s');
    $log_entry = "[{$timestamp}] {$message}";
    
    if ($data !== null) {
        $log_entry .= "\nData: " . print_r($data, true);
    }
    
    file_put_contents($log_file, $log_entry . "\n", FILE_APPEND | LOCK_EX);
}
?>
```

### JavaScript デバッグ
```javascript
// デバッグモード有効化
const contact = new Contact({
    debug: true
});

// 出力される情報
// - フォーム要素の初期化状況
// - バリデーション実行状況  
// - 必須項目数の計算過程
// - イベントの発生状況
// - エラー発生時の詳細情報
```

### ログファイルの確認
```bash
# リアルタイムログ監視
tail -f form/debug-logs/form-debug-$(date +%Y-%m-%d).log

# 確認画面ログ
tail -f form/debug-logs/confirm-debug-$(date +%Y-%m-%d).log

# 完了画面ログ
tail -f form/debug-logs/complete-debug-$(date +%Y-%m-%d).log
```

## バリデーション機能

### サーバーサイドバリデーション

**classes/Validate.php の使用例**
```php
// 基本的な使用方法
$validate = new Validate($value, array(
    'require' => true,
    'email' => true
));

$error = $validate->check();
if ($error) {
    // エラー処理
    echo $error;
}

// カスタムバリデーションの追加
class CustomValidate extends Validate {
    protected function customRule($value) {
        // カスタムルールの実装
        if (!preg_match('/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/', $value)) {
            return '電話番号の形式が正しくありません';
        }
        return false;
    }
}
```

### フロントエンドバリデーション

```javascript
// 個別要素のバリデーション
validateElement(element, isInitial = false) {
    const isRequired = element.classList.contains('is-required');
    const regexPattern = this.config.regexPatterns[element.type] || this.config.regexPatterns[element.name];
    
    if (element.value === '') {
        if (isRequired) {
            this.setElementStatus(element, false, isInitial);
            return false;
        }
    } else if (regexPattern && !regexPattern.test(element.value)) {
        this.setElementStatus(element, false, isInitial, true);
        return false;
    } else {
        this.setElementStatus(element, true);
        return true;
    }
}

// グループバリデーション
validateCheckboxGroup(checkContent, isInitial = false) {
    const isRadioGroup = checkContent.classList.contains('content-radio');
    const inputType = isRadioGroup ? 'radio' : 'checkbox';
    const checkedInputs = checkContent.querySelectorAll(`input[type="${inputType}"]:checked`);
    
    if (checkedInputs.length === 0) {
        checkContent.classList.add(this.config.errorClass);
        return false;
    } else {
        checkContent.classList.add(this.config.enteredClass);
        return true;
    }
}
```

## トラブルシューティング

### よくある問題と解決方法

#### 1. 必須項目数が正しくカウントされない
**症状**: 必須項目を入力してもボタンが有効にならない

**解決方法**:
```html
<!-- ❌ 間違い: 個別のinput要素にクラスを付けている -->
<input type="radio" class="is-required" name="category" value="1">
<input type="radio" class="is-required" name="category" value="2">

<!-- ✅ 正解: グループ要素にクラスを付ける -->
<div class="radio-group content-radio is-required">
    <input type="radio" name="category" value="1">
    <input type="radio" name="category" value="2">
</div>
```

#### 2. 条件付きフィールドが動作しない
**症状**: 選択を変更してもフィールドが表示/非表示されない

**解決方法**:
```javascript
// setupConditionalValidation() メソッドの実装確認
// イベントリスナーが正しく設定されているか確認
// デバッグモードでログを確認

// 初期化のタイミング確認
document.addEventListener('DOMContentLoaded', function() {
    new Contact({
        formSelector: '#your-form',
        debug: true  // デバッグモードで確認
    });
});
```

#### 3. メールが送信されない
**症状**: フォーム送信後にメールが届かない

**解決方法**:
```php
// デバッグモードを有効にしてログを確認
const FORM_DEBUG_MODE = true;

// wp_mail の設定確認
// SMTPプラグインの設定確認
// メールテンプレートファイルのパス確認

// ログで確認すべき項目
// - メール送信処理の実行有無
// - 送信先アドレスの正確性
// - テンプレートファイルの読み込み成功/失敗
```

#### 4. バリデーションが効かない
**症状**: 入力エラーがあってもバリデーションが実行されない

**解決方法**:
```javascript
// セレクターの確認
const contact = new Contact({
    formSelector: '#correct-form-id',  // 正しいIDを指定
    debug: true  // デバッグで詳細確認
});

// HTMLの確認
// - form要素のidが正しいか
// - 必要なクラス（is-required等）が付いているか
// - input要素のtype属性が正しいか
```

### デバッグ手順

1. **デバッグモードの有効化**
   ```php
   // PHP側
   const FORM_DEBUG_MODE = true;
   ```
   ```javascript
   // JavaScript側
   new Contact({ debug: true });
   ```

2. **ログファイルの確認**
   ```bash
   # エラーログの確認
   tail -f form/debug-logs/form-debug-2024-01-01.log
   ```

3. **ブラウザ開発者ツールの確認**
   - Console タブでJavaScriptエラーを確認
   - Network タブでAjaxリクエストを確認
   - Elements タブでHTML構造を確認

## セキュリティ考慮事項

### 入力値の検証・サニタイゼーション
```php
// 全ての入力値をエスケープ処理
$value = htmlentities($input, ENT_QUOTES, 'UTF-8');

// SQLインジェクション対策（データベース使用時）
$stmt = $pdo->prepare("INSERT INTO table (column) VALUES (?)");
$stmt->execute([$value]);
```

### CSRF対策
```php
// セッショントークンによる検証
if (!isset($_SESSION['form_token']) || $_SESSION['form_token'] != session_id()) {
    // 不正なリクエスト
    header('HTTP/1.1 403 Forbidden');
    exit;
}
```

### ファイルアップロード対策（将来拡張時）
```php
// 拡張子チェック
$allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf'];
$extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowed_extensions)) {
    // 不正なファイル
    throw new Exception('許可されていないファイル形式です');
}

// ファイルサイズチェック
if ($_FILES['file']['size'] > 5 * 1024 * 1024) { // 5MB制限
    throw new Exception('ファイルサイズが大きすぎます');
}
```

## 他プロジェクトへの導入

### 1. ファイルのコピー
```bash
# 必要ファイルの複製
cp -r form/ /path/to/new/project/
cp src/js/components/Contact.js /path/to/new/project/src/js/components/
```

### 2. 設定の調整
```php
// config.php の調整
const ADMIN_MAIL = 'new-project@example.com';
const ADMIN_SUBJECT = '【新プロジェクト】お問い合わせ';

// パスの調整
const FORM_KIND_PATH = '/contact';  // プロジェクトに応じて調整
```

### 3. CSS・JavaScriptの統合
```scss
// 既存のSCSSに追加
@import 'components/form';
```

```javascript
// 既存のJavaScriptに追加
import Contact from './components/Contact.js';
```

### 4. WordPress関数の調整
```php
// テーマのfunctions.phpに追加
require_once get_template_directory() . '/form/classes/Validate.php';
require_once get_template_directory() . '/form/debug-config.php';
```

---

このフォームシステムは、WordPress環境での汎用的な利用を想定して設計されており、最小限の設定変更で様々なプロジェクトに導入可能です。