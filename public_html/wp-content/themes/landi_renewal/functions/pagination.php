<?php
function on_pagenation($query = null){
    // カスタムクエリが渡されていない場合、グローバルのメインクエリを使用
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    // 現在のページ番号を取得（最小値を1に設定）
    $paged = max(1, $query->get('paged'));

    // クエリの総ページ数を取得
    $pages = $query->max_num_pages;

    // 総ページ数が1以下の場合（ページネーションが不要な場合）は処理を終了
    if ($pages <= 1) return;

    // ページが1つしかない場合は何も表示しない
    if( 1 != $pages ) {
        echo "
<div class=\"c-pagination\">\n
<div class=\"c-pagination-txtList\">\n
";

        // 最初のページの場合、"first"と"prev"リンクを無効化
        if( $paged == 1 ) {
            echo "
   <a href=\"\" class=\"c-pagination-txt c-linelink\"><span class=\"c-linelink__txt \">first</span></a>\n
   <a href=\"\" class=\"c-pagination-txt c-linelink brand\"><span class=\"c-linelink__txt \">prev</span></a>\n
   ";
        } else {
            // それ以外の場合、"first"と"prev"リンクを有効化
            echo "
   <a href=\"".get_pagenum_link(1)."\" class=\"c-pagination-txt c-linelink is-active\"><span class=\"c-linelink__txt\">first</span></a>\n
   <a href=\"".get_pagenum_link($paged - 1)."\" class=\"c-pagination-txt c-linelink is-active\"><span class=\"c-linelink__txt\">prev</span></a>\n
   ";
        }

        echo "</div>\n";//.c-pagination-txtList
        echo "<ul class=\"c-pagination-num\">";

        // ページ数が多い場合、省略記号（...）を表示
        if( $pages > 4 && $paged > 3 || $pages == 5 && $paged == 3) {
            echo " <li class=\"c-pagination-more\"><span class='c-pagination-more-inner'>...</span></li>\n";
        }

        // ページ番号の表示
        for( $i=1; $i<=$pages; $i++ ) {
            // 表示するページ番号の制限（現在のページの前後2ページまで）
            if( ($paged <= 2 && $i > 4)
                || ($pages - $paged <= 2 && $i <= $pages - 4)
                || ($paged > 2 && $pages - $paged > 2 && ($i < $paged - 2 || $i > $paged + 2))
            ) {
                continue;
            }
            // 現在のページをハイライト
            if( $paged == $i ) {
                echo " <li class=\"c-pagenation-num-item\" ><a class=\"is-current c-pagenation-num-link\" href=\"".get_pagenum_link($i)."\">".$i."</a></li>\n";
            } else {
                echo " <li class=\"c-pagenation-num-item\" ><a class=\"c-pagenation-num-link\" href=\"".get_pagenum_link($i)."\">".$i."</a></li>\n";
            }
        }

        // 後ろの省略記号（...）の表示
        if( $pages > 4 && $pages - $paged > 2 ) {
            echo " <li class=\"c-pagination-more\"><span class='c-pagination-more-inner'>...</span></li>\n";
        }

        echo " </ul>\n";
        echo "<div class=\"c-pagination-txtList\">\n";

        // 最後のページの場合、"next"と"end"リンクを無効化
        if( $paged == $pages ) {
            echo "
   <a href=\"\" class=\"c-pagination-txt c-linelink\"><span class=\"c-linelink__txt\">next</span></a>\n
   <a href=\"\" class=\"c-pagination-txt c-linelink\"><span class=\"c-linelink__txt brand\">end</span></a>\n
   ";
        } else {
            // それ以外の場合、"next"と"end"リンクを有効化
            echo "
   <a href=\"".get_pagenum_link($paged + 1)."\" class=\"c-pagination-txt c-linelink is-active\"><span class=\"c-linelink__txt\">next</span></a>\n
   <a href=\"".get_pagenum_link($pages)."\" class=\"c-pagination-txt c-linelink is-active\"><span class=\"c-linelink__txt\">end</span></a>\n
   ";
        }

        echo "</div>\n";//.c-pagination-txtList

        echo "</div>\n";
    }
}
?>