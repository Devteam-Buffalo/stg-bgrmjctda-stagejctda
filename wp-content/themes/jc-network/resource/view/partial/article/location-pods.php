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

$post_id        = get_the_id();
$post_type      = get_post_type();
$location_data  = pods( $post_type, $post_id );
$data           = $location_data->export();

$t_args = array(
	'width'              => 125,
	'height'             => 125,
	'crop'               => true,
	'crop_from_position' => 'center,center',
	'resize'             => true,
	'watermark_options'  => null,
	'cache'              => true,
	'default'            => null,
	'jpeg_quality'       => 80,
	'resize_animations'  => true,
	'return'             => 'url',
	'background_fill'    => null
);
$l_args = array(
	'width'              => 1600,
	'crop'               => false,
	'resize'             => false,
	'cache'              => true,
	'jpeg_quality'       => 85,
);
$args = array(
	'id'        => $data['id'],
	'slug'      => $data['post_name'],
	'type'      => $data['post_type'],

	'title'     => $data['business_name'] ?: $data['post_title'],

	'summary'   => $data['summary'] ?: false,
	'short'     => $data['short_description'] ?: false,
	'long'      => $data['long_description'] ?: false,

	'addr1'     => $data['physical_address_1'],
	'addr2'     => $data['physical_address_2'],
	'city'      => $data['physical_city'],
	'state'     => $data['physical_state'],
	'zip'       => $data['physical_zip_code'],
	'full'      => $data['full_address'],

	'latitude'  => $data['latitude'] ?: '35.375375',
	'longitude' => $data['longitude'] ?: '-83.218394',

	'email'     => $data['email_address'],
	'phone'     => $data['phone_number'],

	'website'   => $data['website'],
	'social'    => $data['social_media'],

	'seasons'   => $data['seasons_of_operation'],
	'payment'   => $data['payment_methods'],
	'employees' => $data['number_of_employees'],
);

$brand = array(
	'hero'     => jc_image_exists( $data['featured_photo'] ),
	'logo'     => jc_image_exists( $data['logo'] ),
);

$images = array(
	'Interior' => jc_explode_data( $data['interior_photos'] ),
	'Scenic'   => jc_explode_data( $data['scenic_photos'] ),
	'Features' => jc_explode_data( $data['special_feature_photos'] ),
);

if( $brand['hero'] ) :
	$image_url = $brand['hero'];
else :
	$image_url = CDN_URL."/assets/img/jctda-default-{$post_type}-hero.jpg";
endif;

$weather = [];

if( $args['type'] == 'jc_lodging' ) :
	$lodging_args = array(
		'multiple_unit_location' => $data['multiple_unit_location'],
		'number_of_units' => $data['number_of_units'],
		'number_of_rooms' => $data['number_of_rooms'],
		'number_of_beds' => $data['number_of_beds'],
		'beds_per_unit' => $data['beds_per_unit'],
		'number_of_people' => $data['number_of_people'],
		'number_of_baths' => $data['number_of_baths'],
		'baths_per_unit' => $data['baths_per_unit'],
		'price' => $data['price_range'],
		'deposit_amount' => $data['deposit_amount'],

		'label' => 'Lodging',
		'types' => get_the_terms( $post_id, 'jc_lodging_type' ),
		'amenities' => get_the_terms( $post_id, 'jc_lodging_amenity' ),
		'accommodations' => get_the_terms( $post_id, 'jc_lodging_accommodation' ),
		'camping_amenities' => get_the_terms( $post_id, 'jc_camping_amenity' ),

		'taxonomy' => 'jc_lodging_accommodation',
	);

	$args = $args + $lodging_args;

	// $endpoint = new WP_REST_Request( 'GET', '/wp/v2/lodging/' . $post_id );

	// $request = rest_do_request( $endpoint );

	// if ( $request->is_error() ) {
		// $error = $request->as_error();
		// $message = $request->get_error_message();
		// $error_data = $request->get_error_data();
		// $status = isset( $error_data['status'] ) ? $error_data['status'] : 500;
		// echo( printf( '<p>An error occurred: %s (%d)</p>', $message, $error_data ) );
	// }

	// $rest = $request->get_data();

        // if ( isset($rest['hours']) && !empty($rest['hours']) ) {
                // $hours = jc_location_hours( $rest['hours'] );
        // }
endif;

if( $args['type'] == 'jc_food_drink' ) :
	$food_args = array(
		'label' => 'Food & Drink',
		'types' => get_the_terms( $post_id, 'jc_food_type' ),
		'amenities' => get_the_terms( $post_id, 'jc_food_amenity' ),

		'taxonomy' => 'jc_food_type',
	);

	$args = $args + $food_args;

	// $endpoint = new WP_REST_Request( 'GET', '/wp/v2/food-drink/' . $post_id );

	// $request = rest_do_request( $endpoint );

	// if ( $request->is_error() ) {
		// $error = $request->as_error();
		// $message = $request->get_error_message();
		// $error_data = $request->get_error_data();
		// $status = isset( $error_data['status'] ) ? $error_data['status'] : 500;
		// echo( printf( '<p>An error occurred: %s (%d)</p>', $message, $error_data ) );
	// }

	// $rest = $request->get_data();

	// if ( isset($rest['hours']) && !empty($rest['hours']) ) {
		// $hours = jc_location_hours( $rest['hours'] );
	// }
endif;

if( $post_type == 'outdoor' ) :
	$outdoor_args = array(
		'title'     => get_post_meta( $post_id, 'page_heading', true ) ?: get_the_title( $post_id ),

		'summary'   => get_post_meta( $post_id, 'page_subheading', true ),
		'short'     => get_post_meta( $post_id, 'page_intro', true ),
		'long'      => get_post_meta( $post_id, 'hike_description', true ),

		'addr1'     => $data['physical_address_1'],
		'addr2'     => $data['physical_address_2'],
		'city'      => $data['physical_city'],
		'state'     => $data['physical_state'],
		'zip'       => $data['physical_zip_code'],
		'full'      => $data['full_address'],

		'latitude'  => $data['latitude'],
		'longitude' => $data['longitude'],

		'email'     => $data['email_address'],
		'phone'     => $data['phone_main'],
		'toll_free' => $data['phone_toll_free'],

		'website'   => $data['website'],
		'social'    => $data['social_media'],
	);

	$args = $args + $outdoor_args;
endif;

// $share = [
// 	'shortlink' => wp_get_shortlink( get_the_id() ),
// 	'title'     => get_the_title( get_the_id() ),
// 	'excerpt'   => $args['summary'] ?? null,
// 	'thumbnail' => $image_url,
// ];

 ?>
<main>
	<article id="<?= $post_type . '-' . $post_id ?>">
		<?php if ( isset( $data['cr_id'] ) && !empty( $data['cr_id'] ) ) : ?>
			<?php jc_cr_hero( [ 'cr_id' => $data['cr_id'], 'title' => '' ] ) ?>
		<?php else : ?>
			<?= jc_page_hero( ['image_url' => $image_url] ) ?>
		<?php endif ?>

		<section class="uk-container uk-container-center single-location">
			<div class="uk-grid">
				<div class="uk-width-large-7-10 uk-width-1-1 left-column print">
					<div class="location-intro">
						<div class="intro">
						<?= $args['title'] ? '<h1>' . $args['title'] . '</h1>' : null ?>
						<?= $args['summary'] ? '<h3>' . $args['summary'] . '</h3>' : null ?>
						<?= $args['short'] ? '<p>' . $args['short'] . '</p>' : null ?>
						</div>

						<!-- <div class="uk-flex uk-padding-top-small location-share"> -->
							<!-- <div><span class="uk-text-uppercase text-orange">Share</span></div> -->
							<?php //get_extended_template_part('social', 'share', [ 'share' => $share ], [ 'dir' => 'partials', 'cache' => 30 ]) ?>
						<!-- </div> -->

						<?php if ( isset($weather['temperature']) ) : ?>
							<div class="uk-float-right weather-container">
								<div class="uk-row weather">
									<div class="weather-condition">
									<?php if($weather_summ) echo '<span class="condition">' . $weather_summ . '</span>'; ?>
									</div>

									<div class="uk-row weather-temp">
									<?php if($weather_temp) echo '<span class="temperature">' . number_format( $weather_temp, 0 ) . '&deg;</span>'; ?>
									</div>
								</div>

								<?php if($weather_icon) echo '<span class="icon">' . $weather_icon . '</span>'; ?>
							</div>
						<?php endif; ?>
					</div>

					<div id="location-contact" class="location-contact">

						<h4>Contact Information</h4>

						<div class="uk-flex contact">
							<?php if( ! empty($args['full']) ) : ?>
							<div class="uk-flex-item-1 directions">
								<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click',remaintime:1500,pos:'top-left',justify:'#location-contact'}">

									<a href="javascript:void()" class="uk-link-muted" title="Get Directions to <?php echo $args['title']; ?>">
										<span class="uk-display-block text-blue"><i class="uk-icon-map-marker"></i> Get Directions</span>
										<span class="uk-display-block uk-text-meta"><?php echo $args['addr1'] . '<br>' . $args['city'] . ', ' . $args['state'] . ' ' . $args['zip']; ?></span>
									</a>

									<div class="uk-dropdown uk-dropdown-width-2 location-directions">
										<a class="uk-dropdown-close uk-icon-close uk-close uk-close-alt"></a>
										<div class="async-indicator"></div>
										<div class="async-contents">
											<div class="uk-grid uk-grid-width-1-1 uk-dropdown-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
												<div class="uk-width-medium-1-3">
													<div class="uk-cover-background uk-position-relative uk-panel" style="background-image: url(<?= $image_url ?>);min-height: 200px">
														<img src="<?= $image_url ?>" alt="Photo of <?= $args['title'] ?>" class="uk-invisible">
													</div>
												</div>
												<div class="uk-width-medium-2-3">
													<div class="uk-panel">

														<h3 class="uk-panel-title"><i class="uk-icon-map-marker"></i> Get Directions to <?= $args['title'] ?></h3>

														<div id="location-directions">
														<?php if ( shortcode_exists( 'gravityform' ) ) {
															$form   = '19';
															$title  = 'false';
															$desc   = 'false';
															$ajax   = 'true';
															$fields = '&latitude='.$args['latitude'];
															$fields.= '&longitude='.$args['longitude'];

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

							<?php if( ! empty($args['website']) ) : ?>
							<div class="uk-flex-item-1">
								<a href="<?php echo $args['website']; ?>" class="uk-link-muted" title="Visit Website" target="_blank">
									<span class="uk-display-block text-blue"><i class="uk-icon-globe"></i> Visit Website</span>
									<span class="uk-display-block uk-text-meta"><?php echo parse_url( $data['website'], PHP_URL_HOST ); ?></span>
								</a>
							</div>
							<?php endif; ?>

							<?php if( ! empty($args['email']) ) : ?>
							<div class="uk-flex-item-1">
								<a href="mailto:<?php echo $args['email']; ?>"  class="uk-link-muted"title="Email Location" target="_blank">
									<span class="uk-display-block text-blue"><i class="uk-icon-envelope-o"></i> Email Location</span>
									<span class="uk-display-block uk-text-meta"><?php echo $args['email']; ?></span>
								</a>
							</div>
							<?php endif; ?>

							<?php if( ! empty($args['phone']) ) : ?>
							<div class="uk-flex-item-1">
								<a href="tel:<?php echo $args['phone']; ?>" class="uk-link-muted" title="Call Location" target="_blank">
									<span class="uk-display-block text-blue"><i class="uk-icon-mobile-phone"></i> Call Location</span>
									<span class="uk-display-block uk-text-meta"><?php echo $args['phone']; ?></span>
								</a>
							</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="location-description">
						<div class="uk-block uk-padding-bottom-remove">
						<?php

						if( ! empty( $args['post_content'] ) ) :

							echo apply_filters( 'the_content', $args['post_content'] );

						endif;


	// 					if( ! empty( $args['hike_description'] ) ) :
	// 						echo '<h3>Hike Description</h3>' .
	// 						'<p>' . $args['hike_description'] . '</p>';
	// 					endif;

	// 					if( ! empty( $args['hike_safety'] ) ) :
	// 						echo '<h3>Safety</h3>' .
	// 						'<p>' . $args['hike_safety'] . '</p>';
	// 					endif;

						if( ! empty( $args['long'] ) ) :
							$long = nl2br( $args['long'], false );
							$long = '<p>' . preg_replace('#(<br>[\r\n]+){1}#', '</p><p>', $long) . '</p>';
							echo '<h5>About ' . $args['title'] . '</h5>' .
							$long;
						endif;
						?>
						</div>
						<?php if( $images['Interior'] || $images['Scenic'] || $images['Special'] ) : ?>

							<div class="location-photo-gallery tabs">
								<ul class="uk-tab uk-tab-grid uk-flex" data-uk-tab data-uk-switcher="{connect:'#photos'}">
								<?php foreach( $images as $key => $value ) : ?>

									<?php if( jc_images_exist( $value ) ) : ?>
									<li class="uk-flex-item-1"><a href=""><?php echo $key; ?></a></li>
									<?php endif; ?>

								<?php endforeach; ?>
								</ul>

								<ul id="photos" class="uk-switcher lightbox">
								<?php foreach( $images as $key => $value ) : ?>
									<?php if( jc_images_exist( $value ) ) : ?>

									<li class="location-photos">
										<h4 class="collapsible-header"><small><?php echo $key; ?> Photos at <?php echo $args['title']; ?></small></h4>
										<hr>

										<div class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-4 uk-grid-width-small-1-3 uk-grid-width-1-2 uk-grid-small" data-uk-grid-margin>

										<?php foreach( $value as $photo ) : if( jc_image_exists( $photo ) ) : $t = wpthumb( $photo, $t_args ); $l = wpthumb( $photo, $l_args ); ?>
											<a class="uk-display-inline-block lb" title="<?php echo $key; ?> Photo at <?php echo $args['title']; ?>" data-src="<?php echo $l; ?>" data-exthumbimage="<?php echo $t; ?>"><img src="<?php echo $t; ?>" alt="<?php echo $key; ?> Photo at <?php echo $args['title']; ?>" width="125" height="125"></a>
										<?php endif; endforeach; ?>
										</div>
									</li>

									<?php endif; ?>
								<?php endforeach; ?>
								</ul>

							</div>

						<?php endif; ?>
					</div>
				</div>

				<aside role="complementary" class="uk-width-large-3-10 uk-width-1-1 location-sidebar right-column">
					<?php if ( metadata_exists( 'post', get_post(), 'logo_file' ) ) :  ?>
						<?php if ( $brand['logo'] ) : ?>
						<div class="uk-padding-vertical location-logo collapsible">
							<h6 class="collapsible-header location-meta-info" hidden>Company Logo</h6>
							<div class="collapsible-content">
								<img src="<?= wpthumb( $brand['logo'], ['width'=>300,'resize'=>true,'crop'=>true] ) ?>" alt="<?= $args['title'] ?> Logo" width="300" class="location-logo">
							</div>
						</div>
						<?php endif ?>
					<?php endif ?>

					<?php if( $args['latitude'] && $args['latitude'] ) : ?>
					<div class="uk-padding-vertical location-map collapsible">
						<h6 class="collapsible-header location-meta-info" hidden>Map of Location</h6>
						<div class="collapsible-content">
							<div id="single-location-map-frame" class="map">
								<div class="marker" data-lat="<?= $args['latitude'] ?>" data-lng="<?= $args['longitude'] ?>">
									<div>
										<h5><?= $args['title'] ?></h5>
										<p><?= $args['summary'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>

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

					<?php if( $args['types'] ) : $types = $args['types']; ?>
					<div class="uk-padding-vertical location-meta terms collapsible">
						<h6 class="collapsible-header location-meta-info">Features</h6>

						<div class="collapsible-content">
							<p class="types">
							<?php foreach( $types as $type ) : $url = get_term_link( $type->term_id, $type->taxonomy );
								echo '<span class="' . $type->slug . '"><a href="' . $url . '" title="View More ' . $type->name . ' Locations" class="term-link-' . $type->slug . '">' . $type->name . '</a></span>';
							endforeach; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( $args['amenities'] ) : $amenities = $args['amenities']; ?>
					<div class="uk-padding-vertical location-meta terms collapsible">
						<h6 class="collapsible-header location-meta-info"><?php echo $args['label']; ?> Amenities</h6>

						<div class="collapsible-content">
							<p class="amenities">
							<?php foreach( $amenities as $amenity ) : $url = get_term_link( $amenity->term_id, $amenity->taxonomy );
								echo '<span class="' . $amenity->slug . '"><a href="' . $url . '" title="View More Locations Offering ' . $amenity->name . '" class="term-link-' . $amenity->slug . '">' . $amenity->name . '</a></span>';
							endforeach; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( $args['accommodations'] ) : $accommodations = $args['accommodations']; ?>
					<div class="uk-padding-vertical location-meta terms collapsible">
						<h6 class="collapsible-header location-meta-info">Accommodation Type</h6>

						<div class="collapsible-content">
							<p class="accommodations">
							<?php foreach( $accommodations as $accommodation ) : $url = get_term_link( $accommodation->term_id, $accommodation->taxonomy );
								echo '<span class="' . $accommodation->slug . '"><a href="' . $url . '" title="View More Locations Offering ' . $accommodation->name . '" class="term-link-' . $accommodation->slug . '">' . $accommodation->name . '</a></span>';
							endforeach; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( $args['camping_amenities'] ) : $camping_amenities = $args['camping_amenities']; ?>
					<div class="uk-padding-vertical location-meta terms collapsible">
						<h6 class="collapsible-header location-meta-info">Camping Amenities</h6>

						<div class="collapsible-content">
							<p class="amenities camping">
							<?php foreach( $camping_amenities as $camping_amenity ) : $url = get_term_link( $camping_amenity->term_id, $camping_amenity->taxonomy );
								echo '<span class="' . $camping_amenity->slug . '"><a href="' . $url . '" title="View More Locations Offering ' . $camping_amenity->name . '" class="term-link-' . $camping_amenity->slug . '">' . $camping_amenity->name . '</a></span>';
							endforeach; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( $args['price'] ) : $price = $args['price']; ?>
					<div class="uk-padding-vertical location-meta icons collapsible">
						<h6 class="collapsible-header location-meta-info">Price Range</h6>

						<div class="collapsible-content">
							<p class="price">
							<?php for ($i = 1; $i <= $price; $i++) echo '<span></span>'; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( $args['payment'] ) : $methods = explode('|', $args['payment']); ?>
					<div class="uk-padding-vertical location-meta icons collapsible">
						<h6 class="collapsible-header location-meta-info">Payment Methods Accepted</h6>

						<div class="collapsible-content">
							<p class="payment">
							<?php foreach( $methods as $method ) : $method_class = strtolower($method);
								echo '<span title="' . $method . '" class="' . $method_class . '"><i>' . $method . '</i></span>';
							endforeach; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( $args['social'] ) : $socials = explode('|', $args['social']); ?>
					<div class="uk-padding-vertical location-meta icons collapsible">
						<h6 class="collapsible-header location-meta-info">Location Reviews &amp; Social Links</h6>

						<div class="collapsible-content">
							<p class="social">
							<?php foreach( $socials as $social ) :
								$url = esc_url($social);
								$social_class = parse_url($url, PHP_URL_HOST);
								$social_name  = strtoupper($social_class);

								echo '<a href="' . $url . '" title="' . $social_name . '"><span title="' . $social_name . '" class="' . $social_class . '"></span></a>';
							endforeach; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( $args['seasons'] ) : $seasons = explode('|', $args['seasons']); ?>
					<div class="uk-padding-vertical location-meta icons collapsible">
						<h6 class="collapsible-header location-meta-info">Seasons of Availability</h6>

						<div class="collapsible-content">
							<p class="seasons">
							<?php foreach( $seasons as $season ) : $season_class = strtolower($season);
								echo '<span title="' . $season . '" class="' . $season_class . '"><i>' . $season . '</i></span>';
							endforeach; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>

					<?php if( isset( $hours ) && is_array( $hours ) ) : ?>
					<div class="uk-padding-vertical location-meta icons collapsible">
						<h6 class="collapsible-header location-meta-info">Hours</h6>

						<div class="collapsible-content">
							<ol class="uk-list uk-list-line hours">
								<?php foreach( $hours as $day ) : ?>
								<li><?php foreach( $day as $key => $value ) : ?>
									<div class="uk-grid uk-grid-width-1-2">
										<div><span style="margin:5px 0;height:16px;font-size:1rem;line-height:1rem"><?= $key ?></span></div>

										<div>
											<span style="margin:5px 0;height:16px;font-size:1rem;line-height:1rem"><?= $value['Open'] ?></span>
											<span style="margin:5px 0;height:16px;font-size:1rem;line-height:1rem" class="uk-float-right"><?= $value['Close'] ?></span>
										</div>
									</div>
								<?php endforeach; ?></li>
								<?php endforeach; ?>
							</ol>
						</div>
					</div>
					<?php endif; ?>

					<div class="uk-padding-vertical location-utility print">
						<button type="button" title="Print this Page" class="uk-button uk-button-primary uk-button-large uk-width-1-1" onclick="window.print()"><i class="uk-icon-print"></i> <?php _e( 'Print this Page', 'jctda' ); ?></button>
					</div>
				</aside>
			</div>

			<?= jc_page_edit() ?>
		</section>

		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">Discover Jackson County</h3>
				<?php jc_carousel_posts( [ 'include' => [ 6517, 6748, 6021, 6019 ] ] ) ?>
			</div>
		</div>

		<div class="uk-block signup-event">
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

		<?php //if ( false != jc_carousel_taxonomy( $args['taxonomy'] ) ) : ?>
		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h3 class="mountain"><?= 'More '.get_post_type_object( get_post_type() )->labels->singular_name; ?></h3>
				<?php jc_carousel_taxonomy( $args['taxonomy'] ) ?>
			</div>
		</div>
		<?php //endif ?>
	</article>
</main>
