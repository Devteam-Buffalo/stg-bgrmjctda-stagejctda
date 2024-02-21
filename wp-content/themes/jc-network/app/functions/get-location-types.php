<?php
/*
**  @file               get-location-types.php
**  @description        Return an array of location post types.
**  @package            jctda
**  @since              3.0.0
**  @author             lpeterson
**  @date               5/13/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_get_location_types' ) ) :

	function jc_get_location_types() {

		static $location_types = [ 'outdoor', 'attraction', 'jc_food_drink', 'jc_lodging', 'wedding', 'town' ];

		return $location_types;

	}

endif;