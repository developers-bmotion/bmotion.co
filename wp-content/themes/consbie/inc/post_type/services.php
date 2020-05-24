<?php // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

    function jws_register_services() {
		$labels = array(
			'name'                => _x( 'services', 'Post Type General Name', 'consbie' ),
			'singular_name'       => _x( 'services', 'Post Type Singular Name', 'consbie' ),
			'menu_name'           => esc_html__( 'Services', 'consbie' ),
			'parent_item_colon'   => esc_html__( 'Parent Item:', 'consbie' ),
			'all_items'           => esc_html__( 'All Items', 'consbie' ),
			'view_item'           => esc_html__( 'View Item', 'consbie' ),
			'add_new_item'        => esc_html__( 'Add New Item', 'consbie' ),
			'add_new'             => esc_html__( 'Add New', 'consbie' ),
			'edit_item'           => esc_html__( 'Edit Item', 'consbie' ),
			'update_item'         => esc_html__( 'Update Item', 'consbie' ),
			'search_items'        => esc_html__( 'Search Item', 'consbie' ),
			'not_found'           => esc_html__( 'Not found', 'consbie' ),
			'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'consbie' ),
		);

		$args = array(
			'label'               => esc_html__( 'services', 'consbie' ),
		    'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'services_cat' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-money',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
		);


        if(function_exists('custom_reg_post_type')){
        	custom_reg_post_type( 'services', $args );
        }

		/**
		 * Create a taxonomy category for services
		 *
		 * @uses  Inserts new taxonomy object into the list
		 * @uses  Adds query vars
		 *
		 * @param string  Name of taxonomy object
		 * @param array|string  Name of the object type for the taxonomy object.
		 * @param array|string  Taxonomy arguments
		 * @return null|WP_Error WP_Error if errors, otherwise null.
		 */
		
		$labels = array(
			'name'					=> _x( 'services Categories', 'Taxonomy plural name', 'consbie' ),
			'singular_name'			=> _x( 'services Category', 'Taxonomy singular name', 'consbie' ),
			'search_items'			=> esc_html__( 'Search Categories', 'consbie' ),
			'popular_items'			=> esc_html__( 'Popular services Categories', 'consbie' ),
			'all_items'				=> esc_html__( 'All services Categories', 'consbie' ),
			'parent_item'			=> esc_html__( 'Parent Category', 'consbie' ),
			'parent_item_colon'		=> esc_html__( 'Parent Category', 'consbie' ),
			'edit_item'				=> esc_html__( 'Edit Category', 'consbie' ),
			'update_item'			=> esc_html__( 'Update Category', 'consbie' ),
			'add_new_item'			=> esc_html__( 'Add New Category', 'consbie' ),
			'new_item_name'			=> esc_html__( 'New Category', 'consbie' ),
			'add_or_remove_items'	=> esc_html__( 'Add or remove Categories', 'consbie' ),
			'choose_from_most_used'	=> esc_html__( 'Choose from most used text-domain', 'consbie' ),
			'menu_name'				=> esc_html__( 'Category', 'consbie' ),
		);
	
		$args = array(
			'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'services_cat' ),
		);
        

        if(function_exists('custom_reg_taxonomy')){
            custom_reg_taxonomy( 'services_cat', array( 'services' ), $args  );
        }
        
        $labels = array(
            'name' => esc_html__( 'Tags', 'consbie' ),
            'singular_name' => esc_html__( 'Tag',  'consbie'  ),
            'search_items' =>  esc_html__( 'Search Tags' , 'consbie' ),
            'popular_items' => esc_html__( 'Popular Tags' , 'consbie' ),
            'all_items' => esc_html__( 'All Tags' , 'consbie' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => esc_html__( 'Edit Tag' , 'consbie' ), 
            'update_item' => esc_html__( 'Update Tag' , 'consbie' ),
            'add_new_item' => esc_html__( 'Add New Tag' , 'consbie' ),
            'new_item_name' => esc_html__( 'New Tag Name' , 'consbie' ),
            'separate_items_with_commas' => esc_html__( 'Separate tags with commas' , 'consbie' ),
            'add_or_remove_items' => esc_html__( 'Add or remove tags' , 'consbie' ),
            'choose_from_most_used' => esc_html__( 'Choose from the most used tags' , 'consbie' ),
            'menu_name' => esc_html__( 'Tags','consbie'),
        ); 
    
        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'services_tag' ),
        );
        
        if(function_exists('custom_reg_taxonomy')){
            custom_reg_taxonomy( 'services_tag', array( 'services' ), $args  );
        }

	};
add_action( 'init', 'jws_register_services', 1 );