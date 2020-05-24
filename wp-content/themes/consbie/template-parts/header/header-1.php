<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage consbie
 * @since 1.0.0
 */
global $jws_option; ?>
<header id="nxl_header" class="nxl_header_1">
    <?php if (isset($jws_option['select-header-mb1']) && !empty($jws_option['select-header-mb1'])) { ?>
        <div class="nxl_header_mobile">
            <?php echo do_shortcode('[header_build id="' . $jws_option['select-header-mb1'] . '"]'); ?>
        </div>
    <?php } 
    /*
    else { ?>


    <?php } ?>
    <?php if (isset($jws_option['select-header1']) && !empty($jws_option['select-header1'])) { ?>
        <div class="nxl_header_inner">
            <?php echo do_shortcode('[header_build id="' . $jws_option['select-header1'] . '"]'); ?>
        </div>
    <?php } else { ?>

        <div class="container">
            <div class="row nxl_menu_default">
                <div class="col-sm-3 col-xs-6">
                    <div class="nxl_logo text-left">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="nxl_logo_inner">
                            <span class="nxl_logo_svg">
                                <img src="<?php echo JWS_URI_PATH . '/redux-framework/image/bower-logo.svg' ?>"/>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-6">
                    <div class="nxl_menu nav_menu_default layout1 text-right hidden-sm hidden-xs">
                        <?php
                               $attr = array(
                                    'menu_id' => 'nav',
                                    'container' => '',
                                    'container_class' => 'bt-menu-list hidden-xs hidden-sm ',
                                    'menu_class' => 'nxl_nav',
                                    'echo' => true,
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 0,
                    
                                );
                                wp_nav_menu($attr);
                         ?>
                    </div>
                    <div class="nxt_menu_mobile text-right hidden-lg hidden-md">
                        <a href="#" class="nxl_menu_mobile_button">
                               <span class="fa fa-bars"></span>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
   
    <div class="nxl_mobile_nav">
            <?php
            $attr = array(
                'menu_id' => 'nav',
                'container' => '',
                'container_class' => 'bt-menu-list hidden-xs hidden-sm ',
                'menu_class' => 'nxl_nav',
                'echo' => true,
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 0,

            );
            wp_nav_menu($attr);
            ?>
      </div>
    <?php }*/ ?>
</header>

