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
 * @since           20190327
 * @author          lpeterson
 */

$posts_key = md5( time() );
$blog_tiles = wp_cache_get( $posts_key, 'tile_cta' );

if ( false === $blog_tiles ) {
	$blog_posts = get_posts([
		'post_type' => 'post',
		'posts_per_page' => 5,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'perm' => 'readable',
		'no_found_rows' => true,
		'cache_results' => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'lazy_load_term_meta' => true,
		'ignore_sticky_posts' => false,
	]);

	$blog_tiles = [];
	foreach ( $blog_posts as $k => $v ) {
		unset( $v->post_content );
		unset( $v->post_excerpt );
		$blog_tiles[$k] = (object) $v;
	}
	unset( $blog_posts );
	wp_cache_set( $posts_key, $blog_tiles, 'tile_cta', 4 * HOUR_IN_SECONDS );
}

if ( empty( $blog_tiles ) )
	return;

?>

<div class="blog-tiles no-print">
	<?php foreach ( $blog_tiles as $tile ) : ?>
	<figure class="blog-tile cover" data-post-type="<?= $tile->post_type ?>">
		<?= get_the_post_thumbnail( $tile->ID, 'card' ) ?>
		<figcaption>
			<div>
				<svg style="max-width:40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 38"><g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linejoin="round"><path stroke-linecap="round" stroke-width="2" d="M2.562 1C1.699 1 1 1.624 1 2.393v23.2c0 .769.7 1.392 1.562 1.392H31.78l7.09 9.4V2.393c0-.77-.7-1.393-1.562-1.393H2.562z"/><path d="M5.145 7.966h9.63M5.145 13.909h19.39M5.145 19.851h28.89"/></g></svg>
				<h5>
					<time datetime="<?= get_the_date('c', $tile->ID) ?>" itemprop="datePublished">
						<?= get_the_date('m.d.Y', $tile->ID) ?>
					</time>
				</h5>
				<h6><?= $tile->post_title ?></h6>
				<button>Read More</button>
			</div>
		</figcaption>
		<?= wp_sprintf('<a href="%s" title="%s"></a>', get_the_permalink( $tile->ID ), the_title_attribute([ 'echo' => false, 'post' => $tile->ID ]) ) ?>
	</figure>
	<?php endforeach ?>
</div>
