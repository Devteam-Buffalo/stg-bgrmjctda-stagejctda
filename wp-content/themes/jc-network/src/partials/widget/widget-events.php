<?php


$events = tribe_get_events( array(
	'posts_per_page' => 1,
	'start_date'     => date( 'Y-m-d H:i:s' ),
	'featured'       => true
) );

if( $events ) :

foreach($events as $event) : setup_postdata($event); 

$event_excerpt = get_the_excerpt();
$event_start_date = $event->EventStartDate;
$event_end_date = $event->EventEndDate;

$start_month_name = ucfirst(strftime("%b", strtotime($event_start_date)));
$end_month_name = ucfirst(strftime("%b", strtotime($event_end_date)));

$start_month_day = ucfirst(strftime("%d", strtotime($event_start_date)));
$end_month_day = ucfirst(strftime("%d", strtotime($event_end_date)));

$start_time = ucfirst(date("g:i a", strtotime($event_start_date)));
$end_time = ucfirst(date("g:i a", strtotime($event_end_date)));

?>
	<div class="widget events-widget-container jc-events-widget">
		<div class="events jc-events">
			<header class="widget-header jc-events-header">
				<h4 class="widget-title jc-events-title">
					Upcoming Events
	
					<a href="/calendar/" title="See All Events" class="uk-float-right"><small>See All Events</small></a>
				</h4>
			</header>
	
			<div class="widget-content jc-events-content">
				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-large-1-5 uk-width-1-1">
						<div class="time-date">
						<?php if( $start_month_day == $end_month_day ) : ?>
							<time class="uk-text-center entry-date published" datetime="date_string">
								<span class="entry-month all-day"><?php echo $start_month_name; ?></span>

								<span class="entry-day all-day"><?php echo $start_month_day; ?></span>
							</time>
						<?php else : ?>
							<time class="uk-text-center entry-date published" datetime="date_string">
								<div>
									<span class="entry-month"><?php echo $start_month_name; ?></span>
									<span class="entry-day"><?php echo $start_month_day; ?></span>
								</div>
							</time>
							
							<strong>until</strong>
							
							<time class="uk-text-center entry-date published" datetime="date_string">
								<div>
									<span class="entry-month"><?php echo $end_month_name; ?></span>
									<span class="entry-day"><?php echo $end_month_day; ?></span>
								</div>
							</time>
						<?php endif; ?>
						</div>
					</div>
	
					<div class="uk-width-large-4-5 uk-width-1-1">
						<h5>
							<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="Read <?php the_title(); ?>" class=""><?php the_title(); ?></a>
						</h5>
						
						<p class="uk-article-lead">
							<?php
							if( ! empty( $start_time ) ) echo '<span>Starts: ' . $start_time . '</span>';
							if( ! empty( $end_time ) ) echo '<span>Ends: ' . $end_time . '</span>';
							?>
						</p>
						
						<?php 
						if( ! $start_month_day == $end_month_day ) {
							echo '<p>' . substr($event_excerpt, 0, 300) . ' &hellip; </p>';
						}
						else {
							echo '<p>' . substr($event_excerpt, 0, 150) . ' &hellip; </p>';
						}
						?>
	
						<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="See Event" class="button orange-button">See Event</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; wp_reset_postdata();

endif;