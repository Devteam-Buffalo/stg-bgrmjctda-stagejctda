<?php
/*
**  @file    custom-statuses.php
**  
**  @desc    
**  
**  @path    /custom-statuses.php
**  @package public
**  @author  Lee Peterson
**  @date    7/15/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

// Create custom In Progress post type status
add_action( 'init', function() {
	$args = array(
		'label'                     => _x( 'In Progress', 'Status General Name', 'jc-network' ),
		'label_count'               => _n_noop( 'In Progress (%s)',  'In Progress (%s)', 'jc-network' ), 
		'public'                    => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'exclude_from_search'       => true,
	);
	
	register_post_status( 'in_progress', $args );
}, 0 );

// Create custom In Review post type status
add_action( 'init', function() {
	$args = array(
		'label'                     => _x( 'In Review', 'Status General Name', 'jc-network' ),
		'label_count'               => _n_noop( 'In Review (%s)',  'In Review (%s)', 'jc-network' ), 
		'public'                    => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'exclude_from_search'       => true,
	);
	
	register_post_status( 'in_review', $args );
}, 0 );

// Add custom post type statuses to the request
add_filter( 'request', function($vars) {
	global $typenow;

	if( 'lodgings' === $typenow || 'food_drink' === $typenow ) {
		if ( isset( $vars['post_status'] ) ) {
			$vars['post_status'] = 'in_progress';
			$vars['post_status'] = 'in_review';
		}
	}

	return $vars;
} );

// Make custom In Progress post type status selectable
add_action( 'post_submitbox_misc_actions', function() { ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#post-status-select select').append("<option value=\"in_review\" <?php selected('in_review', $post->post_status); ?>>In Review</option><option value=\"in_progress\" <?php selected('in_progress', $post->post_status); ?>>In Progress</option>");
	} );
	</script><?php
} );

// Make custom In Progress post type status selectable
add_action( 'admin_footer', function() { ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.inline-edit-status select').append("<option value=\"in_review\" <?php selected('in_review', $post->post_status); ?>>In Review</option><option value=\"in_progress\" <?php selected('in_progress', $post->post_status); ?>>In Progress</option>");
	} );
	</script><?php
} );