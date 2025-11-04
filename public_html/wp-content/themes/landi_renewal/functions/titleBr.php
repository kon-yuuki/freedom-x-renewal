<?php 
//タイトル改行設定
function title_space_br() {
  $title = get_the_title();
  $title = str_replace("br-pc", "<br class='c-sp-none'>", $title);
  $title = str_replace("br-sp", "<br class='c-pc-none'>", $title);
  $title = str_replace("br-all", "<br>", $title);
  echo $title;
}

//改行をなくす
function title_not_br(){
  $title = get_the_title();
  $title = str_replace("br-pc", "", $title);
  $title = str_replace("br-sp", "", $title);
  $title = str_replace("br-all", "", $title);
  echo $title;
}

function get_title_not_br(){
  $title = get_the_title();
  $title = str_replace("br-pc", "", $title);
  $title = str_replace("br-sp", "", $title);
  $title = str_replace("br-all", "", $title);
  return $title;
}

//brを除去する
function title_replace_br($title){
  $title = str_replace("br-pc", "", $title);
  $title = str_replace("br-sp", "", $title);
  $title = str_replace("br-all", "", $title);
  echo $title;
}

function get_title_replace_br($title){
  $title = str_replace("br-pc", "", $title);
  $title = str_replace("br-sp", "", $title);
  $title = str_replace("br-all", "", $title);
  return $title;
}
?>