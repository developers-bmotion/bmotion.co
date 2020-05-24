<?php
global $jws_option;
/** START --- Initialize the CMB2 Metabox & Related Classes */
require_once('cmb2_custom/conditionals/cmb2-conditionals.php'); //CMB2 Buttonset Field
require_once('cmb2_custom/image_select/image_select_metafield.php'); //CMB2 Buttonset Field

/**
 * Define the metabox and field configurations.
 */

function cmb2_sample_metaboxes4() {
	$cmb = new_cmb2_box( array(
		'id'            => 'teams_metabox',
		'title' => esc_html__( 'Teams Setting', 'consbie' ),
			'object_types' => array('teams'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'info_group',
        'type'        => 'group',
        'description' => esc_html__( 'List Info Projects', 'consbie' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => esc_html__( 'Info {#}', 'consbie' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => esc_html__( 'Add Info Item', 'consbie' ),
            'remove_button'     => esc_html__( 'Remove Item', 'consbie' ),
            'sortable'          => true,
            // 'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'consbie' ), // Performs confirmation before removing group.
            ),
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => esc_html__( 'Select Font Awesome Icon', 'consbie' ),
        'id'   => 'iconselect',
        'desc' => 'Select Font Awesome icon',
        'type' => 'faiconselect',
        'options' => array(
            'fab fa-facebook' => 'fa fa-facebook',
            'fab fa-google'       => 'fa fa-google',
            'fab fa-twitter'     => 'fa fa-twitter',
            'fab fa-instagram' => 'fa fa-instagram',
            'fab fa-pinterest-p' => 'fab fa-pinterest-p',
            'fas fa-wifi' => 'fas fa-wifi',
        ),
        'attributes' => array(
            'faver' => 5
        )
        ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
        ) );
}
add_action( 'cmb2_init', 'cmb2_sample_metaboxes4' );
function cmb2_sample_metaboxes() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box(array(
		'id'            => 'product_metabox',
		'title'         => esc_html__( 'Product Setting', 'consbie' ),
		'object_types'  => array('product'), // Post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		) );
	$cmb->add_field( array(
    	'name' => 'Product New',
    	'desc' => 'show new label in product grid',
    	'id'   => 'jws_new_label',
    	'type' => 'checkbox',
    ) );
}
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );

function cmb2_sample_metaboxes5() {
	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box(array(
		'id'            => 'page_metabox',
		'title'         => esc_html__( 'Hidden Header Footer Deafault', 'consbie' ),
		'object_types'  => array('page'), // Post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		) );
	$cmb->add_field( array(
    	'name' => 'Hidden Header Deafault',
    	'id'   => 'jws_hidden_header_deafault',
    	'type' => 'checkbox',
    ) );
    $cmb->add_field( array(
    	'name' => 'Hidden Footer Deafault',
    	'id'   => 'jws_hidden_footer_deafault',
    	'type' => 'checkbox',
    ) );
}
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes5' );