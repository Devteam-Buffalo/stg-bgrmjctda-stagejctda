<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Creates a contextual data layer to assist in the prevention of running hundreds of conditionals throughout the site.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            7/1/18
 * @file            context.php
 */
defined('ABSPATH') or exit;

/**
 * This function is useful for making dynamic/contextual classes, action and filter hooks, 
 * and handling the templating system. It returns an array of contexts based on what page 
 * a visitor is currently viewing on the site.
 *
 * Note that time and date can be tricky because any of the conditionals may be true on time-/date-
 * based archives depending on several factors. For example, one could load an archive for a specific
 * second during a specific minute within a specific hour on a specific day and so on.
 *
 * @since  2.1.0
 * @access public
 * @return array
 */
function jc_context() {

	// Set some variables for use within the function.
	$context   = [];
	$object    = get_queried_object();
	$object_id = get_queried_object_id();

	$types = ['outdoor','attraction','town','wedding','jc_outdoor','jc_attraction','jc_food_drink','jc_lodging','jc_town','jc_wedding'];
	$taxes = ['jc_food_amenity','jc_food_type','jc_lodging_accommodation','jc_lodging_amenity','jc_lodging_type','jc_camping_amenity'];

	// Front page of the site.
	if ( is_front_page() )
		$context[] = 'front-page';

	// Blog page.
	if ( is_home() || is_singular('post') || is_archive() || is_author() || is_search() ) {
		$context[] = 'blog';
	}

	// Singular views.
	elseif ( is_singular() ) {
		$context[] = 'singular';
		$context[] = "singular-{$object->post_type}";
		$context[] = "singular-{$object->post_type}-{$object_id}";
		$context[] = in_array( $object->post_type, $types ) ? 'location-type location-single has-hero' : 'non-location-type';
	}

	// Archive views.
	elseif ( is_archive() ) {
		$context[] = 'archive';

		// Post type archives.
		if ( is_post_type_archive() ) {
			$post_type = get_query_var( 'post_type' );

			if ( is_array( $post_type ) )
				reset( $post_type );

			$context[] = "archive-{$post_type}";
			
			$context[] = in_array( $post_type, $types ) ? 'location-type location-archive has-hero' : 'non-location-type';
		}

		// Taxonomy archives.
		if ( is_tax() || is_category() || is_tag() ) {
			$context[] = 'taxonomy';
			$context[] = "taxonomy-{$object->taxonomy}";

			$slug = 'post_format' == $object->taxonomy ? str_replace( 'post-format-', '', $object->slug ) : $object->slug;

			$context[] = "taxonomy-{$object->taxonomy}-" . sanitize_html_class( $slug, $object->term_id );

			$context[] = in_array( $object->taxonomy, $taxes ) ? 'location-type location-taxonomy has-hero' : 'non-location-type';
		}

		// User/author archives.
		if ( is_author() ) {
			$user_id = get_query_var( 'author' );
			$context[] = 'user';
			$context[] = 'user-' . sanitize_html_class( get_the_author_meta( 'user_nicename', $user_id ), $user_id );
		}

		// Date archives.
		if ( is_date() ) {
			$context[] = 'date';

			if ( is_year() )
				$context[] = 'year';

			if ( is_month() )
				$context[] = 'month';

			if ( get_query_var( 'w' ) )
				$context[] = 'week';

			if ( is_day() )
				$context[] = 'day';
		}

		// Time archives.
		if ( is_time() ) {
			$context[] = 'time';

			if ( get_query_var( 'hour' ) )
				$context[] = 'hour';

			if ( get_query_var( 'minute' ) )
				$context[] = 'minute';
		}
	}

	// Search results.
	elseif ( is_search() ) {
		$context[] = 'search';
	}

	// Error 404 pages.
	elseif ( is_404() ) {
		$context[] = 'error-404';
	}

	/**
	 * HTTP Save-Data Requested
	 *
	 * @see https://developers.google.com/web/fundamentals/performance/optimizing-content-efficiency/save-data/
	 * @var http_header $_SERVER['HTTP_SAVE_DATA'] Check if the `Save-Data` header exists and is set to a value of "on"
	 */ 
	if ( isset( $_SERVER['HTTP_SAVE_DATA'] ) && strtolower( $_SERVER['HTTP_SAVE_DATA'] ) === "on" ) {
		$context[] = 'save-data:on';
	}
	else {
		$context[] = 'save-data:off';
	}

	/**
	 * Do Not Track - Exclude all tracking tools (e.g. GTM, GA, etc.)
	 *
	 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/DNT
	 * @var http_header $_SERVER['HTTP_DNT'] Check if the user prefers not to be tracked
	 */ 
	if ( isset( $_SERVER['HTTP_DNT'] ) && $_SERVER['HTTP_DNT'] === "1" ) {
		$context[] = 'dnt:on';
	}
	else {
		$context[] = 'dnt:off';
	}

	return array_map( 'esc_attr', apply_filters( 'jc_context', array_unique( $context ) ) );
}
