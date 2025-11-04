<?php
/**
 * ボタンコンポーネント
 * 
 * @param array $args {
 *     ボタンの設定パラメータ
 *     @type string $url         リンク先URL（必須、tagがbuttonまたはdivの場合は任意）
 *     @type string $label       ボタンのテキスト（必須）
 *     @type string $icon        アイコン名（デフォルト: 'arw-r'）
 *     @type bool   $is_external 外部リンクかどうか（デフォルト: false）
 *     @type string $class       追加するCSSクラス（デフォルト: ''）
 *     @type string $tag         使用するHTMLタグ（デフォルト: 'a'、'button'や'div'も指定可能）
 * }
 */

// デフォルト値とマージ
$args = wp_parse_args($args, [
    'url'         => '',
    'label'       => '',
    'icon'        => 'arw-r',
    'is_blank'    => false,
    'class'       => '',
    'tag'         => 'a',
]);

// 必須パラメータがない場合は何も表示しない
if ((empty($args['url']) && $args['tag'] === 'a') || empty($args['label'])) {
    return;
}

// 外部リンクの場合、属性を追加（aタグの場合のみ）
$external_attrs = ($args['is_blank'] && $args['tag'] === 'a') ? ' target="_blank" rel="noopener"' : '';

// 追加のクラスがある場合
$additional_class = !empty($args['class']) ? ' ' . esc_attr($args['class']) : '';

// HTMLタグを取り除いたテキストをdata-text用に作成
$plain_text = wp_strip_all_tags($args['label']);

// ボタンの内部構造（共通部分）
$inner_html = '
  <span class="c-btn__inner">
    <span class="c-btn__txt" data-text="' . esc_attr($plain_text) . '"><span class="words">' . wp_kses_post($args['label']) . '</span></span>' . 
    (!empty($args['icon']) ? '
    <span class="c-btn__icon">
      <svg class="c-btn__svg">
        <use href="#i-' . esc_attr($args['icon']) . '"></use>
      </svg>
    </span>' : '') . '
  </span>';

// タグに応じて適切なHTMLを出力
switch ($args['tag']) {
    case 'button':
        ?>
<button type="button" class="c-btn<?php echo $additional_class; ?>"><?php echo $inner_html; ?></button>
<?php
        break;
    
    case 'div':
        ?>
<div class="c-btn<?php echo $additional_class; ?>"><?php echo $inner_html; ?></div>
<?php
        break;
        
    case 'a':
    default:
        ?>
<a href="<?php echo esc_url($args['url']); ?>" class="c-btn<?php echo $additional_class; ?>"
  <?php echo $external_attrs; ?>><?php echo $inner_html; ?></a>
<?php
        break;
}
?>