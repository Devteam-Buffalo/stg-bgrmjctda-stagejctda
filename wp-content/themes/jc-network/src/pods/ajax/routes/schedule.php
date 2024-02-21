<?php
/*
**  @file    route-schedule-a.php
**  
**  @desc    
**  
**  @path    /route-schedule-a.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/25/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<h6>
	Bus Route Schedule

	<?php if( ! empty( $sched_file ) ) : ?>
		<button type="submit" class="uk-button uk-button-danger" title="Download Schedule for Route <?php echo $code; ?>" onclick="window.open('<?php echo $sched_file; ?>')">Download Schedule</button>
	<?php endif; ?>
</h6>

<button class="uk-button uk-button-default uk-hidden@m" type="button" role="tab" uk-switcher-item="previous">Prev<span uk-pagination-previous></span></button>
<button class="uk-button uk-button-default uk-hidden@m" type="button" role="tab" uk-switcher-item="next">Next<span uk-pagination-next></span></button>

<div class="uk-flex uk-grid-collapse uk-child-width-expand" role="tablist" uk-grid uk-switcher connect="#stop-schedule" animation="uk-animation-fade" active="0" duration="150" data-tablist>
	<?php foreach($sched_data['schedule'] as $button) :
		$sch_id = $button['serviceId'];
		$dir_id = $button['directionId'];
		
		if( $sch_id == 'c_1955_b_1244_d_31' && $dir_id == '0' ) echo '<button class="uk-button uk-button-text uk-visible@m" type="button" role="tab">' .$mf_out. '</button>';
		if( $sch_id == 'c_1955_b_1244_d_31' && $dir_id == '1' ) echo '<button class="uk-button uk-button-text uk-visible@m" type="button" role="tab">' .$mf_inb. '</button>';
		if( $sch_id == 'c_1955_b_1244_d_32' && $dir_id == '0' ) echo '<button class="uk-button uk-button-text uk-visible@m" type="button" role="tab">' .$sat_out. '</button>';
		if( $sch_id == 'c_1955_b_1244_d_32' && $dir_id == '1' ) echo '<button class="uk-button uk-button-text uk-visible@m" type="button" role="tab">' .$sat_inb. '</button>';
		if( $sch_id == 'c_1955_b_1244_d_64' && $dir_id == '0' ) echo '<button class="uk-button uk-button-text uk-visible@m" type="button" role="tab">' .$sun_out. '</button>';
		if( $sch_id == 'c_1955_b_1244_d_64' && $dir_id == '1' ) echo '<button class="uk-button uk-button-text uk-visible@m" type="button" role="tab">' .$sun_inb. '</button>';
	endforeach; ?>
</div>

<ul id="stop-schedule" class="uk-switcher">
	<?php foreach($sched_data['schedule'] as $schedules) : ?>
	<li id="schedule_<?php echo $schedules['serviceId']; ?>" role="tabpanel" data-table>
		<div class="uk-flex">
			<div class="fixed">
				<div class="cell head">&nbsp;</div>
				
				<?php if( isset($schedules['stops']) ) : ?>
					<?php foreach($schedules['stops'] as $sch_stops) : ?>
					<div class="cell"><?php echo $sch_stops['stopName']; ?></div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			
			<div class="uk-flex-1 cols">
				<div class="uk-flex">
					<?php foreach($schedules['timesForTrip'] as $sch_trips) : ?>
					<div class="col">
						<div class="cell head"><abbr title="<?php echo $sch_trips['tripHeadsign'] ?>" class="tooltip">Trip</abbr></div>
						
						<?php if( isset($sch_trips['times']) ) : ?>
							<?php foreach($sch_trips['times'] as $sch_times) : ?>
							<div class="cell value"><?php echo isset($sch_times['timeStr']) ? $sch_times['timeStr'] : ' &mdash; '; ?></div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</li>
	<?php endforeach; ?>
</ul>
