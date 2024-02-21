<?php
/*
**  Template Name:      Blue Ridge Craft Trail
**  Template Post Type: page, outdoor
**  Description:        Landing Page
**
**  @file               page-template-landing.php
**  @package            jctda
**  @since              1.0.0
**  @author             lpeterson
**  @date               5/3/18
*/
defined( 'ABSPATH' ) || exit;

get_template_part( 'resource/view/partial/header/get-header-full' );

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
	<?php
	/** Declaration Part */
	$intro_title = get_field('intro_title');
	$intro_content = get_field('intro_content');
	$feature_title = get_field('feature_title');
	$feature_content = get_field('feature_content');

	?>
		<main class="uk-container uk-container-center">
			<div class="uk-grid uk-grid-large uk-padding-bottom-medium">
				<div class="uk-width-large-2-3">
					<header class="uk-padding-top uk-margin-bottom post-header br-craft">
						<div class="intro uk-text-left">
							<h1><?php echo get_the_title() ?></h1>
							<?php if($intro_title) { ?>
								<h2><?php echo $intro_title; ?></h2>
							<?php } ?>
							<?php if($intro_content) { ?>
								<?php echo $intro_content; ?>
							<?php } ?>
						</div>
						<div class="feature uk-text-left">
							<?php if($feature_title) { ?>
								<h3><?php echo $feature_title; ?></h3>
							<?php } ?>
							<?php if($feature_content) { ?>
								<?php echo $feature_content; ?>
							<?php } ?>
						</div>
						<?php if( have_rows( 'video_list' ) ) { ?>
							<div class="video-block ">
								<?php $video_title = get_field('video_title'); ?>
								<?php if($video_title) { ?>
									<h3><?php echo $video_title; ?></h3>
								<?php } ?>
								<div class="video-block-wrapper">
									<?php while( have_rows( 'video_list' ) ) {
										the_row();
										$upload_video = get_sub_field('upload_video'); ?>
										<div class="video-item">
											<div class="video-item-inner">
												<video id="popupvideo" src="<?php echo $upload_video; ?>" controls preload></video>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</header>
				</div>
				<div class="uk-width-large-1-3">
					<aside class="uk-padding-large background-light-grey">
						<?php if( have_rows( 'event_listing' ) ) { ?>
							<div class="event-block">
								<?php $event_heading = get_field('event_heading'); ?>
								<?php if($event_heading) { ?>
									<h4><?php echo $event_heading; ?></h4>
								<?php } ?>
								<div class="event-block-inner">
									<?php while( have_rows( 'event_listing' ) ) {
										the_row();
										$event_name = get_sub_field('event_name');
										$event_detail = get_sub_field('event_detail');?>
										<div class="event-item">
											<?php if($event_name) { ?>
												<h5><?php echo $event_name; ?></h5>
											<?php } ?>
											<?php if($event_detail) { ?>
												<p><?php echo $event_detail; ?></p>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>

					</aside>
				</div>
			</div>
			<hr>
			<div class="uk-flex uk-flex-column uk-flex-column-reverse ">
				<section class="post-content print">
					<?php if( have_rows( 'town_listing' ) ) { ?>
						<div class="town-section uk-padding-top-medium">
							<?php while( have_rows( 'town_listing' ) ) { the_row();
								$town_title = get_sub_field('town_title'); ?>
								<div class="town-block">
									<?php if($town_title) { ?>
										<h2><?php echo $town_title; ?></h2>
									<?php } ?>
									<?php if( have_rows( 'town_location_list' ) ) { ?>
										<div class="town-list uk-padding-bottom-medium">
											<?php while( have_rows( 'town_location_list' ) ) {
												the_row();
												$town_location_image = get_sub_field('town_location_image');
												$town_location_title = get_sub_field('town_location_title');
												$town_location_intro = get_sub_field('town_location_intro'); ?>
												<div class="town-item">
													<div class="town-item-inner">
														<?php if( $town_location_image ) { ?>
															<div class="town-image">
																<div class="promo-image-inner">
																	<?php echo wp_get_attachment_image( $town_location_image, 'full' ); ?>
																</div>
															</div>
														<?php } ?>
														<div class="town-detail">
															<?php if($town_location_title) { ?>
																<h3><?php echo $town_location_title; ?></h3>
															<?php } ?>
															<?php if($town_location_intro) { ?>
																<p><?php echo $town_location_intro; ?></p>
															<?php } ?>
														</div>
													</div>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</section>
			</div>
		</main>
	<?php endwhile;
endif;

get_template_part( 'resource/view/partial/footer/get-footer-full' );
