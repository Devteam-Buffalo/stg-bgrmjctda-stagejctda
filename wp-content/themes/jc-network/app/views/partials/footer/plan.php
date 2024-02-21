<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Plan Your Visit Sub-footer CTA Section
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/2/18
 * @file            plan.php
 */
defined('ABSPATH') or exit;

global $post;
$object = get_queried_object();

if ( $object && isset( $object->post_name ) ) {
	$current = $object->post_name;
}
else {
	$current = '';
}

$guide_key = md5( 'visitor_guide' );
$plans_key = md5( 'plan_cta' );

$guide = wp_cache_get( $guide_key, 'tile_cta' );
$plans = wp_cache_get( $plans_key, 'tile_cta' );

if ( false === $guide ) {
	$guide = get_post_field( 'ID', get_page_by_title( 'Visitor Guide' ), 'display' );
	wp_cache_set( $guide_key, $guide, 'tile_cta', HOUR_IN_SECONDS );
}
if ( false === $plans ) {
	$plans = [
		'getting-here' => get_post_field( 'ID', get_page_by_title( 'Getting Here' ), 'display' ),
		'trip-ideas' => get_post_field( 'ID', get_page_by_title( 'Trip Ideas' ), 'display' ),
		'weddings' => get_post_field( 'ID', get_page_by_title( 'Weddings' ), 'display' ),
		'towns' => get_post_field( 'ID', get_page_by_title( 'Towns' ), 'display' ),
	];
	wp_cache_set( $plans_key, $plans, 'tile_cta', HOUR_IN_SECONDS );
} ?>

<div class="uk-grid overlay-tiles plan-visit">
	<?php if ( 'visitor-guide' !== $current ) : ?>
	<div class="uk-width-medium-1-3 uk-width-small-1-2 uk-width-1-1">
		<div class="uk-overlay uk-cover tile trans-blue">
			<figure class="post-thumbnail lazyload" data-src="<?= wp_get_attachment_image_url( get_post_thumbnail_id($guide), 'tile_medium_size' ) ?>" style="background-position: center center;background-repeat: no-repeat;background-size: cover"></figure>
	
			<figcaption class="uk-overlay-panel trans-blue">
				<div class="tile_type-overlay">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?= wp_http_validate_url( CDN_ASSET."/img/icons/icon-visitor-guide.svg" ) ?>" class="uk-display-block uk-margin-bottom-small uk-align-center icon lazyload" width="38">
					<label>&nbsp;</label>
					<h3 class="uk-margin-bottom-large uk-margin-top-remove"><?= wp_kses_post( get_the_excerpt($guide) ) ?></h3>
					<button class="uk-button uk-button-large uk-button-warning">Get Yours</button>
				</div>
			</figcaption>
	
			<?php printf( '<a href="%s" title="%s" class="%s"></a>', get_permalink($guide), the_title_attribute("echo=0&post={$guide}"), esc_attr('uk-position-cover') ) ?>
		</div>
	</div>
	<?php endif ?>

	<div class="<?= ( 'visitor-guide' === $current ) ? 'uk-width-medium-1-1' : 'uk-width-medium-2-3' ?> uk-width-small-1-2 uk-width-1-1">
		<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
			<?php foreach ( $plans as $k => $v ) : ?>
			<div>
				<div class="uk-overlay uk-cover tile trans-<?= $k ?>">
					<figure class="post-thumbnail lazyload" data-src="<?= wp_get_attachment_image_url( get_post_thumbnail_id($v), 'masonry_small_size' ) ?>" style="background-position: center center;background-repeat: no-repeat;background-size: cover"></figure>
	
					<figcaption class="uk-overlay-panel">
						<div class="tile_type-overlay">
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?= wp_http_validate_url( CDN_ASSET."/img/icons/icon-{$k}.svg" ) ?>" class="uk-display-block uk-margin-bottom-small uk-align-center icon lazyload" width="38">
							<label><?= get_the_title($v) ?></label>
						</div>
					</figcaption>
	
					<?php printf( '<a href="%s" title="%s" class="%s"></a>', get_permalink($v), the_title_attribute("echo=0&post={$v}"), esc_attr('uk-position-cover') ) ?>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>