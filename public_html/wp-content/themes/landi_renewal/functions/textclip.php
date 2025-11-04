<?php
//$str:文字列
//$strNum:表示する文字数

function textclip($str,$strNum){
  
  $decoded_string = html_entity_decode($str, ENT_COMPAT | ENT_HTML5, 'UTF-8');

// 元の文字列の文字数を取得
$decodeLength = mb_strlen($decoded_string, 'UTF-8');

//エンコードされた文字数を取得
$rowLength = mb_strlen($str);

//余分に数えられている文字列
$overLength = $rowLength - $decodeLength;

//表示する文字数
$showLength = $decodeLength + $overLength;

if($decodeLength > $strNum){
    $str = mb_substr($decoded_string, 0, $strNum) . '...';
  }
  
  return $str;
}

?>