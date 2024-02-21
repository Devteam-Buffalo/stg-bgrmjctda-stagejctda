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

// wp_enqueue_script('map-location', ASSETS . '/js/map-location.js', ['gmaps/js'], '20180314', true);
// wp_localize_script('map-location', 'mapData', ['markerIcon' => ASSETS . '/img/map-marker-blue.svg']);

$addr_array = jc_gps( get_post() );
$addr_lat   = is_array($addr_array) ? $addr_array['lat'] : null;
$addr_lng   = is_array($addr_array) ? $addr_array['lng'] : null;

$weather = [];

// if ( $addr_lat && $addr_lng ) {
// 	$weather_args = array(
// 		'api_key'       => 'b19ee334cf52a5d0854f2b85e34c4e9c',
// 		'latitude'      => $addr_lat ?? null,
// 		'longitude'     => $addr_lng ?? null,
// 		'cache_enabled' => true,
// 		'cache_prefix'  => 'weather_',
// 		'cache_time'    => 8 * HOUR_IN_SECONDS,
// 		'clear_cache'   => false,
// 		'query'         => ['exclude' => 'minutely, hourly, daily, alerts, flags']
// 	);
// 	$weather_data = new Forecast\Weather_Icon_Forecast( $weather_args );
// 	$weather_resp = $weather_data->get_response( true );
// 	$weather['icon'] = $weather_resp ? $weather_data->get_icon( $weather_resp['currently']['icon'] ) : null;
// 	$weather['summary'] = $weather_resp ? $weather_resp['currently']['summary'] : null;
// 	$weather['temperature'] = $weather_resp ? $weather_resp['currently']['temperature'] : null;
// }

$phone_main = get_field( 'phone_number' ) ?? get_field( 'phone_main_text' );
$web_main = get_field( 'website' ) ?? get_field( 'website_main_text' );
$email_main = get_field( 'email' ) ?? get_field( 'email_address' );

$photos[] = get_field_object('interior_photos_gallery');
$photos[] = get_field_object('scenic_photos_gallery');
$photos[] = get_field_object('special_feature_photos_gallery');

// $share = [
	// 'shortlink' => wp_get_shortlink( get_the_id() ),
	// 'title'     => get_the_title( get_the_id() ),
	// 'excerpt'   => $post->page_subheading ?? $post->page_intro,
	// 'thumbnail' => wp_get_attachment_image_url( get_post_thumbnail_id( get_the_id() ), 'full', false ),
// ];
?>
<main id="content" class="site-content" role="main">
<article id="post-<?php the_ID(); ?>" class="post-article">
	<?php if ( metadata_exists( 'post', $post->ID, 'cr_id' ) ) : ?>
		<?php jc_cr_hero( [ 'cr_id' => get_post_meta( $post->ID, 'cr_id', true ), 'title' => '' ] ) ?>
	<?php else : ?>
		<?= jc_page_hero( [ 'image_url' => wp_get_attachment_url( get_post_thumbnail_id() ), 'title' => '' ] ) ?>
	<?php endif ?>

	<section class="uk-container uk-container-center single-location">
		<div class="uk-grid">
			<div class="uk-width-large-7-10 uk-width-1-1 location-details left-column print">
				<div class="location-intro">
					<?= jc_page_intro( $post ) ?>

					<!-- <div class="uk-flex uk-padding-top-small location-share"> -->
						<!-- <div><span class="uk-text-uppercase text-orange">Share</span></div> -->
						<?php // get_extended_template_part('social', 'share', [ 'share' => $share ], [ 'dir' => 'partials', 'cache' => 30 ]) ?>
					<!-- </div> -->

					<?php if ( isset($weather['temperature']) ) : ?>
					<div class="uk-float-right weather-container">
						<div class="uk-row weather">
							<div class="weather-condition">
							<?php if(isset($weather['summary'])) echo '<span class="condition">' . $weather['summary'] . '</span>'; ?>
							</div>
							<div class="uk-row weather-temp">
							<?php if(isset($weather['temperature'])) echo '<span class="temperature">' . number_format( $weather['temperature'], 0 ) . '&deg;</span>'; ?>
							</div>
						</div>
						<?php if(isset($weather['icon'])) echo '<span class="icon">' . $weather['icon'] . '</span>'; ?>
					</div>
					<?php endif ?>
				</div>

				<div id="location-contact" class="location-contact">
					<h4>Contact Information</h4>

					<div class="uk-flex">
						<?php if ( $addr_lat && $addr_lng ) : ?>
						<div class="uk-flex-item-1 directions">
							<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click',remaintime:1500,pos:'top-left',justify:'#location-contact'}">

								<a href="javascript:void()" class="uk-link-muted" title="Get Directions to <?= $post->post_title; ?>">
									<span class="uk-display-block text-blue"><i class="uk-icon-map-marker"></i> Get Directions</span>

									<?php if ( ! isset($post->address) || empty($post->address) ) : ?>

									<span class="uk-display-block uk-text-meta"><?= substr($addr_lat, 0, 7) . ', ' . substr($addr_lng, 0, 8) ?></span>

									<?php elseif ( isset($post->address) || ! empty($post->address) ) : ?>

									<span class="uk-display-block uk-text-meta"><?= $post->address . '<br>' . $post->city . ', ' . $post->state . ' ' . $post->zip_code; ?></span>

									<?php endif ?>
								</a>

								<div class="uk-dropdown uk-dropdown-width-2 location-directions">
									<a class="uk-dropdown-close uk-icon-close uk-close uk-close-alt"></a>
									<div class="async-indicator"></div>
									<div class="async-contents">
										<div class="uk-grid uk-grid-width-1-1 uk-dropdown-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
											<div class="uk-width-medium-1-3">
												<div class="uk-cover-background uk-position-relative uk-panel" style="background-image: url(<?= wp_get_attachment_url( get_post_thumbnail_id() ) ?>)">
													<img src="<?= wp_get_attachment_url( get_post_thumbnail_id() ) ?>" alt="Photo of <?= $post->post_title ?>" class="uk-invisible">
												</div>
											</div>
											<div class="uk-width-medium-2-3">
												<div class="uk-panel">

													<h3 class="uk-panel-title"><i class="uk-icon-map-marker"></i> Get Directions to <?= $post->post_title ?></h3>

													<div id="location-directions">
													<?php if ( shortcode_exists( 'gravityform' ) ) {
														$form   = '19';
														$title  = 'false';
														$desc   = 'false';
														$ajax   = 'true';
														$fields = 'latitude='.$addr_lat;
														$fields.= '&longitude='.$addr_lng;

														echo do_shortcode( "[gravityform id='{$form}' title='{$title}' description='{$desc}' ajax='{$ajax}' field_values='{$fields}']" );
													} ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>

						<?php  if ( ctype_graph( $web_main ) ) : ?>
						<div class="uk-flex-item-1">
							<a href="<?php echo url_parser( $web_main ); ?>" title="" class="uk-link-muted" target="_blank">
								<span class="uk-display-block text-blue"><i class="uk-icon-globe"></i> Visit Website</span>
								<span class="uk-display-block uk-text-meta"><?= $web_main ?></span>
							</a>
						</div>
						<?php endif; ?>

						<?php  if ( ctype_graph( $email_main ) ) : ?>
						<div class="uk-flex-item-1">
							<a href="mailto:<?php echo $email_main; ?>" title="" class="uk-link-muted">
								<span class="uk-display-block text-blue"><i class="uk-icon-envelope"></i> Email Location</span>
								<span class="uk-display-block uk-text-meta"><?php echo $email_main; ?></span>
							</a>
						</div>
						<?php endif; ?>

						<?php  if ( ctype_graph( $phone_main ) ) : ?>
						<div class="uk-flex-item-1">
							<a href="tel:<?php echo $phone_main; ?>" title="" class="uk-link-muted">
								<span class="uk-display-block text-blue"><i class="uk-icon-mobile-phone"></i> Call Location</span>
								<span class="uk-display-block uk-text-meta"><?php echo $phone_main; ?></span>
							</a>
						</div>
						<?php endif; ?>
					</div>

					<div class="uk-block uk-padding-bottom-remove">
						<?= jc_page_content( $post ) ?>
						<?= get_post_meta($post->ID, 'notices', true) ?>
					</div>

					<?php if ( isset($photos) && is_array($photos) && ctype_graph( $photos[0]['value'] ) ) : ?>
					<div class="location-photo-gallery">
						<ul class="uk-tab" data-uk-tab="{connect:\'#tabbed-photo-gallery\', animation: \'fade\'}">
							<?php foreach( $photos as $photo_label ) : ?>
							<li><a href=""><?= $photo_label['label'] ?></a></li>
							<?php endforeach ?>
						</ul>

						<ul id="tabbed-photo-gallery" class="uk-switcher uk-margin truncated">';
							<?php foreach( $photos as $photo_val ) : ?>
							<li><ul class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-4 uk-grid-width-1-3 uk-grid-medium lightbox" data-uk-grid-margin>

								<?php foreach( $photo_val['value'] as $img_url ) : ?>
								<li data-src="<?= $img_url['url'] ?>" data-exthumbimage="<?= $img_url['url'] ?>" data-exthumbimage="<?= $img_url['url'] ?>">
									<a href="" style="background: url(<?= $img_url['url'] ?>);background-size:cover;width:125px;height:125px;" class="uk-display-block image"></a>
								</li>
								<?php endforeach ?>
							</ul></li>
							<?php endforeach ?>
						</ul>
					</div>
					<?php endif ?>
				</div>
			</div>

			<aside role="complementary" class="uk-width-large-3-10 uk-width-1-1 location-sidebar right-column">
				<?php if ( metadata_exists( 'post', get_post(), 'logo_file' ) ) :  ?>
					<?php if ( ! empty( get_post_meta( get_the_id(), 'logo_file', false ) ) ) : ?>
					<div class="uk-padding-vertical location-logo collapsible">
						<h6 class="collapsible-header location-meta-info" hidden>Company Logo</h6>
						<div class="collapsible-content">
							<img src="<?= wpthumb( wp_get_attachment_image_url( get_post_meta( get_the_id(), 'logo_file', false ), 'full', false ), ['width'=>300,'resize'=>true,'crop'=>true] ) ?>" alt="<?php the_title_attribute() ?> Logo" width="300" class="location-logo">
						</div>
					</div>
					<?php endif ?>
				<?php endif ?>

				<div class="uk-padding-vertical location-map collapsible">
					<h6 class="collapsible-header location-meta-info" hidden>Map of Location</h6>
					<div class="collapsible-content">
						<div id="single-location-map-frame" class="map">
							<div class="marker" data-lat="<?= $addr_lat ?>" data-lng="<?= $addr_lng ?>">
								<div>
									<h5><?= get_the_title() ?></h5>
									<p><?= $post->page_subheading ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
				<div class="uk-padding-vertical location-meta collapsible">
					<h6 class="collapsible-header location-meta-info">Send this Location via Text Message</h6>
					<div class="collapsible-content">
<!-- 						<div class="async-indicator"></div> -->
<!-- 						<div class="async-contents"> -->
							<?= do_shortcode( '[gravityform id="13" title="false" description="false" ajax="true"]' ) ?>
<!-- 						</div> -->
					</div>
				</div>
				<?php endif ?>

				<?php if ( have_rows('review_sites_repeater') ) : ?>
				<div class="uk-padding-vertical location-meta icons collapsible">
					<h6 class="collapsible-header location-meta-info">Location Reviews</h6>
					<div class="collapsible-content">
						<p class="social">
						<?php
						while ( have_rows('review_sites_repeater') ) :
							the_row();
							$url = esc_url( get_sub_field( 'url_text' ) );
							$social_class = parse_url($url, PHP_URL_HOST);
							$social_name  = strtoupper($social_class); ?>

							<a href="<?= $url ?>" title="<?= $social_name ?>"><span title="<?= $social_name ?>" class="<?= $social_class ?>"></span></a>

						<?php endwhile ?>
						</p>
					</div>
				</div>
				<?php endif ?>

				<?php if ( have_rows('social_media_repeater') ) : ?>
				<div class="uk-padding-vertical location-meta icons collapsible">
					<h6 class="collapsible-header location-meta-info">Social Links</h6>
					<div class="collapsible-content">
						<p class="social">
						<?php
						while ( have_rows('social_media_repeater') ) :
							the_row();
							$url = esc_url( get_sub_field( 'url_text' ) );
							$social_class = parse_url($url, PHP_URL_HOST);
							$social_name  = strtoupper($social_class); ?>

							<a href="<?= $url ?>" title="<?= $social_name ?>"><span title="<?= $social_name ?>" class="<?= $social_class ?>"></span></a>

						<?php endwhile ?>
						</p>
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
