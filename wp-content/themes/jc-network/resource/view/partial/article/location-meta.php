<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     CR Hero
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

global $post;

$args = [
	'post_type' => $post->post_type,
	'post_parent' => $post->ID
];

$posts = get_children($args);

if ( $posts ) {
	add_action( 'wp_enqueue_scripts', function() {
		wp_enqueue_script('archive/map');
	});

	if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && '174.107.196.184' == $_SERVER['HTTP_X_FORWARDED_FOR'] ) {
		get_extended_template_part('location', 'parent', ['post' => $post,'posts' => $posts], ['dir' => 'partials', 'cache' => 30]);
	}
	else {
		get_template_part( 'resource/view/partial/article/location', 'parent' );
	}
}
else {
	add_action( 'wp_enqueue_scripts',function() {
		wp_enqueue_script('single/map');
	});

	get_template_part( 'resource/view/partial/article/location', 'legacy' );
}

