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

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_script('archive/map');
});

$single_term       = get_queried_object();
$single_term_id    = $single_term->term_id;
$single_term_title = $single_term->name;
$single_term_tax   = $single_term->taxonomy;
$single_term_desc  = $single_term->description;

$post_type_object = get_post_type_object(get_post_type());
$post_type_type   = $post_type_object->name;
$post_type_slug   = $post_type_object->rewrite['slug'];
$post_type_labels = $post_type_object->labels;
$post_type_name   = $post_type_labels->singular_name;

$hero_args = [
	'title'     => $single_term_title,
	'image_url' => pods_image_url(get_term_meta($single_term_id, 'hero', true), 'hero', JCTDA_TEMPLATE_URL."/dist/img/hero-{$post_type_slug}.jpg"),
];

get_header();?>
<style>
html{scroll-behavior:smooth}
html :target{
	position: relative;
	top:auto;
	-webkit-animation:smooth-scroll 2s;
	animation:smooth-scroll 2s;
}
@-webkit-keyframes smooth-scroll{
	0%,100%{top:0}
}
@keyframes smooth-scroll{
	0%,100%{top:0}
}
html :target{scroll-behavior:smooth}
</style>
<main>
	<article class="post-article" role="article">
		<header class="jc-hero no-print">
			<figure class="uk-cover-background uk-cover uk-flex uk-flex-middle" style="background: rgba(0,0,0,0.5) center/cover url(https://www.discoverjacksonnc.com/wp-content/uploads/2017/06/vacation-rentals-1600.jpg) no-repeat;background-blend-mode:overlay;height:auto;padding-top:2rem;padding-bottom:2rem;">
				<div class="uk-container uk-container-center no-print" style="padding-top:5%;color:white">
					<div class="uk-container-center">
						<div class="uk-grid uk-grid-large uk-flex-middle">
							<div class="uk-width-large-1-2">
								<h1 class="text-script text-white text-shadow"><?=$single_term_title?></h1>
								<p class="uk-text-large text-white text-shadow margin-bottom">See the map and listings below for more details on self-rented and self-listed rentals throughout Jackson County.</p>
								<a href="#below" class="uk-button uk-width-1-1 uk-width-medium-1-4 uk-text-center uk-margin-bottom uk-flex-center" style="display:inline-flex;padding:.5rem 1rem;border-radius:3px;box-shadow:0 0 0 1px inset var(--trans),0 5px 10px -5px var(--trans);background:var(--opaque);color:var(--blue)">See below&nbsp;&nbsp;<i class="uk-icon-chevron-down"></i></a>
							</div>
							<div class="uk-width-large-1-2">
								<div class="panel signup-widget no-print">
									<div class="uk-padding-small background-blue">
										<div class="panel-title">
											<h3 class="text-white margin-remove">
												<span>More Options: Vacation Rental Listing Sites</span>
											</h3>
										</div>
									</div>
									<div class="panel-body background-white">
										<div class="uk-padding uk-clearfix">
											<p class="text-blue">Use the links below to see a comprehensive listing of rental opportunities for the towns of Cashiers and Sylva.</p>
											<div class="uk-grid uk-grid-width-1-2 uk-grid-small">
												<div class="uk-flex uk-flex-wrap uk-flex-wrap-top uk-flex-wrap-space-between">
													<div style="max-width:40%;padding-right:5%">
														<img src="<?=constant('JCTDA_TEMPLATE_URL').'/dist/img/airbnb.png'?>">
													</div>
													<div>
														<a href="https://www.airbnb.com/s/Cashiers/all" target="_blank" class="text-blue" style="font-size:1.25rem;line-height:1.5;white-space:nowrap">Cashiers <i class="uk-icon-external-link-square uk-text-small"></i></a><br>
														<a href="https://www.airbnb.com/s/Sylva/all" target="_blank" class="text-blue" style="font-size:1.25rem;line-height:1.5;white-space:nowrap">Sylva <i class="uk-icon-external-link-square uk-text-small"></i></a>
													</div>
												</div>
												<div class="uk-flex uk-flex-wrap uk-flex-wrap-top uk-flex-wrap-space-between">
													<div style="max-width:40%;padding-right:5%">
														<img src="<?=constant('JCTDA_TEMPLATE_URL').'/dist/img/vrbo.png'?>">
													</div>
													<div>
														<a href="https://www.vrbo.com/vacation-rentals/usa/north-carolina/smoky-mountains/cashiers" target="_blank" class="text-blue" style="font-size:1.25rem;line-height:1.5;white-space:nowrap">Cashiers <i class="uk-icon-external-link-square uk-text-small"></i></a>
														<br>
														<a href="https://www.vrbo.com/vacation-rentals/usa/north-carolina/smoky-mountains/sylva" target="_blank" class="text-blue" style="font-size:1.25rem;line-height:1.5;white-space:nowrap">Sylva <i class="uk-icon-external-link-square uk-text-small"></i></a>
													</div>
												</div>
											</div>
											<p class="text-blue"><small><em>(You will leave this website when clicking these links)</em></small></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</figure>
		</header>



		<div class="uk-container-center uk-visible-large no-print" style="max-width:1400px;transform:translateY(-80px)">
			<div class="uk-width-1-1 background-white" style="border: 1px solid var(--light-grey);box-shadow: 0 2px 5px var(--trans);">
				<div class="uk-grid uk-grid-collapse">
					<div class="uk-width-3-10">
						<div class="uk-flex uk-flex-column uk-overflow-container" style="height:625px">
							<?php while (have_posts()):the_post();?>
							<div class="uk-position-relative">
								<div class="uk-text-truncate" style="height:125px">
									<div class="uk-grid uk-grid-collapse">
										<div class="uk-width-3-10">
											<div style="background-image:url('<?=strlen($post->featured_photo)?$post->featured_photo:JCTDA_TEMPLATE_URL."/dist/img/icon-{$post_type_slug}.svg"?>');padding-bottom:100%;" class="uk-width-1-1 uk-cover-background background-<?=$post_type_type?>"></div>
										</div>

										<div class="uk-width-7-10">
											<div class="uk-padding-small uk-text-large serif-regular text-blue"><?=$post->business_name?></div>
											<div class="uk-padding-small uk-padding-top-remove uk-padding-bottom-remove sans-regular text-dark-grey"><?=strip_tags($post->summary)?></div>
										</div>

										<a href="<?=get_the_permalink($post->ID)?>" title="View <?=$post->business_name?>" class="uk-position-cover"></a>
									</div>
								</div>
							</div>
							<?php endwhile?>
							</div>
					</div>

					<?php rewind_posts()?>
					<div class="uk-width-7-10">
						<div id="locations-map-frame" class="uk-width-1-1 uk-overflow-hidden" style="height:625px;">
							<?php while (have_posts()):the_post();?>
							<div class="marker map-marker" data-lat="<?=$post->latitude?>" data-lng="<?=$post->longitude?>">
								<p class="uk-h4"><?=$post->business_name?></p>
								<p><?=strip_tags($post->summary)?></p>
								<a href="<?=get_the_permalink($post->ID)?>" title="View <?=$post->business_name?>" class="uk-button uk-button-primary uk-width-1-1 marker-link background-<?=$post_type_type?>">View Location</a>
							</div>
							<?php endwhile?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php rewind_posts()?>
		<div id="below" style="transform:translateY(-5rem)"></div>

		<div class="uk-container uk-container-center" style="max-width:1300px">
			<div class="uk-text-center">
			<?php //get_template_part( 'partials/term-intro' ) ?>
			</div>

			<div class="uk-block">
				<div class="uk-grid uk-grid-large uk-grid-width-large-1-3 uk-grid-width-small-1-2 uk-grid-width-1-1 no-print" data-uk-grid-margin>
					<?php while (have_posts()):the_post();?>
					<div class="uk-position-relative">
						<div class="uk-grid uk-grid-small">
							<div class="uk-width-3-10">
								<div style="background-image:url('<?=strlen($post->featured_photo)?$post->featured_photo:JCTDA_TEMPLATE_URL."/dist/img/icon-{$post_type_slug}.svg"?>');padding-bottom:100%;" class="uk-width-1-1 uk-cover-background background-<?=$post_type_type?>"></div>
							</div>

							<div class="uk-width-7-10">
								<div class="uk-h3"><?=$post->business_name?></div>
							</div>
						</div>
						<div class="uk-padding-top sans-regular text-dark-grey"><?=strip_tags($post->summary)?></div>
						<a href="<?=get_the_permalink($post->ID)?>" title="View <?=$post->business_name?>" class="uk-position-cover"></a>
					</div>
					<?php endwhile?>
				</div>
			</div>

			<?php rewind_posts()?>

			<?php get_template_part('partials/search-body')?>
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small signup-event">
				<div>
					<?php get_template_part('partials/signup-widget')?>
				</div>

				<div>
					<?php get_template_part('tribe-events/widgets/list-widget')?>
				</div>
			</div>

			<div class="uk-block no-print">
				<h3 class="mountain"><?=$post_type_name?></h3>
				<?php jc_carousel_taxonomy($single_term_tax)?>
			</div>
		</div>
	</article>
</main>

<?php get_footer()?>
