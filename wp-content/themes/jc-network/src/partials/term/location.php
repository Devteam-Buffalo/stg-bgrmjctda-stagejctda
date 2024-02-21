<?php
/*
**  @file               location.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/9/17
*/
defined( 'ABSPATH' ) || exit; 

function get_location_data_list( $post ) {
	$pods = pods( $post->post_type, $post->ID );
	$icon = URI.'src/assets/img/' . $post->post_type . '-icon-default.svg';
	
	$output = array(
		'lat'  => $pods->row()['latitude'],
		'lon'  => $pods->row()['longitude'],
		'name' => $pods->row()['business_name'],
		'desc' => $pods->row()['summary'] ?: $pods->row()['short_description'],
		'img'  => $pods->row()['featured_photo'] ?: $icon,
		'url'  => get_permalink( $post->ID ),
	);
	
	return $output;
}
?>

<article class="jc-hero-map jc-has-map" role="article">
	<?php pods_view( 'src/partials/hero/location-term.php', compact( array_keys( get_defined_vars() ) ) ); ?>

	<div class="entry-content">
		<div class="location-content-container">
			<div class="location-content">
				<?php if( ! is_mobile() || ! is_tablet() ) : ?>
			
				<section class="uk-container uk-container-center locations-map-container">
					<div class="locations-map">
						<div id="locations-map-frame" class="map">
							<?php foreach( $posts as $post ) : $data = get_location_data_list( $post ); ?>
							
							<div class="marker" data-lat="<?php echo $data['lat']; ?>" data-lng="<?php echo $data['lon']; ?>">
								<a href="<?php echo $data['url']; ?>" title="View <?php echo $data['name']; ?>" class="marker-link">
									<h5><?php echo $data['name']; ?></h5>
									<p><?php echo $data['desc']; ?></p>
									<span class="button blue-button">View Location</span>
								</a>
							</div>

							<?php endforeach; ?>
						</div>
						
						<div class="locations-list-overlay-container">
							<div class="locations-list-overlay">
								<div class="locations-list">
									<?php foreach( $posts as $post ) : $data = get_location_data_list( $post ); ?>
									<div class="location-container">
										<a href="<?php echo $data['url']; ?>" title="View <?php echo $data['name']; ?>" class="uk-grid uk-grid-small location-link">
											<div class="uk-width-1-4 location-image">
												<div style="background: transparent url(<?php echo $data['img']; ?>) center center no-repeat; background-size: cover;"><canvas height="100" width="100"></canvas></div>
											</div>
											<div class="uk-width-3-4 location-content">
												<h3 class="location-name"><?php echo $data['name']; ?></h3>
												<p class="location-excerpt"><span><?php echo $data['desc']; ?></span></p>
											</div>
										</a>
									</div>
										<?php
									endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</section>

				<?php endif; ?>

				<section class="uk-container uk-container-center section-spacing uk-padding-bottom-remove">
					<div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
						<?php foreach( $posts as $post ) : $data = get_location_data_list( $post ); ?>
						<div>
							<a href="<?php echo $data['url']; ?>" title="View <?php echo $data['name']; ?>" class="uk-grid uk-grid-small location-link">
								<div class="uk-width-1-4 location-image">
									<div style="background: transparent url(<?php echo $data['img']; ?>) center center no-repeat; background-size: cover;"><canvas height="100" width="100"></canvas></div>
								</div>
	
								<div class="uk-width-3-4 location-content">
									<h3 class="location-name"><?php echo $data['name']; ?></h3>
									<p class="location-excerpt"><span><?php echo $data['desc']; ?></span></p>
								</div>
							</a>
						</div>
						<?php endforeach; ?>
					</div>
				</section>

				<?php pods_view( 'src/partials/carousel/carousel-term.php', compact( array_keys( get_defined_vars() ) ) ); ?>
			</div>
		</div>
	</div>
</article>