<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Consbie
 * @since 1.0.0
 */
global $jws_option;
$entries = get_post_meta( get_the_ID(), 'jws_hidden_header_deafault', true );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head();
      ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <?php 
    if ($entries != 'on') {
        ?>
         <header id="jws_header_default">
            <div class="container">
                    <div class="row jws_menu_default">
                        <div class="col-xl-3 col-lg-3">
                            <div class="jws_logo text-left">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="jws_logo_inner">
                                         <?php
                                                if (isset($jws_option['logo']['url']) && !empty($jws_option['logo']['url'])) {
                                                    ?>
                                                    <a href="http://consbie.jwsuperthemes.com/"><img src="<?php echo esc_url($jws_option['logo']['url']); ?>" alt="#"></a>
                                                    <?php
                                                }else { ?>
                                                <span class="jws_logo_svg">
                                                     <img src="<?php echo JWS_URI_PATH . '/image/logo-consbie.svg' ?>"/>
                                                </span>
                                                <?php }
                                          ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 elementor_jws_menu_layout_menu_horizontal">
                            <div class="jws_main_menu">
                                <div class="jws_nav_menu">
                                <?php 
                                
                                if ( has_nav_menu( 'main_navigation' ) ) {

                                    
                                       $attr = array(
                                             'menu_id' => 'nav',
                                             'container' => '',
                                             'menu_class' => 'jws_nav',
                                             'theme_location' => 'main_navigation',
                                             'echo' => true,
                                             'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                             'depth' => 0,
                                       );
                                       wp_nav_menu($attr);

								} else {

									?>
                                    
                                    <ul id="nav" class="jws_nav">
                                       <?php wp_list_pages(
    										array(
    											'match_menu_classes' => true,
    											'show_sub_menu_icons' => true,
    											'title_li' => false,
    											'walker'   => new Jws_Walker_Page(),
    										)
    									   );
                                       ?>
                                    </ul>
                                    
                                    <?php

								}
                                
                                ?>
                                   
                                </div> 
                            </div>

                        </div>
                        <div class="jws_menu_canvas">
                        <a href="#" class="jws_menu_button">
                                       <span class="fa fa-bars"></span>
                        </a>
                        <div class="jws_menu_canvas_overlay"></div>
                           <div class="jws_menu_canvas_sidebar">
                              <div class="elementor_jws_menu_layout_menu_vertical">
                                <div class="jws_main_menu">
                                    <div class="jws_nav_menu">
                                                  <?php 
                                
                                                    if ( has_nav_menu( 'main_navigation' ) ) {
                    
                                                        
                                                           $attr = array(
                                                                 'menu_id' => 'nav',
                                                                 'container' => '',
                                                                 'menu_class' => 'jws_nav',
                                                                 'theme_location' => 'main_navigation',
                                                                 'echo' => true,
                                                                 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                                 'depth' => 0,
                                                           );
                                                           wp_nav_menu($attr);
                    
                    								} else {
                    
                    									?>
                                                        
                                                        <ul id="nav" class="jws_nav">
                                                           <?php wp_list_pages(
                        										array(
                        											'match_menu_classes' => true,
                        											'show_sub_menu_icons' => true,
                        											'title_li' => false,
                        											'walker'   => new Jws_Walker_Page(),
                        										)
                        									   );
                                                           ?>
                                                        </ul>
                                                        
                                                        <?php
                    
                    								}
                                                    
                                                    ?>
                                            </div> 
                                        </div>
                                      
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>    
        </header> 
        <?php
    }
	?>
	<div class="site">
		<?php 
        // if ( !is_page_template( 'page-demo.php' ) ) {
		// //   echo jws_header();
        // } ?>
        
		<div id="content" class="site-content">