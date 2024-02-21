<?php
/*
**  @file    next-prev-page.php
**  
**  @desc    https://gist.github.com/billerickson/6907499
**  
**  @path    /Volumes/☢/Users/devnull/Library/Caches/Coda 2/1843B04E-ED48-4C98-998F-2E1C3D562A3D
**  @package spcsa
**  @author  Lee Peterson
**  @date    5/23/17
*/

/**
 * Add Previous/Next Pages links
 *
 * @param string $content
 * @return string
 */
function page_prev_next( $content ) {
  if( !is_page() )
		return $content;
	
	$link = wp_link_pages( array( 'before' => '<p class="pages">' . __( 'Pages:', 'genesis' ), 'after' => '</p>', 'echo' => false ) );	
	$link .= wp_link_pages( array( 'before' => '<p class="pages prev-next">', 'next_or_number' => 'next', 'after' => '</p>', 'show_all_link' => false, 'echo' => false ) );
	
	return $content . $link;
}