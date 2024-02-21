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

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script('googlemaps', '//maps.googleapis.com/maps/api/js?key='.env('GOOGLE_KEY'), [], null, true);
	wp_enqueue_script('jctda-maps', JCTDA_TEMPLATE_URL.'/assets/js/frontend/maps.js', ['googlemaps'], null, true);
	wp_localize_script('jctda-maps', 'mapData', ['pin' => JCTDA_TEMPLATE_URL.'/dist/img/map-pin.svg']);
});

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

if ( $children )
	get_extended_template_part('post', 'parent', ['posts' => $children,'post' => $post], ['dir' => 'partials']);
else
	get_extended_template_part('post', 'single', ['post' => $post], ['dir' => 'partials']);

get_footer();
