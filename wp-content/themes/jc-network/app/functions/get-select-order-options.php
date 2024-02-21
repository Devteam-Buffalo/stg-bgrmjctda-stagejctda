<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Get a cached array of all selected landing pages, ordered however the hell the client wishes.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180604
 * @author          lpeterson
 */

function jc_get_select_order_options() {
	$key = md5( 'jc_get_select_order_options' );
	$group = 'site_options';

	$options = wp_cache_get( $key, $group );

	if ( false === $options ) {
		$misc = [ 'front_page', 'jc_trip_idea', 'jc_visitor_gallery' ];
		$types = array_merge( jc_get_location_types(), jc_get_location_taxes(), $misc );

		$options = [];

		foreach ( $types as $type ) {
			$options[$type] = get_option( 'select_order_'.$type );
		}

		wp_cache_set( $key, $options, $group, HOUR_IN_SECONDS );
	}

	return $options;
}
