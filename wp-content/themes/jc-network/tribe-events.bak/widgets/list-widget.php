<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Events List Widget Template
 *
 *     This view contains the filters required to create an events list widget view.
 *     You can use any or all filters included in this file
 *     Overridden by creating a file at tribe-events/widgets/list-widget.php
 *
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 * @version         4.5.13
 * @return          string
 * @package         TribeEventsCalendar
 */

$events = tribe_get_events([
	'posts_per_page' => 1,
	'start_date'     => date( 'Y-m-d H:i:s' ),
	'featured'       => true
]); ?>

<div class="panel event-widget">
	<div class="uk-padding-small background-orange">
		<div class="panel-title">
			<h3 class="text-white margin-remove">
				<svg class="widget-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 48"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path stroke-width="2" d="M40.984 36l6-5h-7L36 23l-3.984 8h-7l6 5-3 9L36 39.518 43.984 45z"/><path stroke-linecap="round" d="M41 23V5h-8M9 5H1v32h23"/><path stroke-linecap="round" d="M9 1h6v8H9zM27 1h6v8h-6zM15 5h12M1 15h40"/></g></svg>
				<span><a href="<?= esc_url( tribe_get_events_link() ) ?>" title="See All Events" rel="bookmark" class="text-white serif-light">Upcoming Events</a></span>
			</h3>
		</div>
	</div>
	<div class="panel-body background-light-orange">
		<?php if ( $events ) : ?>
			<?php foreach ( $events as $post ) : setup_postdata( $post ); ?>
			<div class="uk-padding">
				<div class="uk-grid uk-grid-small">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php do_action( 'tribe_events_list_widget_before_the_event_image' ) ?>

						<div class="uk-width-small-1-3 event-photo">
							<figure>
								<a href="<?= esc_url( tribe_get_event_link() ) ?>" title="View Event" rel="bookmark">
									<?php the_post_thumbnail( 'tile', ['class' => 'img-fit-cover'] ) ?>
								</a>
								<figcaption class="uk-text-center"><?php the_post_thumbnail_caption() ?></figcaption>
							</figure>
						</div>

						<?php do_action( 'tribe_events_list_widget_after_the_event_image' ) ?>
					<?php endif ?>

					<div class="uk-width-small-2-3 event-details">
						<?php do_action( 'tribe_events_list_widget_before_the_event_title' ) ?>

						<h4>
							<a href="<?= esc_url( tribe_get_event_link() ) ?>" rel="bookmark"><?php the_title() ?></a>
						</h4>

						<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>

						<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

						<div class="uk-text-justify">
							<?php $excerpt = explode( ' ', get_the_excerpt() ); ?>
							<p style="margin:1rem 0;font-size:.875rem;line-height:1.5"><?= tribe_events_event_schedule_details() ?> &mdash; <?= implode( ' ', array_slice( $excerpt, 0, 30 ) ) . ' &hellip;'; ?></p>
						</div>

						<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>

						<div class="event-link">
							<a href="<?= esc_url( tribe_get_event_link() ) ?>" title="View Event" rel="bookmark" class="padding-small background-orange text-white">
								<span>View Event</span><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; wp_reset_postdata(); ?>
		<?php else : ?>
			<p>There are no upcoming featured events at this time.</p>
		<?php endif ?>
	</div>
</div>

