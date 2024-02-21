<?php
/* ---------------------------------------
*
* Custom functions that act independently of the theme templates
*
* @package jc-network
*
------------------------------------ */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function jc_network_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'jc_network_page_menu_args' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function jc_network_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'jc_network_setup_author' );

function jc_archive_title_prefix_remover( $title ) {
    if ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
  
    return $title;
}
add_filter( 'get_the_archive_title', 'jc_archive_title_prefix_remover' );
