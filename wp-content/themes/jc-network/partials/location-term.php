<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

global $post;
$term_id  = get_queried_object_id();

$args = [
	'post_type' => $type,
	'tax_query' => [
		[
			'taxonomy' => $taxonomy,
			'field' => 'term_id',
			'terms' => $term_id
		]
	],
	'posts_per_page' => 99,
	'offset' => 0,
	'orderby' => 'rand',
	'post_status' => 'publish'
];
$posts = get_posts( $args );
$pods_term   = pods( $taxonomy, $term_id );
$image_urls  = $pods_term->row()['image_urls'];
$image_urls  = $image_urls ? explode('|', $image_urls) : false;
$image_url = is_array( $image_urls ) ? $image_urls[0] : get_option('cdn_url')."/assets/img/jctda-default-{$type}-hero.jpg";

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
<main>
	<article class="parent-map" role="article">
		<?= jc_page_hero( ['image_url' => $image_url, 'title' => single_term_title( '', false )] ) ?>

		<div class="uk-container-center uk-visible-large no-print" style="max-width:1400px;transform:translateY(-120px)">
			<div class="uk-width-1-1 background-white" style="border: 1px solid var(--light-grey);box-shadow: 0 2px 5px var(--trans);">
				<div class="uk-grid uk-grid-collapse">
					<div class="uk-width-3-10">
						<div class="uk-flex uk-flex-column uk-overflow-container" style="height:625px">
							<?php foreach ( $posts as $post ) : $data = get_location_data_list( $post ); ?>
							<div class="uk-position-relative" style="height:130px;border-bottom:1px solid var(--faint)">
								<div class="uk-flex uk-padding-small">
									<div class="uk-flex-item-none uk-margin-small-right" style="width:120px;height:120px;background: center/cover no-repeat url(<?= $data['img'] ?>)"></div>
									<div class="uk-flex-item-auto uk-overflow-hidden">
										<h5 class="uk-margin-remove uk-h6"><?= $data['name'] ?></h5>
										<p style="margin:.25rem 0;font-size:.875rem"><?= $data['desc'] ?></p>
										<!-- <span style="font-size:.875rem">View Location <i class="uk-icon-chevron-right"></i></span> -->
									</div>
								</div>
								<a href="<?= $data['url'] ?>" title="View <?= $data['name'] ?>" class="uk-position-cover"></a>
							</div>
							<?php endforeach ?>
						</div>
					</div>

					<div class="uk-width-7-10">
						<div id="locations-map-frame" class="uk-width-1-1 uk-overflow-hidden" style="height:625px">
							<?php foreach ( $posts as $post ) : $data = get_location_data_list( $post ); ?>
							<div class="marker map-marker" data-lat="<?= $data['lat']; ?>" data-lng="<?= $data['lon']; ?>">
								<h4><?= $data['name']; ?></h4>
								<?= apply_filters( 'the_content', $data['desc'] ) ?>
								<a href="<?= $data['url'] ?>" title="View <?= $data['name'] ?>" class="uk-button uk-button-primary uk-width-1-1 marker-link">View Location</a>
							</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="uk-container uk-container-center">
			<div class="uk-block uk-padding-top-remove">
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

			<?php get_template_part( 'partials/search-body' ) ?>

			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small signup-event no-print">
				<div>
					<?php get_template_part( 'partials/signup-widget' ) ?>
				</div>

				<div>
					<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
				</div>
			</div>

			<div class="uk-block no-print">
				<h3 class="mountain"><?= get_post_type_object( get_post_type() )->labels->singular_name; ?></h3>
				<?php jc_carousel_taxonomy( $taxonomy ) ?>
			</div>
		</div>
	</article>
</main>
