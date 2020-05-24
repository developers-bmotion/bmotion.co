<?php
/** Define THEME */ 
if (!defined('JWS_ABS_PATH')) define('JWS_ABS_PATH', get_template_directory());
if (!defined('JWS_URI_PATH')) define('JWS_URI_PATH', get_template_directory_uri());
if ( ! function_exists( 'jws_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function jws_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on consbie, use a find and replace
		 * to change 'consbie' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'consbie', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				)
			);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
        register_nav_menus( array(
			'main_navigation'   => esc_html__( 'Primary Menu','consbie' ),
		) );
	}
	endif;
	add_action( 'after_setup_theme', 'jws_setup' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jws_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Consbie Sidebar', 'consbie' ),
			'id'            => 'sidebar-single-blog',
			'description'   => esc_html__( 'Add widgets here to appear in your blog single.', 'consbie' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			)
		);
}
add_action( 'widgets_init', 'jws_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function jws_scripts() {
    
	/** Add Css **/
	wp_enqueue_style( 'animation', JWS_URI_PATH.'/css/animation.css', array(), '3.3.7');
	wp_enqueue_style( 'bootstrap', JWS_URI_PATH.'/css/bootstrap.css', array(), '3.3.7');
	wp_enqueue_style( 'slick', JWS_URI_PATH.'/css/slick.css', array(), '1.1.0');
	wp_enqueue_style( 'magnificPopup', JWS_URI_PATH.'/css/magnificPopup.css', array(), '1.1.0');
    // Load our main stylesheet. It is generated with less in upload folder
    $upload_dir = wp_upload_dir();
    $style_dir = $upload_dir['baseurl'];
    if (file_exists($upload_dir['basedir'] . '/jws-style.css')) {
        wp_enqueue_style(
            'jws-style',
            $style_dir . '/jws-style.css',
            ['elementor-frontend'],
            filemtime($upload_dir['basedir'] . '/jws-style.css')
        );
    } else {
        wp_enqueue_style( 'jws-style', JWS_URI_PATH.'/css/css_rended/style.css', array(), '1.0' , false );
    }
    wp_enqueue_style( 'jws-il-style', get_stylesheet_uri() );
	wp_add_inline_style( 'jws-il-style', jws_custom_css() );
    /**
     * Add Font Icon
    */ 
    wp_enqueue_style( 'awesome', JWS_URI_PATH.'/fonts/font-awesome/font-awesome.css');  
    wp_enqueue_style('flaticon', JWS_URI_PATH.'/fonts/flaticon/icon.css');
    wp_enqueue_style( 'jws-frontend-google-fonts', '//fonts.googleapis.com/css?family=Open Sans:100,300,400,500,600,700,800|Montserrat:100,300,400,500,600,700', false );
	/** Add Js **/
	wp_register_script( 'instagram', JWS_URI_PATH. '/js/instagram_feed.js', array(), '', true );
    wp_enqueue_script( 'jquery-slick', JWS_URI_PATH. '/js/slick.js', array(), '1.1.0', true );
    wp_enqueue_script( 'jws-main', JWS_URI_PATH. '/js/main.js', array(), '1.0', true );
    wp_enqueue_script( 'bootstrap', JWS_URI_PATH. '/js/bootstrap.js', array(), '3.3.7', true ); 
    wp_enqueue_script( 'isotope', JWS_URI_PATH. '/js/isotope.js', array(), '3.3.7', true );
    wp_enqueue_script('masonry');
    wp_enqueue_script( 'magnificPopup', JWS_URI_PATH. '/js/magnificPopup.js', array(), '1.1.0', true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    	wp_enqueue_script( 'comment-reply' );
    }
    /**
     * Enqueue scripts and styles for the front end.
     */
    wp_localize_script('jquery', 'MS_Ajax', array(
    	'ajaxurl' => admin_url('admin-ajax.php'),
    	'nextNonce' => wp_create_nonce('myajax-next-nonce'))
    );
}
add_action( 'wp_enqueue_scripts', 'jws_scripts' );
if ( ! function_exists( 'jws_admin_css' ) ) :
	function jws_admin_css() {
		wp_enqueue_style( 'jws-admincss', JWS_URI_PATH.'/css/admin.css', array(), '1.0' , false );
		wp_enqueue_script( 'jws-adminjs', JWS_URI_PATH. '/js/admin.js', array(), '1.1.0', true );
        wp_enqueue_style( 'jws-admin-google-fonts', '//fonts.googleapis.com/css?family=Open Sans:100,300,400,500,600,700,800|Montserrat:100,300,400,500,600,700', false );
	}
	add_action( 'admin_enqueue_scripts', 'jws_admin_css' );
	endif;
/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Add Redux Themeoption.
 */
require_once (JWS_ABS_PATH.'/redux-framework/option.php');

/**
 * Add cmb2 metabox.
 */
require_once (JWS_ABS_PATH.'/cmb2/meta_option.php'); 
/**
 * Include folder inc.
 */
require_once (JWS_ABS_PATH.'/inc/include.php'); 
/* Woo commerce function */
if (class_exists('Woocommerce')) {
	require_once JWS_ABS_PATH . '/woocommerce/wc-template-function.php';
}

add_action('wp_loaded', 'jws_prefix_output_buffer_start');

function jws_prefix_output_buffer_start() { 
    ob_start("jws_prefix_output_callback"); 
}

function jws_prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
};

function _consbie_filter_fw_ext_backups_demos($demos)
	{
		$demos_array = array(
			'consbie' => array(
				'title' => esc_html__('Consbie Demo', 'consbie'),
				'screenshot' => 'http://jwsuperthemes.com/import_demo/consbie/screenshot.jpg',
				'preview_link' => 'http://consbie.jwsthemeswp.com',
			),
		);
        $download_url = 'http://jwsuperthemes.com/import_demo/consbie/download-script/';
		foreach ($demos_array as $id => $data) {
			$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
				'url' => $download_url,
				'file_id' => $id,
			));
			$demo->set_title($data['title']);
			$demo->set_screenshot($data['screenshot']);
			$demo->set_preview_link($data['preview_link']);
			$demos[$demo->get_id()] = $demo;
			unset($demo);
		}
		return $demos;
	}
add_filter('fw:ext:backups-demo:demos', '_consbie_filter_fw_ext_backups_demos');