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
?>

<div class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2 no-print" data-uk-grid-margin>
	<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
	<div>
		<div class="uk-height-1-1 background-light-blue">
			<?php get_template_part( 'partials/signup-widget' ) ?>
		</div>
	</div>
	<?php endif ?>

	<?php if ( function_exists( 'tribe_get_events' ) ) : ?>
	<div>
		<div class="uk-height-1-1 background-light-orange">
			<?php get_template_part( 'partials/event-widget' ) ?>
		</div>
	</div>
	<?php endif ?>
</div>
