<?php
function has_children() {
	global $post;
	$children = get_children(['post_parent' => $post->ID, 'post_type' => $post->post_type]);
	if ( $children )
		return true;

	return false;
}
