<?php
/**
 * Template part for displaying single location content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

$addr_array = get_field( 'address_gps' );
$addr_full  = $addr_array['address'];
$addr_lat   = $addr_array['lat'];
$addr_lng   = $addr_array['lng'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-location'); ?>>
	<?php pods_view( 'src/partials/hero/hero-single-location.php' ); ?>

	<div class="entry-content">
		<div class="location-content-container single-location-content">
			<div class="location-content">
				<section class="uk-container uk-container-center">
					<div class="uk-grid uk-grid-collapse">
						<div class="uk-width-medium-6-10 uk-width-1-1 left-column">
							<div class="location-intro">
								<?php if( is_singular( array( 'food_drink', 'lodging') ) ) : ?>

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
								if( ! is_singular( 'food_drink' ) ) :
									if( ! empty($addr_lat) && ! empty($addr_lng) ) :
									
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
								<?php if( is_singular( array( 'food_drink', 'lodging') ) ) :
									
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
							$theme_uri = get_template_directory_uri();

							$open_list    = '<ul>';
							$close_list   = '</ul>';
							$open_item    = '<li>';
							$close_item   = '</li>';
							$open_anchor  = '<a href="">';
							$close_anchor = '</a>';
							
							$thumb_list = '<ul class="uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-4 uk-grid-width-1-3 uk-grid-medium lightbox" data-uk-grid-margin>';

							$interiors = get_field_object('interior_photos_gallery');
							$scenics   = get_field_object('scenic_photos_gallery');
							$specials  = get_field_object('special_feature_photos_gallery');

							$int_val = $interiors['value'];
							$sce_val = $scenics['value'];
							$spe_val = $specials['value'];
							$photos  = array($int_val, $sce_val, $spe_val);

							$int_label = $interiors['label'];
							$sce_label = $scenics['label'];
							$spe_label = $specials['label'];
							$labels  = array($int_label, $sce_label, $spe_label);

							$int_count = count($int_val);
							$sce_count = count($sce_val);
							$spe_count = count($spe_val);
							
							if( ! array_filter($photos) == false ) :

							echo '<div class="location-photo-gallery">';
								
								echo '<ul class="uk-tab" data-uk-tab="{connect:\'#tabbed-photo-gallery\', animation: \'fade\'}">';
									foreach( $labels as $tab ) :
										echo $open_item . $open_anchor . $tab . $close_anchor . $close_item;
									endforeach;
								echo $close_list;
								
								echo '<ul id="tabbed-photo-gallery" class="uk-switcher uk-margin truncated">';
									$i = 0;
									foreach( $photos as $key => $photo ) :
										echo $open_item;
											echo $thumb_list;
											
											if( $photo ) :
												foreach( $photo as $key => $thumbnail ) : $i++;
													$int_url = $thumbnail['sizes']['large'];
													$int_thumb = $thumbnail['sizes']['medium'];
													$int_cap = $thumbnail['caption'];
													$int_title = $thumbnail['description'];
													$int_alt = $thumbnail['alt'];
													$caption = '<p class="uk-thumbnail-caption">' . $int_title . '</p>';
													$thumb_open = '<li data-src="' . $int_url . '" data-exthumbimage="' . $int_thumb . '" data-exthumbimage="' . $int_thumb . '">';
													$thumb = '<img src="' . $int_thumb . '" width="150" height="150" class="image">';
	
													echo $thumb_open;
														echo '<a href="">';
															echo $thumb;
															echo $caption;
														echo '</a>';
													echo $close_item;
												endforeach;
											else :
												echo '<p>No photos have been shared.</p>';
											endif;
											
											echo $close_list;
										echo $close_item;
									endforeach;
								echo $close_list;

								if( $int_count || $sce_count || $spe_count > 10 ) :
									echo '<a href="javascript:void()" title="" class="uk-display-block uk-margin-top uk-text-large uk-text-center load-more-photos" data-uk-toggle="{target:\'#tabbed-photo-gallery\', cls:\'show-more\'}"><i class="uk-icon-chevron-down"></i>&nbsp;&nbsp;Show More Photos</a>';
								endif;
							echo '</div>';
							endif; ?>
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
								
								<div class="utility-sms uk-hidden">
									<div id="sms-container">
										<div class="sms">
											<h4>Send this location via SMS.</h4>
											
											<form class="uk-form uk-form-stacked" action="<?php echo get_template_directory_uri(); ?>/inc/lib/plivo/plivo.php" method="post">
												<label for="from">
													Your Mobile Number
													<input type="text" name="from" placeholder="" class="uk-width-1-1">
												</label>
												
												<label for="to">
													Send To
													<input type="text" name="to" placeholder="" class="uk-width-1-1">
												</label>
												
												<label for="message">
													<textarea name="message" rows="" cols="" placeholder="" class="uk-width-1-1">Message Text</textarea>
												</label>
												
												<input type="submit" value="Send SMS" class="button orange-button">
											</form> 
										</div>
									</div>
									
									<a href="" class="uk-text-center" data-uk-tooltip="{pos:'top',animation:true}" title="SMS disclaimer text."><i class="uk-icon-mobile"></i> Send to Phone*</a>
								</div>
							</div>

							<?php if( is_singular( array( 'food_drink', 'lodging') ) ) {
								$loc_logo = get_field('logo_file');
								$log_logo_type = $loc_logo['type'];
							
								if( $loc_logo && $log_logo_type === 'image' ) {
									echo '<img src="'.$loc_logo['url'].'" alt="'.$loc_logo['alt'].'" width="300" class="location-logo">';
								}

								echo '<ul class="uk-list uk-list-space location-meta-list">';
									$price = get_field( 'lodging_price_range_radio' );
									
									if( ! empty( $price ) ) {
										echo '<li>';
											echo '<span class="location-meta-title">Price Range:</span>';
											echo '<hr class="uk-margin-small">';
											echo '<span class="location-meta-value price-range">';
												echo $price;
											echo '</span>';
										echo '</li>';
									}
									
									$payments = get_field( 'payment_methods_accepted_checkbox' );
									
									if( ! empty( $payments[0] ) ) {
										echo '<li>';
											echo '<span class="location-meta-title">Payment Methods:</span>';
											
											echo '<hr class="uk-margin-small">';
											
											echo '<span class="location-meta-value">';
												foreach( $payments as $payment ) {
												echo '<span class="pf pf-'.$payment['value'].'" data-uk-tooltip="{pos:\'top\',animation:true}" title="'.$payment['label'].' Accepted">&nbsp;</span>';
												}
											echo '</span>';
										echo '</li>';
									}

									$social_accounts = get_field( 'social_media_repeater' ); 
									
									if( is_array( $social_accounts ) && ! empty( $social_accounts ) ) {
										echo '<li>';
											echo '<span class="location-meta-title">Social Media:</span>';
											
											echo '<hr class="uk-margin-small">';
											
											echo '<span class="location-meta-value">';
										
											foreach( $social_accounts as $social_account ) {
												if( ! empty( $social_account['platform_select']['value'] ) ) {
													$platform_name = str_replace(',', '', $social_account['platform_select']['value']);
												}

												if( ! empty( $social_account['url_text'] ) ) {
													$platform_url = url_parser( $social_account['url_text'] );
												}

												if( $platform_name && $platform_url ) {
													echo '<a href="' . $platform_url . '" title="View ' . get_the_title($post->ID) . ' on ' . $platform_name . '" target="_blank"><i class="uk-icon-' . $platform_name . '"></i></a>';
												}
											}
	
											echo '</span>';
										echo '</li>';
									}
	
									$review_sites = get_field( 'review_sites_repeater' );
									
									if( is_array( $review_sites ) && ! empty( $review_sites ) ) {
										echo '<li>';
											echo '<span class="location-meta-title">Reviews:</span>';
											
											echo '<hr class="uk-margin-small">';
											
											echo '<span class="location-meta-value">';
										
											foreach( $review_sites as $review_site ) {
												if( ! empty( $review_site['platform_select']['label'] ) ) {
													$platform_name = str_replace(',', '', $review_site['platform_select']['label']);
												}

												if( ! empty( $review_site['url_text'] ) ) {
													$platform_url = url_parser( $review_site['url_text'] );
												}

												if( $platform_name && $platform_url ) {
													echo '<a href="' . $platform_url . '" title="View ' . get_the_title($post->ID) . ' on ' . $platform_name . '" target="_blank"><i class="uk-icon-' . $platform_name . '"></i>';
														echo $platform_name;
													echo'</a>';
												}
											}
	
											echo '</span>';
										echo '</li>';
									}
	
									$seasons = get_field( 'season_of_operation_checkbox' ); 
									
									if( ! empty( $seasons ) ) {
										echo '<li>';
											echo '<span class="location-meta-title">Seasons:</span>';
											
											echo '<hr class="uk-margin-small">';
											
											echo '<span class="location-meta-value">';
												foreach( $seasons as $season ) {
													echo '<span class="season-tag">' . $season . '</span>';
												}
											echo '</span>';
										echo '</li>';
									}

									$days = array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' );
									$open_prefix = '_open_';
									
									foreach( $days as $day ) {
										$closed = $post->$day . $open_prefix . closed;
										$from   = $post->$day . $open_prefix . from_select;
										$to     = $post->$day . $open_prefix . to_select;
									}
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
												echo '<span class="amenity-icon">' . $food_amenity .'</span>';
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
								
							<?php else : ?>
								
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
				//<?php
				//global $post;

				if( is_user_logged_in() ) {
					$nearby_choice = get_field( 'nearby_choice' );

					if( ! empty( $nearby_choice ) ) :
						?>
						<section class="uk-container uk-container-center section-spacing">
							<h2 class="uk-text-center section-heading">What's Nearby</h2>
							
							<div class="uk-slidenav-position" data-uk-slider>
								<div class="uk-slider-container">
									<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel-tiles">
										<?php foreach( $nearby_choice as $post ) :
											setup_postdata( $post );
											
											$carousel_type = get_post_type( $post->ID );
											$carousel_obj = get_post_type_object( $carousel_type );
											$carousel_title = $carousel_obj->label;
											
											$title_color = '';
											
											if( $carousel_type == 'outdoor' ) {
												$title_color = 'green';
											}
											elseif( $carousel_type == 'attraction' ) {
												$title_color = 'yellow';
											}
											elseif( $carousel_type == 'food_drink' ) {
												$title_color = 'orange';
											}
											elseif( $carousel_type == 'lodging' ) {
												$title_color = 'blue';
											}
											
											$thumb_array = get_field( 'tile_image', $post->ID );

											if( ! empty( $thumb_array ) ) :
												$img_src = $thumb_array['sizes']['large'];
												?>
												<div class="carousel-tile">
													<a href="<?php echo get_the_permalink( $post->ID ); ?>" class="carousel-link">
														<img src="<?php echo $img_src; ?>" class="full-width-image lazyload">
	
														<h3 class="section-title text-shadow small-shadow"><?php echo $carousel_title; ?></h3>
	
														<h4 class="sub-section-title overlay-<?php echo $title_color; ?> text-shadow small-shadow"><?php echo get_the_title( $post->ID ); ?></h4>
													</a>
												</div>
												<?php endif;
											wp_reset_postdata(); 
										endforeach; ?>
									</div>
								</div>
						
								<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
								<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
							</div>
						</section>
						
						<?php
						
						else :
							pods_view( 'src/partials/tile/tile-discover.php' );
						endif;
				}
				else {
					pods_view( 'src/partials/tile/tile-discover.php' );
				}
				?>

				<section class="uk-container uk-container-center section-spacing exclude-print">
					<div class="widgets-section two-widgets">
						<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
							<div class="primary-widget">
								<?php pods_view( 'src/partials/widget/widget-newsletter-signup-featured.php' ); ?>
							</div>
		
							<div class="primary-widget">
								<?php pods_view( 'src/partials/widget/widget-events.php' ); ?>
							</div>
						</div>
					</div>
				</section>

				<?php
				if( is_singular( 'outdoor' ) ) :
					$carousel_title = 'Outdoors';
					$carousel_type = 'outdoor';
					$parent = '0';
					$title_color = 'green';
					
					include( locate_template('template-parts/carousel/carousel-default.php') );
				elseif( is_singular( 'attraction' ) ) :
					$carousel_title = 'Attractions';
					$carousel_type = 'attractions';
					$parent = '0';
					$title_color = 'yellow';
					
					include( locate_template('template-parts/carousel/carousel-default.php') );
				elseif( is_singular( 'food_drink' ) ) :
					pods_view( 'src/partials/carousel/carousel-food-drink.php' );
				elseif( is_singular( 'lodging' ) ) :
					pods_view( 'src/partials/carousel/carousel-lodging.php' );
				endif;
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
			url: '<?php echo get_template_directory_uri(); ?>/assets/img/map-marker-blue.svg',
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
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDwsu4lJajAIL_Z1pJNAELGh7j66Ybgxxw&callback=initMap" defer></script>