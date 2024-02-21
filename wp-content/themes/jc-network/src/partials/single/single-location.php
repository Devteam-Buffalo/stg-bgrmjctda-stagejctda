<?php
/**
 * Template part for displaying single location content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */
if ( ! defined( 'ABSPATH' ) ) exit;

$addr_array = get_field( 'address_gps' );
$addr_full  = $addr_array['address'];
$addr_lat   = $addr_array['lat'];
$addr_lng   = $addr_array['lng']; ?>
<style>
	.location-meta-info { word-break: break-all }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-location'); ?>>
	<?php pods_view( 'src/partials/hero/hero', 'single-location.php' ); ?>

	<div class="entry-content">
		<div class="location-content-container single-location-content">
			<div class="location-content">
				<section class="uk-container uk-container-center">
					<div class="uk-grid uk-grid-collapse">
						<div class="uk-width-medium-6-10 uk-width-1-1 left-column">
							<div class="location-intro">
								<?php if( is_singular( array( 'food_drink', 'lodgings') ) ) : ?>

									<h1 class="section-heading"><?php the_field('business_name_text'); ?> <span></span></h1>
			
									<h2 class="section-subheading"><?php the_field('summary_textarea'); ?></h2>
			
									<p><?php the_field('short_description_textarea'); ?></p>

								<?php else : ?>

									<h1 class="section-heading"><?php the_field('page_heading'); ?></h1>
	
									<h2 class="section-subheading"><?php the_field('page_subheading'); ?></h2>
	
									<p><?php the_field('page_intro'); ?></p>

								<?php endif; ?>
								
								<div class="location-share">
									<span class="uk-float-left share-cta">Share &nbsp;</span>
									<?php pods_view( 'src/partials/social/social-links.php' ); ?>
								</div>

								<?php
								if( is_singular( array( 'lodgings', 'outdoor', 'attraction' ) ) ) :
									if( isset($addr_lat) && isset($addr_lng) ) :
									
										$args = array(
											'api_key' 	=> 'b19ee334cf52a5d0854f2b85e34c4e9c', // Enter your API key
											'latitude'	=> $addr_lat, // enter the longitude
											'longitude'	=> $addr_lng, // enter the latitude
											'cache_prefix'	=> 'api_', // careful here, md5 is used on the request url to generate the transient name. You are limited to an 8 character prefix before the combined total exceeds the transient name limit
											'cache_enabled'	=> true, // Enable the cache, or false to skip caching entirely
											'cache_time'	=> 8 * HOUR_IN_SECONDS, // the time in seconds to store the
											'clear_cache'	=> false, // set to true to force the cache to clear
											'query'			=> array( 'exclude' => 'minutely,hourly,daily,alerts,flags' )
										);
										$forecast = new Forecast\Weather_Icon_Forecast( $args );
										
										// Get the response with default parameters
										$response = $forecast->get_response();
										
										// Modify a caching parameter, refresh the response. In this case, we're shortening the cache time.
										$forecast->cache_time = 8 * HOUR_IN_SECONDS;
										$response = $forecast->get_response( true );
										$currently = $response['currently'];
										
										// Set the icon, if there is one
										$icon = ! empty( $currently['icon'] ) ? $forecast->get_icon( esc_attr( $currently['icon'] ) ) : '';
										
										// set the title attribute to the forecast summary
										$title_attr = ! empty( $currently['summary'] ) ? ' title="' . esc_attr( $currently['summary'] ) . '"' : '';
									?>
										<div class="uk-float-right weather-container">
											<div class="uk-row weather">
												<div class="weather-condition">
													<?php echo $response['currently']['summary']; ?>
												</div>
			
												<div class="uk-row weather-temp">
													<?php echo number_format( $response['currently']['temperature'], 0 ) . '&deg;'; ?>
												</div>
			
												<?php if( ! empty( $currently ) ) echo $icon; ?>
											</div>
										</div>
									<?php
									else :
										echo ' ';
									endif;
								endif;
								?>
							</div>
							
							<div class="location-description">
								<?php if( is_singular( array( 'food_drink', 'lodgings') ) ) :
									
									$phone_main = get_field( 'phone_main_text' );
									$web_main = get_field( 'website_main_text' );
									$email_main = get_field( 'email_address_email' );
									
									if( ! empty($phone_main) || ! empty($web_main) || ! empty($email_main) || ! empty( $addr_full) ) :
									?>

									<div class="contact-information">
										<h4>Contact Information</h4>
										
										<div class="uk-grid uk-grid-collapse location-contact-info-container">
											<?php  if( ! empty( $addr_full ) ) : ?>
											<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
												<div class="location-meta-value">
													<a href="https://maps.google.com?daddr=<?php echo $addr_full; ?>" title="Get Directions" class="" target="_blank"><i class="uk-icon-map-marker"></i> Get Directions</a>
													<span class="location-meta-info"><?php echo $addr_full; ?></span>
												</div>
											</div>
											<?php endif; ?>
											
											<?php  if( ! empty( $web_main ) ) : ?>
											<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
												<div class="location-meta-value">
													<a href="<?php echo url_parser( $web_main ); ?>" title="" class="" target="_blank"><i class="uk-icon-globe"></i> Visit Website</a>
													<span class="location-meta-info"><?php echo url_parser( $web_main ); ?></span>
												</div>
											</div>
											<?php endif; ?>
											
											<?php  if( ! empty( $email_main ) ) : ?>
											<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
												<div class="location-meta-value">
													<a href="mailto:<?php echo $email_main; ?>" title="" class=""><i class="uk-icon-envelope"></i> Email Location</a>
													<span class="location-meta-info"><?php echo $email_main; ?></span>
												</div>
											</div>
											<?php endif; ?>

											<?php  if( ! empty( $phone_main ) ) : ?>
											<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
												<div class="location-meta-value">
													<a href="tel:<?php echo $phone_main; ?>" title="" class=""><i class="uk-icon-mobile-phone"></i> Call Location</a>
													<span class="location-meta-info"><?php echo $phone_main; ?></span>
												</div>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<?php 
									
									endif;
								
								else :
									
									$singular_array = array( 'towns', 3808, 3809, 3810, 3811, 3814, 3815, 3817 );
									
									if( ! is_singular( $singular_array ) ) : 
										
										$phone_basic = get_field( 'phone_number' );
										$web_basic = get_field( 'website' );
										$email_basic = get_field( 'email' );
										$email_other = get_field( 'email_address' );
									
										if( ! empty($email_other) || ! empty($phone_basic) || ! empty($web_basic) || ! is_null($email_basic) || ! ctype_space( $addr_full ) ) :
										?>
										<div class="contact-information">
											<h4>Contact Information</h4>
											
											<div class="uk-grid uk-grid-collapse location-contact-info-container">
												<?php  if( ! empty( $addr_full ) ) : ?>
												<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
													<div class="location-meta-value">
														<a href="https://maps.google.com?daddr=<?php echo $addr_full; ?>" title="Get Directions" class="" target="_blank"><i class="uk-icon-map-marker"></i> Get Directions</a>
														<span class="location-meta-info"><?php echo $addr_full; ?></span>
													</div>
												</div>
												<?php endif; ?>
												
												<?php  if( ! empty( $web_basic ) ) : ?>
												<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
													<div class="location-meta-value">
														<a href="<?php echo url_parser( $web_basic ); ?>" title="" class="" target="_blank"><i class="uk-icon-globe"></i> Visit Website</a>
														<span class="location-meta-info"><?php echo url_parser( $web_basic ); ?></span>
													</div>
												</div>
												<?php endif; ?>
												
												<?php  if( ! empty( $email_basic ) ) : ?>
												<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
													<div class="location-meta-value">
														<a href="mailto:<?php echo $email_basic; ?>" title="" class=""><i class="uk-icon-envelope"></i> Email Location</a>
														<span class="location-meta-info"><?php echo $email_basic; ?></span>
													</div>
												</div>
												<?php endif; ?>

												<?php  if( ! empty( $phone_basic ) ) : ?>
												<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
													<div class="location-meta-value">
														<a href="tel:<?php echo $phone_basic; ?>" title="" class=""><i class="uk-icon-mobile-phone"></i> Call Location</a>
														<span class="location-meta-info"><?php echo $phone_basic; ?></span>
													</div>
												</div>
												<?php endif; ?>
												
												<?php if( ! empty($email_other) ) : ?>
												<div class="uk-width-large-1-4 uk-width-1-1 location-contact-info">
													<div class="location-meta-value">
														<a href="mailto:<?php echo $email_other; ?>" title="" class=""><i class="uk-icon-envelope"></i> Email Location</a>
														<span class="location-meta-info"><?php echo $email_other; ?></span>
													</div>
												</div>
												<?php endif; ?>
											</div>
										</div>
										<?php 
										endif;
									endif;
									?>

									<?php the_field('page_content'); ?>
	
									<?php $desc = get_field('hike_description'); if( ! empty( $desc ) ) : ?>
									<h3 class="section-subheading-small">Hike Description</h3>
	
									<p>
										<?php the_field('hike_description'); ?>
									</p>
									<?php endif; ?>
	
									<?php $safety = get_field('safety'); if( ! empty( $safety ) ) : ?>
									<h3 class="section-subheading-small">Safety</h3>
	
									<p>
										<?php the_field('safety'); ?>
									</p>
									<?php 
									endif;
									
								endif;

								$long_desc = get_field('long_description_textarea');
								if( $long_desc ) : ?>
									<h2 class="section-subheading">About <?php the_field('business_name_text'); ?></h2>
							
									<p><?php echo $long_desc; ?></p>
								<?php endif; ?>
							</div>
							
							<div class="uk-margin-small">&nbsp;</div>
							
							<?php
							$photos[] = get_field_object('interior_photos_gallery');
							$photos[] = get_field_object('scenic_photos_gallery');
							$photos[] = get_field_object('special_feature_photos_gallery');
							
							if( current_user_can( 'manage_options' ) ) {
							
								//show($photos);
							
							}
							
							if( ! empty( $photos[0]['value'] ) ) :

							echo '<div class="location-photo-gallery">
								
								<ul class="uk-tab" data-uk-tab="{connect:\'#tabbed-photo-gallery\', animation: \'fade\'}">';
									foreach( $photos as $photo_label ) {
										echo '<li><a href="">' . $photo_label['label'] . '</a></li>';
									}
								echo '</ul>
								
								<ul id="tabbed-photo-gallery" class="uk-switcher uk-margin truncated">';
									foreach( $photos as $photo_val ) {
										echo '<li><ul class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-4 uk-grid-width-1-3 uk-grid-medium lightbox" data-uk-grid-margin>';

											foreach( $photo_val['value'] as $img_url ) {
												echo '<li data-src="' . $img_url['url'] . '" data-exthumbimage="' . $img_url['url'] . '" data-exthumbimage="' . $img_url['url'] . '">
													<a href="" style="background: url(' . $img_url['url'] . ');background-size:cover;width:125px;height:125px;" class="uk-display-block image"></a></li>';
											}
											
										echo '</ul></li>';
									} ?>
								</ul>
							</div>

							<?php endif; ?>
						</div>
						
						<div class="uk-width-medium-3-10 uk-width-1-1 location-sidebar right-column">
							<div id="load-locations-map" class="uk-visible-small">
								<a href="javascript:void()" title="View Map of Location" class="uk-display-block uk-text-large uk-text-center load-map">
									<i class="uk-icon-map-pin"></i>
									
									View Map
								</a>
							</div>

							<div class="uk-clearfix location-map-frame">
								<div id="locations-map-frame"></div>
							</div>

							<div class="uk-grid uk-grid-width-1-1 uk-grid-medium location-utilities">
								<div class="utility-print">
									<a href="javascript:window.print()" title="" class="uk-text-center"><i class="uk-icon-print"></i> Print this Page</a>
								</div>
								
								<div class="utility-sms">
									<div class="" style="margin: 2em 0; padding: 1em; border: 1px solid #eee; background: #f6f6f6;">
										<h5>Send this location via SMS.</h5>
										
										<?php 
											gravity_form( 
												$id_or_title = 13,
												$display_title = false,
												$display_description = false,
												$display_inactive = false,
												$field_values = '',
												$ajax = true,
												$tabindex = 0,
												$echo = true 
											); 
										?>
									</div>
								</div>
							</div>

							<?php
							if( is_singular( array( 'food_drink', 'lodgings', 'outdoor', 'attraction' ) ) ) :
							
								$loc_logo = get_field('logo_file');
								$log_logo_type = $loc_logo['type'];
								
								if( $loc_logo && $log_logo_type === 'image' ) :
								?>
									<img src="<?php echo $loc_logo['url']; ?>" alt="<?php echo $loc_logo['alt']; ?>" width="300" class="location-logo">
								<?php 
								endif;
						
							endif; 
							?>
							
							<?php if( is_singular( array( 'food_drink', 'lodgings', 'outdoor', 'attraction' ) ) ) : ?>
								<ul class="uk-list uk-list-space location-meta-list">
									<?php 
									// if( is_singular( 'lodging' ) ) :
										// $rating = get_field( 'lodging_rating_radio' );
									// else :
										// $rating = null;
									// endif;
	
									// if( ! is_null($rating) && $rating != 'N/A' ) :
									?>
<!-- 									<li> -->
<!-- 										<span class="location-meta-title">Rating:</span> -->
<!-- 										<hr class="uk-margin-small"> -->
<!-- 										<span class="location-meta-value rating-stars"> -->
											<?php // echo $rating; ?>
<!-- 										</span> -->
<!-- 									</li> -->
									<?php // endif; ?>
	
									<?php 
									if( is_singular( 'lodgings' ) ) :
										$price = get_field( 'lodging_price_range_radio' );
									else :
										$price = null;
									endif;
									
									if( ! is_null($price) && ! empty($price) ) :
									?>
									<li>
										<span class="location-meta-title">Price Range:</span>
										<hr class="uk-margin-small">
										<span class="location-meta-value price-range">
											<?php echo $price; ?>
										</span>
									</li>
									<?php endif; ?>
									
									<?php
									if( is_singular( 'lodgings' ) ) :
									
									$payments = get_field( 'payment_methods_accepted_checkbox' );
										
										if( ! empty($payments[0]) ) : 
										
										?>
										<li>
											<span class="location-meta-title">Payment Methods:</span>
											<hr class="uk-margin-small">
											<span class="location-meta-value">
												<?php foreach( $payments as $payment ) : ?>
												<span class="pf pf-<?php echo $payment['value']; ?>" data-uk-tooltip="{pos:'top',animation:true}" title="<?php echo $payment['label']; ?> Accepted">&nbsp;</span>
												<?php endforeach; ?>
											</span>
										</li>
										<?php
										endif;
									
									endif;

									$social_accounts = get_field( 'social_media_repeater' ); 
									
									if( is_array( $social_accounts ) ) {

										echo '<li>
											<span class="location-meta-title">Social Media:</span>
											
											<hr class="uk-margin-small">';
										
										foreach( $social_accounts as $social ) {

											if( is_array( $social ) ) {
												
												$platform = $social['platform_select'];
												$url = $social['url_text'];
												
												echo '<span class="location-meta-value"><a href="' . $url . '" title="" target="_blank"><i class="uk-icon-' . $platform['value'] . '"></i></a></span>';

											}

										}
										
										echo '</li>';

									}
										
									$review_sites = get_field( 'review_sites_repeater' );
									
									if( $review_sites != false ) :
									?>
									<li>
										<span class="location-meta-title">Reviews:</span>
										<hr class="uk-margin-small">
										<?php if( $review_sites ) : ?>
											<span class="location-meta-value">
											<?php foreach( $review_sites as $review_site ) : ?>
												<a href="<?php echo url_parser( $review_site['url_text'] ); ?>" data-uk-tooltip="{pos:'top',animation:true}" title="View the <?php echo $review_site['platform_select']['label']; ?> Reviews" target="_blank">
													<?php echo $review_site['platform_select']['label']; ?>
												</a>
											<?php endforeach; ?>
											</span>
										<?php endif; ?>
									</li>
									<?php endif; ?>
	
									<?php
									if( is_singular( 'lodgings' ) ) :
										$seasons = get_field( 'season_of_operation_checkbox' ); 
										if( ! empty($seasons) ) : 
										?>
										<li>
											<span class="location-meta-title">Seasons:</span>
											<hr class="uk-margin-small">
											<span class="location-meta-value">
												<?php foreach( $seasons as $season ) : ?>
												<span class="season-tag"><?php echo $season; ?></span>
												<?php endforeach; ?>
											</span>
										</li>
										<?php
										endif;
									endif;

									if( is_singular( 'lodgings' ) ) :
									
									$monday_open_closed 	 = get_field( 'monday_open_closed' );
									$monday_open_from_select = get_field( 'monday_open_from_select' );
									$monday_open_to_select 	 = get_field( 'monday_open_to_select' );

									$tuesday_open_closed 	 	= get_field( 'tuesday_open_closed' );
									$tuesday_open_from_select 	= get_field( 'tuesday_open_from_select' );
									$tuesday_open_to_select 	= get_field( 'tuesday_open_to_select' );

									$wednesday_open_closed 	 	= get_field( 'wednesday_open_closed' );
									$wednesday_open_from_select = get_field( 'wednesday_open_from_select' );
									$wednesday_open_to_select 	= get_field( 'wednesday_open_to_select' );

									$thursday_open_closed 	 	= get_field( 'thursday_open_closed' );
									$thursday_open_from_select 	= get_field( 'thursday_open_from_select' );
									$thursday_open_to_select 	= get_field( 'thursday_open_to_select' );

									$friday_open_closed 	 = get_field( 'friday_open_closed' );
									$friday_open_from_select = get_field( 'friday_open_from_select' );
									$friday_open_to_select 	 = get_field( 'friday_open_to_select' );

									$saturday_open_closed 	 	= get_field( 'saturday_open_closed' );
									$saturday_open_from_select  = get_field( 'saturday_open_from_select' );
									$saturday_open_to_select 	= get_field( 'saturday_open_to_select' );

									$sunday_open_closed 	 = get_field( 'sunday_open_closed' );
									$sunday_open_from_select = get_field( 'sunday_open_from_select' );
									$sunday_open_to_select 	 = get_field( 'sunday_open_to_select' );
									?>
									
									<li>
										<span class="location-meta-title">Hours:</span>
										<hr class="uk-margin-small">
										<span class="location-meta-value location-hours">
											<?php if( $sunday_open_closed == 'Open' ) : ?>
											<span>Sunday: <?php echo $sunday_open_from_select . ' &ndash; ' . $sunday_open_to_select; ?></span>
											<?php else : ?>
											<span>Sunday: Closed</span>
											<?php endif; ?>
											
											<br>
											
											<?php if( $monday_open_closed == 'Open' ) : ?>
											<span>Monday: <?php echo $monday_open_from_select . ' &ndash; ' . $monday_open_to_select; ?></span>
											<?php else : ?>
											<span>Monday: <?php echo $monday_open_from_select . ' &ndash; ' . $monday_open_to_select; ?></span>
											<?php endif; ?>
											
											<br>
											
											<?php if( $tuesday_open_closed == 'Open' ) : ?>
											<span>Tuesday: <?php echo $tuesday_open_from_select . ' &ndash; ' . $tuesday_open_to_select; ?></span>
											<?php else : ?>
											<span>Tuesday: <?php echo $tuesday_open_from_select . ' &ndash; ' . $tuesday_open_to_select; ?></span>
											<?php endif; ?>
											
											<br>
											
											<?php if( $wednesday_open_closed == 'Open' ) : ?>
											<span>Wednesday: <?php echo $wednesday_open_from_select . ' &ndash; ' . $wednesday_open_to_select; ?></span>
											<?php else : ?>
											<span>Wednesday: <?php echo $wednesday_open_from_select . ' &ndash; ' . $wednesday_open_to_select; ?></span>
											<?php endif; ?>
											
											<br>
											
											<?php if( $thursday_open_closed == 'Open' ) : ?>
											<span>Thursday: <?php echo $thursday_open_from_select . ' &ndash; ' . $thursday_open_to_select; ?></span>
											<?php else : ?>
											<span>Thursday: <?php echo $thursday_open_from_select . ' &ndash; ' . $thursday_open_to_select; ?></span>
											<?php endif; ?>
											
											<br>
											
											<?php if( $friday_open_closed == 'Open' ) : ?>
											<span>Friday: <?php echo $friday_open_from_select . ' &ndash; ' . $friday_open_to_select; ?></span>
											<?php else : ?>
											<span>Friday: <?php echo $friday_open_from_select . ' &ndash; ' . $friday_open_to_select; ?></span>
											<?php endif; ?>
											
											<br>
											
											<?php if( $saturday_open_closed == 'Open' ) : ?>
											<span>Saturday: <?php echo $saturday_open_from_select . ' &ndash; ' . $saturday_open_to_select; ?></span>
											<?php else : ?>
											<span>Saturday: <?php echo $saturday_open_from_select . ' &ndash; ' . $saturday_open_to_select; ?></span>
											<?php endif; ?>
										</span>
									</li>
									<?php
									endif;
	
									$food_amenities = get_field( 'food_drink_amenities_select' );
									$lodging_amenities = get_field( 'lodging_amenities_select' );
									$camping_amenities = get_field( 'lodging_camping_select' );
									
									if( ! empty( $lodging_amenities ) || ! empty( $camping_amenities ) || ! empty( $food_amenities ) ) :
									?>
									<li>
										<span class="location-meta-value amenity-tags">
										<?php 
										if( $food_amenities ) :
											echo '<span class="location-meta-title">Food &amp; Drink Amenities:</span>';
											echo '<hr class="uk-margin-small">';
											
											foreach( $food_amenities as $food_amenity ) :
												echo '<span class="amenity-tag">' . $food_amenity .'</span>';
											endforeach;
										endif;

										if( $lodging_amenities ) :
											echo '<span class="location-meta-title">Lodging Amenities:</span>';
											echo '<hr class="uk-margin-small">';
											
											foreach( $lodging_amenities as $lodging_amenity ) :
												echo '<span class="amenity-tag">' . $lodging_amenity . '</span>';
											endforeach;
										endif;

										if( $camping_amenities ) :
											echo '<span class="location-meta-title">Camping Amenities:</span>';
											echo '<hr class="uk-margin-small">';
											
											foreach( $camping_amenities as $camping_amenity ) :
												echo '<span class="amenity-tag">' . $camping_amenity . '</span>';
											endforeach;
										endif;
										?>
										</span>
									</li>
									<?php endif; ?>
								</ul>
								
							<?php
							endif;
							
							if( is_singular( 'outdoor' ) ) :
							?>
								
								<ul class="uk-list uk-list-space location-meta-list">
									
									<?php $distance = get_field('distance'); if( ! empty($distance) ) : ?>
									<li>
										<span class="location-meta-title">Distance:</span>
										<span class="location-meta-value"><?php echo $distance; ?> mi</span>
									</li>
									<?php endif; ?>
	
									<?php $difficulty = get_field('difficulty'); if( ! empty($difficulty) ) : ?>
									<li>
										<span class="location-meta-title">Difficulty:</span>
										<span class="location-meta-value"><?php echo $difficulty; ?></span>
									</li>
									<?php endif; ?>
	
									<?php $elevation = get_field('elevation'); if( ! empty($elevation) ) : ?>
									<li>
										<span class="location-meta-title">Elevation:</span>
										<span class="location-meta-value"><?php echo $elevation; ?> ft</span>
									</li>
									<?php endif; ?>
	
									<?php $photo_rating = get_field('photo_rating'); if( ! empty($photo_rating) ) : ?>
									<li>
										<span class="location-meta-title">Photo Rating:</span>
										<span class="location-meta-value"><?php echo $photo_rating; ?></span>
									</li>
									<?php endif; ?>
	
									<?php $compass = get_field('compass'); if( ! empty($compass) ) : ?>
									<li>
										<span class="location-meta-title">Compass:</span>
										<span class="location-meta-value"><?php echo $compass; ?>&deg;</span>
									</li>
									<?php endif; ?>
	
									<?php $accessibility = get_field('accessibility'); if( ! empty($accessibility) ) : ?>
									<li>
										<span class="location-meta-title">Accessibility:</span>
										<span class="location-meta-value"><?php echo $accessibility; ?></span>
									</li>
									<?php endif; ?>
	
									<?php $landowner = get_field('landowner'); if( ! empty($landowner) ) : ?>
									<li>
										<span class="location-meta-title">Landowner:</span>
										<span class="location-meta-value"><?php echo $landowner; ?></span>
									</li>
									<?php endif; ?>
	
									<?php if( ! empty($addr_lat) && ! empty($addr_lng) ) : ?>
									<li>
										<span class="location-meta-title">GPS:</span>
										<span class="location-meta-value">
											N <?php $gps_lat = substr($addr_lat, 0, 5); echo $gps_lat; ?>, 
											W <?php $gps_lng = substr($addr_lng, 0, 6); echo $gps_lng; ?>
										</span>
									</li>
									<?php endif; ?>
	
									<?php $directions = get_field('directions_repeater'); if( ! empty($directions) ) : ?>
									<li>
										<p class="location-meta-title">Directions:</p>
	
										<ul class="uk-form uk-list uk-list-space location-steps">
											<?php
											$directions_repeater = get_field( 'directions_repeater' );
											
											if( $directions_repeater ) :
												$i = 1;
												foreach( $directions_repeater as $step ) : ?>
													<li>
														<a data-uk-toggle="{target:'#step-<?php echo $i; ?>', cls:'uk-text-success'}">
															<span id="step-<?php echo $i; ?>"><?php echo $step['step']; ?></span>
														</a>
													</li>
												<?php
												$i++;
												endforeach;
											endif;
											?>
										</ul>
									</li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</section>
				
				<?php
				$title = 'Discover Jackson County';
				$type = 'page';
				$include = array(6517,6748,6021,6019);
				$number = 4;
				$parent = false;
				$color = 'green';
				$classes = 'jc-discover-tiles';
				$order = 'date menu_order';
				include( locate_template( 'parts/carousel-global.php' ) );

				get_template_part( 'parts/signup-events' );
				
				if( is_singular( 'outdoor' ) ) {
					$carousel_title = 'Outdoors';
					$carousel_type = 'outdoor';
					$parent = '0';
					$title_color = 'green';
					
					include( locate_template('template-parts/carousel/carousel-default.php') );
				}
				elseif( is_singular( 'attraction' ) ) {
					$carousel_title = 'Attractions';
					$carousel_type = 'attraction';
					$parent = '0';
					$title_color = 'yellow';
					
					include( locate_template('template-parts/carousel/carousel-default.php') );
				}
				elseif( is_singular( 'food_drink' ) ) {
					pods_view( 'src/partials/carousel/carousel-food-drink.php' );
				}
				elseif( is_singular( 'lodgings' ) ) {
					pods_view( 'src/partials/carousel/carousel-lodging.php' );
				}
				?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="screen-reader-text entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<script type="text/javascript" defer>

	var map;
	var marker;

	function initMap() {
		var mapLatLng = new google.maps.LatLng(<?php echo $addr_lat; ?>, <?php echo $addr_lng; ?>);

		var mapOptions = {
				center: mapLatLng,
				zoom: 14,
				disableDefaultUI: true,
				fullscreenControl: 1,
				styles: [ { "elementType": "geometry", "stylers": [ { "color": "#AEDCF7" } ] }, { "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "lightness": 20 }, { "gamma": 0.01 } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "saturation": -31 }, { "lightness": -33 }, { "gamma": 0.8 }, { "weight": 2 } ] }, { "featureType": "administrative", "stylers": [ { "lightness": 40 } ] }, { "featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [ { "color": "#ffffff" }, { "visibility": "on" } ] }, { "featureType": "landscape", "stylers": [ { "color": "#3374b9" }, { "gamma": 10 }, { "visibility": "simplified" } ] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [ { "saturation": 30 }, { "lightness": 30 } ] }, { "featureType": "landscape.natural.terrain", "elementType": "geometry.fill", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "saturation": 20 } ] }, { "featureType": "poi.attraction", "elementType": "labels.text", "stylers": [ { "color": "#0080ff" }, { "visibility": "on" } ] }, { "featureType": "poi.government", "elementType": "labels.text", "stylers": [ { "color": "#ff8000" }, { "visibility": "on" } ] }, { "featureType": "poi.government", "elementType": "labels.text.fill", "stylers": [ { "color": "#ff8000" }, { "visibility": "on" } ] }, { "featureType": "poi.government", "elementType": "labels.text.stroke", "stylers": [ { "color": "#ffffff" }, { "visibility": "on" } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "saturation": -20 }, { "lightness": 20 } ] }, { "featureType": "road", "stylers": [ { "color": "#4489D4" }, { "gamma": "111.00" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "saturation": -30 }, { "lightness": 10 } ] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "saturation": 25 }, { "lightness": 25 } ] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [ { "color": "#3f6682" }, { "visibility": "on" } ] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#ffffff" }, { "visibility": "on" } ] }, { "featureType": "water", "stylers": [ { "color": "#7CABDD" }, { "saturation": "0" }, { "lightness": "0" }, { "gamma": "9.00" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#6191c4" }, { "visibility": "on" } ] }, { "featureType": "water", "elementType": "labels.text", "stylers": [ { "color": "#ebfdff" }, { "visibility": "on" } ] } ] 
		}

		var map = new google.maps.Map(document.getElementById('locations-map-frame'), mapOptions);

		var image = {
			url: '<?php bloginfo( 'template_url' ); ?>/assets/img/map-marker-blue.svg',
			size: new google.maps.Size(35, 32),
			origin: new google.maps.Point(0, 0),
			anchor: new google.maps.Point(17, 34),
			scaledSize: new google.maps.Size(35, 32)
		};

		marker = new google.maps.Marker({
			position: mapLatLng,
			map: map,
			icon: image
		});
	}

</script>
<script src="//maps.googleapis.com/maps/api/js?key=<?= MAPS_KEY ?>&callback=initMap" defer></script>