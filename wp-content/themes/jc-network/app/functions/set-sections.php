<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */


// function get_sections() {
	// global $wp_post_types;

	// $key = md5( __NAMESPACE__ .'_'. __FUNCTION__ );
	// $sections = wp_cache_get( $key, __FUNCTION__ );

	// if ( false === $sections ) {
		// $page_args = [
			// 'fields' => 'ids',
			// 'orderby' => 'menu_order',
			// 'order' => 'ASC',
			// 'perm' => 'readable',
			// 'post_status' => 'publish',
			// 'no_found_rows' => true,
			// 'update_post_meta_cache' => true,
			// 'update_post_term_cache' => true,
			// 'lazy_load_term_meta' => true,
			// 'ignore_sticky_posts' => false,
		// 	'numberposts' => 50,
		// ];
		// $tax_args = [
			// 'fields' => 'ids',
			// 'orderby' => 'term_id',
		// 	'hide_empty' => true,
		// 	'update_term_meta_cache' => true,
		// 	'hierarchical' => false,
		// 	'number' => 100,
		// ];

		// $sections = (object) [
		// 	'outdoors' => [
		// 		'object' => $wp_post_types['outdoor'],
		// 		'singular' => $wp_post_types['outdoor']->labels->singular_name,
		// 		'plural' => $wp_post_types['outdoor']->labels->name,
		// 		'icon' => $wp_post_types['outdoor']->menu_icon,
		// 		'post_type' => $wp_post_types['outdoor']->name,
		// 		'slug' => $wp_post_types['outdoor']->rewrite['slug'],
				// 'post_parents' => get_children([ 'post_type' => $wp_post_types['outdoor']->name,'post_parent' => 0 ] + $page_args),
			// 	'page' => get_page_by_path( $wp_post_types['outdoor']->rewrite['slug'], OBJECT, 'page' ),
			// 	'menu_class' => $wp_post_types['outdoor']->rewrite['slug'].' --primary --link',
			// 	'taxonomies' => null,
			// ],
			// 'attractions' => [
			// 	'object' => $wp_post_types['attraction'],
			// 	'singular' => $wp_post_types['attraction']->labels->singular_name,
			// 	'plural' => $wp_post_types['attraction']->labels->name,
			// 	'icon' => $wp_post_types['attraction']->menu_icon,
			// 	'post_type' => $wp_post_types['attraction']->name,
			// 	'slug' => $wp_post_types['attraction']->rewrite['slug'],
				// 'post_parents' => get_children([ 'post_type' => $wp_post_types['attraction']->name,'post_parent' => 0 ] + $page_args),
			// 	'page' => get_page_by_path( $wp_post_types['attraction']->rewrite['slug'], OBJECT, 'page' ),
			// 	'menu_class' => $wp_post_types['attraction']->rewrite['slug'].' --primary --link',
			// 	'taxonomies' => null,
			// ],
			// 'food' => [
			// 	'object' => $wp_post_types['jc_food_drink'],
			// 	'singular' => $wp_post_types['jc_food_drink']->labels->singular_name,
			// 	'plural' => $wp_post_types['jc_food_drink']->labels->name,
			// 	'icon' => $wp_post_types['jc_food_drink']->menu_icon,
			// 	'post_type' => $wp_post_types['jc_food_drink']->name,
			// 	'slug' => $wp_post_types['jc_food_drink']->rewrite['slug'],
				// 'post_parents' => get_terms([ 'taxonomy' => $wp_post_types['jc_food_drink']->taxonomies, 'cache_domain' => $key.'_jc_food_drink' ] + $tax_args),
			// 	'page' => get_page_by_path( $wp_post_types['jc_food_drink']->rewrite['slug'], OBJECT, 'page' ),
			// 	'menu_class' => $wp_post_types['jc_food_drink']->rewrite['slug'].' --primary --link',
			// 	'taxonomies' => $wp_post_types['jc_food_drink']->taxonomies,
			// ],
			// 'lodging' => [
			// 	'object' => $wp_post_types['jc_lodging'],
			// 	'singular' => $wp_post_types['jc_lodging']->labels->singular_name,
			// 	'plural' => $wp_post_types['jc_lodging']->labels->name,
			// 	'icon' => $wp_post_types['jc_lodging']->menu_icon,
			// 	'post_type' => $wp_post_types['jc_lodging']->name,
			// 	'slug' => $wp_post_types['jc_lodging']->rewrite['slug'],
				// 'post_parents' => get_terms([ 'taxonomy' => $wp_post_types['jc_lodging']->taxonomies, 'cache_domain' => $key.'_jc_lodging' ] + $tax_args),
		// 		'page' => get_page_by_path( $wp_post_types['jc_lodging']->rewrite['slug'], OBJECT, 'page' ),
		// 		'menu_class' => $wp_post_types['jc_lodging']->rewrite['slug'].' --primary --link',
		// 		'taxonomies' => $wp_post_types['jc_lodging']->taxonomies,
		// 	],
		// 	'trip' => [
		// 		'object' => null,
		// 		'singular' => null,
		// 		'plural' => null,
		// 		'icon' => null,
		// 		'post_type' => null,
		// 		'slug' => null,
		// 		'post_parents' => null,
		// 		'page' => get_page_by_path( 'your-trip', OBJECT, 'page' ),
		// 		'menu_class' => '--primary --link',
		// 		'taxonomies' => null,
		// 	],
		// ];

		// $sections->trip['singular'] = $sections->trip['page']->post_title;
		// $sections->trip['slug'] = $sections->trip['page']->post_name;
		// $sections->trip['post_type'] = $sections->trip['page']->post_type;
		// $sections->trip['post_parents'] = get_children([ $sections->trip['page']->post_type,'post_parent' => $sections->trip['page']->ID ] + $page_args);
		// $sections->trip['menu_class'] = $sections->trip['page']->post_name.' '.$sections->trip['menu_class'];

		// wp_cache_set( $key, $sections, __FUNCTION__, 5 * MINUTE_IN_SECONDS );
	// }

	// return $sections;
// }

// $GLOBALS['sections'] = get_sections();
