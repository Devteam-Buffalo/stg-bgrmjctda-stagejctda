<?php
/**
 * Retrieves all post meta data according to the structure in the $config
 * array.
 *
 * Provides a convenient and more performant alternative to ACF's
 * `get_field()`.
 *
 * This function is especially useful when working with ACF repeater fields and
 * flexible content layouts.
 *
 * @link    https://www.timjensen.us/acf-get-field-alternative/
 *
 * @version 1.2.1
 *
 * @param integer $post_id Required. Post ID.
 * @param array   $config  Required. An array that represents the structure of
 *                         the custom fields. Follows the same format as the
 *                         ACF export field groups array.
 *
 * @return array
 */
function get_acf( $post_id, array $config ) {

	$results = array();

	foreach ( $config as $field ) {

		if ( ! isset( $field['name'] ) ) {
			continue;
		}

		$meta_key = $field['name'];

		if ( isset( $field['meta_key_prefix'] ) ) {
			$meta_key = $field['meta_key_prefix'] . $meta_key;
		}

		$field_value = get_post_meta( $post_id, $meta_key, true );

		if ( isset( $field['layouts'] ) ) { // We're dealing with flexible content layouts.

			// Build a keyed array of possible layout types.
			$layout_types = [];
			foreach ( $field['layouts'] as $key => $layout_type ) {
				$layout_types[ $layout_type['name'] ] = $layout_type;
			}

			foreach ( $field_value as $key => $current_layout_type ) {
				$new_config = $layout_types[ $current_layout_type ]['sub_fields'];

				foreach ( $new_config as &$field_config ) {
					$field_config['meta_key_prefix'] = $meta_key . "_{$key}_";
				}

				$results[] = array_merge(
					[
						'acf_fc_layout' => $current_layout_type,
					],
					get_acf( $post_id, $new_config )
				);
			}
		} elseif ( isset( $field['sub_fields'] ) ) { // We're dealing with repeater fields.

			for ( $i = 0; $i < $field_value; $i ++ ) {
				$new_config = $field['sub_fields'];

				foreach ( $new_config as &$field_config ) {
					$field_config['meta_key_prefix'] = $meta_key . "_{$i}_";
				}

				$results[ $field['name'] ][] = get_acf( $post_id, $new_config );
			}
		} else {
			$results[ $field['name'] ] = $field_value;
		} // End if().
	} // End foreach().

	return $results;
}