<?php
/* ---------------------------------------
*
* Meta title fallback when SEO Framework isn't making use of it
*
* @package jc-network
*
------------------------------------ */

if ( ! function_exists('jc_network_site_title') ) :
/*
* Create a Better Site Title
------------------------------------ */
function jc_network_site_title( $title, $sep ) {
	$title = "";

	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	$title				.= get_bloginfo( 'name', 'display' );
	$site_description 	 = get_field( 'location_tagline', 'option' );

	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
//add_filter( 'wp_title', 'jc_network_site_title', 10, 2 );
endif;