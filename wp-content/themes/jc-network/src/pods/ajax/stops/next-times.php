<?php
/*
**  @file    next-times.php
**  
**  @desc    
**  
**  @path    /next-times.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/29/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php foreach($sched_data['schedule'] as $schedules) : ?>
<!-- <li id="schedule-<?php //echo $schedules['serviceId']; ?>" role="tabpanel" data-table> -->
<!-- 	<div class="uk-flex"> -->
<!-- 		<div class="fixed"> -->
<!-- 			<div class="cell head">&nbsp;</div> -->
			
			<?php //if( isset($schedules['stops']) ) : ?>
				<?php //foreach($schedules['stops'] as $sch_stops) : ?>
				<div class="cell"><?php //echo $sch_stops['stopName']; ?></div>
				<?php //endforeach; ?>
			<?php //endif; ?>
<!-- 		</div> -->
		
<!-- 		<div class="uk-flex-1 cols"> -->
<!-- 			<div class="uk-flex"> -->
				<?php foreach($schedules['timesForTrip'] as $sch_trips) : ?>
<!-- 				<div class="col"> -->
<!-- 					<div class="cell head"><abbr title="<?php //echo $sch_trips['tripHeadsign'] ?>" uk-tooltip>Trip</abbr></div> -->
					
					<?php if( isset($sch_trips['times']) ) : ?>
						<?php foreach($sch_trips['times'] as $sch_times) : ?>
						<div class="cell value"><?php echo isset($sch_times['timeStr']) ? $sch_times['timeStr'] : ' &mdash; '; ?></div>
						<?php endforeach; ?>
					<?php endif; ?>
<!-- 				</div> -->
				<?php endforeach; ?>
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 	</div> -->
<!-- </li> -->
<?php endforeach; ?>

<div class="uk-flex">
	<?php //foreach($pred_data['predictions'][0]['destinations'] as $destinations) : ?>
		<h6><small><?php //echo $sch_trips['tripHeadsign']; ?></small></h6>
		
		<?php //if( isset($destinations) ) : ?>
			<?php //foreach($destinations['predictions'] as $predictions) : ?>
			<div class="uk-flex stop-item" role="listitem">
				<div class="uk-flex-1 name"><a class="link"><?php //echo $predictions['time']; ?></a></div>
			</div>
			<?php //endforeach; ?>
		<?php //endif; ?>
	<?php //endforeach; ?>
</div>
