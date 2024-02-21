<?php
if( ! function_exists( 'get_post_depth' ) ) {
	/* ---------------------------------------
	*
	* Get the depth of the current post.
	*
	* Useful for determining if a post (be it a post, page, attachment, CPT, etc.) 
	* sits top-level, is a parent, child or grandchild, and where it sits within 
	* its hierarchy, if any.
	* 
	* @param $post
	* @returns integer
	*
	* Example:
	* if( get_page_depth( 2 == $post->ID ) {
	*	// Current post is a grandchild
	* }
	*
	------------------------------------ */
	function get_post_depth( $post ) {
		if( ! $post ) {
			return;
		}
		
		$parent_id = $post->post_parent;
		$depth = 0;
		
		while( $parent_id > 0 ) {
			$parent = get_post( $parent_id );
			$parent_id = $post->post_parent;
			$depth++;
		}
		
		return $depth;
	}
}

if( ! function_exists( 'find_post_depth' ) ) {
	function find_post_depth() {
		global $post;
		$parent = 0;
		$level = 1;
		if ($post->post_parent) {
			$parent = get_post($post->post_parent);
			$parents_parent = get_post($parent->post_parent);
			$parent_of_parents_parent = get_post($parents_parent->post_parent);
		} else {
			return $level;
		}
	
		// if the parent post has no parent we are at level two
		if ($parent->post_parent == false) {
			$level = 2;
		// if the parent of the parent post has no parent we are level three
		} elseif ($parents_parent->post_parent == false) {
			$level = 3;
		// if the parent of the parent posts parent has no parent we are at level four
		} elseif ($parent_of_parents_parent->post_parent == false) {
			$level = 4;
		} else {
			$level = 0; // anything over 4 levels
		}
	
		return $level;
	}
}

if( ! function_exists( 'get_depth' ) ) {
function get_depth($id = '', $depth = '', $i = 0)
{
	global $wpdb;

	if($depth == '')
	{
		if(is_page())
		{
			if($id == '')
			{
				global $post;
				$id = $post->ID;
			}
			$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_category())
		{

			if($id == '')
			{
				global $cat;
				$id = $cat;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_single())
		{
			if($id == '')
			{
				$category = get_the_category();
				$id = $category[0]->cat_ID;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
	}
	elseif($depth == '0')
	{
		return $i;
	}
	elseif(is_single() || is_category())
	{
		$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
	elseif(is_page())
	{
		$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
}
}
