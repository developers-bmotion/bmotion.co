<?php 
global $jws_option;
/** Add Widget **/
require_once (JWS_ABS_PATH.'/inc/widgets/include.php');
/** Add Menu **/
require_once (JWS_ABS_PATH.'/inc/custom_menu.php');
require_once (JWS_ABS_PATH.'/inc/jws_walker_page.php');
/** Add Custom Post Type **/

require_once (JWS_ABS_PATH.'/inc/post_type/services.php');
require_once (JWS_ABS_PATH.'/inc/post_type/team.php');
require_once (JWS_ABS_PATH.'/inc/post_type/studies.php');


require_once (JWS_ABS_PATH.'/inc/css_inline.php'); 
/** Add Plugin **/
//require_once (JWS_ABS_PATH.'/inc/TGM-Plugin-Activation/plugin-option.php');

/**
 * Less To Css
*/
/* Init Functions */
function jws_init() {
	global $jws_option;
	/* Less */
	if(defined('consbiecore') && (isset($jws_option['bat_less']) && $jws_option['bat_less'])){
		 require_once (JWS_ABS_PATH.'/inc/presets.php');
        
	}
}
add_action( 'init', 'jws_init' );
/** Add Plugin **/
require_once (JWS_ABS_PATH.'/inc/TGM-Plugin-Activation/plugin-option.php');