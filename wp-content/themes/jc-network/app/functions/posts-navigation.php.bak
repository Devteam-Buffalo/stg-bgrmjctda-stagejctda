<?php
/*
**	@file	 posts-navigation.php
**	
**	@desc	 
**	
**	@path	 
**	@package 
**	@author	 Lee Peterson
**	@date	 5/17/17
*/


if ( ! function_exists( 'the_post_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 * Based on paging nav function from Twenty Fourteen
	 */
	
	function the_post_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
	
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
	
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
	
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
	
		// Set up paginated links.
		$links = paginate_links( array(
			'base'               => $pagenum_link,
			'format'             => $format,
			'total'              => $GLOBALS['wp_query']->max_num_pages,
			'current'            => $paged,
			'mid_size'           => 5,
			'add_args'           => array_map( 'urlencode', $query_args ),
			'show_all'           => true,
			'end_size'           => 1,
			'prev_next'          => true,
			'prev_text'          => __('<span class="uk-position-center-left" uk-pagination-prev uk-icon="icon: chevron-left">Prev<span>', 'spcsa'),
			'next_text'          => __('<span class="uk-position-center-right" uk-pagination-next uk-icon="icon: chevron-right">Next<span>', 'spcsa'),
			'type'               => 'array',
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		) );
	
		if ( $links ) {

			echo '<h1 class="uk-visible screen-reader-text">Posts Navigation</h1>';
			
			echo '<hr class="uk-divider-icon">';

			echo '<nav class="jc-post-nav post-pagination">';
				
				echo '<ul class="uk-position-relative uk-pagination uk-flex uk-flex-center">';
				
					foreach( $links as $link ) {
						
						echo '<li>' . $link . '</li>';
						
					}
				
				echo '</ul>';
				
			echo '</nav>';

		}

	}

}