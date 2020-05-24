<?php
namespace ElementorHelloWorld;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
	}


	
	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/test.php' );
		require_once( __DIR__ . '/widgets/hello-world.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-post-archive.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-logo.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-post-related.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-studies-archive.php' );
		require_once( __DIR__ . '/widgets/inline-editing.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-product-details.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-product-related.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-product-archive.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-product-featured.php' );
        require_once( __DIR__ . '/widgets/jws-custom/jws-slide-team.php' );
        require_once( __DIR__ . '/widgets/jws-custom/jws-single-team.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-services.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-studies.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-instagram.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-custom-review.php' );
		require_once( __DIR__ . '/widgets/jws-custom/jws-menu.php' );
		
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Test() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Hello_World() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsPostArchive() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsLogo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\PostRelated() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsStudiesArchives() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Inline_Editing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductDetails() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductRelated() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductArchive() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\ProductFeatured() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsTeams() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsSingleTeams() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsServices() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsStudies() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Instagram() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\JwsCustomReview() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\JwsCustom\Nav_Menu() );

	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();
