<?php
/* ---------------------------------------
*
* Determine if a post is a child or grandchild of another post
*
* @package jc-network
*
------------------------------------ */

if ( ! function_exists('is_page_tree') ) :
/*
* Determine if current page or post is
* a child of a parent page or post
------------------------------------ */
function is_page_tree($pid) {
	global $post;

	if( is_page() && ( $post->post_parent==$pid || is_page( $pid ) ) ) {
		return true;
	} else {
		return false;
	}
}
endif;

if ( ! function_exists('is_post_tree') ) :
/*
* Determine if current page or post is
* a child of a parent page or post
------------------------------------ */
function is_post_tree($pid) {
	global $post;

	if( is_singular() && ( $post->post_parent==$pid || is_singular( $pid ) ) ) {
		return true;
	} else {
		return false;
	}
}
endif;

function has_children() {
	global $post;
	return count( get_posts( array('post_parent' => $post->ID, 'post_type' => $post->post_type) ) );
}