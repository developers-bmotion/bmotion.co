<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage consbie
 * @since 1.0.0
 */
global $jws_option; ?>
<footer id="nxl_footer" class="nxl_footer_1">
    <?php 
          if(isset($jws_option['select-footer1']) && !empty($jws_option['select-footer1'])) {
            echo do_shortcode('[footer_build id="' . $jws_option['select-footer1'] . '"]');
          } /*else {
            echo '<div class="nxl_footer_emtry">
                <span>'.esc_html('&copy; consbie').'</span>'.esc_html__('2019. All Rights Resevered.','consbie').'
            </div>';
          } */
          
     ?>
</footer>

