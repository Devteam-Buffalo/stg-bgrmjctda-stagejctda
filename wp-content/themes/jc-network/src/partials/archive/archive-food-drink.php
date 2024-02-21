<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('uk-margin-large-bottom uk-padding-large-bottom'); ?>>
	<?php pods_view( 'src/partials/hero/hero-archive-food-lodging.php' ); ?>
	
	<div class="entry-content">
		<div class="location-content-container">
			<div class="location-content">
				<section class="uk-container uk-container-center locations-map-container">
					<div class="locations-map">
						<div id="locations-map-frame">
							<?php
							global $post;
							
							$args = array(
								'post_type'        => 'food_drink',
								'posts_per_page'   => -1,
								'orderby'          => 'date',
								'order'            => 'DESC',
								'post_status'      => 'publish' );
							
							$posts = get_posts($args);
							
							foreach($posts as $post) : setup_postdata($post); 

							$addr1 = get_field('physical_address_1_text');
							$addr2 = get_field('physical_address_2_text');
							$city = get_field('physical_city_text');
							$state = get_field('physical_state_select');
							$zip = get_field('physical_zip_code_text');
							
							$loc_title = get_the_title();
							
							if( ! empty( $addr1 ) ) {
								$full_add = $addr1 . ' ' . $addr2 . ' ' . $city . ' ' . $state . ' ' . $zip;
								$prepAddr = str_replace(' ', '+', $full_add);
							}
							else {
								$full_add = $loc_title . ' NC USA';
								$prepAddr = str_replace(' ', '+', $full_add);
							}

							$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyBZ8CfRIWuqyG5yxbfcuySe9zPty20CIzM');
							$output = json_decode($geocode);
							$gps_1 = $output->results[0]->geometry->location->lat;
							$gps_2 = $output->results[0]->geometry->location->lng;
							?>
								<div class="marker" data-lat="<?php //echo $gps_1; ?>" data-lng="<?php //echo $gps_2; ?>" data-distance="<?php //echo $distance; ?>">
									<h5><?php the_field('business_name_text'); ?></h5>

									<p><?php the_field('summary_textarea'); ?></p>

									<a href="<?php the_permalink(); ?>" title="View <?php the_field('business_name_text'); ?>" class="">View Location</a>
								</div>
								<?php
							endforeach; ?>
						</div>
						
						<div class="locations-list-overlay-container">
							<div class="locations-list-overlay">
								<ul class="uk-list locations-list">
									<?php foreach($posts as $post) : setup_postdata($post); ?>
										<li id="post-<?php the_id(); ?>" <?php post_class('location-container'); ?>>
											<a href="<?php the_permalink(); ?>" title="" class="uk-grid uk-grid-small location location-link food-drink-location">
												<div class="uk-width-1-4 location-image">
													<?php
													$location_feat_img = get_field( 'featured_photo_img' );
													$location_feat_url = $location_feat_img['url'];
												
													if($location_feat_url) : ?>
														<?php echo wp_get_attachment_image( $location_feat_url, 'thumbnail', false, array('class', 'image') ); ?>
													<?php else : ?>
														<img src="<?php echo get_template_directory_uri(); ?>/assets/img/food-overlay-list-fallback-icon.svg" alt="<?php the_field('business_name_text'); ?>" width="100" height="100" class="">
													<?php endif; ?>
												</div>

												<div class="uk-width-3-4 location-content">
													<h3 class="location-name"><?php the_field('business_name_text'); ?></h3>
													<p class="location-excerpt"><span><?php the_field('summary_textarea'); ?></span></p>
												</div>
											</a>
										</li>
										<?php wp_reset_postdata();
									endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
				</section>
				
				<?php pods_view( 'src/partials/content/content-section-intro.php' ); ?>

				<section class="uk-container uk-container-center section-spacing">
					<div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
						<?php
						global $post;
			
						$args = array(
							'post_type'        => 'food_drink',
							'posts_per_page'   => -1,
							'orderby'          => 'date',
							'order'            => 'DESC',
							'post_status'      => 'publish' );
		
						$posts = get_posts($args);

						foreach($posts as $post) : setup_postdata($post);
						?>
							<div>
								<a href="<?php the_permalink(); ?>" title="" class="uk-grid uk-grid-small location location-link food-drink-location">
									<div class="uk-width-1-4 location-image">
										<?php
										$location_feat_img = get_field( 'featured_photo_img' );
										$location_feat_url = $location_feat_img['url'];
									
										if($location_feat_url) : ?>
											<?php echo wp_get_attachment_image( $location_feat_url, 'thumbnail', false, array('class', 'image') ); ?>
										<?php else : ?>
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/food-overlay-list-fallback-icon.svg" alt="<?php the_field('business_name_text'); ?>" width="100" height="100" class="">
										<?php endif; ?>
									</div>
	
									<div class="uk-width-3-4 location-content">
										<h3 class="location-name"><?php the_field('business_name_text'); ?></h3>
										<p class="location-excerpt"><span><?php the_field('summary_textarea'); ?></span></p>
									</div>
								</a>
							</div>
							<?php wp_reset_postdata();
						endforeach; ?>
					</div>
				</section>

				<?php pods_view( 'src/partials/carousel/carousel-food-drink.php' ); ?>

				<section class="uk-container uk-container-center section-spacing">
					<div class="section-search-container">
						<div class="section-search">
							<h2 class="uk-text-left section-heading">Search <?php //single_term_title(); ?></h2>
							
							<?php pods_view( 'src/partials/search/search-default.php' ); ?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="screen-reader-text entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php //pods_view( 'src/partials/list-locations-map.php' ); ?>