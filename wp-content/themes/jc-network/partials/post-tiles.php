<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Latest blog posts displayed as linked cover tiles.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190329
 * @author          lpeterson
 */


if ( isset( $this->vars['posts'] ) )
	$post__in = $this->vars['posts'];
else
	return;

// var_dump( $this->vars['post_name__in'] );
// return;

$tile_key = md5( $post__in );
$tiles = wp_cache_get( $tile_key, 'post_tiles' );
$orderby = $this->vars['orderby'] ?? 'date';
$order = $this->vars['order'] ?? 'ASC';

if ( false === $tiles ) {
	$post_tiles = get_posts([
		'post__in' => $post__in,
		'orderby' => $orderby,
		'order' => $order,
		'perm' => 'readable',
		'post_status' => 'publish',
		'no_found_rows' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'lazy_load_term_meta' => true,
		'ignore_sticky_posts' => false,
	]);

	$tiles = [];
	foreach ( $post_tiles as $k => $v ) {
		unset( $v->post_content );
		unset( $v->post_excerpt );
		$tiles[$k] = (object) $v;
	}
	unset( $post_tiles );
	wp_cache_set( $tile_key, $tiles, 'post_tiles', 4 * HOUR_IN_SECONDS );
}

if ( empty( $tiles ) )
	return;

?>

<div class="post-tiles no-print">
	<?php get_extended_template_part('post', 'tile', [ 'tiles' => $tiles ], ['dir' => 'partials', 'cache' => 30]) ?>
</div>
