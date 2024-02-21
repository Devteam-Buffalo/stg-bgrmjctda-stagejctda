<?php defined('ABSPATH') or exit;
/*
**  @file               blog-tiles.php
**  @description        Description.
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               12/4/17
*/

add_shortcode( 'blog_tiles', 'jc_blog_tiles_shortcode' );
function jc_blog_tiles_shortcode( $attributes, $content = null, $shortcode_name = 'blog_tiles' ) {
	$atts = shortcode_atts(
		[
			'title' => false,
		],
		$attributes, 
		$shortcode_name
	);
	
	$title = $atts['title'] ?? false;

	ob_start();
	
	pods_view( 'src/partials/tile/tile-latest-blog.php', compact( array_keys( get_defined_vars() ) ), DAY_IN_SECONDS, 'cache', false );
	
	return ob_get_clean();
}