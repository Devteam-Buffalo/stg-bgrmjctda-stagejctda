<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php pods_view( 'src/partials/hero/hero-parent.php' ); ?>
	
	<div class="entry-content">
		<div class="location-content-container">
			<div class="location-content">
				<?php if( ! is_mobile() && ! is_tablet() ) : ?>
				
				<section class="uk-container uk-container-center locations-map-container">
					<div class="locations-map">
						<div id="locations-map-frame">
							<?php
							global $post;
							
							$args = array(
								'post_type'        => 'outdoor',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_parent'      => $post->ID,
								'posts_per_page'   => -1,
								'offset'           => 0,
								'category'         => '',
								'category_name'    => '',
								'orderby'          => 'date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'post_mime_type'   => '',
								'author'		   => '',
								'post_status'      => 'publish' );
							
							$posts = get_posts($args);
							
							foreach($posts as $post) : setup_postdata($post); 

								$addr_array = get_field( 'address_gps' );
								$addr_full  = $addr_array['address'];
								$addr_lat   = $addr_array['lat'];
								$addr_lng   = $addr_array['lng'];
								?>
								<div class="marker" data-lat="<?php echo $addr_lat; ?>" data-lng="<?php echo $addr_lng; ?>">
									<a href="<?php the_permalink(); ?>" title="View <?php the_title(); ?>" class="marker-link">
										<h5><?php the_field('page_heading'); ?></h5>

										<p><?php the_field('page_subheading'); ?></p>

										View Location
									</a>
								</div>
								<?php
							endforeach; ?>
						</div>
						
						<div class="locations-list-overlay-container">
							<div class="locations-list-overlay">
								<ul class="uk-list locations-list">
									<?php foreach($posts as $post) : setup_postdata($post); ?>
										<li id="post-<?php the_id(); ?>" <?php post_class('location-container'); ?>>
											<a href="<?php the_permalink(); ?>" title="" class="uk-grid uk-grid-small location location-link outdoors-location">
												<div class="uk-width-1-4 location-image">
													<?php
													$location_feat_img = get_field( 'tile_image' );
													$location_feat_url = $location_feat_img['url'];
												
													if($location_feat_url) : ?>
														<img src="<?php echo $location_feat_url; ?>" alt="<?php the_field('page_heading'); ?>" width="100" height="100" class="image">
													<?php else : ?>
														<img src="<?php echo get_template_directory_uri(); ?>/assets/img/outdoors-overlay-list-fallback-icon.svg" alt="<?php the_field('page_heading'); ?>" width="100" height="100" class="">
													<?php endif; ?>
												</div>

												<div class="uk-width-3-4 location-content">
													<h3 class="location-name"><?php the_field('page_heading'); ?></h3>
													<p class="location-excerpt"><span><?php the_field('page_subheading'); ?></span></p>
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
				<?php
				endif;
				
				pods_view( 'src/partials/content/content-section-intro.php' );
				
				$masonry_type = 'outdoor';
				$parent = $post->ID;
				$title_color = 'green';
				
				include( locate_template('template-parts/masonry/masonry-default.php') );
				
				$carousel_title = 'Outdoors';
				$carousel_type = 'outdoor';
				$parent = '0';
				$title_color = 'green';
				
				include( locate_template('template-parts/carousel/carousel-default.php') );
				?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="screen-reader-text entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php 
if( ! is_mobile() && ! is_tablet() ) {
	pods_view( 'src/partials/map/map-single-parent.php' );
}
