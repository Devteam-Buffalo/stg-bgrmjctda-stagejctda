<?php

function parent_page_title( $parent_title ) {
	global $post;

	$current = $post->ID;
	$parent = $post->post_parent;
	$grandparent_get = get_post($parent);
	$grandparent = $grandparent_get->post_parent;

	if ( $root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current) ) {
		$parent_title = get_the_title($grandparent);
	} else {
		$parent_title = get_the_title($parent);
	}
	
	return $parent_title;
}
add_action( 'the_parent_page_title', 'parent_page_title' );
