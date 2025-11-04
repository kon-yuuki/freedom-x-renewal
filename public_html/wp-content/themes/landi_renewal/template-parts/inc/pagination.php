<div class="page">
    <?php
    //
    global $max_num_pages_global;

        if (function_exists('pagination')) {
            pagination($max_num_pages_global, get_query_var('paged'));
        }
    ?>        
</div>
