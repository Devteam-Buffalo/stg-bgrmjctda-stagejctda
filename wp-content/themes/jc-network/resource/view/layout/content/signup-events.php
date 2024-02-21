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

<div class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2" data-uk-grid-margin>
	<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
	<div>
		<div class="uk-height-1-1 background-light-blue">
			<div class="signup-widget">
				<header class="uk-flex uk-flex-middle uk-padding-horizontal-small uk-padding-vertical-small background-blue">
					<img src="<?= ASSETS . '/img/email-signup.svg' ?>" alt="Join Our Newsletter" height="46px">

					<h3 class="uk-margin-remove white-text">
						<span class="uk-hidden-small">&nbsp;&nbsp;Join Our Newsletter</span>
						<span class="uk-visible-small">&nbsp;&nbsp;Receive Our Newsletter</span>
					</h3>
				</header>

				<div class="uk-padding">
					 <div class="uk-text-center uk-text-large uk-padding-vertical-xsmall uk-hidden-small">Sign up for our newsletter and receive Jackson County news in your inbox!</div>
					 <?= shortcode_exists( 'gravityform' ) ? do_shortcode('[gravityform id="5" title="false" description="false" ajax="true" tabindex="-1"]') : false ?>
				</div>

				<div class="uk-padding-horizontal uk-padding-vertical-small uk-text-small uk-text-center sans-regular">
					<?= apply_filters( 'the_content', get_option( 'jc_general_settings_signup_form_disclaimer' ) ) ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif ?>

	<?php if ( function_exists( 'tribe_get_events' ) ) : ?>
	<div>
		<div class="uk-height-1-1 background-light-orange">
			<?php get_template_part( 'resource/view/partial/widget/event' ) ?>
		</div>
	</div>
	<?php endif ?>
</div>
