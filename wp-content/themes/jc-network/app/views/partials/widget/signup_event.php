<?php
/*
**  @file               signup-events.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/4/18
*/
defined( 'ABSPATH' ) || exit; ?>

<div class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2">
	<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
	<aside>
		<div class="uk-flex uk-flex-column background-light-blue signup-widget">
			<header class="uk-flex uk-flex-middle uk-padding-small background-blue">
				<img src="<?= ASSET . '/img/email-signup.svg' ?>" alt="Join Our Newsletter" width="32" class="uk-flex-item-1">
	
				<h3 class="uk-flex-item-auto uk-margin-remove text-white">&nbsp;&nbsp;Join Our Newsletter</h3>
			</header>
			
			<div class="uk-padding-horizontal">
				<p class="uk-margin-remove uk-padding-top-small uk-text-center uk-text-large sans-regular text-grey">
					<?= wp_kses_post( 'Sign up for our newsletter and receive Jackson County news in your inbox!' ) ?>
				</p>
				
				<?= do_shortcode('[gravityform id="5" title="false" description="false" ajax="true" tabindex="-1"]') ?>
			</div>
			
			<p class="uk-margin-remove uk-padding-vertical-xsmall uk-padding-horizontal uk-text-small uk-text-center sans-regular text-grey">
				<small><?= wp_kses_post( get_option( 'jc_general_settings_signup_form_disclaimer' ) ) ?></small>
			</p>
		</div>
	</aside>
	<?php endif ?>



	<?php if ( function_exists( 'tribe_get_events' ) ) : ?>
	<aside>
		<div class="uk-flex uk-flex-column background-light-orange events-widget">
			<header class="uk-flex uk-flex-space-between uk-flex-middle uk-padding-small background-orange">
				<img src="<?= ASSET . '/img/events.svg' ?>" alt="Upcoming Events" width="32" class="uk-flex-item-1">
	
				<h3 class="uk-flex-item-auto uk-margin-remove text-white">&nbsp;&nbsp;Upcoming Events</h3>
	
				<a href="<?= get_permalink( get_page_by_title( 'Calendar', null, 'page' ) ) ?>" title="See All Events" class="uk-flex-item-1 uk-text-small text-white">See All Events</a>
			</header>
		
			<div class="uk-padding-horizontal">
				<?php get_template_part( 'resource/view/partial/widget/event' ) ?>
			</div>
		</div>
	</aside>
	<?php endif ?>
</div>