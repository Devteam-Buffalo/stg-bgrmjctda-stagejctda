<?php
/*
**  @file               get-location-taxonomies.php
**  @description        Get the array of location type taxonomies.
**  @package            jctda
**  @since              3.0.0
**  @author             lpeterson
**  @date               5/14/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_get_location_taxes' ) ) :

	function jc_get_location_taxes() {

		static $location_taxes = [ 'jc_camping_amenity', 'jc_lodging_accommodation', 'jc_lodging_amenity', 'jc_lodging_type', 'jc_food_amenity', 'jc_food_type' ];

		return $location_taxes;

	}

endif;