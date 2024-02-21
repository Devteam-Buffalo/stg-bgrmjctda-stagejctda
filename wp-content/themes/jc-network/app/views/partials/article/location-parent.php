<?php
/*
**  @file               location-parent.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/18/18
*/
defined( 'ABSPATH' ) || exit;

wp_enqueue_script('map-term', ASSETS . '/js/map-term.js', ['gmaps/js'], '20180314', true);
wp_localize_script('map-term', 'mapData', ['markerIcon' => ASSETS . '/img/map-marker-blue.svg']);

$child_args = [
	'post_type'              => get_post_type(),
	'post_parent'            => get_the_id(),
	'post_status'            => ['publish'],
	'posts_per_page'         => 50,
	'orderby'                => 'menu_order title date',
	'no_found_rows'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => true,
	'lazy_load_term_meta'    => true,
];

$children = get_children( $child_args );

if ( ! ( is_wp_error( $children ) && empty( $children ) ) ) : ?>

<article class="parent-map" role="article">
	<?= jc_page_hero( [ 'post_id' => get_the_id() ] ) ?>
	
	<div class="uk-container uk-container-center">
		
		<div class="map-frame uk-visible-large">
			<div class="map-frame-container">
				<div id="locations-map-frame" class="map-markers">
					<?php foreach ( $children as $child ) : ?>
					<div class="marker map-marker" data-lat="<?= jc_gps( $child )['lat'] ?>" data-lng="<?= jc_gps( $child )['lng'] ?>">
						<h4><?= $child->page_heading ?? $child->post_title ?></h4>
						<?= apply_filters( 'the_content', ( $child->page_subheading ?? $child->post_excerpt ) ) ?>
						<a href="<?= get_permalink( $child->ID ) ?>" title="View <?php the_title_attribute( $child->ID ) ?>" class="uk-button uk-button-primary uk-width-1-1 marker-link">View Location</a>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		
			<div class="map-list-container">
				<div class="map-list">
					<div class="uk-flex uk-flex-column locations-map-list">
						<?php foreach ( $children as $child ) : ?>
						<div>
							<a href="<?= get_permalink( $child->ID ) ?>" title="View <?php the_title_attribute( $child->ID ) ?>" class="uk-link-muted">
							<div class="uk-flex">
								<div class="uk-flex-item-none map-image">
									<?php $t = ( $child->post_type == 'outdoor' ) ? pods_image_url( get_post_meta( $child->ID, 'tile_image', true )['ID'] ) : wp_get_attachment_image_url( get_post_meta( $child->ID, 'tile_image', true ) ); ?>
									<img src="<?= wpthumb( $t, ['width'=>100,'height'=>100,'crop'=>true]) ?>" width="100" alt="<?php the_title_attribute( $child->ID ) ?>">
								</div>
								<div class="map-text">
									<h5 class="uk-margin-remove"><?= $child->page_heading ?? $child->post_title ?></h5>
									<?= apply_filters( 'the_content', ( $child->page_subheading ?? $child->post_excerpt ) ) ?>
									<span class="uk-text-small">View Location <small><i class="uk-icon-chevron-right"></i></small></span>
								</div>
							</div>
							</a>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>


		<?php if ( $post->page_subheading || $post->page_intro ) : ?>
		<div class="uk-text-center"><?= jc_page_intro( $post ) ?></div>
		<?php endif ?>


		<div class="uk-block">
			<div class="masonry-tiles">
			<?php foreach ( $children as $child ) : ?>
				<a href="<?= get_permalink( $child->ID ) ?>" title="<?php the_title_attribute( $child->ID ) ?>" class="masonry-tile masonry-link">
					<?php $t = ( $child->post_type == 'outdoor' ) ? pods_image_url( get_post_meta( $child->ID, 'masonry_image', true )['ID'] ) : wp_get_attachment_image_url( get_post_meta( $child->ID, 'masonry_image', true ) ); ?>
					<img src="<?= wpthumb( $t ) ?>" alt="<?php the_title_attribute( $child->ID ) ?>" class="masonry-image">
					<h4 class="masonry-title caption caption-visible color-<?= $child->post_type ?> text-shadow small-shadow"><?= $child->page_heading ?? $child->post_title ?></h4>
				</a>
			<?php endforeach ?>
			</div>
		</div>

		<?php wp_reset_postdata() ?>
		
		<?php get_template_part( 'resource/view/partial/form/search' ,'body' ) ?>
		
		<div class="uk-block">
			<?php get_template_part( 'resource/view/layout/content/signup', 'events' ) ?>
		</div>

		<div class="uk-block">
			<h3 class="mountain"><?= ucfirst( get_post_type() ) ?>s</h3>
			<?php jc_carousel_posts( [ 'post_type' => $child_args['post_type'] ] ) ?>
		</div>
	</div>
</article>

<?php endif ?>