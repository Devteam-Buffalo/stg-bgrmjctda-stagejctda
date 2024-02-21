<?php
/*
**  @file               event.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/19/18
*/
defined( 'ABSPATH' ) || exit;

$events = tribe_get_events([
	'posts_per_page' => 1,
	'start_date'     => date( 'Y-m-d H:i:s' ),
	'featured'       => true
]);

if ( $events ) :
	foreach ( $events as $event ) : setup_postdata( $event );

	$start = strtotime( $event->EventStartDate );
	$end = strtotime( $event->EventEndDate );
	$month_s = strftime( '%b', $start );
	$month_e = strftime( '%b', $end );
	$day_s = strftime( '%d', $start );
	$day_e = strftime( '%d', $end );
	$time_s = date( 'g:i a', $start );
	$time_e = date( 'g:i a', $end ); ?>

	<div class="events-widget-container no-print">
		<div class="events jc-events">
			<header class="uk-flex uk-flex-middle uk-padding-horizontal-small uk-padding-vertical-small background-orange">
				<img src="https://storage.googleapis.com/jctda-cdn/assets/img/events.svg" alt="Upcoming Events" height="46px">

				<h3 class="uk-flex-item-auto uk-margin-remove white-text">&nbsp;&nbsp;Upcoming Events</h3>

				<a href="<?= get_permalink( get_page_by_title( 'Calendar', null, 'page' ) ) ?>" title="See All Events" class="uk-text-small uk-float-right white-text">See All Events</a>
			</header>

			<div class="uk-padding">
				<h3><a href="<?= esc_url( get_permalink( $event->ID ) ) ?>" title="Read <?php the_title_attribute() ?>"><?= get_the_title( $event->ID ) ?></a></h3>

				<p>
					<?php if ( $day_s == $day_e ) : ?>
					<span class="entry-month all-day"><?= $month_s ?> </span>
					<span class="entry-day all-day"><?= $day_s ?> </span>
					<span>&nbsp;//&nbsp;</span>
					<?php else : ?>
					<span class="entry-month"><?= $month_s ?> </span>
					<span class="entry-day"><?= $day_s ?> </span>

					<strong>until </strong>

					<span class="entry-month"><?= $month_e ?> </span>
					<span class="entry-day"><?= $day_e ?> </span>

					<span>&nbsp;//&nbsp;</span>
					<?php endif ?>

					<span>Starts: <?= $time_s ?> </span>
					<span>Ends: <?= $time_e ?> </span>
				</p>

				<?= apply_filters( 'the_excerpt', substr( get_the_excerpt( $event->ID ), 0, 150 ) ) ?>

				<a href="<?= esc_url( get_permalink( $event->ID ) ) ?>" class="uk-button uk-button-large uk-button-warning" title="Read <?php the_title_attribute( $event->ID ) ?>">See Event</a>
			</div>
		</div>
	</div>

	<?php endforeach; wp_reset_postdata(); ?>
<?php endif ?>
