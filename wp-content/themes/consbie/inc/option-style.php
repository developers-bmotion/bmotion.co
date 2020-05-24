<?php if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}
global $jws_option;
/**
 * Get values from admin styling and overwrite them when processing less files
 */

$consbie_template_directory_uri = get_template_directory_uri();
$consbie_modified_variables = array();
if(isset($jws_option['color3']) && $jws_option['color3']) {
    $consbie_modified_variables['color3'] = $jws_option['color3'];  
}
if(isset($jws_option['color2']) && $jws_option['color2']) {
    $consbie_modified_variables['color2'] = $jws_option['color2'];  
}
if(isset($jws_option['color1']) && $jws_option['color1']) {
    $consbie_modified_variables['color1'] = $jws_option['color1'];  
}
if(isset($jws_option['main-color']) && $jws_option['main-color']) {
    $consbie_modified_variables['main-color'] = $jws_option['main-color'];  
}
if(isset($jws_option['font1']['font-family']) && $jws_option['font1']['font-family']) {
  $consbie_modified_variables['font1'] = $jws_option['font1']['font-family']; 
}
if(isset($jws_option['opt-typography-body']['font-family']) && $jws_option['opt-typography-body']['font-family']) {
  $consbie_modified_variables['font_body'] = $jws_option['opt-typography-body']['font-family']; 
}