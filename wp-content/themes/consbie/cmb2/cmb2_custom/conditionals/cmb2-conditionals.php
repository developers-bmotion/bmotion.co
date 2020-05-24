<?php
$maybe_required_form_elms = array(
	'list_input',
	'input',
	'textarea',
	'input',
	'select',
	'checkbox',
	'radio',
	'radio_inline',
	'taxonomy_radio',
	'taxonomy_multicheck',
	'multicheck_inline',
	);
const PRIORITY = 99999;
if ( ! defined( 'CMB2_LOADED' ) || false === CMB2_LOADED ) {
	return;
}
foreach ( $maybe_required_form_elms as $element ) {
	add_filter( "cmb2_{$element}_attributes", 'maybe_set_required_attribute', PRIORITY );
}
function maybe_set_required_attribute( $args ) {
	if ( ! isset( $args['required'] ) ) {
		return $args;
	}
			// Comply with HTML specs.
	if ( true === $args['required'] ) {
		$args['required'] = 'required';
	}
	return $args;
}
function admin_init() {
	$cmb2_boxes = CMB2_Boxes::get_all();
	foreach ( $cmb2_boxes as $cmb_id => $cmb2_box ) {
		add_action(
			"cmb2_{$cmb2_box->object_type()}_process_fields_{$cmb_id}",
			'filter_data_to_save',
			PRIORITY,
			2
			);
	}
}
function filter_data_to_save( CMB2 $cmb2, $object_id ) {
	foreach ( $cmb2->prop( 'fields' ) as $field_args ) {
		if ( ! ( 'group' === $field_args['type'] || ( array_key_exists( 'attributes', $field_args ) && array_key_exists( 'data-conditional-id', $field_args['attributes'] ) ) ) ) {
			continue;
		}
		if ( 'group' === $field_args['type'] ) {
			foreach ( $field_args['fields'] as $group_field ) {
				if ( ! ( array_key_exists( 'attributes', $group_field ) && array_key_exists( 'data-conditional-id', $group_field['attributes'] ) ) ) {
					continue;
				}
				$field_id               = $group_field['id'];
				$conditional_id         = $group_field['attributes']['data-conditional-id'];
				$decoded_conditional_id = @json_decode( $conditional_id );
				if ( $decoded_conditional_id ) {
					$conditional_id = $decoded_conditional_id;
				}
				if ( is_array( $conditional_id ) && ! empty( $conditional_id ) && ! empty( $cmb2->data_to_save[ $conditional_id[0] ] ) ) {
					foreach ( $cmb2->data_to_save[ $conditional_id[0] ] as $key => $group_data ) {
						$cmb2->data_to_save[ $conditional_id[0] ][ $key ] = filter_field_data_to_save( $group_data, $field_id, $conditional_id[1], $group_field['attributes'] );
					}
				}
				continue;
			}
		} else {
			$field_id       = $field_args['id'];
			$conditional_id = $field_args['attributes']['data-conditional-id'];
			$cmb2->data_to_save = filter_field_data_to_save( $cmb2->data_to_save, $field_id, $conditional_id, $field_args['attributes'] );
		}
	}
}
function filter_field_data_to_save( $data_to_save, $field_id, $conditional_id, $attributes ) {
	if ( array_key_exists( 'data-conditional-value', $attributes ) ) {
		$conditional_value         = $attributes['data-conditional-value'];
		$decoded_conditional_value = @json_decode( $conditional_value );
		if ( $decoded_conditional_value ) {
			$conditional_value = $decoded_conditional_value;
		}
		if ( ! isset( $data_to_save[ $conditional_id ] ) ) {
			if ( 'off' !== $conditional_value ) {
				unset( $data_to_save[ $field_id ] );
			}
			return $data_to_save;
		}
		if ( ( ! is_array( $conditional_value ) && ! is_array( $data_to_save[ $conditional_id ] ) ) && $data_to_save[ $conditional_id ] != $conditional_value ) {
			unset( $data_to_save[ $field_id ] );
			return $data_to_save;
		}
		if ( is_array( $conditional_value ) || is_array( $data_to_save[ $conditional_id ] ) ) {
			$match = array_intersect( (array) $conditional_value, (array) $data_to_save[ $conditional_id ] );
			if ( empty( $match ) ) {
				unset( $data_to_save[ $field_id ] );
				return $data_to_save;
			}
		}
	}
	if ( ! isset( $data_to_save[ $conditional_id ] ) || ! $data_to_save[ $conditional_id ] ) {
		unset( $data_to_save[ $field_id ] );
	}
	return $data_to_save;
}