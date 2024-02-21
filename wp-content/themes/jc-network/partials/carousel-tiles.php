<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Desired posts displayed as linked cover tiles.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190327
 * @author          lpeterson
 */

$post_type = $this->vars['post_type'] ?? 'post';
$posts_per_page = $this->vars['posts_per_page'] ?? 5;
$post_parent = $this->vars['post_parent'] ?? 0;
$orderby = $this->vars['orderby'] ?? 'date';
$order = $this->vars['order'] ?? 'ASC';

// $tile_key = md5( json_encode($post_type.$posts_per_page.$post_parent) );
// $tiles = wp_cache_get( $tile_key, 'carousel_tiles' );

// if ( false === $tiles ) {
$carousel_tiles = get_posts([
	'post_type' => $post_type,
	'posts_per_page' => $posts_per_page,
	'post_parent' => $post_parent,
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
foreach ( $carousel_tiles as $k => $v ) {
	unset( $v->post_content );
	unset( $v->post_excerpt );
	$tiles[$k] = (object) $v;
}
unset( $carousel_tiles );
	// wp_cache_set( $tile_key, $tiles, 'carousel_tiles', 5 * MINUTE_IN_SECONDS );
// }

if ( empty( $tiles ) )
	return;

?>

<div class="carousel-tiles no-print">
	<?php get_extended_template_part('post', 'tile', [ 'tiles' => $tiles ], ['dir' => 'partials']) ?>
</div>
