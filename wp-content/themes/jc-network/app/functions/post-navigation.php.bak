<?php
/* ---------------------------------------
*
* Post navigation markup for navigating previous/next "post" post types
*
* @package jc-network
*
------------------------------------ */

if ( ! function_exists('jc_network_post_nav') ) :
	/*
	* Post Navigation
	------------------------------------ */
	function jc_network_post_nav() {
		$previous	= ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next		= get_adjacent_post( false, '', false );
	
		if ( ! $next && ! $previous ) {
			return;
		}
		?>
	
		<nav class="post-navigation" role="navigation">
		<?php
		previous_post_link(
			'<div class="uk-width-1-2 uk-float-left uk-text-left nav-previous">%link</div>',
			_x( '<span class="meta-nav"><i class="uk-icon-long-arrow-left"></i></span>&nbsp;Previous Post', 'Previous post link',
			'jc-network'
		) );
	
		next_post_link(
			'<div class="uk-width-1-2 uk-float-right uk-text-right nav-next">%link</div>',
			_x( 'Next Post &nbsp;<span class="meta-nav"><i class="uk-icon-long-arrow-right"></i></span>',
			'Next post link',
			'jc-network'
		) );
		?>
		</nav>
	
		<?php
	}
endif;