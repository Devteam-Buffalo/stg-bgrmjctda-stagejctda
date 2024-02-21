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

$addr = isset( $post->address, $post->zip_code ) ? $post->address .' '. $post->zip_code : false;
$addr_lat = get_post_meta( $post->ID, 'latitude', true ) ?: get_post_meta( $post->ID, 'gps_1', true );
$addr_lng = get_post_meta( $post->ID, 'longitude', true ) ?: get_post_meta( $post->ID, 'gps_2', true );

$icon = JCTDA_TEMPLATE_URL.'/dist/img/map-pin.svg';

$phone_main = get_field( 'phone_number' ) ?? get_field( 'phone_main_text' );
$web_main = get_field( 'website' ) ?? get_field( 'website_main_text' );
$email_main = get_field( 'email' ) ?? get_field( 'email_address' );

$photos = [
	get_field_object('interior_photos_gallery'),
	get_field_object('scenic_photos_gallery'),
	get_field_object('special_feature_photos_gallery')
];

?>

<main>
	<article class="post-article" role="article">
		<style>header.ugc{transform:none}@media(min-width:960px){header.ugc{transform:translateY(-6rem)}}</style>
		<?= $post->cr_id ? jc_cr_hero(['cr_id'=>$post->cr_id]) : jc_page_hero(['image_url'=>get_the_post_thumbnail_url($post->ID, 'hero')]) ?>

		<section class="uk-container uk-container-center single-location">
			<div class="uk-grid">
				<div class="uk-width-large-7-10 uk-width-1-1 location-details left-column print">
					<div class="location-intro">
						<?php get_template_part( 'partials/post-intro' ) ?>
					</div>

					<div id="location-contact" class="location-contact">
						<h4>Contact Information</h4>
						<div class="uk-flex uk-flex-wrap">
							<div class="uk-flex-item-1 directions">
								<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click',remaintime:1500,pos:'top-left',justify:'#location-contact'}">
									<a href="javascript:void()" class="uk-link-muted" title="Get Directions to <?= $post->post_title; ?>">
										<span class="uk-display-block text-blue"><i class="uk-icon-map-marker"></i> Get Directions</span>

										<?php if ( isset( $post->address, $post->city, $post->state, $post->zip_code ) ) : ?>

										<span class="uk-display-block uk-text-meta"><?= $post->address.'<br>'.$post->city.', '.$post->state.' '.$post->zip_code ?></span>

										<?php elseif ( isset( $post->address ) ) : ?>

										<span class="uk-display-block uk-text-meta"><?= $post->address ?></span>

										<?php elseif ( $addr_lat && $addr_lng ) : ?>

										<span class="uk-display-block uk-text-meta"><?= "{$addr_lat}, {$addr_lng}" ?></span>

										<?php endif ?>
									</a>
									<div class="uk-dropdown uk-dropdown-width-2 location-directions no-print">
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
															<?= do_shortcode( "[gravityform id=19 title=false description=false ajax=true field_values='latitude={$addr_lat}&longitude={$addr_lng}&address={$addr}']" ) ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

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
						<div class="location-photo-gallery no-print">
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
					<?php if ( isset($post->logo_file) && 0 < strlen($post->logo_file) ) :  ?>
					<div class="uk-padding-vertical location-logo collapsible">
						<h6 class="collapsible-header location-meta-info" hidden>Company Logo</h6>
						<div class="collapsible-content">
							<img src="<?= pods_image_url( pods_field($post->post_type, $post->ID, 'logo_file') ) ?>" alt="<?php the_title_attribute() ?> Logo" width="300" class="location-logo">
						</div>
					</div>
					<?php endif ?>
					<?php if ( ($addr_lat && $addr_lng) || ($post->address && $post->zip_code) ) : ?>
					<div class="uk-padding-vertical location-map collapsible">
						<h6 class="collapsible-header location-meta-info" hidden>Map of Location</h6>
						<div class="collapsible-content">
							<div class="map">
								<?php
								$center = ($addr_lat && $addr_lng) ? join('+',[$addr_lat, $addr_lng]) : join('+',[$post->address, $post->zip_code]);
								$map_src = add_query_arg([
									'center' => $center,
									'zoom' => '10',
									'size' => '300x300',
									'maptype' => 'roadmap',
									'markers' => 'color:red%7C'.$center,
									'key' => 'AIzaSyD4Xw_d_U53FMsatSLwIZKTAGIzNe3Qj2w',
								], 'https://maps.googleapis.com/maps/api/staticmap');
								?>
								<img src="<?= $map_src ?>">
							</div>
						</div>
					</div>
					<?php endif ?>
					<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
					<div class="uk-padding-vertical location-meta collapsible no-print">
						<h6 class="collapsible-header location-meta-info">Send this Location via Text Message</h6>
						<div class="collapsible-content">
								<?= do_shortcode( '[gravityform id="13" title="false" description="false" ajax="true"]' ) ?>
						</div>
					</div>
					<?php endif ?>
					<?php if ( have_rows('review_sites_repeater') ) : ?>
					<div class="uk-padding-vertical location-meta icons collapsible no-print">
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
					<div class="uk-padding-vertical location-meta icons collapsible no-print">
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
						<div class="uk-padding-vertical location-meta collapsible no-print">
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
						<?php if ( isset( $post->directions_list ) && ( strlen( $post->directions_list ) > 0 ) ) : ?>
						<?php $directions = array_filter( explode( '\n', str_replace('"', '', wp_json_encode( strip_tags( $post->directions_list ), JSON_PRETTY_PRINT, 512 ) ) ), 'strlen' ); ?>
						<div class="uk-padding-vertical location-meta collapsible no-print">
							<h6 class="collapsible-header location-meta-info">Directions to Location</h6>
							<div class="collapsible-content location-steps">
								<?php if ( is_array( $directions ) && ( sizeof( $directions ) > 0 ) ) : ?>
									<?php foreach ( $directions as $index => $direction ) : ?>
									<div class="location-step" data-uk-toggle="{target:'#step-<?= $index ?>', cls:'text-bright-green'}" style="cursor:pointer">
										<p id="step-<?= $index ?>" class="uk-text-left">
											<i class="uk-icon-check uk-icon-justify"></i>
											<?= $direction ?>
										</p>
										<hr class="uk-margin-remove">
									</div>
									<?php endforeach ?>
								<?php endif ?>
							</div>
						</div>
						<?php elseif ( have_rows('directions_repeater') ) : ?>
						<div class="uk-padding-vertical location-meta collapsible no-print">
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
					<div class="uk-padding-vertical location-utility print no-print">
						<button type="button" title="Print this Page" class="uk-button uk-button-primary uk-button-large uk-width-1-1" onclick="window.print()"><i class="uk-icon-print"></i> <?php _e( 'Print this Page', 'jctda' ); ?></button>
					</div>
				</aside>
			</div>
			<?= jc_page_edit() ?>
		</section>
		<div class="uk-container uk-container-center no-print">
			<?php get_template_part( 'partials/search-body' ) ?>
		</div>
		<div class="signup-event no-print">
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
		<div class="uk-block no-print">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">Discover Jackson County</h3>
				<?php jc_carousel_posts( [ 'include' => [ 6517, 6748, 6021, 6019 ] ] ) ?>
			</div>
		</div>
		<div class="uk-block no-print">
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
