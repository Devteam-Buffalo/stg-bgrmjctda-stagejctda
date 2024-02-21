<?php
/*
**  @file               model-gps.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/18/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_gps' ) ) :

	function jc_gps( $location = null ) {
		$location = $location ?? false;
		
		if ( $location && is_object( $location ) ) :

			$gps = [
				'lat' => null,
				'lng' => null
			];
			
			$address_gps = ( metadata_exists( 'post', $location->ID, 'address_gps' ) && ctype_graph( get_field( 'address_gps', $location->ID ) ) ) ? get_field( 'address_gps', $location->ID ) : false;
			
			$acf_gps = ( ( metadata_exists( 'post', $location->ID, 'gps_1' ) && metadata_exists( 'post', $location->ID, 'gps_2' ) ) && ( ctype_graph( get_field( 'gps_1', $location->ID ) ) && ctype_graph( get_field( 'gps_2', $location->ID ) ) ) ) ? true : false;
			
			
			if ( $address_gps != false && isset( $address_gps['address'] ) ) :

				$gps['lat'] = $address_gps['lat'];
				$gps['lng'] = $address_gps['lng'];

			elseif ( $acf_gps != false ) :

				$gps['lat'] = get_field( 'gps_1', $location->ID );
				$gps['lng'] = get_field( 'gps_2', $location->ID );

			elseif ( is_pod( $location ) ) :

				$pod = pods( $location->post_type, $location->ID, true );
				$gps['lat'] = $pod->fields('latitude');
				$gps['lng'] = $pod->fields('longitude');

			else :

				$gps = false;

			endif;
			
			if ( $gps != false && is_array( $gps ) && isset( $gps['lat'] ) && isset( $gps['lat'] ) ) 
				return $gps;

		endif;

	}

endif;