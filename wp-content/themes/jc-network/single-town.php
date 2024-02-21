<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Single location post template.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190326
 * @author          lpeterson
 */

global $post;

$args = [
	'post_type' => $post->post_type,
	'post_parent' => $post->ID,
	'post_status' => 'publish',
	'numberposts' => 50,
	'perm' => 'readable',
	'orderby' => 'menu_order title date',
	'order' => 'ASC',
	'no_found_rows' => true,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
	'lazy_load_term_meta' => true,
];

$children = get_children($args);

get_header();

if ( $children ) {
	// if ( '174.107.196.184' == $_SERVER['HTTP_X_FORWARDED_FOR'] || current_user_can( 'administrator' ) || current_user_can( 'rawlemurdy' ) ) {
	// 	add_action( 'wp_enqueue_scripts', function() {
	// 		wp_enqueue_script('archive/map');
	// 	});
	// }

	get_extended_template_part('location', 'parent', ['posts' => $children,'post' => $post], ['dir' => 'partials']);
}
else {
	add_action( 'wp_enqueue_scripts', function() {
		wp_enqueue_script('single/map');
	});

	get_template_part( 'partials/location', 'legacy' );
}

get_footer();
