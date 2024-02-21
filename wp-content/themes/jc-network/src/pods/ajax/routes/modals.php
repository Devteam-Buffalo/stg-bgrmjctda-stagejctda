<?php
/*
**  @file    modals.php
**  
**  @desc    
**  
**  @path    /modals.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/28/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div id="route-stop-modal-<?php echo $stop['id']; ?>" class="uk-modal-full stop-modal" uk-modal esc-close="false" bg-close="false" stack="false">
	<div class="uk-modal-dialog uk-flex-top" role="dialog">
		<button type="button" class="uk-modal-close-full uk-close-large" uk-close="target: #route-stop-modal-<?php echo $stop['id']; ?>"></button>

		<h3><span class="code"><?php echo $stop['code']; ?></span> <span class="name"><?php echo $stop['name']; ?></span></h3>

		<div class="uk-child-width-1-2@m uk-child-width-1-1" role="grid" uk-grid>
			<div role="gridcell">
				<h6>Bus Stop Times</h6>
<?php
foreach($sched_data['schedule'] as $schedules) :
	$sch_dir_ids = $schedules['directionId'];
	show($stop_dir);
	//if( in_array($stop_dir, $sch_dir_ids) : 
		foreach($schedules['stops'] as $sch_stops) :
			$sch_stop_ids = $sch_stops['stopId'];
			
			//if( in_array($stop, $sch_stop_ids) : 
			
				foreach($schedules['timesForTrip'] as $sch_trips) :
					if( isset($sch_trips['times']) ) :
						foreach($sch_trips['times'] as $sch_times) :
							//echo isset($sch_times['timeStr']) ? $sch_times['timeStr'] : ' &mdash; ';
						endforeach;
					endif;
			
				endforeach;
		
			//endif;
		endforeach;
	//endif;

endforeach;
?>
				<?php //pods_view( 'ajax/stops/next-times.php', compact( array_keys( get_defined_vars() ) ) ); ?>
			</div>

			<div role="gridcell">
				<h6>Bus Stop Map</h6>
				
				<div style="background-image: url(<?php echo '//maps.googleapis.com/maps/api/staticmap?key=' . $static_key . '&center=' . $stop['lat'] . ',' . $stop['lon'] . $static_style . '|' . $stop['lat'] . ',' . $stop['lon']; ?>)" class="static-map">&nbsp;</div>
				
				<?php pods_view( 'ajax/stops/map-actions.php', $data = null, DAY_IN_SECONDS, 'transient', false ); ?>
			</div>
		</div>

		<div role="complementary">
			<?php pods_view( 'ajax/stops/related-actions.php', $data = null, DAY_IN_SECONDS, 'transient', false ); ?>
			<button type="button" uk-pagination-previous></button><button type="button" uk-pagination-next></button>
		</div>
	</div>
</div>