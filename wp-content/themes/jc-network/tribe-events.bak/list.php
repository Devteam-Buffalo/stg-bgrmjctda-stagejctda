<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     List View Template
 *
 *     The wrapper template for a list of events. This includes the Past Events
 *     and Upcoming Events views as well as those same views filtered to a specific category.
 *     Overridden by creating a file at [your-theme]/tribe-events/list.php
 *
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @package         TribeEventsCalendar
 * @version         4.6.19
 * @since           20190209
 * @author          lpeterson
 */
?>

<?php do_action( 'tribe_events_before_template' ) ?>

<!-- Title Bar -->
<?php tribe_get_template_part( 'list/title-bar' ) ?>

	<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ) ?>

	<!-- Main Events Content -->
<?php tribe_get_template_part( 'list/content' ) ?>

	<div class="tribe-clear"></div>

<?php do_action( 'tribe_events_after_template' ) ?>
