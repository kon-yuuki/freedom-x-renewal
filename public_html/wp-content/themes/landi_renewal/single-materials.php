<?php
/*
Template Name: お問い合わせページのテンプレート
*/
session_cache_limiter('none');
session_start();
$mode = ( get_query_var('form_mode') )? get_query_var('form_mode') : '';
if( $mode == 'confirm' ) {
	session_regenerate_id();
}

const FORM_KIND_DIR = TEMPLATEPATH.'/form/material';
$slug = basename(get_permalink());
define('SLUG', $slug);
define('FORM_KIND_PATH', "/materials/{$slug}"); 


require_once(TEMPLATEPATH.'/form/material/config.php');
require_once(TEMPLATEPATH.'/form/classes/classes.php');

// mode
switch($mode){
	case 'confirm':
		require_once(FORM_KIND_DIR.'/view/confirm.php');
		break;
	case 'complete':
		require_once(FORM_KIND_DIR.'/view/complete.php');
		break;
	default:
		require_once(FORM_KIND_DIR.'/view/form.php');
		session_destroy();
		break;
}