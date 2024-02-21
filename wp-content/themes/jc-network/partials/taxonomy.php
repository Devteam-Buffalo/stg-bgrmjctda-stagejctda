<?php
/*
**  @file               location-term.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/22/18
*/
defined( 'ABSPATH' ) || exit;

function get_location_data_list( $data ) {
	$pods = pods( $data->post_type, $data->ID );
	$icon = CDN_URL.'/assets/img/jctda-default-'.$data->post_type.'-icon.svg';

	$output = array(
		'lat'  => $pods->row()['latitude'],
		'lon'  => $pods->row()['longitude'],
		'name' => $pods->row()['business_name'],
		'desc' => $pods->row()['summary'] ?: $pods->row()['short_description'],
		'img'  => $pods->row()['featured_photo'] ?: $icon,
		'url'  => get_permalink( $data->ID ),
	);

	return $output;
}
?>
<style>
	.map-markers > .map-marker{display: none}
</style>
<article class="parent-map" role="article">
	<?= jc_page_hero( ['image_url' => $image_url, 'title' => single_term_title( '', false )] ) ?>

	<div class="uk-container uk-container-center">

	<?php if ( $_SERVER['HTTP_X_FORWARDED_FOR'] && '174.107.196.184' == $_SERVER['HTTP_X_FORWARDED_FOR'] ) : ?>

		<?php get_template_part( 'partials/map-collection' ) ?>

	<?php else : ?>

		<div class="map-frame uk-visible-large no-print">
			<div class="map-frame-container">
				<div id="locations-map-frame" class="map-markers">
					<?php foreach( $posts as $post ) : $data = get_location_data_list( $post ); ?>
					<div class="marker map-marker" data-lat="<?= $data['lat']; ?>" data-lng="<?= $data['lon']; ?>">
						<h4><?= $data['name']; ?></h4>
						<?= apply_filters( 'the_content', $data['desc'] ) ?>
						<a href="<?= $data['url'] ?>" title="View <?= $data['name'] ?>" class="uk-button uk-button-primary uk-width-1-1 marker-link">View Location</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="map-list-container">
				<div class="map-list">
					<div class="uk-flex uk-flex-column locations-map-list">
						<?php foreach( $posts as $post ) : $data = get_location_data_list( $post ); ?>
						<div>
							<a href="<?= $data['url'] ?>" title="View <?= $data['name'] ?>" class="uk-link-muted">
							<div class="uk-flex">
								<div class="uk-flex-item-none map-image">
									<img src="<?= wpthumb( $data['img'], ['width'=>100,'height'=>100,'crop'=>true] ) ?>" width="100" alt="<?= $data['name'] ?>">
								</div>
								<div class="map-text">
									<h5 class="uk-margin-remove"><?= $data['name'] ?></h5>
									<?= apply_filters( 'the_content', $data['desc'] ) ?>
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

	<?php endif ?>

		<div class="uk-block uk-padding-top-remove no-print">
			<div class="uk-text-center intro print">
				<h2><?= apply_filters( 'the_title', single_term_title( '', false ) ) ?></h2>

				<?php if ( metadata_exists( 'term', get_queried_object_id(), 'page_subheading' ) ) : ?>
					<h3><?= get_metadata( 'term', get_queried_object_id(), 'page_subheading', true ) ?></h3>
				<?php endif ?>

				<?php if ( !empty( term_description() ) ) : ?>
					<p><?= apply_filters( 'the_content', term_description() ) ?></p>
				<?php endif ?>
			</div>
		</div>


		<div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-1-1 no-print" data-uk-grid-margin>
			<?php foreach( $posts as $post ) : $data = get_location_data_list( $post ); ?>
			<div>
				<a href="<?= $data['url']; ?>" title="View <?= $data['name']; ?>" class="uk-grid uk-grid-small uk-link-muted">
					<div class="uk-width-1-4">
						<img src="<?= wpthumb( $data['img'], ['width'=>100,'height'=>100,'crop'=>true] ) ?>" width="100" alt="<?= $data['name'] ?>">
					</div>

					<div class="uk-width-3-4">
						<h4 class="uk-margin-remove"><?php echo $data['name']; ?></h4>
						<p class="uk-margin-remove sans-light"><?= $data['desc'] ?></p>
					</div>
				</a>
			</div>
			<?php endforeach; ?>
		</div>

		<?php wp_reset_postdata() ?>

		<?php get_template_part( 'resource/view/partial/form/search', 'body' ) ?>

		<div class="uk-block no-print">
			<h3 class="mountain"><?= get_post_type_object( get_post_type() )->labels->singular_name; ?></h3>
			<?php jc_carousel_taxonomy( $taxonomy ) ?>
		</div>
	</div>
</article>
