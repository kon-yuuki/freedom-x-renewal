<?php
// 閲覧数カウント用 
// pageviewフィールドを作成する必要があります

if (!function_exists('set_post_pageview')) {
  function set_post_pageview(){
    if(is_singular("blog")){
      global $post;
      
      $count = get_field('pageview', $post->ID);
      
      // 追加
      if($count === null){ 
          $count = 0;
          update_field('pageview', $count, $post->ID);
          return;
        }
      
      if($count == ''){
        $count = 0;
        update_field('pageview', $count, $post->ID);
      } else {
        $count++;
        update_field('pageview', $count, $post->ID); 
      }
    }
  }
}
//add_action('the_content', 'set_post_pageview');
?>