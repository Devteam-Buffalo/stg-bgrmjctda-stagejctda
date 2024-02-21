<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Default Events Template
 *
 *     This file is the basic wrapper template for all the views if 'Default Events Template'
 *     is selected in Events -> Settings -> Display -> Events Template.
 *     Overridden by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @package         TribeEventsCalendar
 * @version         4.6.23
 * @since           20190209
 * @author          lpeterson
 */
?>

<?php get_header() ?>

<main id="tribe-events-pg-template" class="uk-container uk-container-center tribe-events-pg-template">
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</main> <!-- #tribe-events-pg-template -->

<?php get_footer() ?>
