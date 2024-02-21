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

$post = $this->vars['post'] ?? $wp_query->post;

$hero = $post->cr_id
	? jc_cr_hero(['cr_id' => $post->cr_id])
	: has_post_thumbnail( $post->ID )
		? jc_page_hero(['image_url' => get_the_post_thumbnail_url($post->ID, 'hero')])
		: false;

$heading = $post->heading ?: $post->post_title;
$subheading = $post->subheading ? apply_filters( 'the_title', $post->subheading ) : false;
$intro = $post->intro ?: $post->summary ?: $post->short_description ?: $post->post_excerpt;
$content = $post->long_description ?: $post->post_content;
$address = $post->full_address ?: false;
$street = $post->physical_address_1 ?: false;
$city = $post->physical_city ?: false;
$state = $post->physical_state ?: false;
$zip = $post->physical_zip_code ?: false;
$latitude = $post->latitude ?: false;
$longitude = $post->longitude ?: false;
$phone = $post->phone_number ?: false;
$website = $post->website ?: false;
$email = $post->email_address ?: false;
$accessibility = $post->accessibility ?: false;
$difficulty = $post->difficulty ?: false;
$rating = $post->photo_rating ?: false;
$hike = $post->hike_description ?: false;
$notices = $post->notices ?: false;
$safety = $post->safety ?: false;
$cr_id = $post->cr_id ?: false;
$photos[] = null; ?>

<main>
	<article class="post-article" role="article">
		<?= $hero ?>
		<section class="uk-container uk-container-center single-location">
			<div class="uk-grid">
				<div class="uk-width-large-7-10 uk-width-1-1 location-details left-column print">
					<div class="location-intro">
						<div class="intro<?php if ( $post->centered_intro ) echo ' uk-text-center'; if ( $post->styled_intro ) echo ' styled'; ?>">
							<h1><?= apply_filters( 'the_title', $heading ) ?></h1>

							<?php if ( $subheading ) : ?>
								<h3><?= $subheading ?></h3>
							<?php endif ?>

							<?= apply_filters( 'the_excerpt', $intro ) ?>
						</div>
					</div>

					<div id="location-contact" class="location-contact">
						<h4>Contact Information</h4>
						<div class="uk-flex-inline">
							<?php
							get_extended_template_part('location', 'directions', [
								'post' => $post,
								'address' => $address,
								'street' => $street,
								'city' => $city,
								'state' => $state,
								'zip' => $zip,
								'latitude' => $latitude,
								'longitude' => $longitude,
							], ['dir' => 'partials']);
							?>

							<?php if ( $post->website ) : ?>
							<a href="<?= sanitize_url( $post->website ) ?>" title="Visit <?= sanitize_url( $post->website ) ?>" rel="noopener nofollow" target="_blank">
								Visit Website<br>
								<?= sanitize_url( $post->website ) ?>
							</a>
							<?php endif ?>

							<?php if ( $post->email_address ) : ?>
							<a href="mailto:<?= antispambot( $post->email_address ) ?>" title="Email <?= antispambot( $post->email_address ) ?>" rel="noopener nofollow" target="_blank">
								Email Location<br>
								<?= antispambot( $post->email_address ) ?>
							</a>
							<?php endif ?>

							<?php if ( $post->phone_number ) : ?>
							<a href="tel:<?= sanitize_meta( $post->phone_number ) ?>" title="Call <?= sanitize_meta( $post->phone_number ) ?>" rel="noopener nofollow" target="_blank">
								Call Location<br>
								<?= sanitize_meta( $post->phone_number ) ?>
							</a>
							<?php endif ?>
						</div>
						<div class="uk-block uk-padding-bottom-remove">
							<?= apply_filters( 'the_content', $content.$accessibility.$hike.$notices.$safety ) ?>
						</div>
						<?php if ( $photos ) : ?>
						<div class="photos">
							<ul class="uk-tab">
								<?php foreach( $photos as $k => $v ) : ?>

								<?php endforeach ?>
							</ul>
							<ul>
								<?php foreach( $photos as $k => $v ) : ?>

								<?php endforeach ?>
							</ul>
						</div>
						<?php endif ?>
					</div>
				</div>
				<aside role="complementary" class="uk-width-large-3-10 uk-width-1-1 location-sidebar right-column">
					<div id="map" style="width:100%;height:30rem">
						<figure data-post-type="<?= $post->post_type ?>" data-map-lat="<?= $latitude ?>" data-map-lng="<?= $longitude ?>" class="--marker">
							<div class="uk-flex uk-flex-top uk-flex-space-between">
								<figcaption class="uk-flex-item-1">
									<h6><?= $heading ?></h6>
									<p><?= $subheading ?></p>
									<button>View Details</button>
								</figcaption>
							</div>
						</figure>
					</div>

					<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
					<div class="uk-padding-vertical location-meta collapsible">
						<h6 class="collapsible-header location-meta-info">Send this Location via Text Message</h6>
						<div class="collapsible-content">
								<?= do_shortcode( '[gravityform id="13" title="false" description="false" ajax="true"]' ) ?>
						</div>
					</div>
					<?php endif ?>

					<?php if ( is_singular( 'outdoor' ) ) : ?>
						<div class="uk-padding-vertical location-meta collapsible">
							<h6 class="collapsible-header location-meta-info">Outdoor Location Details</h6>
							<div class="collapsible-content">
								<?php if ( isset($post->distance) && ! empty($post->distance) ) : ?>
								<dl class="uk-description-list-horizontal">
									<dt>Distance:</dt>
									<dd><?= $post->distance ?>mi</dd>
								</dl>
								<?php endif ?>
								<?php if ( isset($post->difficulty) && ! empty($post->difficulty) ) : ?>
								<dl class="uk-description-list-horizontal">
									<dt>Difficulty:</dt>
									<dd><?= $post->difficulty ?></dd>
								</dl>
								<?php endif ?>
								<?php if ( isset($post->elevation) && ! empty($post->elevation) ) : ?>
								<dl class="uk-description-list-horizontal">
									<dt>Elevation:</dt>
									<dd><?= $post->elevation ?>ft</dd>
								</dl>
								<?php endif ?>
								<?php if ( isset($post->photo_rating) && ! empty($post->photo_rating) ) : ?>
								<dl class="uk-description-list-horizontal">
									<dt>Photo Rating:</dt>
									<dd><?= $post->photo_rating ?></dd>
								</dl>
								<?php endif ?>
								<?php if ( isset($post->compass) && ! empty($post->compass) ) : ?>
								<dl class="uk-description-list-horizontal">
									<dt>Compass:</dt>
									<dd><?= $post->compass ?>&deg;</dd>
								</dl>
								<?php endif ?>
								<?php if ( isset($post->accessibility) && ! empty($post->accessibility) ) : ?>
								<dl class="uk-description-list-horizontal">
									<dt>Accessibility:</dt>
									<dd><?= $post->accessibility ?></dd>
								</dl>
								<?php endif ?>
								<?php if ( isset($post->landowner) && ! empty($post->landowner) ) : ?>
								<dl class="uk-description-list-horizontal">
									<dt>Landowner:</dt>
									<dd><?= $post->landowner ?></dd>
								</dl>
								<?php endif ?>
								<dl class="uk-description-list-horizontal">
									<dt>Coordinates:</dt>
									<dd>N <?= substr($addr_lat, 0, 5) ?>, W <?= substr($addr_lng, 0, 6) ?></dd>
								</dl>
							</div>
						</div>
						<?php if ( have_rows('directions_repeater') ) : ?>
						<div class="uk-padding-vertical location-meta collapsible">
							<h6 class="collapsible-header location-meta-info">Directions to Location</h6>
							<div class="collapsible-content location-steps">
								<?php while ( have_rows('directions_repeater') ) : the_row(); ?>
								<div class="location-step" data-uk-toggle="{target:'#step-<?= get_row_index() ?>', cls:'text-bright-green'}" style="cursor:pointer">
									<p id="step-<?= get_row_index() ?>" class="uk-text-left">
										<i class="uk-icon-check uk-icon-justify"></i>
										<?php the_sub_field('step') ?>
									</p>
									<hr class="uk-margin-remove">
								</div>
								<?php endwhile ?>
							</div>
						</div>
						<?php endif ?>
					<?php endif ?>
					<div class="uk-padding-vertical location-utility print">
						<button type="button" title="Print this Page" class="uk-button uk-button-primary uk-button-large uk-width-1-1" onclick="window.print()"><i class="uk-icon-print"></i> <?php _e( 'Print this Page', 'jctda' ); ?></button>
					</div>
				</aside>
			</div>
			<?= jc_page_edit() ?>
		</section>
		<div class="uk-container uk-container-center">
			<?php get_template_part( 'partials/search-body' ) ?>
		</div>
		<div class="signup-event">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small">
					<div>
						<?php get_template_part( 'partials/signup-widget' ) ?>
					</div>

					<div>
						<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">Discover Jackson County</h3>
				<?php jc_carousel_posts( [ 'include' => [ 6517, 6748, 6021, 6019 ] ] ) ?>
			</div>
		</div>
		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h3 class="mountain"><?= ucfirst( get_post_type_object( get_post_type() )->labels->name ) ?></h3>
					<?php
					get_extended_template_part('carousel', 'tiles', [
						'post_type' => get_post_type(),
						'posts_per_page' => 6,
						'orderby' => 'menu_order',
					], ['dir' => 'partials', 'cache' => 30]);
					?>
			</div>
		</div>
	</article>
</main>
