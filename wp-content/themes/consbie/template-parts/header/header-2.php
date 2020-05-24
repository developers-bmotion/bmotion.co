<?php 
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage consbie
 * @since 1.0.0
*/
global $jws_option; ?>
<header id="nxl_header" class="nxl_header_2">
    <?php if(isset($jws_option['select-header-mb2']) && !empty($jws_option['select-header-mb2'])) : ?>
    <div class="nxl_header_mobile">
        <?php echo do_shortcode('[header_build id="'.$jws_option['select-header-mb2'].'"]');  ?>
    </div>
    <?php endif; ?>
    <div class="nxl_header_inner">
        <?php echo do_shortcode('[header_build id="'.$jws_option['select-header2'].'"]');  ?>
    </div>
</header>

