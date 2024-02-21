<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     SearchWP Modifications
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190316
 * @author          lpeterson
 */

namespace Jctda;

class Search_WP {
	private static $instance;

	public static function getInstance(): Search_WP {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function __construct() {
		$this->mods();
	}

	private function mods() {
		add_filter( 'searchwp_dashboard_widget', '__return_false' );

		add_filter( 'searchwp_admin_bar', '__return_false' );

		add_filter( 'searchwp_failed_index_notice', '__return_false' );

		add_filter( 'searchwp_show_conflict_notices', '__return_false' );

		add_filter( 'searchwp_show_filter_conflict_notices', '__return_false' );

		add_filter( 'searchwp_missing_integration_notices', '__return_false' );

		add_filter( 'searchwp_in_admin', '__return_false' );

		add_filter( 'searchwp_refine_and_results', '__return_false' );

		add_filter( 'searchwp_nuke_on_delete', '__return_true' );

		add_filter( 'searchwp_index_attachments', '__return_false' );

		add_filter( 'searchwp_index_comments', '__return_false' );

		add_filter( 'searchwp_omit_document_processing', '__return_true' );

		add_filter( 'searchwp_purge_pdf_content', '__return_true' );

		add_filter( 'searchwp_skip_vendor_libs', '__return_true' );

		add_filter( 'searchwp_license_key', function(){
			return '82e7a93051a3f1b42be06124b90e5cdd';
		});

		add_filter( 'searchwp_log_search', function( $log, $engine, $search_terms, $number_of_results ) {
			return ! is_user_logged_in();
		}, 10, 4 );

		add_filter( 'searchwp_settings_cap', function() {
			return 'administrator';
		});

		add_filter( 'searchwp_statistics_cap', function() {
			return 'rawlemurdy';
		});

		apply_filters( 'searchwp_file_content_limit', function( $limit ) {
			return 1000;
		});

		add_filter( 'searchwp_load_maximum', function( $load_threshold ) {
			return 0.5;
		}, 10, 1 );

		add_filter( 'searchwp_indexer_throttle', function( $wait_time ) {
			return 0.5;
		}, 10, 1 );

		add_filter( 'searchwp_indexer_max_attempts', function( $number_of_attempts ) {
			return 3;
		}, 10, 1 );

		add_filter( 'searchwp_max_delta_attempts', function( $number_of_attempts ) {
			return 3;
		}, 10, 1 );

		add_filter( 'searchwp_posts_per_page', function( $posts_per_page, $engine, $terms, $page ) {
			return 5;
		}, 10, 4 );

		add_filter( 'searchwp_post_statuses', function( $post_status, $engine ) {
			return ['publish'];
		}, 10, 2 );

		add_filter( 'searchwp_indexed_post_types', function( $post_types ) {
			$post_types = [
				'page', 'post', 'tribe_events',
				'outdoor', 'attraction', 'jc_food_drink', 'jc_lodging', 'wedding', 'town',
				'jc_trip_idea', 'jc_visitor_gallery',
			];
			return $post_types;
		});



		// add_filter( 'searchwp_live_search_base_styles', '__return_false' );

		// wp_dequeue_style( 'searchwp-live-search' );

		add_filter( 'searchwp_live_search_posts_per_page', function() {
			return 10;
		});




		// add_filter( 'searchwp_get_supports_for_post_type', function( $applicable, $context ) {
		// 	if ( 'page' === $context['post_type'] && 'excerpt' === $context['supports'] )
		// 		$applicable = false;

		// 	return $applicable;
		// }, 10, 2 );

		// add_filter( 'searchwp_omit_meta_key', function( $omit, $meta_key, $the_post ) {
		// 	$omit = false;

		// 	$keys = [
		// 		'_','wysiwyg','wpsp','wpfront','select','open','new_','website_',
		// 		'weather','script','user','unique','ugc','type','time','tile',
		// 		'masonry','hero','repeater','flex','text','number','photo','export',
		// 	];

		// 	switch ( false ) :
		// 		case strpos( $meta_key, $keys ):
		// 			$omit = false;
		// 		break;
		// 	endswitch;

		// 	return $omit;
		// }, 10, 3 );
	}
}
