<?php
/**
 * Plugin Name: Consbie Core
 * Plugin URI: https://jwsuperthemes.com/
 * Description: Add Shortcode, Widget, Post tyle for themes.
 * Author: JWSThemes
 * Author URI: https://jwsuperthemes.com/
 * Version: 1.0.0
 * License: GPL3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Post Type.
 */
define("consbiecore", "Active"); 
require_once plugin_dir_path( __FILE__ ) . 'less.php';
if(!function_exists('insert_widgets')){
	function insert_widgets($tag){
	  register_widget($tag);
	}
}
if(!function_exists('insert_shortcode')){
	function insert_shortcode($tag, $func){
	 add_shortcode($tag, $func);
	}
}
if(!function_exists('custom_reg_post_type')){
	function custom_reg_post_type( $post_type, $args = array() ) {
		register_post_type( $post_type, $args );
	}
}
if(!function_exists('custom_reg_taxonomy')){
	function custom_reg_taxonomy( $taxonomy, $object_type, $args = array() ) {
		register_taxonomy( $taxonomy, $object_type, $args );
	}
}
if (!function_exists('output_ech')) { 
    function output_ech($ech) {
        echo $ech;
    }
}
if (!function_exists('decode_ct')) { 
    function decode_ct($loc) {
        echo rawurldecode(base64_decode(strip_tags($loc)));
    }
}

function jws_import_files() {
	return array(
		array(
			'import_file_name'             => 'Import Architecture',
			'categories'                   => array('Architecture'),
			'local_import_file'            => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'import/arc/contents.xml',
			'local_import_widget_file'     => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'import/arc/widgets.wie',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'import/arc/redux.json',
					'option_name' => 'jws_option',
				),
			),
			'import_preview_image_url'     => plugin_dir_url( __FILE__) .'import/lr1.jpg',
			'import_notice'                => __( 'The imort process will take a few minutes, please wait. thank you.', 'bouwer' ),
			'preview_url'                  => 'http://bouwer.jwsthemeswp.com',
		),
		array(
			'import_file_name'             => 'Import Construction',
			'categories'                   => array( 'Construction' ),
			'local_import_file'            => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'import/cons/contents.xml',
			'local_import_widget_file'     => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'import/cons/widgets.wie',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( plugin_dir_path( __FILE__ ) ) . 'import/cons/redux.json',
					'option_name' => 'jws_option',
				),
			),
			'import_preview_image_url'     => trailingslashit(plugin_dir_url( __FILE__)) .'import/lr2.jpg',
			'import_notice'                => __( 'The imort process will take a few minutes, please wait. thank you.', 'bouwer' ),
			'preview_url'                  => 'http://bouwercons.jwsthemeswp.com/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'jws_import_files' );

if ( ! function_exists( 'jws_after_import' ) ) :
    function jws_after_import($selected_import) {
    
        //Import Revolution Slider
       if ( class_exists( 'RevSlider' ) ) {
           $slider_array = array(
              plugin_dir_path( __FILE__ )."import/rev_slider/about_us.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/our_blog_slider.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/our_projects_slider.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/our_sevices.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/our-project-cou.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/revo_2.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/revo_3.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/revo1.zip",
              plugin_dir_path( __FILE__ )."import/rev_slider/slider before header.zip"
           );

           $slider = new RevSlider();
       
           foreach($slider_array as $filepath){
             $slider->importSliderFromPost(true,true,$filepath);  
           }
       
           echo ' Slider processed';
        }
        
        if ( 'Import Construction' === $selected_import['import_file_name'] ) { 
            // Assign front page and posts page (blog page).
            $front_page_id = get_page_by_title( 'Home 6' );
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $front_page_id->ID );
        }else {
            // Assign front page and posts page (blog page).
            $front_page_id = get_page_by_title( 'Home' );
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $front_page_id->ID );
        }
    
        
    }
    add_action( 'pt-ocdi/after_import', 'jws_after_import' );
endif;

/**
 * Remove Woocommerce Select2 - Woocommerce 3.2.1+
 */
if (class_exists('Woocommerce')) {
    function woo_dequeue_select2() {
        if ( class_exists( 'woocommerce' ) ) {
            wp_dequeue_style( 'select2' );
            wp_deregister_style( 'select2' );
    
            wp_dequeue_script( 'selectWoo');
            wp_deregister_script('selectWoo');
        } 
    }
    add_action( 'wp_enqueue_scripts', 'woo_dequeue_select2', 100 );	
} 