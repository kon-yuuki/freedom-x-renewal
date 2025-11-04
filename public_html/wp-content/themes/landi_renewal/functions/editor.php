<?php
// lazy block で勝手に出力される div を消す
add_filter( 'lzb/block_render/allow_wrapper', '__return_false' );

// 表示するブロックを制限する
add_filter('allowed_block_types_all', 'my_allowed_block_types', 10, 2);
function my_allowed_block_types($allowed_block_types, $block_editor_context) {
  if (!empty($block_editor_context->post) && $block_editor_context->post->post_type === 'service') {
    $allowed_categories = array('text', 'design');
    $allowed_block_types = array(
      'core/group', // グループブロックを明示的に追加
    );
    
    $excluded_blocks = array('core/image'); // 除外するブロックを指定
    
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
    foreach ($registered_blocks as $block_name => $block_type) {
      if ((in_array($block_type->category, $allowed_categories) || strpos($block_name, 'lazyblock/') === 0) && !in_array($block_name, $excluded_blocks)) {
        $allowed_block_types[] = $block_name;
      }
    }
  }
  return $allowed_block_types;
}


?>